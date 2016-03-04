
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Narrow Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="home1.php">Home</a></li>
          <li class="active"><a href="about.php">About</a></li>
          <li class="active"><a href="contact.php">Contact</a></li>
        </ul>
        <h3 class="text-muted"> User Profile </h3>
      </div>

      <div class="jumbotron">
        <?php
        $dbconn = pg_connect("host=localhost dbname=Project user=postgres password=saivignan")
                    or die('Could not connect: ' . pg_last_error());
//        $sai=$_GET["user_id2"];
                     
            session_start();
            $s1=$_SESSION['userid'];
       
            file_put_contents("error", $s1) ;
        $query1="SELECT * FROM Us WHERE uid='$s1';";
        
               
        $result = pg_query($dbconn,$query1);  
        $us=  pg_fetch_row($result);
      
        ?>
          <h1><?php echo $us[1]; ?></h1>
          <p class="lead">User Id:   <?php echo $us[0] ; ?> </p>
          <p class="lead">User Name:   <?php  echo $us[1] ; ?> </p>
          <p class="lead">Address:   <?php echo $us[2] ; ?> </p>
          <p class="lead">Age:   <?php echo $us[3] ; ?> </p>
          <p class="lead">Date of Birth:   <?php echo $us[5] ; ?> </p>
          
      </div>
  <div class="page-header">
        <h1>Other Books Rated by User</h1>
   </div>
         
        <div class="col-sm-4">
            <div class="list-group" id="sai">
              <?php
              
              $db = pg_connect("host=localhost dbname=Project user=postgres password=saivignan")
                                         or die('Could not connect: ' . pg_last_error());
                        if(!$db){
                           echo "Error : Unable to open database\n";
                        } 

                       $query2="select isbn from rat where uid='$s1'";


                        $ret2 = pg_query($db, $query2);
                        if(!$ret2){
                           echo pg_last_error($db);
                           exit;
                        } 
              while($row = pg_fetch_row($ret2)){
                  
                  echo '<a href="bookprofile.php?ISBN='.$row[0].'" class="list-group-item active" "font-color:green">';
             echo ''.$row[0].'';
            echo '</a>';
              }
              
              
              ?>
            
            
          </div>
        </div>
      
      <div class="footer">
        <p>&copy; Satpura nh Batch 2012</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
