<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"project2");
	$query = "insert into customer values('','$_POST[rid]','$_POST[cname]','$_POST[cphn]','$_POST[caddress]','$_POST[tow]','$_POST[sdof]','$_POST[edof]','$_POST[cdg]','$_POST[cag]','$_POST[tatp]','$_POST[status]','$_POST[ton]')";
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