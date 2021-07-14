<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-color.css" >
  <link rel="stylesheet" href="css/styles2.css">
</head>
<body> 
<nav class="navbar navbar-light bg-dark justify-content-between">
   <a class="logo" >XYZ & ASSOCIATES</a>
  <a class="form-inline">
    <a href="index.html">BACK TO HOME PAGE</a>
  </a>
</nav>
	<center><br><br><br>
	<a><b>ENTER LOGIN DETAILS</b></a><br>
	<form action="" method="post" autocomplete="off">
	<div class="bi">
	<label for="uname"><b>Username</b></label>
	<br>
      <input type="text" placeholder="Enter Username" name="Username" required>
       <br><br>
      <label for="psw"><b>Password</b></label>
	  <br>
      <input type="password" placeholder="Enter Password" name="Password" required>
       <br><br>
      <button class="bg-dark text-light btn btn-outline-success my-2 my-sm-0 ml-auto" type="submit" name="submit">Login</button>
      <label>
	  <br>
	  </form>
	  <?php
			session_start();
			if(isset($_POST['submit']))
			{
				if($_POST['Username']=='admin')
				{
					if( $_POST['Password']=='admin')
					{
						header("Location: admin_dashboard.php");
						}
				  else
				  {
					     ?>
							<h5>Wrong Password !!<h5>
							<?php
				  }
				}
				else
				{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"project2");
				$query = "select * from login where Username = '$_POST[Username]'";
				$query_run = mysqli_query($connection,$query);
				$c1=0;
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['Username'] == "user1")
					{
						$c1=1;
						if($row['Password'] == $_POST['Password'])
						{
							header("Location: user1_dashboard.php");
						}
						else
						{
							?>
							<h5>Wrong Password !!<h5>
							<?php
							break;
						}
					}
					elseif($row['Username'] == "user2")
					{
						$c1=1;
						if($row['Password'] == $_POST['Password'])
						{
							header("Location: user2_dashboard.php");
						}
						else
						{
							?>
							<h5>Wrong Password !!</h5>
							<?php
							break;
						}
					}
				  }
					if($c1==0)
					{
					       ?>
							<h5>Wrong Username!!</h5>
							<?php
					}							
			   }
			}
		?>
		</div>
	  </center><br><br><br>  
</body>
</html>