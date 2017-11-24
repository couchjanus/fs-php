<?php

class IndexController
{
	public function index()
	{
        $title = 'HOME PAGE';
        require MODELS.'Post.php';

        $posts = Post::index();

        view('home/index', ['title'=>$title, 'posts'=>$posts]);
    
	}

}
