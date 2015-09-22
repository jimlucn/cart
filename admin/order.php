<?php

  require_once 'back_functions.php';
  session_start();

  do_html_header('Rama网上书店管理系统');

  check_admin_user();

  do_html_top();

  display_admin_menu();

  display_order();
  
?>