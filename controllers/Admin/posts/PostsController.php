<?php

class PostsController
{
	public function index()
	{
    view('admin/posts/index', ['title'=>'Posts Controller PAGE']);
	}

}
