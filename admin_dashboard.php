<!DOCTYPE html>
<?php
if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location:../main.php');
    exit;
}
?>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-color.css" >
   <link rel="stylesheet" href="css/styles1.css">
<?php
		session_start();
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"project2");
?>
<?php
function f2($c,$r,$connection)
{
?>
         <br>
			 <center><a><b>ATTENDENCE DETAILS</b></a></center>
			 <br>
			 <div class="scrollit container-fluid">
				 <table class="table table-hover ">
					<thead>
					<tr>
						<th><b>DATE:</b></th> 
						<th><b>TIME:</b></th> 
						<th><b>IN/OUT:</b></th> 
					</tr>
					</thead>
				
				<?php
			if($c=="search_by_day1f")
			{
				$query = "SELECT * FROM user1attend WHERE Date = '$r' ";
		   }
			elseif($c=="search_by_day2f")
			{
				$query = "SELECT * FROM user2attend WHERE Date = '$r' ";
		   }
		   elseif($c=="search_by_mon1f")
			{
				 $Period = explode('-',$r);
				$query = "SELECT * FROM user1attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]'";
		   }
		    elseif($c=="search_by_mon2f")
			{
				 $Period = explode('-',$r);
				$query = "SELECT * FROM user2attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]'";
		   }
			elseif($c=="search_by_yr1f")
		   {
			   $query = "SELECT * FROM user1attend WHERE YEAR(Date)='$r'";
			   }
			elseif($c=="search_by_yr2f")
		   {
			 $query = "SELECT * FROM user2attend WHERE YEAR(Date)='$r'";
			   }
			$query_run = mysqli_query($connection,$query);
			?>
			<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($query_run)) 
			{
				?>
				
					<tr>
						<td><?php echo $row['Date']?></td>
						<td><?php echo $row['TIME']?></td>
						<td><?php echo $row['type']?></td>
					</tr>
				<?php
			}
			?>
			</tbody>
			</table>
			</div>
			<br>		
		<center>
		<?php
			if($c=="search_by_day1f" || $c=="search_by_mon1f" || $c=="search_by_yr1f")
			{
				?>
		<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence1"  >
				</form>
				<?php
			}
			else
			{
				?>
			<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence2"  >
				</form>
				<?php
			}
           ?>			
		</center>
			
			<?php
			}
function f1($v,$r,$connection,$c)
{
?>
				<br>
			<center><a><b>TRANSACTION's DETAILS</b></a></center>
			<br>
			 <div class="scrollit container-fluid">
				 <table class="table table-hover ">
					<thead>
					<tr>
						<th><b>TRANSACTION DATE:</b></th> 
						<th><b>AMOUNT:</b></th> 
						<th><b>TYPE OF TRANSACTION:</b></th> 
						<th><b>BALANCE ON THE SPECIFIC DAY:</b></th> 
					</tr>
					</thead>
				
				<?php
			if($c=="search_by_day1")
			{
				$query = "select * from user1sal where $v = '$r'";
		   }
		   elseif($c=="search_by_day2")
			{
				$query = "select * from user2sal where $v = '$r'";
		   }
		   elseif($c=="search_by_month1")
		   {
			   $Period = explode('-',$r);
			   $query = "select * from user1sal where YEAR($v)='$Period[0]' and MONTH($v)='$Period[1]'";
			   }
			elseif($c=="search_by_month2")
		   {
			   $Period = explode('-',$r);
			   $query = "select * from user2sal where YEAR($v)='$Period[0]' and MONTH($v)='$Period[1]'";
			   }
			elseif($c=="seelasttransaction1")
			{
				$query = "select * from user1sal where $v = (select MAX($v) from user1sal)";
			}
			elseif($c=="seelasttransaction2")
			{
				$query = "select * from user2sal where $v = (select MAX($v) from user2sal)";
			}
			$query_run = mysqli_query($connection,$query);
			?>
			<tbody>
			<?php
			while ($row = mysqli_fetch_assoc($query_run)) 
			{
				?>
				
					<tr>
						<td><?php echo $row['Transaction_DATE']?></td>
						<td><?php echo $row['Amount']?></td>
						<td><?php echo $row['Type']?></td>
						<td><?php echo $row['Current_Balance']?></td>
					</tr>
				<?php
			}
			?>
			</tbody>
			</table>
			</div>
			<br>
			<center>
		<?php
			if($c=="search_by_day1" || $c=="search_by_month1" || $c=="seelasttransaction1")
			{
				?>
		<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user1"  >
				</form>
				<?php
			}
			else
			{
				?>
			<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user2"  >
				</form>
				<?php
			}
           ?>			
		</center>			
			<?php
}
function k($row)
	{
				?>
			<a><b><u>CUSTOMER's DETAILS</u></b></a>
						<table>
						<tr>
							<td><b>REFERENCE ID:</b></td>
							<td><input type="text" name="rid" value="<?php echo $row['REFERENCE_ID']?>"></td>
						</tr>
						<tr>
						    <td><b>FULL NAME:</b></td>
							<td><input type="text" name="cname" value="<?php echo $row['NAME']?>"></td>
						</tr>
						<tr>
							<td><b>PHONE NUMBER:</b></td>
							<td><input type="text" name="cphn" value="<?php echo $row['PHONE_NUMBER']?>"></td>
						</tr>
						<tr>
							<td><b>ADDRESS:</b></td>
							<td><input type="text" name="caddress" value="<?php echo $row['ADDRESS']?>"></td>
						</tr>
						<tr>
							<td><b>TYPE OF WORK:</b></td>
							<td><select name="tow" id="tow" value="<?php echo $row['TYPE_OF_WORK']?>">
						  <option value="DRAWING" <?php if($row['TYPE_OF_WORK']=="DRAWING") echo 'selected="selected"'; ?> >DRAWING</option>
						  <option value="ESTIMATE" <?php if($row['TYPE_OF_WORK']=="ESTIMATE") echo 'selected="selected"'; ?> >ESTIMATE</option>
						  <option value="VALUATION" <?php if($row['TYPE_OF_WORK']=="VALUATION") echo 'selected="selected"'; ?> >VALUATION</option>
					    </select></td>
						</tr>
						<tr>
							<td><b>STARTING DATE OF WORK:</b></td>
							<td><input type="date" name="sdof" value="<?php echo $row['STARTING_DATE_OF_WORK']?>"></td>
						</tr>
						<tr>
							<td><b>END DATE OF WORK:</b></td>
							<td><input type="date" name="edof" value="<?php echo $row['END_DATE_OF_WORK']?>"></td>
						</tr>
						<tr>
							<td><b>DOCUMENTS GIVEN:</b></td>
							<td><input type="text" name="cdg" value="<?php echo $row['DOCUMENTS_GIVEN']?>"></td>
						</tr>
						<tr>
							<td><b>ADVANCE GIVEN:</b></td>
							<td><input type="number" name="cag" min="0" value="<?php echo $row['ADVANCE_GIVEN']?>"></td>
						</tr>
						<tr>
							<td><b>TOTAL AMOUNT PAID:</b></td>
							<td><input type="number" name="tatp" min="0" value="<?php echo $row['TOTAL_AMOUNT_TO_PAY']?>"></td>
						</tr>
						<tr>
							<td><b>STATUS OF WORK:</b></td>
							<td><select name="status" id="status" >
							<option value="-" <?php if($row['STATUS_OF_WORK']=="-") echo 'selected="selected"'; ?> >-</option>
							<option value="YET TO START" <?php if($row['STATUS_OF_WORK']=="YET TO START") echo 'selected="selected"'; ?> >YET TO START</option>
							<option value="IN PROCESS" <?php if($row['STATUS_OF_WORK']=="IN PROCESS") echo 'selected="selected"'; ?> >IN PROCESS</option>
							<option value="DONE" <?php if($row['STATUS_OF_WORK']=="DONE") echo 'selected="selected"'; ?> >DONE</option>
							</select></td>
						</tr>
						<tr>
							<td><b>WORK IS TAKEN OR NOT:</b></td>
							<td><select name="ton" id="ton" >
							<option value="-" <?php if($row['WORK_IS_TAKEN']=="-") echo 'selected="selected"'; ?> >-</option>
							<option value="NO" <?php if($row['WORK_IS_TAKEN']=="NO") echo 'selected="selected"'; ?> >NO</option>
							<option value="YES"<?php if($row['WORK_IS_TAKEN']=="YES") echo 'selected="selected"'; ?> >YES</option>
							</select></td>
						</tr>
						</table>
					   <input type="hidden" id="phpd" name="phpd" value="3">
					   </br>
						<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="EDIT" value="Save">
						<?php
			}
	function m($row)
	{
		?>
	<h5><b><u>MAINTENANCE</u></b></h5>
				<table>
				<tr>
					<td><b>REFERENCE ID:</b></td>
					<td><input type="text" name="rid" value="<?php echo $row['Reference_ID']?>"></td>
				</tr>
				<tr>
					<td><b>DATE:</b></td>
					<td><input type="date" name="ed" value="<?php echo $row['Date']?>"></td>
				</tr>
				<tr>
					<td><b>PURPOSE:</b></td>
					<td><input type="text" name="epur" value="<?php echo $row['Purpose']?>"></td>
				</tr>
				<tr>
					<td><b>AMOUNT:</b></td>
					<td><input type="number" name="eam" value="<?php echo $row['Amount']?>"></td>
				</tr>
				</table>
			   <br>
			   <input type="hidden" id="phpd" name="phpd" value="3">
			   </br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="EDIT" value="Save">
				<?php
	}
			?>	 
</head>
<body> 
<nav class="navbar navbar-light bg-dark justify-content-between">
   <a class="logo" >XYZ & ASSOCIATES</a>
    <a href="main.php">LOGOUT</a>
</nav>
	<center><br>
	<div class="container">
	<div class="row mr-0  ">
	<div class="col-sm-2">
		<br>
		<form action="" method="post">
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="new_data" value="  FEED NEW DATA  ">
		<br><br>
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="edit_data" value="      EDIT DATA       ">
		<br><br>
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="search_data" value="SEARCH FOR DATA">
		<br><br>
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="delete_data" value="    DELETE DATA    ">
		<br><br>
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="salary_status" value="  INCOME REPORT ">
		<br><br>
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="user1" value="   USER1 DETAILS   ">
		<br><br>
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="user2" value="   USER2 DETAILS   ">
		<br><br>
		<input class="btn btn-outline-success  my-sm-0 ml-auto bg-dark text-light" type="submit" name="maintenance" value="  MAINTENANCE   ">
		</form>
	</div>
   <div class="col-sm-10">
	    <center><a><b>WELCOME TO YOUR DASHBOARD ADMIN</b></a></center>
		<div id="demo">
			<?php 
				if(isset($_POST['new_data']))
				{
					?>
					<br>
					<center><a>Fill the given details</a></center>
					<form action="new_data.php" method="post" autocomplete="off">	
					<table>
					<tr>
					<td><b>REFERENCE ID:</b></td>
					<td><input type="text" placeholder="ENTER REFERENCE ID" name="rid" required></td>
					</tr>
					<tr>
					<td><b>FULL NAME:</b></td>
					<td><input type="text" placeholder="ENTER FULL NAME" name="cname" required></td>
					</tr>
				   <tr>
				  <td><b>PHONE NUMBER:</b></td>
				  <td><input type="text" placeholder="ENTER PHONE NUMBER" name="cphn" required></td>
				  </tr>
				   <tr>
					<td><b>ADDRESS:</b></td>
					<td><input type="text" placeholder="ENTER ADDRESS" name="caddress" required></td>
					</tr>
				   <tr>
				   <td><b>TYPE OF WORK:</b></td>
				   <td><select name="tow" id="tow" required>
				      <option value="-">-</option>
					  <option value="DRAWING">DRAWING</option>
					  <option value="ESTIMATE">ESTIMATE</option>
					  <option value="VALUATION">VALUATION</option>
					</select></td>
				   </tr>
				   <tr>
					<td><b>STARTING DATE OF WORK:</b></td>
					<td><input type="date" placeholder="ENTER STARTING DATE OF WORK" name="sdof" required></td>
					</tr>
				   <tr>
					<td><b>END DATE OF WORK:</b></td>
					<td><input type="date" placeholder="ENTER END DATE OF WORK" name="edof" ></td>
					</tr>
				   <tr>
					<td><b>DOCUMENTS GIVEN:</b></td>
					<td><input type="text" placeholder="ENTER DOCS GIVEN" name="cdg" required></td>
					</tr>
				   <tr>
					<td><b>ADVANCE GIVEN:</b></td>
					<td><input type="number" min="0" placeholder="ENTER ADVANCE GIVEN" name="cag" required></td>
					</tr>
				   <tr>
					<td><b>TOTAL AMOUNT PAID:</b></td>
					<td><input type="number" min="0" placeholder="ENTER AMOUNT" name="tatp" ></td>
					</tr>
				   <tr>
					<td><b>STATUS OF WORK:</b></td>    
					<td><select name="status" id="status" required>
					  <option value="-">-</option>
					  <option value="YET TO START">YET TO START</option>
					  <option value="IN PROCESS">IN PROCESS</option>
					  <option value="DONE">DONE</option>
					</select></td>
					</tr>
					<tr>
					<td><b>WORK IS TAKEN OR NOT:</b></td>
					<td><select name="ton" id="ton" >
					  <option value="-">-</option>
					  <option value="YES">YES</option>
					  <option value="NO">NO</option>
					</select></td>
					</tr>
					</table>
					<br>
					<input type="hidden" id="phpd" name="phpd" value="3">
					<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="add" value="ADD DATA">
					</form>
					<br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				<?php
				}
				if(isset($_POST['edit_data']))
			{
				?>
				<center>
				<form action="" method="post" autocomplete="off">
				<br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER REFERENCE ID:</b>&nbsp;&nbsp; <input type="text" name="riid">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_id_for_editi" value="Search">
				<br><br>
				<h4><b><u>OR</u></b></h4><br>
				&nbsp;&nbsp;<b>ENTER FULL NAME:</b>&nbsp;&nbsp; <input type="text" name="name">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_id_for_editn" value="Search">
				
				</form><br><br>
				</center>
				<br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				<?php
			}
			if(isset($_POST['search_by_id_for_editi']))
			{
				$query = "select * from customer where REFERENCE_ID = '$_POST[riid]'";
				$query_run = mysqli_query($connection,$query);
				$c=1;
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					$c=0;
					?>
					<form action="editbyref_data.php" method="post">
					<?php
						k($row);
						?>						
					</form>
					</br>
					<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="edit_data"  >
				</form>
					<?php
				}
				if($c==1)
				{	
			   ?>
			<script type="text/javascript">
				alert("NO SUCH DATA AVAILABLE.");
				window.location.href = "admin_dashboard.php";
		      </script>
			  <?php
			  }
			}
			if(isset($_POST['search_by_id_for_editn']))
			{
				$query = "select * from customer where NAME = '$_POST[name]'";
				$query_run = mysqli_query($connection,$query);
				$c=1;
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
				$c=0;
					?>
					<form action="editbyn_data.php" method="post">
					<?php
						k($row);
						?>						
					</form>
					</br>
					<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="edit_data"  >
				</form>
				 
					<?php
				}
				if($c==1)
				{	
			      ?>
					<script type="text/javascript">
					alert("NO SUCH DATA AVAILABLE.");
					window.location.href = "user_dashboard.php";
					</script>
			    <?php
			    }
			}
			if(isset($_POST['delete_data']))
			{
				?>
				<center>
				<form action="delete_data.php" method="post" autocomplete="off">
				<br><br><br><br><br><br><br><br>
				<tr>
					<td><b>ENTER REFERENCE ID:</b></td>
					<td><input type="text" placeholder="ENTER REFERENCE ID" name="rid" ></td>
					</tr>
				<tr>
				<td></td>
				<td><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_rid_for_delete" value="Delete"></td>
				</tr>
				<input type="hidden" id="phpd" name="phpd" value="3">
				</form>
				<br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				</center>
				<?php
			}
			if(isset($_POST['search_data']))
			{
				?>
				<center>
				<form action="search.php" method="post">
				<br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_rid" value=" SEARCH BY REFERENCE ID ">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_nm" value="         SEARCH BY NAME         ">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_phn" value="SEARCH BY PHONE NUMBER">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_add" value="         SEARCH BY ADDRESS         ">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_dow" value="SEARCH BY STARTING DATE OF WORK">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_mon" value="           SEARCH BY MONTH           ">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_sow" value="SEARCH BY STATUS OF WORK">
				</form><br><br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				</center>
				<?php
			}
				if(isset($_POST['salary_status']))
			    {
				?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="idr" value="SPECIFIC DAY INCOME">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="imr" value="SPECIFIC MONTHLY INCOME">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="iyr" value="SPECIFIC YEARLY INCOME">
				</form><br><br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				</center>
				<?php
				}
				if(isset($_POST['idr']))
			    {
					?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER BY DAY:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="drr" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="salary_status"  >
				</form>
				<?php
				}
				if(isset($_POST['drr']))
				{
					$query = " SELECT SUM(TOTAL_AMOUNT_TO_PAY) as sum FROM customer WHERE STARTING_DATE_OF_WORK = '$_POST[day]' ";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>DAY:<?php echo $_POST['day']?></b></h3></center>
					<?php
			       while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					  ?>
					 <p class="double"> <b><?php echo $row['sum']?></b></p>
					<?php
				  }
				  ?>
				  <br>
			     <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="idr"  >
				</form>
				<?php
			    }
				if(isset($_POST['imr']))
			    {
					?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER BY MONTH:</b>&nbsp;&nbsp; <input type="month" name="mon">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="mrr" value="Search">				
				</form><br><br>
				</center>
				<br>
				  <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="salary_status"  >
				</form>
				<?php
				}
				if(isset($_POST['mrr']))
				{
					$Period=explode('-',$_POST['mon']);
					$query = " SELECT SUM(TOTAL_AMOUNT_TO_PAY) as sum FROM customer WHERE YEAR(STARTING_DATE_OF_WORK)='$Period[0]' and MONTH(STARTING_DATE_OF_WORK)='$Period[1]'";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>MONTH:<?php echo $_POST['mon']?></b></h3></center>
					<?php
			       while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					  ?>
					 <p class="double"> <b><?php echo $row['sum']?></b></p>
					<?php
				  }
				  ?>
				  <br>
			     <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="imr"  >
				</form>
				<?php
			    }
				if(isset($_POST['iyr']))
			    {
					?>
				<center>
				<form action="" method="post" autocomplete="off">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER BY YEAR:</b>&nbsp;&nbsp; <select name="yr" id="yr" >
					  <option value="2021">2021</option>
					  <option value="2020">2020</option>
					  <option value="2019">2019</option>
					  <option value="2018">2018</option>
					  <option value="2017">2017</option>
					  <option value="2016">2016</option>
					</select>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="yrr" value="Search">				
				</form><br><br>
				<br>
				</center>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="salary_status"  >
				</form>
				<?php
				}
				?>
				<?php
				if(isset($_POST['yrr']))
				{
	
					$query = " SELECT SUM(TOTAL_AMOUNT_TO_PAY) as sum FROM customer WHERE YEAR(STARTING_DATE_OF_WORK)='$_POST[yr]'";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>YEAR:<?php echo $_POST['yr']?></b></h3></center>
					<?php
			       while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					  ?>
					 <p class="double"> <b><?php echo $row['sum']?></b></p>
					<?php
				  }
				  ?>
				  <br>
			     <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="iyr"  >
				</form>
				<?php
			    }
				if(isset($_POST['user1']))
			   {
				?>
				<center>
				<form action="" method="post">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="addt1" value="ADD TRANSACTION">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seebalance1" value="SEE CURRENT BALANCE">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seelasttransaction1" value="SEE LAST TRANSACTION">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seespecificdaytrandaction1" value="SEE TRANSACTION OF SPECIFIC DAY">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seespecificmonthtrandaction1" value="SEE TRANSACTION OF SPECIFIC MONTH">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seeattendence1" value="SEE ATTENDENCE">
				</form><br><br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				</center>
				<?php
			   }
				if(isset($_POST['addt1']))
				{
				?>
					<center><h3>Fill the given details</h3></center>
					<form action="user1new_tran.php" method="post" autocomplete="off">	  	  
					<table>
					<tr>
					<td><b>TRANSACTION DATE:</b></td>
					<td><input type="date" placeholder="ENTER TRANSACTION DATE" name="tdd" required></td>
					</tr>
					<tr>
					<td><b>AMOUNT:</b></td>
					<td><input type="number" placeholder="ENTER AMOUNT" name="am" min="1" required></td>
					</tr>
				    <tr>
				    <td><b>TYPE:</b></td>
				    <td><select name="typ" id="typ" required>
					  <option value="DEBIT">DEBIT</option>
					  <option value="CREDIT">CREDIT</option>
					</select></td>
				    </tr>
				    </table>
				    <br>
					<input type="hidden" id="phpd" name="phpd" value="3">
				    <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="SAVE" value="Save">		
					</form>
				    <br>
					<br>
				     <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user1"  >
				</form>
                <?php					
				}
				if(isset($_POST['seespecificdaytrandaction1']))
				{
				?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER BY DAY:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_day1" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user1"  >
				</form>
				<?php
				}
				if(isset($_POST['search_by_day1']))
				{
				f1("Transaction_DATE",$_POST['day'],$connection,"search_by_day1");
				}
				if(isset($_POST['seespecificmonthtrandaction1']))
				{
				?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER BY MONTH:</b>&nbsp;&nbsp; <input type="month" name="month">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_month1" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user1"  >
				</form>
				<?php
				}
				if(isset($_POST['search_by_month1']))
				{
				f1("Transaction_DATE",$_POST['month'],$connection,"search_by_month1");
				}
				if(isset($_POST['seelasttransaction1']))
				{
				f1("SNO",1,$connection,"seelasttransaction1");
				}
				if(isset($_POST['seebalance1']))
				{
					$query = "select * from user1sal where SNO = (select MAX(SNO) from user1sal)";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>CURRENT BALANCE:</b></h3></center>
					<?php
			       while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					  ?>
					 <p class="double"> <b><?php echo $row['Current_Balance']?></b></p>
					<?php
				  }
				  ?>
				  <br>
			    <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user1"  >
				</form>
				<?php
				}
				if(isset($_POST['seeattendence1']))	
				{
					?>
				<center>
				<form action="" method="post">
				<br><br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sad1" value="Specific Day">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sam1" value="Specific Month">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="say1" value="Specific Year">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sad1f" value="Specific Day full details">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sam1f" value="Specific Month full details">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="say1f" value="Specific Year full details">
				</form><br><br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user1"  >
				</form>
				</center>
				<?php
				}
				if(isset($_POST['sad1']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE DAY:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="searcha_by_day1" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence1"  >
				</form>
				<?php
				}
				if(isset($_POST['searcha_by_day1']))	
				{
					$query = "SELECT COUNT(*) as count FROM user1attend WHERE Date = '$_POST[day]' ";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>DAY:<?php echo $_POST['day']?></b></h3></center>
					<?php
					 while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					  if($row['count']>=1)
					  {
					  ?>
					 <p class="double"> <b>Present</b></p>
					<?php
					$query2 = "SELECT COUNT(Distinct Date) as count1 FROM user1attend WHERE Date = '$_POST[day]' and TIME>='07:00:00' and TIME<='15:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>First Half:<?php echo $row['count1']?></b></p>
					<?php
				  }
				    $query2 = "SELECT COUNT(Distinct Date) as count2 FROM user1attend WHERE Date = '$_POST[day]' and TIME>='17:00:00' and TIME<='22:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>Second Half:<?php echo $row['count2']?></b></p>
					<?php
				  }
					  }
					else
					{
					 ?>
					 <p class="double"> <b>Absent</b></p>
					<?php	
					}
				  }
				  ?>
				   <form action="" method="post">	 
				<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="sad1"  ></center>
				</form>
				<?php
			   }
			   if(isset($_POST['sam1']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE Month:</b>&nbsp;&nbsp; <input type="month" name="mon">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="searcha_by_month1" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence1"  >
				</form>
				<?php
				}
				if(isset($_POST['searcha_by_month1']))	
				{
					 $Period = explode('-',$_POST['mon']);
					$query1 = "SELECT COUNT( DISTINCT Date) as count FROM user1attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]'";
					$query_run1 = mysqli_query($connection,$query1);
					?>
					<br><br><br><br><br><br><br>
					<center><h4 class="asd" <b>MONTH:<?php echo $_POST['mon']?></b></h4></center>
					<?php
					 while ($row = mysqli_fetch_assoc($query_run1)) 
			      {
					?>
					 <p class="double"> <b>No. of Days Present:<?php echo $row['count']?></b></p>
					<?php
				  }
				   $query2 = "SELECT COUNT(Distinct Date) as count1 FROM user1attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]' and TIME>='07:00:00' and TIME<='14:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>First Half:<?php echo $row['count1']?></b></p>
					<?php
				  }
				    $query2 = "SELECT COUNT(Distinct Date) as count2 FROM user1attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]' and TIME>='18:00:00' and TIME<='22:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>Second Half:<?php echo $row['count2']?></b></p>
					<?php
				  }
					?>
				  <form action="" method="post">	 
				<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="sam1"  ></center>
				</form>
				<?php
			   }
			   ?>
			   <?php
			      if(isset($_POST['say1']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE YEAR:</b>&nbsp;&nbsp;<select type="numeric" name="yr" id="yr" >
					  <option value="2021">2021</option>
					  <option value="2020">2020</option>
					  <option value="2019">2019</option>
					</select>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="searcha_by_yr1" value="Search">				
				</form><br><br>
				<br>
				</center>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence1"  >
				</form>
				 <?php
				}
				?>
			   <?php
			   if(isset($_POST['searcha_by_yr1']))	
				{
					$query = "SELECT COUNT( DISTINCT Date) as count FROM user1attend WHERE YEAR(Date)='$_POST[yr]' ";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>YEAR:<?php echo $_POST['yr']?></b></h3></center>
					<?php
					 while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					?>
					 <p class="double"> <b>No. of Days Present:<?php echo $row['count']?></b></p>
					<?php
				  }
				   $query2 = "SELECT COUNT(Distinct Date) as count1 FROM user2attend WHERE YEAR(Date)='$_POST[yr]' and TIME>='07:00:00' and TIME<='14:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>First Half:<?php echo $row['count1']?></b></p>
					<?php
				  }
				    $query2 = "SELECT COUNT(Distinct Date) as count2 FROM user2attend WHERE YEAR(Date)='$_POST[yr]' and TIME>='18:00:00' and TIME<='22:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>Second Half:<?php echo $row['count2']?></b></p>
					<?php
				  }
				  ?>
				  <form action="" method="post">	 
				<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="say1"  ></center>
				</form>
				<?php
			   }
			    if(isset($_POST['sad1f']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE DAY:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_day1f" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence1"  >
				</form>
				<?php
				}
				 if(isset($_POST['search_by_day1f']))	
				{
					f2('search_by_day1f',$_POST['day'],$connection);
				}
				 if(isset($_POST['sam1f']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE MONTH:</b>&nbsp;&nbsp; <input type="month" name="mon">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_mon1f" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence1"  >
				</form>
				<?php
				}
				 if(isset($_POST['search_by_mon1f']))	
				{
					f2('search_by_mon1f',$_POST['mon'],$connection);
				}
				 if(isset($_POST['say1f']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE YEAR:</b>&nbsp;&nbsp; <select name="yr" id="yr" required>
					  <option value="2021">2021</option>
					  <option value="2020">2020</option>
					  <option value="2019">2019</option>
					</select>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_yr1f" value="Search">				
				</form><br><br>
				<br>
				</center>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence1"  >
				</form>
				<?php
				}
				?>
				<?php
				 if(isset($_POST['search_by_yr1f']))	
				{
					f2('search_by_yr1f',$_POST['yr'],$connection);
				}
				if(isset($_POST['user2']))
			   {
				?>
				<center>
				<form action="" method="post">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="addt2" value="ADD TRANSACTION">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seebalance2" value="SEE CURRENT BALANCE">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seelasttransaction2" value="SEE LAST TRANSACTION">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seespecificdaytrandaction2" value="SEE TRANSACTION OF SPECIFIC DAY">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seespecificmonthtrandaction2" value="SEE TRANSACTION OF SPECIFIC MONTH">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="seeattendence2" value="SEE ATTENDENCE">
				</form><br><br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				</center>
				<?php
			   }
			   if(isset($_POST['addt2']))
				{
				?>
					<center><h3>Fill the given details</h3></center>
					<form action="user2new_tran.php" method="post">	  	  
					<table>
					<tr>
					<td><b>TRANSACTION DATE:</b></td>
					<td><input type="date" placeholder="ENTER TRANSACTION DATE" name="tdd" required></td>
					</tr>
					<tr>
					<td><b>AMOUNT:</b></td>
					<td><input type="number" placeholder="ENTER AMOUNT" name="am" min="1" required></td>
					</tr>
				    <tr>
				    <td><b>TYPE:</b></td>
				    <td><select name="typ" id="typ" required>
					  <option value="DEBIT">DEBIT</option>
					  <option value="CREDIT">CREDIT</option>
					</select></td>
				    </tr>
				    </table>
				    <br>
					<input type="hidden" id="phpd" name="phpd" value="3">
				    <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="SAVE" value="Save">		
					</form>
				    <br>
					<br>
				    <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user2"  >
				</form>
                <?php					
				}
				if(isset($_POST['seespecificdaytrandaction2']))
				{
				?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER BY DAY:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_day2" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user2"  >
				</form>
				<?php
				}
				if(isset($_POST['search_by_day2']))
				{
				f1("Transaction_DATE",$_POST['day'],$connection,"search_by_day2");
				}
				if(isset($_POST['seespecificmonthtrandaction2']))
				{
				?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER BY MONTH:</b>&nbsp;&nbsp; <input type="month" name="month">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_month2" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user2"  >
				</form>
				<?php
				}
				if(isset($_POST['search_by_month2']))
				{
				f1("Transaction_DATE",$_POST['month'],$connection,"search_by_month2");
				}
				if(isset($_POST['seelasttransaction2']))
				{
				f1("SNO",1,$connection,"seelasttransaction2");
				}
				if(isset($_POST['seebalance2']))
				{
					$query = "select * from user2sal where SNO = (select MAX(SNO) from user2sal)";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>CURRENT BALANCE:</b></h3></center>
					<?php
			       while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					  ?>
					 <p class="double"> <b><?php echo $row['Current_Balance']?></b></p>
					<?php
				  }
				  ?>
				  <br>
			    <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user2"  >
				</form>
				<?php
				}
				
				if(isset($_POST['seeattendence2']))	
				{
					?>
				<center>
				<form action="" method="post">
				<br><br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sad2" value="Specific Day">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sam2" value="Specific Month">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="say2" value="Specific Year">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sad2f" value="Specific Day full details">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="sam2f" value="Specific Month full details">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="say2f" value="Specific Year full details">
				</form><br><br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="user2"  >
				</form>
				</center>
				<?php
				}
				if(isset($_POST['sad2']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE DAY:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="searcha_by_day2" value="Search">				
				</form><br><br>
				</center>
				<br>
				<form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence2"  >
				</form>
				<?php
				}
				if(isset($_POST['searcha_by_day2']))	
				{
					$query = "SELECT COUNT(*) as count FROM user2attend WHERE Date = '$_POST[day]' ";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>DAY:<?php echo $_POST['day']?></b></h3></center>
					<?php
					 while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					  if($row['count']>=1)
					  {
					  ?>
					 <p class="double"> <b>Present</b></p>
					<?php
					$query2 = "SELECT COUNT(Distinct Date) as count1 FROM user2attend WHERE Date = '$_POST[day]' and TIME>='07:00:00' and TIME<='15:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>First Half:<?php echo $row['count1']?></b></p>
					<?php
				  }
				    $query2 = "SELECT COUNT(Distinct Date) as count2 FROM user2attend WHERE Date = '$_POST[day]' and TIME>='17:00:00' and TIME<='22:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>Second Half:<?php echo $row['count2']?></b></p>
					<?php
				  }
					  }
					else
					{
					 ?>
					 <p class="double"> <b>Absent</b></p>
					<?php	
					}
				  }
				  ?>
				  <form action="" method="post">	 
				<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="sad2"  ></center>
				</form>
				<?php
			   }
			   if(isset($_POST['sam2']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE Month:</b>&nbsp;&nbsp; <input type="month" name="mon">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="searcha_by_month2" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence2"  >
				</form>
				<?php
				}
				if(isset($_POST['searcha_by_month2']))	
				{
					 $Period = explode('-',$_POST['mon']);
					$query1 = "SELECT COUNT( DISTINCT Date) as count FROM user2attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]'";
					$query_run1 = mysqli_query($connection,$query1);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>MONTH:<?php echo $_POST['mon']?></b></h3></center>
					<?php
					 while ($row = mysqli_fetch_assoc($query_run1)) 
			      {
					?>
					 <p class="double"> <b>No. of Days Present:<?php echo $row['count']?></b></p>
					<?php
				  }
				   $query2 = "SELECT COUNT(Distinct Date) as count1 FROM user2attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]' and TIME>='07:00:00' and TIME<='14:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>First Half:<?php echo $row['count1']?></b></p>
					<?php
				  }
				    $query2 = "SELECT COUNT(Distinct Date) as count2 FROM user2attend WHERE YEAR(Date)='$Period[0]' and MONTH(Date)='$Period[1]' and TIME>='18:00:00' and TIME<='22:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>Second Half:<?php echo $row['count2']?></b></p>
					<?php
				  }
					?>
				  <form action="" method="post">	 
				<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="sam2"  ></center>
				</form>
				<?php
			   }
			      if(isset($_POST['say2']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE Year:</b>&nbsp;&nbsp;<select name="yr" id="yr" required>
					  <option value="2021">2021</option>
					  <option value="2020">2020</option>
					  <option value="2019">2019</option>
					</select>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="searcha_by_yr2" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence2"  >
				</form>
				<?php
				}
			   if(isset($_POST['searcha_by_yr2']))	
				{
					$query = "SELECT COUNT( DISTINCT Date) as count FROM user2attend WHERE YEAR(Date)='$_POST[yr]' ";
					$query_run = mysqli_query($connection,$query);
					?>
					<br><br><br><br><br><br><br>
					<center><h3 class="asd" <b>YEAR:<?php echo $_POST['yr']?></b></h3></center>
					<?php
					 while ($row = mysqli_fetch_assoc($query_run)) 
			      {
					?>
					 <p class="double"> <b>No.of Days Present:<?php echo $row['count']?></b></p>
					<?php
				  }
				    $query2 = "SELECT COUNT(Distinct Date) as count1 FROM user2attend WHERE YEAR(Date)='$_POST[yr]' and TIME>='07:00:00' and TIME<='14:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>First Half:<?php echo $row['count1']?></b></p>
					<?php
				  }
				    $query2 = "SELECT COUNT(Distinct Date) as count2 FROM user2attend WHERE YEAR(Date)='$_POST[yr]' and TIME>='18:00:00' and TIME<='22:00:00'";
					$query_run2 = mysqli_query($connection,$query2);
					while ($row = mysqli_fetch_assoc($query_run2)) 
			      {
					?>
					 <p > <b>Second Half:<?php echo $row['count2']?></b></p>
					<?php
				  }
				?>
				  <form action="" method="post">	 
				<center><input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="say2"  ></center>
				</form>
				<?php
			   }
			   if(isset($_POST['sad2f']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE DAY:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_day2f" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence2"  >
				</form>
				<?php
				}
				 if(isset($_POST['searcha_by_day2f']))	
				{
					f2('searcha_by_day2f',$_POST['day'],$connection);
				}
				 if(isset($_POST['sam2f']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE MONTH:</b>&nbsp;&nbsp; <input type="month" name="mon">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_mon2f" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence2"  >
				</form>
				<?php
				}
				 if(isset($_POST['search_by_mon2f']))	
				{
					f2('search_by_mon2f',$_POST['mon'],$connection);
				}
				 if(isset($_POST['say2f']))	
				{
					?>
					<center>
				<form action="" method="post">
				<br><br><br><br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER THE YEAR:</b>&nbsp;&nbsp; <select name="yr" id="yr" required>
					  <option value="2021">2021</option>
					  <option value="2020">2020</option>
					  <option value="2019">2019</option>
					</select>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_yr2f" value="Search">				
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="seeattendence2"  >
				</form>
				<?php
				}
				 if(isset($_POST['search_by_yr2f']))	
				{
					f2('search_by_yr2f',$_POST['yr'],$connection);
				}
				 if(isset($_POST['maintenance']))
			{
				?>
				<form action="" method="post">
				<br><br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="feed_datam" value="FEED DATA">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_datam" value="SEARCH FOR DATA">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="edit_datam" value="EDIT DATA">
				</form><br><br>
				 <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="back" value="BACK" onClick="Javascript:window.location.href = 'admin_dashboard.php';" >
				</center>
				<?php
			}
				if(isset($_POST['feed_datam']))
				{
				?>
				<br><br>
					<center><a>Fill the given details</a></center>
					<br>
					<form action="maintenance.php" method="post" autocomplete="off">	  	  
					<table>
					<tr>
					<td><b>ENTER REFERENCE ID:</b></td>
					<td><input type="text" placeholder="ENTER REFERENCE ID" name="ref" required></td>
					</tr>
					<tr>
					<td><b>ENTER DATE:</b></td>
					<td><input type="date" placeholder="ENTER DATE" name="tdd" required></td>
					</tr>
					<tr>
					<td><b>ENTER PURPOSE:</b></td>
					<td><input type="text" placeholder="ENTER PURPOSE" name="pur" required></td>
					</tr>
				    <tr>
				    <td><b>ENTER AMOUNT:</b></td>
				   <td><input type="number" placeholder="ENTER AMOUNT" name="am" min="1" required></td>
				    </tr>
				    </table>
				    <br>
					<input type="hidden" id="phpd" name="phpd" value="3">
				    <input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="SAVE" value="Save">		
					</form>
				    <br>
					<br>
				  <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="maintenance"  >
				</form>
                <?php					
				}
				if(isset($_POST['edit_datam']))
				{
				?>
				<center>
				<form action="" method="post">
				<br><br><br><br><br>
				&nbsp;&nbsp;<b>ENTER REFERENCE ID:</b>&nbsp;&nbsp; <input type="text" name="rid">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_id_for_editm" value="Search">
				<br><br>
				<h4><b><u>OR</u></b></h4><br>
				&nbsp;&nbsp;<b>ENTER DATE:</b>&nbsp;&nbsp; <input type="date" name="day">
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_date_for_editm" value="Search">
				</form><br><br>
				</center>
				<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="maintenance"  >
				</form>
				<?php
			}
			if(isset($_POST['search_by_id_for_editm']))
			{
				$query = "select * from maintenance where REFERENCE_ID = '$_POST[rid]'";
				$query_run = mysqli_query($connection,$query);
				$c=1;
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					$c=0;
					?>
					<form action="editm_ref.php" method="post" autocomplete="off">
					<?php
						m($row);
						?>					
					</form>
					<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="edit_datam"  >
				</form>
					<?php
				}
				if($c==1)
				{	
			   ?>
			<script type="text/javascript">
				alert("NO SUCH DATA AVAILABLE.");
				window.location.href = "admin_dashboard.php";
		      </script>
			  <?php
			  }
			}
			if(isset($_POST['search_by_date_for_editm']))
			{
				$query = "select * from maintenance where Date = '$_POST[day]'";
				$query_run = mysqli_query($connection,$query);
				$c=1;
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					$c=0;
					?>
					<form action="editm_day.php" method="post" autocomplete="off">
					<?php
						m($row);
						?>					
					</form>
					<br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="edit_datam"  >
				</form>
					<?php
				}
				if($c==1)
				{	
			   ?>
			<script type="text/javascript">
				alert("NO SUCH DATA AVAILABLE.");
				window.location.href = "admin_dashboard.php";
		      </script>
			  <?php
			  }
			}
				if(isset($_POST['search_datam']))
			{
				?>
				<center>
				<form action="searchm.php" method="post">
				<br><br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_ridm" value="SEARCH BY REFERENCE ID">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_dm" value="SEARCH BY DATE">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_mm" value="SEARCH BY MONTH">
				<br><br>
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" name="search_by_pm" value="SEARCH BY PURPOSE">
				</form><br><br>
				 <form action="" method="post">	 
				<input class="btn btn-outline-success btn-sm my-sm-0 bg-dark ml-auto text-light" type="submit" value="BACK" name="maintenance"  >
				</form>
				</center>
				<?php
			}
			?>			
		</div>
	</div>
	</div>
	</div>
</center>
</body>
</html>
