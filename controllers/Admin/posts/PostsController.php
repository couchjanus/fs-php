<?php

class PostsController extends Controller
{
	public function index()
	{

    $posts = Post::index();
    $data['title'] = 'Admin Posts Page ';
    $data['posts'] = $posts;
    
    $this->_view->render('admin/posts/index', $data);
	}

    public function add () {
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['title'] = trim(strip_tags($_POST['title']));
            $options['content'] = trim(strip_tags($_POST['content']));
            $options['status'] = trim(strip_tags($_POST['status']));

            $id = Post::addPost($options);
            header('Location: /admin/posts');

        }
        $data['title'] = 'Admin Add Post ';
        
        $this->_view->render('admin/posts/add',$data);
        
    }

    public function edit ($vars){

        extract($vars);

        $post = Post::getPostById($id);

        //Если форма отправлена, принимаем данные и обрабатываем
        if(isset($_POST) and !empty($_POST)){

            $options['title'] = trim(strip_tags($_POST['title']));

            $options['content'] = trim($_POST['content']);
            $options['status'] = trim(strip_tags($_POST['status']));

            //Записываем изменения
            Post::updatePost($id, $options);

            header('Location: /admin/posts');
        }

        $data['post'] = $post;
        $data['title'] = 'Admin Post Edit Page ';
        
        $this->_view->render('admin/posts/edit',$data);
        

    }

    public function delete ($vars) {

        extract($vars);


        if (isset($_POST['submit'])) {
            Post::deletePostById($id);
            header('Location: /admin/posts');
        }

        $data['id'] = $id;
        $data['title'] = 'Admin Post Delete Page ';

        $this->_view->render('admin/posts/delete',$data);


    }
}
