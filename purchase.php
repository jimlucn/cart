<?php
  require_once 'functions.php';
  session_start();

  $name = $_POST['name'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];

  $ship_name = $_POST['ship_name'];
  $ship_address = $_POST['ship_address'];
  $ship_city = $_POST['ship_city'];
  $ship_state = $_POST['ship_state'];
  $ship_zip = $_POST['ship_zip'];
  $ship_country = $_POST['ship_country'];

  do_html_header('结算');

  do_html_top();

  if (is_array($_SESSION['cart'])) {
  	if (($name) && ($address) && ($city) && ($state) && ($zip) && ($country)) {
      if(insert_order($_POST) != false){
      $order_info = insert_order($_POST);
  	  display_cart($_SESSION['cart'],false,1,1);
  	  display_card_form($order_info);
      }else{
        echo "订单写入数据库失败";
      }
    }else{
      echo "用户信息填写不完整";
      display_button('checkout.php','返回');
    }

  }else{
    echo "您还没有添加商品到购物车";
    display_button('index.php','返回首页');
  }


  do_html_footer();
?>