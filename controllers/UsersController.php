<?php

/**
 * Class UserController для работы с пользователем
 */

 class UsersController extends Controller {

     /**
     * Class UserController для работы с пользователем
     */
     public function __construct(){
         parent::__construct();
     }

    /**
     * Регистрация пользователя
     *
     * @return bool
     */
    public function signup() {

        $result = false;
        $name = '';
        $email = '';
        $password = '';

        if (isset($_POST) and (!empty($_POST))) {
            $name = trim(strip_tags($_POST['name']));
            $email = trim(strip_tags($_POST['email']));
            $password = trim(strip_tags($_POST['password']));

            //Флаг ошибок
            $data['errors'] = false;

            //Валидация полей
            if (!User::checkName($name)) {
                $data['errors'][] = "Имя не может быть короче 2-х символов";
            }

            if (!User::checkEmail($email)) {
                $data['errors'][] = "Некорректный Email";
            }

            if (!User::checkPassword($password)) {
                $data['errors'][] = "Пароль не может быть короче 6-ти символов";
            }

            if (User::checkEmailExists($email)) {
                $data['errors'][] = "Такой email уже используется";
            }

            if ($data['errors'] == false) {
                $result = User::register($name, $email, password_hash($password, PASSWORD_DEFAULT));

                header("Location: /login");
            }
        }

        $data['success'] = $result;
        $data['title'] = 'Signup Page ';
        
        $this->_view->render('user/signup',$data);

    }

    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    public function login () {

        $email = '';
        $password = '';

         if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){
             header("Location: /"); //перенаправляем в личный кабинет
         }

        if (isset($_POST) and (!empty($_POST))) {

            $email = trim(strip_tags($_POST['email']));
            $password = $_POST['password'];

            //Флаг ошибок
            $data['errors'] = false;

            //Валидация полей
            if (!User::checkEmail($email)) {
                $data['errors'][] = "Некорректный Email";
            }

            //Проверяем, существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                $data['errors'][] = "Пользователя с таким email или паролем не существует";
            }else{
                User::auth($userId); //записываем пользователя в сессию

                header("Location: /"); //перенаправляем в личный кабинет
            }
        }
        $data['title'] = 'Login Page ';

        $this->_view->render('user/login',$data);

    }

    /**
     * Выход из учетной записи
     *
     * @return bool
     */
    public function logout () {
        if(session_destroy()){
            header('Location: /');
            return true;
        }
    }
}
