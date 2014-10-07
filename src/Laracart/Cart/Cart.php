<?php
namespace Laracart\Cart;

class Cart implements CartInterface, \Countable
{
	/**
	 * @var string
	 */
	private $prefix = 'products';

	/**
	 * @var integer
	 */
	private $totalProduct = 0;

	/**
	 * @var float
	 */
	private $totalPrice;

	public function __construct()
	{
		$_SESSION[$this->prefix] = array();
	}

	/**
	 * Get all products on cart
	 * 
	 * @param void
	 * @return array|false
	 */
	public function getProducts()
	{
		if (count($_SESSION[$this->prefix]) >= 1) {
			return $_SESSION[$this->prefix];
		}
		else return false;
	}

	/**
	 * Get product by id
	 *
	 * @param integer $id
	 * @return array| bool 
	 */
	public function getProductById($id)
	{
		if ($this->has($id)) {
			return $_SESSION[$this->prefix][$id];
		}
		else return false;
	}

	/**
	 * Add product by key
	 * 
	 * @param array $product
	 * @param integer $quantity
	 * @return void
	 */
	public function addProduct($product, $quantity = null)
	{	
		if (!is_array($product) || $product == null) {
			throw new \InvalidArgumentException('Invalid product');
		}

		$quantity = ($quantity != null) ? $quantity : (int) 1;
		if ($this->has($product['id'])) {
			$product = $this->getProductById($product['id']);
			$product['quantity'] += $quantity;
			$_SESSION[$this->prefix][$product['id']] = $product;
		} else {
			$product['quantity'] = $quantity;
			$_SESSION[$this->prefix][$product['id']] = $product;
		}
	}

	
	/**
	 * Delete product by key
	 *
	 * @param integer $id
	 * @return bool
	 */
	public function deleteProduct($id)
	{	
		if ($this->has($id)) {
			unset($_SESSION[$this->prefix][$id]);
			return true;
		}	

		return false;
	}

	/**
	 * If has product
	 *
	 * @param integer $id
	 * @return bool
	 */
	private function has($id)
	{
		return (isset($_SESSION[$this->prefix][$id])) ? true : false;
	}

	/**
	 * Count all products
	 *
	 * @param void
	 * @return integer 
	 */
	public function count()
	{
		foreach ($_SESSION[$this->prefix] as $product) {
			$this->totalProduct += $product['quantity'];
		}

		return (int) $this->totalProduct;
	}
}