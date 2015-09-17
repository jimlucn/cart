<?php
  require_once 'functions.php';
  session_start();

  do_html_header('用户注册');

  do_html_top();

  display_register_form();

  do_html_footer();

?>