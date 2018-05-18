<?php
session_start();
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
     <?php
   $fav = "";
    $user = $_GET["id"];
    $conn = mysqli_connect('localhost', 'root','','projectdatabase','3306') or die('Cannot connect to DB');	 
        $query = "select Favourite from users where username = '$user'";
       $result = mysqli_query($conn, $query)
        or die("Error in query: ". mysqli_error($conn));    
      while($row = mysqli_fetch_row($result)) {
       if ($row[0] == ""){
           
       }
          else{
              $fav = $row[0];
          }
      }
      if(!($fav == "")){
      $conn = mysqli_connect('localhost', 'root','','projectdatabase','3306') or die('Cannot connect to DB');	 
        $query = "SELECT * FROM `tvshows` where tvshowname = '$fav'";
       $result = mysqli_query($conn, $query)
        or die("Error in query: ". mysqli_error($conn));    
      while($row = mysqli_fetch_row($result)) {
       echo "<img src='$row[3]' style = 'float:left;'><br><h1>Favourite tv show: $fav </h1><br><br><br>";   
      }
      }
      ?>
    
    <?php
    $user = $_GET['id'];
    $conn = mysqli_connect('localhost', 'root','','projectdatabase','3306') or die('Cannot connect to DB');	 
        $query = "select * from users where username = '$user'";
       $result = mysqli_query($conn, $query)
or die("Error in query: ". mysqli_error($conn));    
        while($row = mysqli_fetch_row($result)) {
    echo "<div style=''>
			<h3>User Info</h3>
            <table>
    <tr><td> <p style =' padding-right: 50px;float:left;'>name: $row[2]  </p>
    
            <br>
    <tr><td><p style ='clear:both; padding-right: 50px;float:left;'>country: $row[3] </p>

    </table>";
        }
        ?>
  <h1 class="display-4" style = "clear:both;">Users reviews listed below</h1>
  <p class="lead"></p>
  <hr class="my-4">
  <p><?php
      $username = $_SESSION["username"];
      $user = $_GET['id'];
		
        //Connect to db
        
        $conn = mysqli_connect('localhost', 'root','','projectdatabase','3306') or die('Cannot connect to DB');	 
        $query = "select * from reviews where username = '$user'";
       $result = mysqli_query($conn, $query)
or die("Error in query: ". mysqli_error($conn));    
        while($row = mysqli_fetch_row($result)) {
            echo " <a href='http://localhost:8084/PHPSQLREVISION/tvshowsearch.php?id=$row[2]'><h1>$row[2]</h1></a><br> Rating: $row[3]<br> Comment: $row[4] <br /><br /><hr class='my-4'>";
}
      ?>
    </p>
</div>
    </body>
</html>


