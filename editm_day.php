<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"project2");
	$query = "update maintenance set Reference_ID='$_POST[rid]',Date='$_POST[ed]',Purpose='$_POST[epur]',Amount='$_POST[eam]' where Date='$_POST[ed]'";
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