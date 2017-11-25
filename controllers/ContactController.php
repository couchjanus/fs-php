<?php

class ContactController extends Controller
{
    public function index()
    {
        $title = 'Contact Controller PAGE';
        
        $this->_view->render('home/contact', ['title'=>$title]);
    }
    
}
