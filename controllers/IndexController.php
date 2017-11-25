<?php

class IndexController extends Controller
{
	public function index()
	{
        $title = 'HOME PAGE';
        $posts = Post::index();
        $this->_view->render('home/index', ['title'=>$title, 'posts'=>$posts]);
    
	}

}
