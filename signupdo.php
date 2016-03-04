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
   $s1=$_GET["username"];
   $s2=$_GET["Name"];
   $s3=$_GET["passw1"];
   $s4=$_GET["dateofbirth"];
   $s5=$_GET["location"];
 
//   $sai3=$_GET["sup"];
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db){
      echo "Error : Unable to open database\n";
   }
 $sdatebirth='2012-8-10';
  $Dnow=new DateTime();
  $Dbirth=new DateTime($s4);
  $dateintvl=$Dnow->diff($Dbirth);
  echo $dateintvl->y;
  echo $s4->z;
   function redirect($url, $statusCode = 303)
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }
   $sql ="select count(*) from (select * from Us where UId='$s1' and pswd='$s3' ) as foo;";
   $sql1 = "insert into Us (UId,UName,addrs,age,pswd,date) values ('$s1','$s2','$s5',19,'$s3','1994-19-08');";
   $ret = pg_query($db, $sql1);
   if(!$ret){
      echo pg_last_error($db);
   } 
   
   redirect('http://localhost/Dbproject/login.php',303);
//    if ($sai3){
//   
//    }
    pg_close($db);
?>
        <a href=""
    </body>
</html>
