<?php
  require_once 'functions.php';
  session_start();

  $new = $_GET['new'];

  do_html_header("购物车");

  if (!isset($_SESSION['cart'])) {
  	$_SESSION['cart'] = array();
  	$_SESSION['items'] = 0;
  	$_SESSION['total_price'] = '0.00';
  }

  if (isset($_SESSION['cart'][$new]) {
  	$_SESSION['cart'][$new]++;
  }else{
  	$_SESSION['cart'][$new] = 1;
  }

  $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
  $_SESSION['items'] = calculate_items($_SESSION['cart']);


  do_html_top();

  do_html_footer();

?>