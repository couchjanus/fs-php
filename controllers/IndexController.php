<?php

class IndexController extends Controller
{
	public function index()
	{
        $title = 'HOME PAGE';
        $posts = Post::index();
        
        $data['posts'] = $posts;
        $data['title'] = $title;
        
        $breadcrumb = new Breadcrumb();

        $data['breadcrumb'] = $breadcrumb->build(array(
            
        ));

        $this->_view->render('home/index', $data);
    
	}

}
