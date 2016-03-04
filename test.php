<?php

 $sdatebirth='2005-8-10';
  $Dnow=new DateTime();
  $Dbirth=new DateTime($sdatebirth);
  $dateintvl=$Dnow->diff($Dbirth);
  echo $dateintvl->y;
   
?>
