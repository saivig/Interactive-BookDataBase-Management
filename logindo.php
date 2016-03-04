<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=Project";
   $credentials = "user=postgres password=saivignan";
   $sai1=$_GET["userid"];
   session_start();
   $_SESSION['userid'] = $sai1 ;
   
   $sai2=$_GET["passw"];
//   $sai3=$_GET["sup"];
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   }
function redirect($url, $statusCode = 303)
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }
   $sql ="select count(*) from (select * from Us where UId='$sai1' and pswd='$sai2' ) as foo;";

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } 
   $row = pg_fetch_row($ret);
   if ($row[0]==1){
       redirect('http://localhost/Dbproject/home1.php?user_id='.$sai1,303);
   }
 else {
       echo "Either Username or Password are incorrect or  not an user so Please sign up";
       
      }
//    if ($sai3){
//   redirect('http://localhost/Dbproject/Signup.php',303);
//    }
    pg_close($db);
?>
    </body>
</html>
