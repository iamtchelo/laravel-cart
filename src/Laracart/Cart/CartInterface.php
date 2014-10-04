<?php
namespace Laracart\Cart;

interface CartInterface
{	
	/**
	 * Get all products
	 */
	public function all();

	/**
	 * Add product by key
	 */
	public function add($key);

	/**
	 * Delete product by key
	 */
	public function delete($key);
}