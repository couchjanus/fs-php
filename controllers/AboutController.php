<?php

class AboutController extends Controller
{
    public function index()
    {
        $title = 'About PAGE';
        
        $this->_view->render('home/blog', ['title'=>$title]);
    }
    
}
