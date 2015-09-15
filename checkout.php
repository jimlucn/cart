<?php
  require_once 'functions.php';
  session_start();

  do_html_header('结算');

  do_html_top();

  if (is_array($_SESSION['cart'])) {
  	display_cart($_SESSION['cart'],false);
  	display_checkout_form();
  }

  do_html_footer();
?>