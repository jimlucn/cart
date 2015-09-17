<?php
  require_once 'functions.php';

  session_start();

  $order_info_customerid = $_POST['order_info_customerid'];
  $order_info_orderid = $_POST['order_info_orderid'];
  $type = $_POST['type'];
  $number = $_POST['number'];
  $secure_number = $_POST['secure_number'];
  $month = $_POST['month'];
  $year = $_POST['year'];
  $name = $_POST['name'];

  do_html_header('支付');

  do_html_top();

  if ($_POST['submit'] && $_SESSION['cart'] && ($_POST['order_info_customerid']) && ($_POST['order_info_orderid'])
  	 && ($_POST['type']) && ($_POST['number']) && ($_POST['secure_number']) && ($_POST['month']) && ($_POST['year']) 
  	 && ($_POST['name'])) {
  	display_cart($_SESSION['cart'],false,1,1);
  	if(query_order_pay($order_info_orderid) == PAYED){
  		echo "您的订单已经支付成功，无需再次支付。您的订单号：".$order_info_orderid;
  	}
  	  	if(query_order_pay($order_info_orderid) == UNPAYED){
  		 if(process_card()){
  		 	change_order_status($order_info_orderid);
  		 	echo "您的订单支付成功。您的订单号：".$order_info_orderid;
  		 	session_destroy();
  		 }else{
  		 	echo "您的信用卡有误。";
  		 }
  	}else{
  		echo "错误2<br>";
  		echo query_order_pay($order_info_orderid);
  	}	
  }else{
  	echo "支付信息请填完整";
  	display_button('purchase.php','支付');
  }


 

  do_html_footer();

?>