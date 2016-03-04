
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Book-Profile</title>

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
        <h3 class="text-muted"> Book Profile </h3>
      </div>

      <div class="jumbotron">
        <?php
        $dbconn = pg_connect("host=localhost dbname=Project user=postgres password=saivignan")
                    or die('Could not connect: ' . pg_last_error());
//        $sai=$_GET["user_id2"];
                     
            session_start();
            $s1=$_SESSION['userid'];
       $bookisbn=$_GET['ISBN'];
            file_put_contents("error", $s1) ;
        $query1="SELECT * FROM books2 WHERE isbn='$bookisbn';";
        $query2="SELECT * FROM bna WHERE isbn='$bookisbn';";
        $query3="SELECT * FROM pubh WHERE isbn='$bookisbn';";
        $query4="SELECT * FROM (select isbn,avg(rats) from rat group by rat.isbn)as avrat WHERE avrat.isbn='$bookisbn' ;";
        $result1 = pg_query($dbconn,$query1);
        $us1=  pg_fetch_row($result1);
        $result2 = pg_query($dbconn,$query2);
        $us2=  pg_fetch_row($result2);
        $result3 = pg_query($dbconn,$query3);
        $us3=  pg_fetch_row($result3);
         $result4 = pg_query($dbconn,$query4);
        $us4=  pg_fetch_row($result4);
        echo $us2[0] ;
        ?>
          <h1><?php echo $us1[1]; ?></h1>
          <p class="lead">ISBN:   <?php echo $bookisbn ; ?> </p>
          <p class="lead">Title:   <?php  echo $us1[1] ; ?> </p>
          <p class="lead">Author:   <?php   
             echo '<a href="authorprofile.php?author_id='.$us2[0].'" >';
             echo ''.$us2[1].'';
            echo '</a>';
          ?> </p>
          <p class="lead">Year:   <?php echo $us1[2] ; ?> </p>
          <p class="lead">Image Url:   <?php echo $us1[4] ; ?> </p>
          <p class="lead">Genre:   <?php echo $us1[6] ; ?> </p>
          <p class="lead">Publishing house:   <?php echo $us3[1] ; ?> </p>
          <p class="lead">rating:   <?php echo $us4[1] ; ?> </p>
          <p class="lead">Give Rating 
              <form action="rating.php">
<select name="ratng" >
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  
</select>
<input type="submit" value="Submit">
</form>
          
          </p>
          
      </div>

      
      <div class="footer">
        <p>&copy; Satpura Batch 2012</p>
      </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
