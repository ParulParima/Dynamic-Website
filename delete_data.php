<script type="text/javascript">
	if(confirm("Are you sure want to delete ?"))
	{
		document.write("<?php 
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"project2");
		$query = "delete from customer where REFERENCE_ID = $_POST[rid]";
		$query_run = mysqli_query($connection,$query);
		?>");
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
	}
	else
	{
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
	}
</script>