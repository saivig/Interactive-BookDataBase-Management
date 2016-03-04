<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    

    <title>BR Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/login.css" rel="stylesheet">

   
  </head>

  <body>

    <div class="container">
        <h style="font-size:45px" style="color: #31b0d5">
            Book Review Management System
                    
        </h>
      <form class="form-signin" role="form" method ="get" action="logindo.php">
        <h2 class="form-signin-heading">Let's Enter!</h2>
        <input name="userid" type="text" class="form-control" placeholder="UserId" required autofocus>
        <input name="passw" type="password" class="form-control" placeholder="Password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="submit" style="background-color: #555 ">Sign in</button>
        <li> <a href="http://localhost/Dbproject/Signup.php" style="font-size: larger">Sign Up</a></li> 
      </form>
        
            
            
    </div> 
  </body>
</html>

