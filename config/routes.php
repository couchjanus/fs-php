<?php

$router->get('', 'IndexController@index');
$router->get('about', 'AboutController@index');
$router->get('contact', 'ContactController@index');
$router->get('shop', 'CatalogController@index');
$router->get('api/shop', 'CatalogController@getProduct');
$router->get('blog', 'PostsController@index');
$router->get('blog/{id}', 'PostsController@view');

$router->get('admin', 'Admin\DashboardController@index');

$router->get('admin/categories', 'Admin\shop\CategoriesController@index');

$router->get('admin/category/add', 'Admin\shop\CategoriesController@create');
$router->post('admin/category/add', 'Admin\shop\CategoriesController@create');

$router->get('admin/category/edit/{id}', 'Admin\shop\CategoriesController@edit');
$router->post('admin/category/edit/{id}', 'Admin\shop\CategoriesController@edit');

$router->get('admin/category/delete/{id}', 'Admin\shop\CategoriesController@delete');
$router->post('admin/category/delete/{id}', 'Admin\shop\CategoriesController@delete');

$router->get('admin/products', 'Admin\shop\ProductsController@index');

$router->get('admin/product/add', 'Admin\shop\ProductsController@create');

$router->post('admin/product/add', 'Admin\shop\ProductsController@create');

$router->get('admin/product/edit/{id}', 'Admin\shop\ProductsController@edit');

$router->post('admin/product/edit/{id}', 'Admin\shop\ProductsController@edit');

$router->get('admin/product/delete/{id}', 'Admin\shop\ProductsController@delete');
$router->post('admin/product/delete/{id}', 'Admin\shop\ProductsController@delete');


$router->get('admin/posts', 'Admin\posts\PostsController@index');
