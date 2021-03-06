<?php
  require_once 'functions.php';
  session_start();

  $username = $_POST['username'];
  $password = $_POST['password'];

  do_html_header('登录');

  if (!isset($_SESSION['valid_user'])) {
	  if (!filled_out($_POST)) {
	  	do_html_url('login.php','请填写用户名和密码。');
	  	exit();
	  }
	  if (is_user($username,$password)) {
	  	$_SESSION['valid_user'] = $username;
	  	do_html_url('index.php','登录成功,去购物');
	  }else{
	  	do_html_url('login.php','用户名或密码错误');
	  	exit();
	  }
	}

  do_html_footer();

?>