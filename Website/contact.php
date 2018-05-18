<?php
session_start();
?>

<?php
   if (isset($_POST['submit'])) {
     require($_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoLoad.php');
   
    $comments = $_POST['comments'];

    $mail = new PHPMailer();#create a new instance
    $mail->isSMTP();#using SMTP
    $mail->isHtml(true);
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPDebug = 2; #include client and server messages
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = "axel.satariano.a100230@mcast.edu.mt";
    $mail->Password = "mcast72396";
    $mail->Body = $comments;
    $mail->Subject = "contact us";
    $mail->From = "axel.satariano.a100230@mcast.edu.mt";
    $mail->AddAddress("axel.satariano.a100230@mcast.edu.mt");
     #sending the email
    
       
    
    if(!$mail->Send())
    {
        echo "message not sent. Error: ".$mail->ErrorInfo;
    }
    else{
        echo"message Sent";   
    }
     header( "Location: http://localhost/PHPSQLREVISION/loggedin.php" );
   }

?>
<?php
if( isset( $_SESSION['username'] ) ){
    
}
else{
    header( "Location: http://localhost/PHPSQLREVISION/project.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  
</head>
    <body>
        <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">
    <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
    <?php echo "Welcome, ". $_SESSION["username"]?>
  </a>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      
      <li class="nav-item">
        <a class="nav-link" href="loggedin.php">Your Profile</a>
      </li>
        <li class="nav-item">
            
        <a name = "logout"class="nav-link" href="project.php">Log out</a>
           
      </li>
         <li class="nav-item">
            
        <a name = "logout"class="nav-link" href="contact.php">Contact Us</a>
           
      </li>
      <li class="nav-item">
    </ul>
  </div>
</nav>
    <form method="post" action ="usersearch.php" class="form-inline">
    <input class="form-control mr-sm-2" type="search" name ="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" name = "submit" type="submit">Search</button>
  </form>
</nav>
        <div class="jumbotron">
  <h1 class="display-4">Enter Comments below</h1>
   <form method="post" action = "contact.php">
  <input style="width:50%;height:400px" type = "text" name = "comments" required>
       <input type="submit" name = "submit">
</form>
  
        </div>
    </body>
</html>

       
    