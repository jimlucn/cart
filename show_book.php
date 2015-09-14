<?php
  require_once 'functions.php';
  session_start();

  $isbn = $_GET['isbn'];

  $book = get_book_details($isbn);

  do_html_header($book['title']);

  do_html_top();

  display_book_details($book);

  display_button($isbn,'加入购物车');

  do_html_footer();
?>