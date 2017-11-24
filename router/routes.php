<?php

return [
  'blog' => 'PostsController@index',
  'about' => 'AboutController@index',
  'contact' => 'ContactController@index',
  'shop' => 'CatalogController@index',
  'api/shop' => 'CatalogController@getProduct',
  'admin' => 'Admin\DashboardController@index',
  'admin/posts' => 'Admin\posts\PostsController@index',
  
  'admin/categories' => 'Admin\shop\CategoriesController@index',
  'admin/category/add' => 'Admin\shop\CategoriesController@create',

  'admin/products' => 'Admin\shop\ProductsController@index',
  'admin/product/add'  => 'Admin\shop\ProductsController@create',
  '' => 'IndexController@index'
];
