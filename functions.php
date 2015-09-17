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
  <?php
  if ($_SESSION['valid_user']) {
    echo "欢迎您，".$_SESSION['valid_user'];
    echo "<a href='logout.php'>退出</a>";
  }else{
  ?>
    <span><a href="login.php">登录</a></span>
    <span><a href="register.php">注册</a></span>
    <?php
    }
    ?>
    <p>总数量= <?php echo $_SESSION['items'] ?></p>
    <p>总金额= <?php echo $_SESSION['total_price'] ?></p>
    <strong><a href="show_cart.php">查看购物车</a></strong>
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
  function display_button($target,$title){
    ?>
    <div align="center">
   <input type="button" class="btn btn-primary btn-lg btn-danger" onclick="javascript:window.location.href='<?php echo $target?>'" value="<?php echo $title ?>" />  
   </div>   
  <?php
  }
?>


  <?php
// 显示购物车的详细信息
  function display_cart($cart,$modify = true,$shipping = false,$total = false){  
    if (is_array($cart)) {
  ?>
  <div class="row">
  <div class="col-md-8">
  <table class="table table-striped" >
  <form action="show_cart.php" method="post">
    <tr>
      <th colspan="2" align="right">商品名称</th>
      <th>单价</th>
      <th>数量</th>
      <th>总价</th>
    </tr>
    <?php
        foreach ($cart as $isbn => $qty) {
          $db = db_connect();
          $query = "select title,price from books where isbn = '".$isbn."'";
          $result = $db->query($query);
          $size = change_image_size($isbn);
          if ($result->num_rows > 0) {
            for ($i=0; $row = $result->fetch_assoc(); $i++) { 
              $books[$i] = $row;
      ?>
      <tr>
        <td><img src="./images/<?php echo $isbn ?>.jpg" alt="<?php echo $books[$i]['title'] ?>" 
        width="<?php echo ($size[0]/8)?>" height="<?php echo ($size[1]/8)?>"></td>
        <td style="vertical-align:middle"><?php echo $books[$i]['title'] ?></td>
        <td style="vertical-align:middle">￥<?php echo $books[$i]['price'] ?></td>
        <?php 
        if($modify == true){
        ?>
        <td style="vertical-align:middle"><input type="text" name="<?php echo $isbn ?>" value="<?php echo $qty ?>" size="3"/></td>
        <?php 
         }else{
          echo "<td style='vertical-align:middle'>".$qty."</td>";
          }
          ?>
        <td style="vertical-align:middle">￥<?php echo number_format($books[$i]['price']*$qty,2) ?></td>
      </tr>
      <?php 
            }
          }
        }
        ?>
      <tr class="success">
        <th colspan="3"></th>
        <th><?php echo $_SESSION['items']?></th>
        <th>￥<?php echo $_SESSION['total_price']?></th>
      </tr>
      <tr>
        <td colspan="3"></td>
        <td>
        <?php 
        if($modify == true){
        ?>
          <input type="submit" name="submit" value="保存修改数量">
        <?php 
         }else{
          }
          ?>
        </td>
        <td></td>
      </tr>
      <?php 
        if($shipping == true){
        ?>
      <tr>
        <td colspan="4">          
          运费
        </td>
        <td>
        ￥20.00
        </td>
      </tr>
        <?php 
        }
        ?>
       <?php 
        if($total == true){
        ?>
      <tr class="success">
        <td colspan="4">          
          总价含运费
        </td>
        <td>￥
        <?php echo number_format(($_SESSION['total_price']+20),2);?>
        </td>
      </tr>
        <?php 
        }
        ?>
  </form>
  </table>
  </div>
  </div>
      <?php
    }
  }
?>


  <?php
    function display_checkout_form(){
  ?>
      <div class="row">
       <div class="col-md-8">       
        <table class="table" align="center">
      <form action="purchase.php" method="post">
        <tr>
          <th colspan="2" class="active">您的信息</th>
        </tr>
        <tr>
          <td>姓名</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr>
          <td>地址</td>
          <td><input type="text" name="address"></td>
        </tr>
        <tr>
          <td>城市</td>
          <td><input type="text" name="city"></td>
        </tr>
        <tr>
          <td>省</td>
          <td><input type="text" name="state"></td>
        </tr>
        <tr>
          <td>邮编</td>
          <td><input type="text" name="zip"></td>
        </tr>
        <tr>
          <td>国家</td>
          <td><input type="text" name="country"></td>
        </tr>
        <tr>
          <th colspan="2" class="active">收货地址</th>
        </tr>
                <tr>
          <td>姓名</td>
          <td><input type="text" name="ship_name"></td>
        </tr>
        <tr>
          <td>地址</td>
          <td><input type="text" name="ship_address"></td>
        </tr>
        <tr>
          <td>城市</td>
          <td><input type="text" name="ship_city"></td>
        </tr>
        <tr>
          <td>省</td>
          <td><input type="text" name="ship_state"></td>
        </tr>
        <tr>
          <td>邮编</td>
          <td><input type="text" name="ship_zip"></td>
        </tr>
        <tr>
          <td>国家</td>
          <td><input type="text" name="ship_country"></td>
        </tr>
        <tr>
          <th colspan="2"><input type="submit" name="submit" value="提交订单"></th>
        </tr>        
      </form>
    </table>
    </div>
    </div>
  <?php
    }
  ?>
  



    

  <?php
  function display_card_form($order_info){
  ?>
  <div class="row">
    <div class="col-md-8">
    <table class="table">
      <form action="process.php" method="post">
        <tr align="center">
          <th colspan="2" >信用卡信息</th>
        </tr>
        <tr>
          <td>卡类型</td>
          <td>
            <select name="type">
              <option value="VISA" selected="selected">VISA</option>
              <option value="MASTERCARD">MASTERCARD</option>
              <option value="UNIONPAY" >UNIONPAY</option>
              <option value="PAYPAL">PAYPAL</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>卡号</td>
          <td><input type="text" name="number"></td>
        </tr>
        <tr>
          <td>三位验证码</td>
          <td><input type="text" name="secure_number" size="3"></td>
        </tr>
        <tr>
          <td>有效期</td>
          <td>月
            <select name="month">
              <option value="1">01</option>
              <option value="2">02</option>
              <option value="3">03</option>
              <option value="5">04</option>
              <option value="6">04</option>
              <option value="7">04</option>
              <option value="8">04</option>
              <option value="9">04</option>
              <option value="10">04</option>
              <option value="11">04</option>
              <option value="12">04</option>
            </select>
            年
              <select name="year">
              <option value="2016">2016</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>持卡人姓名</td>
          <td><input type="text" name="name"></td>
        </tr>
        <tr align="center">
          <td colspan="2">
            <input type="submit" name="submit" value="支付" class="btn btn-danger">
            <input type="hidden" name="order_info_customerid" value="<?php echo $order_info[0] ?>">
            <input type="hidden" name="order_info_orderid" value="<?php echo $order_info[1] ?>">
          </td>
        </tr>        
      </form>
    </table>
    </div>
  </div>
  <?php
  }
  ?>

<?php
    function display_login_form(){
?>
      <div class="row">
        <div class="col-md-3">
          <table class="table">
            <form action="member.php" method="post">
              <tr>
                <td>用户名</td>
                <td><input type="text" name="username" placeholder="邮箱/手机号"></td>
              </tr>
              <tr>
                <td>密码</td>
                <td><input type="password" name="password" placeholder="密码"></td>
              </tr>
              <tr>                
                <td colspan="2"><input type="submit" name="submit" value="登录"></td>
              </tr>
            </form>
          </table>
        </div>
      </div>
<?php
    }
?>


<?php
    function display_register_form(){
?>
      <div class="row">
        <div class="col-md-3">
          <table class="table">
            <form action="register_new.php" method="post">
              <tr>
                <td>用户名</td>
                <td><input type="text" name="username" placeholder="邮箱/手机号"></td>
              </tr>
              <tr>
                <td>密码</td>
                <td><input type="password" name="password1" placeholder="密码"></td>
              </tr>
              <tr>
                <td>重复密码</td>
                <td><input type="password" name="password2" placeholder="重复密码"></td>
              </tr>
              <tr>
                <td>邮箱</td>
                <td><input type="text" name="email" placeholder="邮箱地址"></td>
              </tr>
              <tr>
                <td>手机号</td>
                <td><input type="text" name="cellphone" placeholder="手机号"></td>
              </tr>
              <tr>                
                <td colspan="2"><input type="submit" name="submit" value="注册"></td>
              </tr>
            </form>
          </table>
        </div>
      </div>
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


//计算购物车里商品总价
   function calculate_price($cart){
    $db = db_connect();
    $total_prices = 0.00;
    foreach ($cart as $isbn => $qty) {
      $query = "select price from books where isbn = '".$isbn."'";
      $result = $db->query($query);
      $price = $result->fetch_assoc();
      $prices = $price['price'] * $qty;
      $total_prices += $prices;
    }
    return number_format($total_prices,2);
   }


//计算购物车里商品总数量
   function calculate_items($cart){
    $db = db_connect();
    $total_qty = 0;
    foreach ($cart as $isbn => $qty) {
      $total_qty += $qty;
    }
    return $total_qty;
   }


//讲订单信息写入数据库
   function insert_order($order_details){

    extract($order_details);

    if ((!$ship_name)&&(!$ship_address)&&(!$ship_city)&&(!$ship_state)&&(!$ship_zip)&&(!$ship_country)) {
      $ship_name = $name;
      $ship_address = $address;
      $ship_city = $city;
      $ship_state = $state;
      $ship_zip = $zip;
      $ship_country = $country;
    }

    $db = db_connect();

    $db->autocommit(false);

    $query = "select customerid from customers where name='".$name."' and address='".$address."' and city='".$city."'
              and state='".$state."' and zip='".$zip."' and country='".$country."'";

    $result = $db->query($query);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $customerid = $row['customerid'];
    }else{
      $query = "insert into customers values('','".$name."','".$address."','".$city."','".$state."','".$zip."','".$country."')";
      $result = $db->query($query);
      if (!$result) {
        echo "插入用户表失败";
        exit();
        return false;
      }
      $customerid = $db->insert_id;
    }
    $date =date("Y-m-d");

    $query = "insert into orders values('','".$customerid."','".$_SESSION['total_price']."','".$date."','UNPAYED','".$ship_name."',
              '".$ship_address."','".$ship_city."','".$ship_state."','".$ship_zip."','".$ship_country."')";
    $result = $db->query($query);
    if (!$result) {
      print_r($customerid);
      print_r($_SESSION['total_price']);
      print_r($date);
      print_r($ship_address);
      print_r($ship_city);
      print_r($ship_state);
      print_r($ship_zip);
      print_r($ship_country);
      echo "插入订单表失败";
        exit();
      return false;
    }
    $orderid = $db->insert_id;

    foreach ($_SESSION['cart'] as $isbn => $qty) {
      $book_details = get_book_details($isbn);
      $query = "delete from order_items where orderid='".$orderid."' and isbn='".$isbn."'";
      $result = $db->query($query);
      if (!$result) {
        echo "删除订单商品表失败";
        exit();
        return false;
      }
      $query = "insert into order_items values('".$orderid."','".$isbn."','".$book_details['price']."','".$qty."')";
      $result = $db->query($query);
      if (!$result) {
        print_r($orderid);
        echo "插入订单商品表失败";
        exit();
        return false;
      }
    }

    $db->commit();

    $db->autocommit(true);

    $order_info = array($customerid,$orderid);

    return $order_info;

   }


   function query_order_pay($order_info_orderid){
    $db = db_connect();
    $query = "select order_status from orders where orderid='".$order_info_orderid."'";
    $result = $db->query($query);
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    }
    return $row['order_status'];
   }


   function process_card(){
    return true;
   }


   function change_order_status($order_info_orderid){
    $db = db_connect();
    $query = "update orders set order_status='PAYED'where orderid='".$order_info_orderid."'";
    $result = $db->query($query);
    if ($result) {
      echo "支付状态更改成功！<br>";
    }
   }


   function check_valid_user(){
    if (isset($_SESSION['valid_user'])) {
      echo "欢迎您，".$_SESSION['valid_user']."<br>";
    }else{
      do_html_header("出错了:");
      do_html_url('login.php','您还没有登录，请先登录');
      do_html_footer();
      exit();
    }
   }


    function register($username, $email, $password1,$cellphone){
    //这里不能引用conn.php，再调用$db->query(),会提示错误
     $db = db_connect();
     $query = "insert into users values('','".$username."','".$password1."','".$email."','".$cellphone."')";
     //$query = "insert into user values('$username','$password1','$email')";
     $result = $db->query($query);
    if ($result) {
      echo $db->affected_rows."data inserted.";
    }else{
      echo "insert data failure.";
    }
    $db->close();
   }


    function filled_out($form_vars){ //验证注册表单是否填写完整
    foreach ($form_vars as $key => $value) {
      if (!isset($key) || $value == '') {
        return flase;         
      }
      return true;
    }

   }


    function vaild_email($email){
    if (preg_match("/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/",$email)) {
      return true;
    }else{
      return flase;
    }
   }
 ?>