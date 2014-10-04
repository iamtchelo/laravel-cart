<?php
namespace Laracart\Cart;

interface CartInterface
{	
	/**
	 * Get all products
	 */
	public function getProducts();

	/**
	 * Get product by id
	 *
	 * @param integer $id
	 */
	public function getProductById($id);

	/**
	 * Add product by key
	 * 
	 * @param array $product
	 * @param integer $quantity
	 */
	public function addProduct($product, $quantity = null);

	/**
	 * Delete product by key
	 *
	 * @param integer $id
	 */
	public function deleteProduct($id);
}