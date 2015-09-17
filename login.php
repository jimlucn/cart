<?php
  require_once 'functions.php';
  session_start();

  do_html_header('用户登录');

  do_html_top();

  display_login_form();

  do_html_footer();

?>