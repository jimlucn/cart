<?php
  require_once 'functions.php';
  session_start();

  do_html_header('Rama网上书店');

  do_html_top();

  $cat_array = get_categories();

  display_categories($cat_array);

  do_html_footer();
?>