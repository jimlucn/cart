<?php
  require_once 'back_functions.php';
  session_start();
  $username = $_POST['username'];
  $password = $_POST['password'];

  do_html_header('Rama网上书店管理系统');

  if ($_POST['submit']) {
	  if (!filled_out($_POST)) {
	  	do_html_url('login.php','请填写用户名和密码。');
	  	exit();
	  }
	  if (is_admin($username,$password)) {
	  	$_SESSION['admin_user'] = $username;
	  }else{
	  	do_html_url('login.php','用户名或密码错误');
	  	exit();
	  }
	}

  check_admin_user();	

  do_html_top();

  display_admin_menu();

  do_html_footer();
?>