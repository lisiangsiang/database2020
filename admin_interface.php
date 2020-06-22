<?php
$server = "database-1.c2ccpjw7s7h5.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
$dbuser = "admin";       # 使用者帳號
$dbpassword = "whysoserious"; # 使用者密碼
$dbname = "test";    # 資料庫名稱


$link = mysqli_connect( $server , $dbuser , $dbpassword);
mysqli_query($link , "SET NAMES 'UTF8'");
mysqli_select_db($link ,$dbname) or die("fail");


echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">'; 

echo  "<form action='admin_interface.php' method='post'>";
echo "<p>新增帳號:</p><input type='text' name='account'>";
echo "<p>新增密碼:</p><input type='text' name='password'>";
echo "<p><input type='submit' value='enter'></p></form>";

$ACCOUNT=$_POST['account'];
$PASSWORD=$_POST['password'];

echo '接收到的內容為: '.$ACCOUNT;
echo '接收到的內容為: '.$PASSWORD;

$sql = "INSERT INTO User ".
        "(Account,Password,Online) ".
        "VALUES ".
        "('$ACCOUNT','$PASSWORD',1)";

        mysqli_select_db( $link, 'User' );
        $retval = mysqli_query( $link, $sql );
        if(! $retval )
        {
          die('無法插入資料: ' . mysqli_error($link));
        }
        echo "資料插入成功\n";
        mysqli_close($link);

?>