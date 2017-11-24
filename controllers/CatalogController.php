<?php

class CatalogController
{
	public function index()
	{
		$title = 'CATALOG PAGE';
		$products = Product::getLatestProducts();
		// echo json_encode($products);
		view('shop/index', ['title'=>$title, 'products'=>$products]);
	}

	public function getProduct()
	{
		$title = 'CATALOG PAGE';
		$products = Product::index();
		echo json_encode($products);
	}

}
