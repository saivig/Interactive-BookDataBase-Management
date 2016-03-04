<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Search-BLRS</title>
    </head>
    <body>
<?php
   $host        = "host=127.0.0.1";
   $port        = "port=5432";
   $dbname      = "dbname=Project";
   $credentials = "user=postgres password=saivignan";
   $s1=$_GET["userid"];
   $s2=$_GET["searchtext"];
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
   $sql ="select title from papers2  where papers2.title::text ilike '%query optimization%'";

   $ret = pg_query($db, $sql);
   if(!$ret){
      echo pg_last_error($db);
   } 
   $row = pg_fetch_row($ret);
   if ($row[0]>=1){
       redirect('http://localhost/Dbproject/searchresults.php',303);
   }
 else {
       echo "No Reults go back to search";
       
      }
//    if ($sai3){
//   redirect('http://localhost/Dbproject/Signup.php',303);
//    }
    pg_close($db);
?>
    </body>
</html>
