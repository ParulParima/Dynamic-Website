<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"project2");
	$query = "insert into maintenance values('','$_POST[ref]','$_POST[tdd]','$_POST[pur]','$_POST[am]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
		alert("Details edited successfully.");
	<?php
	if($_POST['phpd']==1)
	{
	?>
    window.location.href = "user1_dashboard.php";
	<?php
	}
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