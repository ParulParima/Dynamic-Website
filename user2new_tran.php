<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"project2");
	$query = "select * from user2sal where SNO = (select MAX(SNO) from user2sal)";
	$query_run = mysqli_query($connection,$query);
	while ($row = mysqli_fetch_assoc($query_run)) 
	  {
		  $k=$row['Transaction_DATE'];
		 $a=$row['Current_Balance'];
	  }
	  $a1=$_POST["tdd"];
	  $Period1 = explode('-',$a1);
	  $Period2 = explode('-',$k); 
	  if($Period1[1]!=$Period2[1])
	  {
		 $a=$a+8000;
	  }		 
	
	if($_POST['typ']=='DEBIT')
	{
	$query1 = "insert into user2sal values('','$_POST[tdd]','$_POST[am]','$_POST[typ]',$a-'$_POST[am]')";
	}
	else
	{
	$query1 = "insert into user2sal values('','$_POST[tdd]','$_POST[am]','$_POST[typ]',$a+'$_POST[am]')";	
	}
	$query_run1 = mysqli_query($connection,$query1);

?>
<script type="text/javascript">
	alert("Customer added successfully.");
	<?php
	if($_POST['phpd']==2)
	{
	?>
    window.location.href = "user2_dashboard.php";
	<?php
	}	
	if($_POST['phpd']==3)
	{
	?>
    window.location.href = "admin_dashboard.php";
	<?php
	}
	?>
</script>