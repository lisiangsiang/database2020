<?php

$server = "database-1.c2ccpjw7s7h5.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
$dbuser = "admin";       # 使用者帳號
$dbpassword = "whysoserious"; # 使用者密碼
$dbname = "tsst";    # 資料庫名稱

$link = mysqli_connect($server, $dbuser, $dbpassword);
mysqli_query($link, "SET NAMES 'UTF8'");
mysqli_select_db($link, $dbname) or die("fail");

$regions =array();

$sql = 'SELECT `Attraction` FROM `Sightseeing` natural join `Township` WHERE `District`="基隆" ';
$result = mysqli_query($link, $sql) or die("fail sent");
$k = 0;
while ($con = mysqli_fetch_assoc($result)) {

    $N = "";
    $b = $con['Attraction'];
    $N .=  '<li><a href="#" id="' . $k . '" >' . $b . '</a></li>';
    echo '<script>console.log("'.$k.'")</script>';
    array_push($regions, $b);
    $k++; 
    echo $regions[0];
    echo $N;
}
?>

<script>
    var n0 = document.getElementById('0');
    var n1 = document.getElementById('1');
    var n2 = document.getElementById('2');    
    n0.addEventListener("click", function() {
        console.log('ooooooooo');
        document.getElementById("night").style.display = "none";
        document.getElementById("intro").style.display = "";
        <?php $now = $regions[0] ;
            echo $now;
        ?>
    });
    n1.addEventListener("click", function() {
        console.log('dadadwadawdadw');
        document.getElementById("night").style.display = "none";
        document.getElementById("intro").style.display = "";
        <?php $now = $regions[1] ;
            echo $now;
        ?>
    });
    n2.addEventListener("click", function() {
        console.log('hshhshsshhs');
        document.getElementById("night").style.display = "none";
        document.getElementById("intro").style.display = "";
        <?php $now = $regions[2] ;
            echo $now;
        ?>
    });
</script>