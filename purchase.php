<?php
  require_once 'functions.php';
  session_start();

  $name = $_POST['name'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $province = $_POST['province'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];

  do_html_header('结算');

  do_html_top();

  if (is_array($_SESSION['cart'])) {
  	if ($name && $address && $city && $province && $zip && $country) {
  	  display_cart($_SESSION['cart'],false);
  	  display_shipping();
  	  display_checkout_form();
  	}

  }

  do_html_footer();
?>