<?php

class PostsController extends Controller
{
	public function index()
	{
		$title = 'BLOG PAGE';
		$posts = Post::index();

		$this->_view->render('blog/index', ['title'=>'BLOG PAGE', 'posts'=>$posts]);
	}


	public function view($vars)
	{

		extract($vars);
		$post = Post::view($id);
		$title = 'BLOG POST '.$id;
		$this->_view->render('blog/show', ['title'=>$title, 'post'=>$post]);
	}
}
