<?php
namespace Laracart\Cart;

class Cart implements CartInterface
{


	public function all()
	{

	}

	/**
	* Add to cart
	*/
	public function add($product)
	{

		if(count($_SESSION['products'][$product['id']])){
		  throw new Exception("O produto já existe");
		}

		$_SESSION['products'][$product['id']] = $product ;

	}

	
	/**
	* Delete to cart
	*/
	public function delete($product)
	{

				
	}


}