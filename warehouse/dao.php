<?php
require_once 'dto.php';
session_start ();
class ProductDao {
	public function __construct() {
		if (! isset ( $_SESSION ['cnt'] )) {
			$_SESSION ['cnt'] = 0;
		}
		if (! isset ( $_SESSION ['products'] )) {
			$products = array ();
			$_SESSION ['products'] = $products;
		}
	}
	public function insert($p) {
		$products = $_SESSION ['products'];
		$cnt = $_SESSION ['cnt'];
		$cnt ++;
		$p->sno = $cnt;
		$products [] = $p;
		$_SESSION ['cnt'] = $cnt;
		$_SESSION ['products'] = $products;
	}
	public function select($sno) {
		$products = $_SESSION ['products'];
		foreach ( $products as $p ) {
			if ($p->sno == $sno) {
				return $p;
			}
		}
		return false;
	}
	public function selectAll() {
		$products = $_SESSION ['products'];
		return $products;
	}
	public function update($p1) {
		$products = $_SESSION ['products'];
		foreach ( $products as $p2 ) {
			if ($p1->sno == $p2->sno) {
				$p2->price = $p1->price;
				$p2->quantity = $p1->quantity;
			}
		}
		$_SESSION ['products'] = $products;
	}
	public function delete($sno) {
		$products = $_SESSION ['products'];
		for($i = 0; $i < count ( $products ); $i ++) {
			if ($products [$i]->sno == $sno) {
				unset ( $products [$i] );
				$_SESSION ['products'] = $products;
				break;
			}
		}
	}
}
?>