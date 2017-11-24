<?php

class ContactController
{
    public function index()
    {
        $title = 'Contact Controller PAGE';
        
        view('home/contact', ['title'=>$title]);
    }
    
}
