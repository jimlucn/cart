<?php
  require_once 'functions.php';
  session_start();

  $new = $_GET['new'];

  if ($new) {
  	if (!isset($_SESSION['cart'])) {
  	$_SESSION['cart'] = array();
  	$_SESSION['items'] = 0;
  	$_SESSION['total_price'] = 0.00;
    }

    if (isset($_SESSION['cart'][$new])) {
  	$_SESSION['cart'][$new]++;
    }else{
  	$_SESSION['cart'][$new] = 1;
    }

    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }

  if ($_POST['submit']) {
    foreach ($_SESSION['cart'] as $isbn => $qty) {
    if ($_POST[$isbn] == '0') {
      unset($_SESSION['cart'][$isbn]);
    }else{
      $_SESSION['cart'][$isbn] = $_POST[$isbn];
    }
    }
    $_SESSION['total_price'] = calculate_price($_SESSION['cart']);
    $_SESSION['items'] = calculate_items($_SESSION['cart']);
  }





  do_html_header("购物车");

  do_html_top();

  if ($_SESSION['cart'] && array_count_values($_SESSION['cart'])) {
    display_cart($_SESSION['cart'],true);
    display_button('checkout.php','结算');
  }else{
    echo "还没有商品添加到购物车";
  }  

  

  do_html_footer();

?>