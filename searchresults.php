<?php 
ini_set('max_execution_time',45);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>BLRS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <link href="css/search.css" rel="stylesheet">


  </head>

  <body>
      
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">BLRS</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/Dbproject/home1.php">Home</a></li>
            <li><a href="http://localhost/Dbproject/about.php">About</a></li>
            <li><a href="http://localhost/Dbproject/contact.php">Contact Us</a></li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
<!--            <li><a href="../navbar/">Default</a></li>
            <li><a href="../navbar-static-top/">Static top</a></li>-->
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Options <b class="caret"></b></a>
              <ul class="dropdown-menu">
      
                  <li><a href="profile.php">Profile</a></li>
                  
                
                <li class="divider"></li>
                <li class="dropdown-header"></li>
                <li><a href="login.php">Log Out</a></li>
                
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <div>
           <form action="searchresults.php">
               <div class="row" style="margin-left:450px"  >
                    <div class="col-lg-3">
                        <div class="input-group custom-search-form" style="">
                            <input name="searchtext" type="search" class="form-control" placeholder="Search" autofocus style="-moz-box-sizing: content-box" style="height: 50px">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="submit" style="background-color: #47a447 ">
                              <span class="glyphicon glyphicon-search"></span>
                              </button>
                            </span>
                        </div>
                    </div >
                </div> <!-- /container -->
            </form> 
        
    </div>



    
   <div class="row" align="center">
        <div class="col-lg-4">
          <h2>Most Rated Books!</h2>
                      <?php
   

                        $db = pg_connect("host=localhost dbname=Project user=postgres password=saivignan")
                                         or die('Could not connect: ' . pg_last_error());
                        if(!$db){
                           echo "Error : Unable to open database\n";
                        } 

                        $search=$_GET["searchtext"];
                        $sq1="select books2.isbn,books2.title from books2 where books2.title::text  ilike '%$search%';";

                        $ret = pg_query($db, $sq1);
                        if(!$ret){
                           echo pg_last_error($db);
                           exit;
                        } 
                        
                        echo '<table border = "1">';
                       echo '<tr>' ;
                            echo '<td> <b> ISBN </b> </td>' ;
                            echo '<td> <b> Title </b> </td>' ;
                        echo '</tr>' ;
                        while($row = pg_fetch_row($ret)){
                            echo '<tr>' ;
                            echo '<td>' ;
                            $url = '<a href = "bookprofile.php?ISBN='.$row[0].'">' ;
                          echo $url ;
                          echo $row[0];
                          echo "</a>" ;
                          echo '</td>' ;
                          echo '<td>' ;
                          echo $url ;
                            echo $row[1];
                            echo "</a>" ;
                            echo '</td>' ;
                            echo '</tr>';
                        }
                        echo '</table>' ;
   
                    ?>
          
          
   </div>
     <div class="col-lg-4">
        <h2>Most popular authors</h2>
                    <?php
                     
                       $sq2="select authorid,authorname from bna where bna.authorname::text ilike '%$search%'" ;

                       $ret1 = pg_query($db, $sq2);
                       if(!$ret1){
                             echo pg_last_error($db);
                             exit;
                       } 
                           echo '<table border = "1">';
                       echo '<tr>' ;
                            echo '<td> <b> AutorId </b> </td>' ;
                            echo '<td> <b> Name </b> </td>' ;
                        echo '</tr>' ;
                        while($row = pg_fetch_row($ret1)){
                            echo '<tr>' ;
                            echo '<td>' ;
                            $url = '<a href = "authorprofile.php?author_id='.$row[0].'&author_name='.$row[1].'">' ;
                          echo $url ;
                          echo $row[0];
                          echo "</a>" ;
                          echo '</td>' ;
                          echo '<td>' ;
                          echo $url ;
                            echo $row[1];
                            echo "</a>" ;
                            echo '</td>' ;
                            echo '</tr>';
                        }
                        echo '</table>' ;


                   ?>
        
       </div>
              <div class="col-lg-4">
                  <h2>Most popular publishing house</h2>
                    <?php
                       
                       $sq3="select phus from pubh where pubh.phus::text ilike '%$search%';" ;

                       $ret3 = pg_query($db, $sq3);
                       if(!$ret3){
                             echo pg_last_error($db);
                             exit;}
                             while($row = pg_fetch_row($ret3)){
                                 
                                 echo '<a href = "pubprofile.php?p_id='.$row[0].'">' ;
                                 echo ''.$row[0].'';
                                 echo '</br>';
                             }
                             
                        


pg_close($db);
                   ?>
        
     
          

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>

 
            
            
   