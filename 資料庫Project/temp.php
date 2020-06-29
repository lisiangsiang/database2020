<?php
$server = "database-1.c2ccpjw7s7h5.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
$dbuser = "admin";       # 使用者帳號
$dbpassword = "whysoserious"; # 使用者密碼
$dbname = "tsst";    # 資料庫名稱


$link = mysqli_connect($server, $dbuser, $dbpassword);
mysqli_query($link, "SET NAMES 'UTF8'");
mysqli_select_db($link, $dbname) or die("fail");

$regions = array();
$now = "";
$k=0;
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>返台。</title>
    <link rel="stylesheet" href="background.css">
    <script src="night_chooseAttraciton.js"></script>
    <script src="notebook.js"></script>
    <script src="Startgame.js"></script>
    <script src="go.admain.html"></script>
</head>

<body>

    <body>
        <div class="background" >
            <div class="scene">
                <!--開啟筆記本後-->
                <div class="book">
                    <img id="notebook" src="image/notebook/notebook.png" class="notebookIcon makePointer " onclick="openNotebook()">
                    <div class="notebook" id="innerNotebook">
                        <!--筆記本內頁-->
                        <img src="image/notebook/notebook_page.png" id="notebook_page" class="notebook_page" onclick="">

                        <!--上一頁-->
                        <img src="image/notebook/last_page.png" id="last_page" class="makePointer last_page" onclick="">
                        <!--下一頁-->
                        <img src="image/notebook/next_page.png" id="next_page" class="makePointer next_page" onclick="">
                        <!--藍色標籤(切換景點頁)-->
                        <img src="image/notebook/bookmark_visit.png" id="bookmark_visit" class="makePointer bookmark_visit" onclick="lable(bookmark_visit)">
                        <div id="title_attraction" class="title">
                            ・attraction
                        </div>
                        <!--紅色標籤(切換道具頁)-->
                        <img src="image/notebook/bookmark_item.png" id="bookmark_item" class="makePointer bookmark_item" onclick="lable(bookmark_item)">
                        <div id="title_item" class="title">
                            ・item
                        </div>
                        <!--關閉筆記本-->
                        <img src="image/notebook/cancel.png" onclick="closeNotebook()" id="cancel" class="makePointer cancel">
                    </div>
                </div>
                <div class="heart" id="heart">
                    <!--判斷剩幾個星星-->
                    <img src="image/heart/heart_full.png" class="heart1">
                    <!--最右邊-->
                    <img src="image/heart/heart_full.png" class="heart2">
                    <!--中間-->
                    <img src="image/heart/heart_full.png" class="heart3">
                    <!--最左邊-->
                </div>
            </div>


            <!--遊戲開始的頁面-->
            <div id=startpage class="startpage">
                <h4><strong>返台。</strong></h4>
                <!---畫面剛開始 開始遊戲的按鈕-->
                <input type="button" id="startgame" value="開始遊戲" style="position: relative; margin-left:-11%; margin-top: 60%;" onclick="signin()">
                <!---畫面剛開始 遊戲說明的按鈕-->
                <input type="button" id="explain" value="遊戲說明" style="position: absolute; margin-left:-100%; margin-top: 80%;" onclick="open_explain()">
            </div>

            <!--解釋的頁面1-->
            <div id="explainshow1" class="explain">
                <div class="explainbackground">
                    <div align=center style="position: absolute; margin-top: 12%;margin-left: 15%;">
                        <h1>------------------------------------------精力------------------------------------------</h1>
                        <div style="position: absolute; margin-top: 4%; margin-left: 12%;">
                            <h1>一晚中共有3顆星星</h1>
                            <h1>若答題（以題組為單位）失敗一次->將扣一顆星星</h1>
                            <h1>若星星剩餘0顆->將夢醒，回到白天</h1>
                            <h1>夢醒後星星將恢復成3顆。</h1>
                        </div>
                    </div>
                    <ol>
                        <input type="image" img src="image/notebook/next_page.png" id="next_page" style="position: absolute;margin-left: 84%; margin-top: 25%;" onclick="nextpage2()">
                    </ol>
                    <ol>
                        <input type="button" id="return" value="結束說明" style="position: absolute; margin-top: 40%; margin-left: 42%;" onclick="close_explain()">
                    </ol>
                </div>
            </div>

            <!--解釋的頁面2-->
            <div id="explainshow2" class="explain">
                <div class="explainbackground">
                    <div align=center style="position: absolute; margin-top: 12%;margin-left: 15%;">
                        <h1>------------------------------------------規則------------------------------------------</h1>
                        <div style="position: absolute; margin-top: 4%; margin-left: 0%;">
                            <h1>遊戲中的一天分為白天和黑夜兩時段</h1>
                            <h1>白天呈現主角記憶片段</h1>
                            <h1>黑夜呈現主角的夢境</h1>
                            <h1>在一場夢中，只能選擇一方位（北or中or南)</h1>
                            <h1>在該方位中，可選擇多個景點且景點可重複選擇</h1>
                            <h1>每個景點分別有一題組，答對題組內的所有題目方可獲得該景點之道具</h1>
                        </div>
                    </div>
                    <ol>
                        <input type="image" img src="image/notebook/last_page.png" style="position: absolute; margin-left: 12%; margin-top: 25%;" onclick="open_explain()">
                    </ol>
                    <ol>
                        <input type="image" img src="image/notebook/next_page.png" style="position: absolute;; margin-left: 84%; margin-top: 25%;" onclick="nextpage3()">
                    </ol>

                    <ol>
                        <input type="button" id="return" value="結束說明" style="position: absolute; margin-top: 40%; margin-left: 42%;" onclick="close_explain()">
                    </ol>
                </div>
            </div>

            <!--解釋的頁面3-->
            <div id="explainshow3" class="explain">
                <div class="explainbackground">
                    <div align=center style="position: absolute; margin-top: 14%;margin-left: 15%;">
                        <h1>----------------------------------------道具說明----------------------------------------</h1>
                        <div style="position: absolute; margin-top: 5%; margin-left: 2%;">
                            <h1>一場夢境最多可獲得一道具</h1>
                            <h1>一獲得道具，玩家將回到白天</h1>
                            <h1>在夢中所獲得的道具，將在隔日白天產生主角小時候的記憶片段</h1>
                        </div>
                    </div>

                    <ol>
                        <input type="image" img src="image/notebook/last_page.png" style="position: absolute; margin-left: 12%; margin-top: 25%;" onclick="nextpage2()">
                    </ol>

                    <ol>
                        <input type="button" id="return" value="結束說明" style="position: absolute; margin-top: 40%; margin-left: 42%" onclick="close_explain()">
                    </ol>
                </div>
            </div>

            <!--登入帳號介面-->
            <div id="signin_account" class="signin">
                <div class="playerGraph1">
                    <h1 style="position: relative; margin-left:3%; margin-top: 2%;">玩家登入</h1>
                </div>
                <div class="palyerGraph2">
                    <h1 style="position: relative; margin-left:5%; top: 5%;">使用者帳號:</h1>
                    <input type="text" id="account" placeholder="請輸入帳號">
                    <h1 style="position: relative; margin-left:5%; margin-top: 17%;">使用者密碼:</h1>
                    <input type="password" id="password1" placeholder="請輸入密碼 (至少6碼)" minlength="6">
                    <input type="button" id="signinbutton" value="登入" onclick="check_account()">
                    <!--登入按鈕-->
                    <input type="button" id="createbutton" value="建立新帳號" onclick="create()">
                    <!--創帳號按鈕-->
                </div>
            </div>

            <!--註冊帳號介面-->
            <div id="create" class="create">
                <div style="margin-left:5%">
                    <div class="playerGraph3">
                        <h1 style="position: relative; margin-left:3%; margin-top: 2%;">玩家註冊</h1>
                    </div>
                    <div class="palyerGraph4">
                        <h1 style="position: relative; margin-left:5%; margin-top: 5%;">帳號:</h1>
                        <input type="text" id="account1" placeholder="請輸入註冊帳號" >
                        <h1 style=" position: relative; margin-left:5%; margin-top: 10%;">密碼:</h1>
                        <input type="password" id="password2" placeholder="請輸入密碼 (至少6碼)" minlength="6" >
                        <!--password2 註冊介面的密碼-->
                        <h1 style="position: relative; margin-left:5%; margin-top: 12%;">確認密碼:</h1>
                        <!--password3 註冊介面的確認密碼-->
                        <input type="password" id="password3" placeholder="請再輸入一次密碼">
                        <input type="button" id="comfirm" value="確認註冊" onclick="check_create()">
                        <!--確認註冊按鈕-->
                        <input type="button" id="haveaccount" value="已有帳號" onclick="signin()">
                        <!--已有帳號按鈕-->
                    </div>
                </div>
            </div>
            
            <div id="night" class="night">
                <!--星星背景圖片-->
                <img src="image/background/night.jpg" class="backgroundImg">
                <div>
                    <!--台灣圖片-->
                    <img src="image/taiwan/taiwan.png" class="taiwan" id="taiwan">
                </div>
                <!--地名(景點)選單-->
                <div class="option">
                    <!--北部(黃色區塊)-->
                    <div class="northArea">
                        <!--行政區名稱-->
                        <!--script>
                            var n0 = document.getElementById('0');
                            var n1 = document.getElementById('1');
                            n0.addEventListener("click",function(){
                                document.getElementById("night").style.display = "none";
                                document.getElementById("intro").style.display = "";
                                console.log('hi');
                                <?php  #$now = $regions[0] ;echo $now ?>
                            });
                            n1.addEventListener("click",function(){
                                document.getElementById("night").style.display = "none";
                                document.getElementById("intro").style.display = "";
                                console.log('hi');
                                <?php # $now = $regions[1] ?>
                            });

                        </script-->
                        <nav id="基隆市" onmouseover="deepTaiwan(基隆市)" onmouseout="normalTaiwan()">基隆市
                            <ul>
                                <!--該行政區的景點選項--><!---->
                                <div onclick="intro()">

                                    <?php

                                    $sql = 'SELECT `Attraction` FROM `Sightseeing` natural join `Township` WHERE `District`="基隆" ';
                                    $result = mysqli_query($link, $sql) or die("fail sent");
                                    $k = 0;
                                    while ($con = mysqli_fetch_assoc($result)) {
                                        $N = "";
                                        $b = $con['Attraction'];
                                        $N .=  '<li><a href="#">' . $b . '</a></li>';
                                        echo $N;
                                    }
                                    ?>

                                    <!--li><a href="#">漁港</a></li>
                                </div>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                        <nav id="新北市" onmouseover="deepTaiwan(新北市)" onmouseout="normalTaiwan()">新北市
                            <ul>
                                    <div onclick="intro()">
                                    <?php
                                    $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="新北" ';
                                    $result = mysqli_query($link, $sql) or die("fail sent");
                                    while ($con = mysqli_fetch_assoc($result)) {
                                        $N = "";
                                        $b = $con['Attraction'];
                                        $N .=  '<li><a href="#">' . $b . '</a></li>';
                                        echo $N;
                                    }
                                    ?>
                                    <!--<li><a href="">漁港</a></li>
                                    <li><a href="">基隆廟口夜市</a></li>
                                    <li><a href="">忘憂谷</a></li>-->
                            
                                    </div>
                                </ul>
                        </nav>
                        <nav id="台北市" onmouseover="deepTaiwan(台北市)" onmouseout="normalTaiwan()">台北市
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="台北" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#" >' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                        <!--nav id="桃園市" onmouseover="deepTaiwan(桃園市)" onmouseout="normalTaiwan()">桃園市
                            <ul>
                                
                                <li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li>
                            </ul>
                        </nav-->
                        <!--nav id="新竹縣" onmouseover="deepTaiwan(新竹縣)" onmouseout="normalTaiwan()">新竹縣
                            <ul>
                                
                                <li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li>
                            </ul>
                        </nav-->
                        <nav id="宜蘭縣" onmouseover="deepTaiwan(宜蘭縣)" onmouseout="normalTaiwan()">宜蘭縣
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="宜蘭" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                    </div>

                    <!--中部(綠色區塊)-->
                    <div class="midArea">
                        <!--nav id="苗栗縣" onmouseover="deepTaiwan(苗栗縣)" onmouseout="normalTaiwan()">苗栗縣
                            <ul>
                                
                                <li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li>
                            </ul>
                        </nav-->
                        <nav id="台中市" onmouseover="deepTaiwan(台中市)" onmouseout="normalTaiwan()">台中市
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="台中" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                        <nav id="彰化縣" onmouseover="deepTaiwan(彰化縣)" onmouseout="normalTaiwan()">彰化縣
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="彰化" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                        <!--nav id="雲林縣" onmouseover="deepTaiwan(雲林縣)" onmouseout="normalTaiwan()">雲林縣
                            <ul>
                                
                                <li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li>
                            </ul>
                        </nav-->
                        <nav id="南投縣" onmouseover="deepTaiwan(南投縣)" onmouseout="normalTaiwan()">南投縣
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="南投" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                        <nav id="花蓮縣" onmouseover="deepTaiwan(花蓮縣)" onmouseout="normalTaiwan()">花蓮縣
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="花蓮" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>

                    </div>

                    <!--南部(橘色區塊)-->
                    <div class="southArea">
                        <!--nav id="嘉義縣" onmouseover="deepTaiwan(嘉義縣)" onmouseout="normalTaiwan()">嘉義縣
                            <ul>
                                <li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li>
                            </ul>
                        </nav>
                        <nav id="嘉義市" onmouseover="deepTaiwan(嘉義市)" onmouseout="normalTaiwan()">嘉義市
                            <ul>
                                <li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li>
                            </ul>
                        </nav-->
                        <nav id="台南市" onmouseover="deepTaiwan(台南市)" onmouseout="normalTaiwan()">台南市
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="台南" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                            </div>
                            </ul>
                        </nav>
                        <nav id="高雄市" onmouseover="deepTaiwan(高雄市)" onmouseout="normalTaiwan()">高雄市
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="高雄" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                        <nav id="屏東縣" onmouseover="deepTaiwan(屏東縣)" onmouseout="normalTaiwan()">屏東縣
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="屏東" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                        <nav id="台東縣" onmouseover="deepTaiwan(台東縣)" onmouseout="normalTaiwan()">台東縣
                            <ul>
                            <div onclick="intro()">
                                <?php
                                $sql = 'SELECT Attraction FROM Sightseeing natural join Township WHERE `District`="台東" ';
                                $result = mysqli_query($link, $sql) or die("fail sent");
                                while ($con = mysqli_fetch_assoc($result)) {
                                    $N = "";
                                    $b = $con['Attraction'];
                                    $N .=  '<li><a href="#">' . $b . '</a></li>';
                                    echo $N;
                                }
                                ?>
                                <!--li><a href="">漁港</a></li>
                                <li><a href="">基隆廟口夜市</a></li>
                                <li><a href="">忘憂谷</a></li-->
                                </div>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

            <?php echo '
            <div class="intro" id="intro">
                <div class="Question_title">
                    <!--顯示第幾天[Userchoice(Day)]-->
                    <p id="Day">DAY1</p>    
                    <!--顯示景點名稱[Sightseeing(Attaction)]-->';
                    for($i=0;$i<=$k;$i++){
                        $con = mysqli_fetch_assoc($result);
                    }
                    $k++;

                    $sql = "SELECT * FROM Item natural join Sightseeing natural join Puzzle ";
                    $result = mysqli_query($link, $sql) or die("fail sent");
                   
                    
                    $con = mysqli_fetch_assoc($result);

                        $N = "";
                        $b = $con['Attraction'];
                        $N .=  '<p id="Attraction"> '. $b . '</p>';

                        echo $N;
                    

                    
                    
                    
                    #<!--p id="Attraction">和平島公園</p-->
                    echo '
                </div>

                <div class="pic_background"></div>
                <!--顯示背景圖片 [Sightseeing(Picture)]-->
                <img src="image/和平島公園.jpg" class="backgroundImg">';
                

                 
                echo '<div class="intro_pic" id="intro_pic" onclick="Question()">
                    <!--顯示介紹圖片 [Sightseeing(Picture)]-->
                    <img id="intro_pic" src="image/和平島公園.jpg">
                    <div class="word">
                        <p id="intro_word_title">景點介紹:</p>
                        <!--顯示景點介紹[Sightseeing(Description)]-->';
                            
                           
                            
                           # $con = mysqli_fetch_assoc($result);
                            
                            $N = "";
                            $b = $con['Description'];
                            $N .=  '<p id="intro_word"> '. $b . '</p>';

                            echo $N;
                        

                        
                        #<!--p id="intro_word">和平島公園非常漂亮!!!!</p-->
                        echo' 
                        <p></br></p>
                        <p id="intro_word_title">景點地址:</p>';

                            $N = "";
                            $b = $con['Address'];
                            $N .=  '<p id="intro_word"> '. $b . '</p>';

                            echo $N;
                        

                        echo '
                        <!--p id="intro_word">基隆市XXXXXXXXX</p-->
                    </div>
                </div>
            
            </div>'; 
            
            echo '
            <div class="question" id="question">
                <div class="Question_title">
                    <!--顯示第幾天[Userchoice(Day)]-->
                    <p id="Day">DAY1</p>
                    <!--顯示景點名稱[Sightseeing(Attaction)]-->';
                    
                    #$con = mysqli_fetch_assoc($result);
                    $N = "";
                    $b = $con['Attaction'];
                    $N .=  '<p id="Attaction"> '. $b . '</p>';

                    echo $N;

                    #<!--p id="Attraction">和平島公園</p-->
                    echo '
                </div>

                <div class="pic_background"></div>
                <!--顯示背景圖片 [Sightseeing(Picture)]-->
                <img src="image/和平島公園.jpg" class="backgroundImg">

                <div class="Question_G">';
                    #<p id="Question">Q:請問和平島在哪裡?</p>
                    #$con = mysqli_fetch_assoc($result);

                    $N = "";
                    $b = $con['Question'];
                    $N .=  '<p id="Question"> '. $b . '</p>';

                    echo $N; 
                    #<!--顯示3個答案[Puzzle(Option_1,Option2,Option3)]-->
                    #<!--判斷 [Puzzle(Answer)] 哪一個是正解(假設A1為正解)-->
                    echo '<div class="Ans_button1" onclick="success()">
                        <p id="Answer">A1:'.$con['Option_1'].'</p>
                    </div>
                    <div class="Ans_button2" onclick="fail()">
                        <p id="Answer">A2:'.$con['Option_2'].'</p>
                    </div>
                    <div class="Ans_button3" onclick="fail()">
                        <p id="Answer">A3:'.$con['Option_3'].'</p>
                    </div>
                </div>
            </div>';
            echo '
            <div class="success" id="success">
                <div class="Question_title">
                    <!--顯示第幾天[Userchoice(Day)]-->
                    <p id="Day">DAY1</p>
                    <!--顯示景點名稱[Sightseeing(Attaction)]-->
                    <p id="Attraction">'.$con['Attraction'].'</p>
                </div>
                <div class="pic_background" onclick="check_account()"></div>
                <!--顯示背景圖片 [Sightseeing(Picture)]-->
                <img src="image/和平島公園.jpg" class="backgroundImg">

                <div class="get_G" onclick="check_account()">
                    <strong>
                        <p id="item_alert">恭喜你獲得道具</p>
                    </strong>

                    <!--顯示獲得的道具[Item(Item_name)]-->
                    <strong>';
                     
                        $sql = "SELECT * FROM Item natural join Sightseeing natural join Puzzle" ;
                        $result = mysqli_query($link, $sql) or die("fail sent");
                        $con = mysqli_fetch_assoc($result);
                        echo '
                        <p id="get_item">『'.$con['Item_name'].'』</p>';

                        echo '
                    </strong>

                    <strong>
                        <p id="item_alert">已放入您的背包!!!</p>
                    </strong>
                </div>
            </div>

            <div class="fail" id="fail">
                <div class="Question_title">
                    <!--顯示第幾天[Userchoice(Day)]-->
                    <p id="Day">DAY1</p>
                    <!--顯示景點名稱[Sightseeing(Attaction)]-->
                    <p id="Attraction">'.$con['Attraction'].'</p>
                </div>
                <div class="pic_background" onclick="night()"></div>
                <!--顯示背景圖片 [Sightseeing(Picture)]-->
                <img src="image/和平島公園.jpg" class="backgroundImg">

                <div class="fail_G" onclick="night()">
                    <strong>
                        <p id="item_alert">挑戰失敗!!!!</p>
                    </strong>
                    <strong>
                        <p id="item_alert">請重新選取你要的地區</p>
                    </strong>
                </div>
            </div>'?>

            <div id="morning" class="morning">
                <!--白天(小朋友在哭)背景圖片-->
                <img src="image/background/morning.jpg" class="backgroundImg">
                <div>
                    <!--要放記憶碎片的文字框-->
                    <?php
                    $sql = "SELECT * FROM Item natural join Sightseeing natural join Puzzle ";
                    $result = mysqli_query($link, $sql) or die("fail sent");
                    $con = mysqli_fetch_assoc($result);

                    echo '
                    <input type="textarea" readonly="readonly" value="'.$con['Memory'].'" class="textarea" onclick="night()">';
                    ?>
                </div>
            </div>

        </div>
    </body>

</html>