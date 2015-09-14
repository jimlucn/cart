<?php
  require_once 'functions.php';
  $catid = $_GET['catid'];

  $name = get_category_name($catid);

  do_html_header($name);

  do_html_top();

  echo "<h2>".$name."</h2>";

  $book_array = get_books($catid);

  display_books($book_array);

  do_html_footer();

?>