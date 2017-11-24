<?php

/**
 *Контроллер для просмотра и управления списком всех товаров, имеющихся в базе
 */
class ProductsController extends Controller {

    /**
     * Просмотр всех товаров
     * @return bool
     */
    public function index () {
        $data['products'] = Product::index();
        $data['title'] = 'Admin Product List Page ';
        $this->_view->render('admin/products/index', $data);
    }

    /**
     * Добавление товара
     *
     * @return bool
     */
    public function create () {
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['code'] = trim(strip_tags($_POST['code']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category'] = trim(strip_tags($_POST['category']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));

            if (Product::addProduct($options)){
                header('Location: /admin/products');
            }
            else{
                if(isset($_SERVER['HTTP_REFERER'])) {
                    $previous = $_SERVER['HTTP_REFERER'];
                }
                header("Location: $previous");
            }
        }
        $data['title'] = 'Admin Product Add New Product ';
        $data['categories'] = Category::index();
        $this->_view->render('admin/products/add',$data);
        
    }

    /**
     * Удаление конкретного товара
     *
     * @param $id товара
     * @return bool
     */
    public function delete ($vars) {
    
    }

    /**
     * Редатирование товара
     *
     * @param $id
     * @return bool
     */
    public function edit ($vars) {
        //Получаем информацию о выбранном товаре
    }
}
