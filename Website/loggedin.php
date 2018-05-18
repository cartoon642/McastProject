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

        <?php
require_once("conn.php");
 if (isset($_POST['logout'])) {
  session_start();
session_destroy();
header('Location: project.php');
exit;   
     
     
 }
if (isset($_POST['submitname'])) {
    $name = $_POST['name'];
    $username = $_SESSION['username'];
            
        $query = "UPDATE `users` SET `Name` = '$name' WHERE `users`.`username` = '$username'";
        $result = mysqli_query($conn, $query);            
 header("Refresh:0");
        
       
}
        if (isset($_POST['submitcountry'])) {
    $country = $_POST['country'];
    $username = $_SESSION['username'];
     
        $query = "UPDATE `users` SET `Country` = '$country' WHERE `users`.`username` = '$username'";
        $result = mysqli_query($conn, $query);
           header("Refresh:0");
        
       
}

        if (isset($_POST['submitfavourite'])) {
    $favourite = $_POST['favourite'];
    $username = $_SESSION['username'];
      
        $query = "UPDATE `users` SET `Favourite` = '$favourite' WHERE `users`.`username` = '$username'";
        $result = mysqli_query($conn, $query);
           header("Refresh:0");
        
       
}
?>
<!DOCTYPE html>
<html>
<head>
    <title >User Profile</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  
</head>
    <body>
        <nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">
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
    $username = $_SESSION["username"];

        $query = "select Favourite from users where username = '$username'";
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
    	 
        $query = "SELECT * FROM `tvshows` where tvshowname = '$fav'";
       $result = mysqli_query($conn, $query)
        or die("Error in query: ". mysqli_error($conn));    
      while($row = mysqli_fetch_row($result)) {
       echo "<img src='$row[3]' style = 'float:left;'><br><h1>Favourite tv show: $fav </h1><br><br><br>";   
      }
      }
      
      ?>
    
    
    
    
    
    
    <?php
    $username = $_SESSION["username"];

        $query = "select * from users where username = '$username'";
       $result = mysqli_query($conn, $query)
or die("Error in query: ". mysqli_error($conn));    
        while($row = mysqli_fetch_row($result)) {
    echo "<div style='float:right; margin:-30px;'>
			<h3>User Info</h3>
            <table>
    <tr><td> <p style =' padding-right: 50px;float:left;'>name: $row[2]  </p><td> 
<button type='button' class='btn btn-info ' data-toggle='modal' data-target='#myModal'>Edit</button>

<!-- Modal -->
<div' id='myModal' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Edit Name</h4>
      </div>
      <div class='modal-body'>
        <form method='POST' action='loggedin.php' >
        <input type='text' name='name'>
        <input type='submit' name='submitname' value='edit name'>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>
    
            <br>
    <tr><td><p style ='clear:both; padding-right: 50px;float:left;'>country: $row[3] </p><td> <button type='button' class='btn btn-info ' data-toggle='modal' data-target='#myModal2'>Edit</button>

<!-- Modal -->
<div' id='myModal2' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Edit Country</h4>
      </div>
      <div class='modal-body'>
        <form method='POST' action='loggedin.php' >
        <input type='text' name='country'>
        <input type='submit' name='submitcountry' value='Edit Country'>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>
<tr><td><p style ='clear:both; padding-right: 50px;float:left;'>Favourite: $row[4] </p><td> <button type='button' class='btn btn-info ' data-toggle='modal' data-target='#myModal3'>Edit</button>

<!-- Modal -->
<div' id='myModal3' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title'>Edit Favourite</h4>
      </div>
      <div class='modal-body'>
        <form method='POST' action='loggedin.php' >
        <select name = favourite>
            <option value='Big Bang Theory'>Big Bang Theory</option>
            <option value='Black Sails'>Black Sails</option>
            <option value='Desperate Housewives'>Desperate Housewives</option>
            <option value='Flash'>Flash</option>
            <option value='Game of Thrones'>Game of Thrones</option>
            <option value='Jane the Virgin'>Jane the Virgin</option>
            <option value='Lucifer'>Lucifer</option>
            <option value='MR Robot'>MR Robot</option>
            <option value='Riverdale'>Riverdale</option>
            <option value='Suits'>Suits</option>
            <option value='Vikings'>Vikings</option>
            <option value='Walking Dead'>Walking Dead</option>
        </select>
        <input type='submit' name='submitfavourite' value='Edit Favourite'>
        </form>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
      </div>
    </div>

  </div>
</div>
    </table>";
        }
        ?>
</div>
  <h1 class="display-4">Your reviews are listed below</h1>
  <p class="lead"></p>
  
  <p><?php
      $username = $_SESSION["username"];

		

        $query = "select * from reviews where username = '$username'";
       $result = mysqli_query($conn, $query)
or die("Error in query: ". mysqli_error($conn));    
        while($row = mysqli_fetch_row($result)) {
            echo "<a href='http://localhost/PHPSQLREVISION/tvshowsearch.php?id=$row[2]'><h1>$row[2]</h1></a><br> Rating: $row[3]<br> Comment: $row[4] <br /><br /><hr class='my-4'>";
}
      ?>
    </p>


    </body>
</html>



