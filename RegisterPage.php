<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" >
	<header>
		<title>Register</title>	
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	</header>
	<body>
		<h1>Register</h1>
		<form method="POST" action="RegisterPage.php" >
			<table>
				<tr><td>Username</td>
				<td><input type="text" name="username"></td></tr>
				<tr><td>Password</td>
				<td><input type="password" name="password"></td></tr>
                <tr><td>Confirm Password</td>
				<td><input type="password" name="confirmpassword"></td>
                </tr>	
				<tr><td colspan="2" align="center">
				<input type="submit" name='submit' value="Register"></td></tr>

			</table>

		</form>
		
	</body>
</html>
<?php
	
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirmpassword = $_POST['confirmpassword'];
		
        //Connect to db
        if($password == $confirmpassword){
        $conn = mysqli_connect('localhost', 'root','','projectdatabase','3307') or die('Cannot connect to DB');	 
        $query = "insert into users (username, password)
                    values('$username', '$password')";
        header( "Location: http://localhost:8084/PHPSQLREVISION/project.php");
        if(mysqli_query($conn, $query)) { 
            echo mysqli_affected_rows($conn);            
        }
        else
            echo "Error: ".mysqli_error($conn);
        }
        else{
            echo"please make sure passwords match";
        }
		}
						
	
?>