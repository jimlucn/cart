<?php
// =====================================================================
//   显示html模块
// =====================================================================
//显示html标题
   function do_html_header($tittle){  
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo $tittle;?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container-fluid">
 <?php	  
  }
 ?>



 <?php
//显示html顶部
   function do_html_top(){  
?>
<!DOCTYPE html>
<div class="row">
  <div class="col-xs-12 col-md-8">
  <h1><a href="index.php">Rama网上书店</a></h1>
  </div>
  <div class="col-xs-6 col-md-4">
    <span><a href="login.php">登录</a></span>
    <span><a href="register.php">注册</a></span>
    <p>总数量=</p>
    <p>总金额=</p>
    <strong>查看购物车</strong>
  </div>
</div>
 <?php    
  }
 ?>


  <?php
//显示html底部
  function do_html_footer(){  
?>
</div>
 </body>
</html>
 <?php    
  }
 ?>


  <?php
//显示类目
  function display_categories($cat_array){  
    if (!$cat_array) {
      echo "还没有类目";
      exit();
    }
    echo "<ul>";
    foreach ($cat_array as $row) {
      $url = "show_cat.php?catid=".$row['catid'];
      $title = $row['catname'];
      echo "<li>";
      do_html_url($url,$title);
      echo "</li>";
    }
    echo "</ul>";
  }
?>


  <?php
//显示类目下的图书信息
  function display_books($book_array){  
    if (!$book_array) {
      echo "本类目下还没有图书";
      exit();
    }
    echo "<tr>";
    foreach ($book_array as $row) {
      $url = "show_book.php?isbn=".$row['isbn'];
      $title = $row['title'];
      $size = change_image_size($row['isbn']);
      echo "<td><img src=./images/".$row['isbn'].".jpg width=".($size[0]/2)." height=".($size[1]/2)." /></td>";
      echo "<td>";
      do_html_url($url,$title);
      echo "</td>";
    }
    echo "</tr>";
  }
?>



  <?php
// 显示图书的详细信息
  function display_book_details($book){  
    if (!$book) {
      echo "找不到该图书";
      exit();
    }
    echo "<tr>";
      $url = "show_book.php?isbn=".$book['isbn'];
      $title = $book['title'];
      $size = change_image_size($book['isbn']);
      echo "<td><img src=./images/".$book['isbn'].".jpg width=".($size[0])." height=".($size[1])." /></td>";
      echo "<td>";
      echo "<ul>";
      echo "<li>作者：".$book['author']."</li>";
      echo "<li>ISBN：".$book['isbn']."</li>";
      echo "<li>价格：".$book['price']."</li>";
      echo "<li>描述：".$book['description']."</li>";
      echo "</ul>";
      echo "</td>";
    echo "</tr>";
  }
?>



  <?php
// 显示按钮
  function display_button($isbn,$value){
    ?>
   <input type="button" class="btn btn-primary btn-lg btn-danger" onclick="javascript:window.location.href='show_cart.php?new=<?php echo $isbn ?>'" value="<?php echo $value ?>" />
     
  <?php
  }

?>




 <?php
// =====================================================================
//   函数功能模块
// =====================================================================
//连接数据库
   function db_connect(){
    @$db = new mysqli('localhost','root','','book_sc');
    if ($db->connect_errno) {
      echo "Can't connect database.";
      exit();
    }
    $db->query("set names utf8");
    return $db;
   }


//跳转连接
   function do_html_url($url,$title){
    echo "<a href = ".$url.">".$title."</a>";
   }


// 获取图书类目
   function get_categories(){
    $db = db_connect();
    $query = "select catid,catname from categories";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
      for ($i=0; $row = $result->fetch_assoc(); $i++) { 
        $cat_array[$i] = $row;        
      }
      return $cat_array;
    }else{
      return false;
    }

   }

//获取类目名称
   function get_category_name($catid){
    $db = db_connect();
    $query = "select catname from categories where catid='".$catid."'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
      for ($i=0; $row = $result->fetch_assoc(); $i++) { 
        $catname = $row['catname'];        
      }
      return $catname;
    }else{
      return false;
    }

   }


//获取类目下图书信息
   function get_books($catid){
    $db = db_connect();
    $query = "select * from books where catid='".$catid."'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
      for ($i=0; $row = $result->fetch_assoc(); $i++) { 
        $books[$i] = $row;        
      }
      return $books;
    }else{
      return false;
    }
   }

//获取图片长宽
   function change_image_size($isbn){
    $image = "./images/".$isbn.".jpg";
    if (file_exists($image)) {
      $size = getimagesize($image);
    }
    return $size;
   }


//获取图书详细信息
   function get_book_details($isbn){
    $db = db_connect();
    $query = "select * from books where isbn='".$isbn."'";
    $result = $db->query($query);
    $books = array();
    if ($result->num_rows > 0) {
      for ($i=0; $row = $result->fetch_assoc(); $i++) { 
        $books = $row;        //怎样赋值变成一维数组
      }
      return $books;
    }else{
      return false;
    }
   }



 ?>