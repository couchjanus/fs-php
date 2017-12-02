<?php

$router->get('', 'IndexController@index');
$router->get('about', 'AboutController@index');
$router->get('contact', 'ContactController@index');
$router->get('shop', 'CatalogController@index');
$router->get('api/shop', 'CatalogController@getProduct');
$router->get('blog', 'PostsController@index');
$router->get('blog/{id}', 'PostsController@view');

$router->get('profile', 'ProfileController@index');

$router->get('profile/edit', 'ProfileController@edit');

$router->post('profile/edit', 'ProfileController@edit');

$router->get('register', 'UsersController@signup');
$router->post('register', 'UsersController@signup');

$router->get('login', 'UsersController@login');
$router->post('login', 'UsersController@login');

$router->get('logout', 'UsersController@logout');
$router->post('logout', 'UsersController@logout');


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


$router->get('admin/roles', 'Admin\acl\RolesController@index');
$router->get('admin/roles/add', 'Admin\acl\RolesController@add');
$router->get('admin/roles/edit/{id}', 'Admin\acl\RolesController@edit');
$router->get('admin/roles/delete/{id}', 'Admin\acl\RolesController@delete');

$router->post('admin/roles/add', 'Admin\acl\RolesController@add');
$router->post('admin/roles/edit/{id}', 'Admin\acl\RolesController@edit');
$router->post('admin/roles/delete/{id}', 'Admin\acl\RolesController@delete');


$router->get('admin/permissions', 'Admin\acl\PermissionsController@index');
$router->get('admin/permissions/add', 'Admin\acl\PermissionsController@add');
$router->get('admin/permissions/edit/{id}', 'Admin\acl\PermissionsController@edit');
$router->get('admin/permissions/delete/{id}', 'Admin\acl\PermissionsController@delete');

$router->post('admin/permissions/add', 'Admin\acl\PermissionsController@add');
$router->post('admin/permissions/edit/{id}', 'Admin\acl\PermissionsController@edit');
$router->post('admin/permissions/delete/{id}', 'Admin\acl\PermissionsController@delete');


$router->get('admin/users', 'Admin\users\UsersController@index');
$router->get('admin/users/add', 'Admin\users\UsersController@add');
$router->post('admin/users/add', 'Admin\users\UsersController@add');

$router->get('admin/users/edit/{id}', 'Admin\users\UsersController@edit');
$router->post('admin/users/edit/{id}', 'Admin\users\UsersController@edit');

$router->get('admin/users/delete/{id}', 'Admin\users\UsersController@delete');
$router->post('admin/users/delete/{id}', 'Admin\users\UsersController@delete');
