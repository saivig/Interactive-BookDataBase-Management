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
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    


  </head>
  <body link="green">
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
  <div class="jumbotron">
      <div class="page-header">
        <h1>Details:</h1>
   </div>
     <?php
      $phus=$_GET['p_id'];
      
      
      echo '<h2>'.$phus.'</h2>';
      ?>
   </div>
  <div class="page-header">
        <h1>Other books of Publication House</h1>
   </div>
         
        <div class="col-sm-4">
            <div class="list-group" id="sai">
              <?php
              
              $db = pg_connect("host=localhost dbname=Project user=postgres password=saivignan")
                                         or die('Could not connect: ' . pg_last_error());
                        if(!$db){
                           echo "Error : Unable to open database\n";
                        } 

                        $sql ="select books2.isbn,books2.title from books2,pubh where (pubh.phus='$phus' and books2.isbn=pubh.isbn) ;";


                        $ret2 = pg_query($db, $sql);
                        if(!$ret2){
                           echo pg_last_error($db);
                           exit;
                        } 
              while($row = pg_fetch_row($ret2)){
                  
                  echo '<a href="bookprofile.php?ISBN='.$row[0].'" class="list-group-item active" "font-color:green">';
             echo ''.$row[1].'';
            echo '</a>';
              }
              
              
              ?>
            
            
          </div>
        </div>
         </body>
         <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>