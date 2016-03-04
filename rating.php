<?php

session_start();
   $_SESSION['userid'] = $sai1 ;
   
   $rat=$_GET['ratng'];
   
   $db = pg_connect("host=localhost dbname=Project user=postgres password=saivignan")
                                         or die('Could not connect: ' . pg_last_error());
                        if(!$db){
                           echo "Error : Unable to open database\n";
                        } 
                        
                        $sql6="insert into rat(uid,isbn,rats,tstamp) values ('','','',);";

?>
