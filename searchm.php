<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-color.css" >
   <link rel="stylesheet" href="css/styles1.css">
<?php
$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"project2");
	?>
	<?php
	
function sm($v,$r,$connection) 
{
	?>
         <br>
			<center><a><b>MAINTENANCE's DETAILS</b></a></center>
			<br>
			<div class="scrollit container-fluid">
				 <table class="table table-hover ">
					<thead>
					<tr>
						<th><b>REFERENCE ID</b></th> 
						<th><b>DATE</b></th> 
						<th><b>PURPOSE</b></th>  
						<th><b>AMOUNT</b></th>   
					</tr>
					</thead>
				
				<?php
			if($v=="Month")
			{
				$Period = explode('-',$r);
				$query = "select * from maintenance where YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]'";
			}
			else
			{
			$query = "select * from maintenance where $v = '$r'";
			}
			$query_run = mysqli_query($connection,$query);
			?>
			<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($query_run)) 
			{
				?>
			
					<tr>
						<td><?php echo $row['Reference_ID']?></td>
						<td><?php echo $row['Date']?></td>
						<td><?php echo $row['Purpose']?></td>
						<td><?php echo $row['Amount']?></td>
					</tr>
				<?php
			}
			?>
			</tbody>
			</table>
			</div>
			<br>
			<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="window.history.back();" ></center>
			
			<?php
}		
?>	
</head>
<body>
<nav class="navbar navbar-light bg-dark justify-content-between">
   <a class="logo" >A.K.ROY & ASSOCIATES</a>
    <a href="main.php">LOGOUT</a>
</nav>	
<?php	
if(isset($_POST['search_by_ridm']))
{
	?>
	<center>
	<br><br><br><br><br><br><br><br>
	<form action="" method="post" autocomplete="off">
	<b>SEARCH BY REFERENCE ID:</b>&nbsp;&nbsp; <input type="text" name="rid">
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_ridm1" value="SEARCH">
	</form><br><br>
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="window.history.go(-3);" >
	</center>
<?php
}		
if(isset($_POST['search_by_dm']))
{
	?>
	<center>
	<br><br><br><br><br><br><br><br>
	<form action="" method="post">
	<b>SEARCH BY DATE:</b>&nbsp;&nbsp; <input type="date" name="rid">
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_dm1" value="SEARCH">
	</form><br><br>
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="window.history.go(-3);" >
	</center>
<?php
}	
if(isset($_POST['search_by_mm']))
{
	?>
	<center>
	<br><br><br><br><br><br><br><br>
	<form action="" method="post">
	<b>SEARCH BY MONTH:</b>&nbsp;&nbsp; <input type="month" name="rid">
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_mm1" value="SEARCH">
	</form><br><br>
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="window.history.go(-3);" >
	</center>
<?php
}
if(isset($_POST['search_by_pm']))
{
	?>
	<center>
	<br><br><br><br><br><br><br><br>
	<form action="" method="post" autocomplete="off">
	<b>SEARCH BY PURPOSE:</b>&nbsp;&nbsp; <input type="text" name="rid">
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_pm1" value="SEARCH">
	</form><br><br>
	<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="window.history.go(-3);" >
	</center>
<?php
}		
if(isset($_POST['search_by_ridm1']))
{
	sm("Reference_ID",$_POST['rid'],$connection);	
}
if(isset($_POST['search_by_dm1']))
{
	sm("Date",$_POST['rid'],$connection);	
}
if(isset($_POST['search_by_mm1']))
{
	sm("Month",$_POST['rid'],$connection);
}
if(isset($_POST['search_by_pm1']))
{
	sm("Purpose",$_POST['rid'],$connection);
}
?>		
</body>
</html>