<?php
  require_once 'functions.php';
  session_start();

  do_html_header('提交订单');

  do_html_top();

  if (is_array($_SESSION['cart'])) {
  	display_cart($_SESSION['cart'],false);
  	display_checkout_form();
  }else{
    echo "还没有商品添加到购物车";
    display_button('index.php','返回首页');
  }  

  do_html_footer();
?>