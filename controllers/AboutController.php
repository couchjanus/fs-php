<?php

class AboutController
{
    public function index()
    {
        $title = 'About PAGE';
        
        view('home/blog', ['title'=>$title]);
    }
    
}
