<?php
    $password=@$_POST['inputpassword'];

   
    if($password!="123456")
    {
    echo "<script>window.alert('密碼錯誤/未輸入密碼');location.href='go_admin.html';</script>";
    
    }
?>



<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
    <title>admin</title>
    
</head>
<body>
    
    <p>“ADD” 為避免系統出錯，如要新增請將要新增內容的資訊全部填滿！否則會無法新增</p>
    <form action='admin_interface.php' method='post'>
        <p>新增道具</p>
        <input type='text' name='item' placeholder='道具名稱' >
        <input type='text' name='memory' placeholder='記憶片段內容'>
        <input type='text' name='attractionitem' placeholder='景點名稱'>
        <p>新增縣市</p>
        <input type='text' name='Position' placeholder='方位'>
        <input type='text' name='District' placeholder='縣市'>
        <p>新增景點</p>
        <input type='text' name='Postal' placeholder='郵遞區號'>
        <input type='text' name='Attraction' placeholder='景點'>
        <input type='text' name='Description' placeholder='景點描述'>
        <input type='text' name='Address' placeholder='地址'>
        <p>新增地區</p>
        <input type='text' name='District_attraction' placeholder='縣市'>
        <input type='text' name='Town' placeholder='地區'>
        <input type='text' name='Postal_attraction' placeholder='郵遞區號'>
        <p>新增謎題</p>
        <input type='text' name='Attraction_Puzzle' placeholder='景點'>
        <input type='text' name='Question' placeholder='謎題'>
        <input type='text' name='Option_1' placeholder='選項一'>
        <input type='text' name='Option_2' placeholder='選項二'>
        <input type='text' name='Option_3' placeholder='選項三'>
        <input type='text' name='Answer' placeholder='正解（請輸入1,2,3)'>
        <p>"Delete"</p>
        <p>刪除謎題（請輸入欲刪除的謎題所在的景點）</p>
        <input type='text' name='delete_puzzle' placeholder='景點名稱'>
        <p>刪除道具</p>
        <input type='text' name='delete_item' placeholder='刪除道具名稱'>
        <p>Search (請輸入“謎題”，“道具”，“景點”，“縣市”，“鄉鎮市區”）</p>
        <input type='text' name='Search' placeholder='請輸入要搜尋的表格！'>
        <p>請在輸入一次密碼確認進行的搜尋或修改</p>
        <input type='password' name='inputpassword' placeholder='請輸入密碼'>
        <input type='submit' value='確定修改/搜尋'>


    </form> 
    
<?php 
        $server = "database-1.c2ccpjw7s7h5.us-east-1.rds.amazonaws.com";         # MySQL/MariaDB 伺服器
        $dbuser = "admin";       # 使用者帳號
        $dbpassword = "whysoserious"; # 使用者密碼
        $dbname = "tsst";    # 資料庫名稱
        header("Content-Type:text/html; charset=utf-8");

    
        $link = mysqli_connect( $server , $dbuser , $dbpassword);
        mysqli_query($link , "SET NAMES 'UTF8'");
        mysqli_select_db($link ,$dbname) or die("fail");
        mysqli_options($link,MYSQLI_OPT_INT_AND_FLOAT_NATIVE,true);
        $item_name=@$_POST['item'];
        $Memory=@$_POST['memory'];
        $Attraction_item=@$_POST['attractionitem'];
        $Position=@$_POST['Position'];
        $District=@$_POST['District'];
        $Postal=@$_POST['Postal'];
        $Attraction=@$_POST['Attraction'];
        $Description=@$_POST['Description'];
        $Address=@$_POST['Address'];
        $District_attraction=@$_POST['District_attraction'];
        $Town=@$_POST['Town'];
        $Postal_attraction=@$_POST['Postal_attraction'];
        $Attraction_Puzzle=@$_POST['Attraction_Puzzle'];
        $Question=@$_POST['Question'];
        $Option_1=@$_POST['Option_1'];
        $Option_2=@$_POST['Option_2'];
        $Option_3=@$_POST['Option_3'];
        $Answer=@$_POST['Answer'];
        $delete_puzzle=@$_POST['delete_puzzle'];
        $delete_item=@$_POST['delete_item'];
        $Search=@$_POST['Search'];



        if($item_name!=NULL&&$Memory!=NULL&&$Attraction_item!=NULL)//新增道具
        {
            $sql_item = "INSERT INTO Item 
            (Item_name,Memory,Attraction) 
            VALUES ('$item_name','$Memory','$Attraction_item')";

            mysqli_select_db( $link, $dbname );
            $retval_item = mysqli_query( $link, $sql_item );
            if(! $retval_item )
            {
            die('無法新增道具: ' . mysqli_error($link));
            }
            echo "道具新增成功 新增道具".$item_name;
        }

        if($Position!=NULL&&$District!=NULL)//新增縣市
        {
            $sql_District = "INSERT INTO Administration 
            (Position,District) 
            VALUES ('$Position','$District')";

            mysqli_select_db( $link, 'Administration' );
            $retval_Administration = mysqli_query( $link, $sql_District );
            if(! $retval_Administration )
            {
            die('無法新增縣市: ' . mysqli_error($link));
            }
            echo "縣市新增成功 新增縣市".$District ;
        }


        if($Postal!=NULL&&$Attraction!=NULL&&$Description!=NULL&&$Address!=NULL)//新增景點
        {
            $sql_Sightseeing = "INSERT INTO Sightseeing
            (Postal,Attraction,Description,Address) 
            VALUES ('$Postal','$Attraction','$Description','$Address')";

            mysqli_select_db( $link, 'Sightseeing' );
            $retval_Sightseeing = mysqli_query( $link, $sql_Sightseeing );
            if(! $retval_Sightseeing )
            {
            die('無法新增景點: ' . mysqli_error($link));
            }
            echo "景點新增成功 新增景點".$Attraction;
        }


        if($Town!=NULL&&$Postal_attraction!=NULL&&$District_attraction!=NULL)//新增地區
        {
            $sql_Township = "INSERT INTO Township 
            (District,Town,Postal) 
            VALUES ('$District_attraction','$Town','$Postal_attraction')";

            mysqli_select_db( $link, 'Township' );
            $retval_Township = mysqli_query( $link, $sql_Township );
            if(! $retval_Township )
            {
            die('無法新增地區: ' . mysqli_error($link));
            }
            echo "地區新增成功 新增地區".$Town;
        }

        if($Attraction_Puzzle!=NULL&&$Question!=NULL&&$Option_1!=NULL&&$Option_2!=NULL&&$Option_3!=NULL&&$Answer!=NULL)//新增謎題
        {
           
            mysqli_select_db( $link, 'Puzzle' );
            $get_id="SELECT MAX(Q_id) from Puzzle";
            $Q_id=mysqli_query($link,$get_id);
            
          
            $sql = "SELECT MAX(Q_id) AS NEXT_Q_id FROM Puzzle";
            $result = mysqli_query($link, $sql);
            $row = mysqli_fetch_object($result) ;
            $num=$row->NEXT_Q_id+1;

        

            $sql_Puzzle = "INSERT INTO Puzzle 
            (Q_id,Attraction,Question,Option_1,Option_2,Option_3,Answer) 
            VALUES ('$num','$Attraction_Puzzle','$Question','$Option_1','$Option_2','$Option_3','$Answer')";

           
            $retval_Puzzle = mysqli_query( $link, $sql_Puzzle );
            if(! $retval_Puzzle )
            {
            die('無法新增題目: ' . mysqli_error($link));
            }
            echo "題目新增成功 新增題目".$Question;
        }
        if($delete_puzzle!=NULL)
        {
            mysqli_select_db($link,'Puzzle');
            $sql_delete_puzzle="DELETE FROM `Puzzle` WHERE Attraction = '$delete_puzzle' ";
           
           
            $retval_delete_puzzle = mysqli_query( $link, $sql_delete_puzzle );
            if(! $retval_delete_puzzle )
                {
                die('無法刪除題目: ' . mysqli_error($link));
                }
                echo "刪除 $delete_puzzle 的題目成功 ";

             

        }
        if($delete_item!=NULL)
        {
            mysqli_select_db($link,'Item');
            $sql_delete_item="DELETE FROM `Item` WHERE Item_name = '$delete_item' ";
           
           
            $retval_delete_item = mysqli_query( $link, $sql_delete_item );
            if(! $retval_delete_item )
                {
                die('無法刪除道具: ' . mysqli_error($link));
                }
                echo "刪除道具 $delete_item  ";

             

        }

        if($Search=='道具')
        {
            echo "<table border='1'>";
            echo"<tr><td>Item_name</td><td>Memory</td><td>Attraction</td></tr>";
            $sql="SELECT * FROM Item";
            $result = mysqli_query($link , $sql) or die("fail sent" );
            while($con = mysqli_fetch_assoc($result))
            {
                $A=$con['Item_name'];
                $B=$con['Memory'];
                $C=$con['Attraction'];
                echo "<tr><td>".$A."</td><td>".$B."</td><td>".$C."</td></tr>";
                
            }
            echo "</table>";
        }
        if($Search=='縣市')
        {
            echo "<table border='1'>";
            echo"<tr><td>Position</td><td>District</td></tr>";
            $sql="SELECT * FROM Administration";
            $result = mysqli_query($link , $sql) or die("fail sent" );
            while($con = mysqli_fetch_assoc($result))
            {
                $A=$con['Position'];
                $B=$con['District'];
                echo "<tr><td>".$A."</td><td>".$B."</td></tr>";
                
            }
            echo "</table>";
        }
        if($Search=='謎題')
        {
            echo "<table border='1'>";
            echo"<tr><td>Attraction</td><td>Question</td><td>Option_1</td><td>Option_2</td><td>Option_3</td><td>Answer</td></tr>";
            $sql="SELECT * FROM Puzzle";
            $result = mysqli_query($link , $sql) or die("fail sent" );
            while($con = mysqli_fetch_assoc($result))
            {
                $A=$con['Attraction'];
                $B=$con['Question'];
                $C=$con['Option_1'];
                $D=$con['Option_2'];
                $E=$con['Option_3'];
                $F=$con['Answer'];

                echo "<tr><td>".$A."</td><td>".$B."</td><td>".$C."</td><td>".$D."</td><td>".$E."</td><td>".$F."</td></tr>";
                
            }
            echo "</table>";
        }
        if($Search=='景點')
        {
            echo "<table border='1'>";
            echo"<tr><td>Postal</td><td>Attraction</td><td>Description</td><td>Address</td></tr>";
            $sql="SELECT * FROM Sightseeing";
            $result = mysqli_query($link , $sql) or die("fail sent" );
            while($con = mysqli_fetch_assoc($result))
            {
                $A=$con['Postal'];
                $B=$con['Attraction'];
                $C=$con['Description'];
                $D=$con['Address'];
                echo "<tr><td>".$A."</td><td>".$B."</td><td>".$C."</td><td>".$D."</td></tr>";
                
            }
            echo "</table>";
        }
        if($Search=='鄉鎮市區')
        {
            echo "<table border='1'>";
            echo"<tr><td>District</td><td>Town</td><td>Postal</td></tr>";
            $sql="SELECT * FROM Township";
            $result = mysqli_query($link , $sql) or die("fail sent" );
            while($con = mysqli_fetch_assoc($result))
            {
                $A=$con['District'];
                $B=$con['Town'];
                $C=$con['Postal'];
                echo "<tr><td>".$A."</td><td>".$B."</td><td>".$C."</td></tr>";
                
            }
            echo "</table>";
        }
        mysqli_close($link);
    ?>
   
</body>
</html>
