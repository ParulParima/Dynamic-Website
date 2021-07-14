<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"project2");
	$query = "update customer set REFERENCE_ID='$_POST[rid]',NAME='$_POST[cname]',PHONE_NUMBER='$_POST[cphn]',ADDRESS='$_POST[caddress]',TYPE_OF_WORK='$_POST[tow]',STARTING_DATE_OF_WORK='$_POST[sdof]',END_DATE_OF_WORK='$_POST[edof]',DOCUMENTS_GIVEN='$_POST[cdg]',ADVANCE_GIVEN='$_POST[cag]',TOTAL_AMOUNT_TO_PAY='$_POST[tatp]',STATUS_OF_WORK='$_POST[status]',WORK_IS_TAKEN='$_POST[ton]' where NAME= '$_POST[cname]'";
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