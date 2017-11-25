<?php

class CatalogController extends Controller
{
	public function index()
	{
		$title = 'CATALOG PAGE';
		$products = Product::getLatestProducts();

		$this->_view->render('shop/index', ['title'=>$title, 'products'=>$products]);
	}

	public function getProduct()
	{
		$products = Product::index();
		echo json_encode($products);
	}

}
