<?php

class PostsController extends Controller
{
	public function index($vars)
	{

        $page = 1;
        
        extract($vars);
        
        $page = $page? $page:1;
		
        $posts = Post::getLatestPosts($page);

        //Общее кол-во товаров (для пагинации)
        $total = Post::getTotalPosts();

		// $posts = Post::index();

        $pagination = new Pagination($total, $page, Post::SHOW_BY_DEFAULT, 'page-');

        // $products = Product::getLatestProducts();
        
		$data['posts'] = $posts;
        $data['title'] = 'BLOG PAGE ';
        $data['pagination'] = $pagination;
        
        $breadcrumb = new Breadcrumb();

        $data['breadcrumb'] = $breadcrumb->build(array(
           'Blog Post List' => 'posts',
        ));

		$this->_view->render('blog/index', $data);
	}


	public function view($vars)
	{

		extract($vars);
		$post = Post::view($id);
		$title = 'BLOG POST '.$id;
		$this->_view->render('blog/show', ['title'=>$title, 'post'=>$post]);
	}
}
