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
function f($v,$r,$connection) 
{
	?>
         <br>
			<center><a><b>CUSTOMER's DETAILS</b></a></center>
			<br>
			<div class="scrollit container-fluid">
				 <table class="table table-hover ">
					<thead>
					<tr>
						<th><b>REFERENCE ID</b></th> 
						<th><b>FULL NAME</b></th> 
						<th><b>PHONE NO</b></th>  
						<th><b>ADDRESS:</b></th>  
						<th><b>WORK TYPE:</b></th>  
						<th><b>STARTING DATE OF WORK</b></th>  
						<th><b>END DATE OF WORK</b></th>  
						<th><b>DOCUMENTS GIVEN</b></th> 
						<th><b>ADVANCE GIVEN</b></th> 
						<th><b>TOTAL AMOUNT PAID</b></th>  
						<th><b>STATUS OF WORK</b></th>  	
						<th><b>WORK TAKEN OR NOT</b></th>  
					</tr>
					</thead>
				
				<?php
			if($v=="STARTING_DATE_OF_WORK1")
			{
				$Period = explode('-',$r);
				$query = "select * from customer where YEAR(STARTING_DATE_OF_WORK)='$Period[0]' and MONTH(STARTING_DATE_OF_WORK)='$Period[1]'";
			}
			else
			{
			$query = "select * from customer where $v = '$r'";
			}
			$query_run = mysqli_query($connection,$query);
			?>
			<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($query_run)) 
			{
				?>
			
					<tr>
						<td><?php echo $row['REFERENCE_ID']?></td>
						<td><?php echo $row['NAME']?></td>
						<td><?php echo $row['PHONE_NUMBER']?></td>
						<td><?php echo $row['ADDRESS']?></td>
						<td><?php echo $row['TYPE_OF_WORK']?></td>
						<td><?php echo $row['STARTING_DATE_OF_WORK']?></td>
						<td><?php echo $row['END_DATE_OF_WORK']?></td>
						<td><?php echo $row['DOCUMENTS_GIVEN']?></td>
						<td><?php echo $row['ADVANCE_GIVEN']?></td>
						<td><?php echo $row['TOTAL_AMOUNT_TO_PAY']?></td>
						<td><?php echo $row['STATUS_OF_WORK']?></td>
						<td><?php echo $row['WORK_IS_TAKEN']?></td>
					</tr>
				<?php
			}
			?>
			</tbody>
			</table>
			</div>
			<br>
			<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick=" window.history.back();" ></center>
			
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
if(isset($_POST['search_by_rid']))
				{
					?>
					<center>
					<br><br><br><br><br><br><br><br>
					<form action="" method="post" autocomplete="off">
					<b>SEARCH BY REFERENCE ID:</b>&nbsp;&nbsp; <input type="text" name="rid">
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_rid1" value="SEARCH">
					</form><br><br>
					<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="search_data"  >
				</form>
					</center>
				<?php
				}	
				if(isset($_POST['search_by_nm']))
				{
					?>
					<center>
					<br><br><br><br><br><br><br><br>
					<form action="" method="post" autocomplete="off">
					<b>SEARCH BY NAME:</b>&nbsp;&nbsp; <input type="text" name="rid">
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_nm1" value="SEARCH">
					</form><br><br>
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick=" window.history.go(-2);" >
					</center>
				<?php
				}	
				if(isset($_POST['search_by_phn']))
				{
					?>
					<center>
					<br><br><br><br><br><br><br><br>
					<form action="" method="post" autocomplete="off">
					<b>SEARCH BY PHONE NUMBER:</b>&nbsp;&nbsp; <input type="text" name="rid">
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_phn1" value="SEARCH">
					</form><br><br>
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick=" window.history.go(-2);" >
					</center>
				<?php
				}	
				if(isset($_POST['search_by_add']))
				{
					?>
					<center>
					<br><br><br><br><br><br><br><br>
					<form action="" method="post" autocomplete="off">
					<b>SEARCH BY ADDRESS:</b>&nbsp;&nbsp; <input type="text" name="rid">
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_add1" value="SEARCH">
					</form><br><br>
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick=" window.history.go(-2);" >
					</center>
				<?php
				}	
				if(isset($_POST['search_by_dow']))
				{
					?>
					<center>
					<br><br><br><br><br><br><br><br>
					<form action="" method="post">
					<b>SEARCH BY STARTING DATE OF WORK:</b>&nbsp;&nbsp; <input type="date" name="rid">
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_dow1" value="SEARCH">
					</form><br><br>
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick=" window.history.go(-2);" >
					</center>
				<?php
				}	
				if(isset($_POST['search_by_mon']))
				{
					?>
					<center>
					<br><br><br><br><br><br><br><br>
					<form action="" method="post">
					<b>SEARCH BY MONTH:</b>&nbsp;&nbsp; <input type="month" name="rid">
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_mon1" value="SEARCH">
					</form><br><br>
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick=" window.history.go(-2);" >
					</center>
				<?php
				}
				if(isset($_POST['search_by_sow']))
				{
					?>
					<center>
					<br><br><br><br><br><br><br><br>
					<form action="" method="post">
					<b>SEARCH BY STATUS OF WORK(YET TO START/IN PROCESS/DONE):</b>&nbsp;&nbsp;
					<select name="rid" id="status" required>
					  <option value="-">-</option>
					  <option value="YET TO START">YET TO START</option>
					  <option value="IN PROCESS">IN PROCESS</option>
					  <option value="DONE">DONE</option>
					</select>
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_sow1" value="SEARCH">
					</form><br><br>
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick=" window.history.go(-2);" >
					</center>
				<?php
				}	
				if(isset($_POST['search_by_rid1']))
				{
					f("REFERENCE_ID",$_POST['rid'],$connection);	
				}
				if(isset($_POST['search_by_nm1']))
				{
					f("NAME",$_POST['rid'],$connection);	
				}
				if(isset($_POST['search_by_phn1']))
				{
					f("PHONE_NUMBER",$_POST['rid'],$connection);
				}
				if(isset($_POST['search_by_add1']))
				{
					f("ADDRESS",$_POST['rid'],$connection);
				}
				if(isset($_POST['search_by_dow1']))
				{
					f("STARTING_DATE_OF_WORK",$_POST['rid'],$connection);
				}
				if(isset($_POST['search_by_mon1']))
				{
					f("STARTING_DATE_OF_WORK1",$_POST['rid'],$connection);	
				}
				if(isset($_POST['search_by_sow1']))
				{
					f("STATUS_OF_WORK",$_POST['rid'],$connection);
				}
				?>
			</body>
       </html>