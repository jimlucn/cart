<?php
  require_once 'back_functions.php';
  session_start();

  do_html_header('管理员登录');

  do_html_top();

  display_login_form();

  do_html_footer();

?>