<?php
	$active_user = $_SESSION['username'];
	$unread_messageS = mysqli_query($db_con,"SELECT * FROM messages WHERE seller='$active_user' and message_status='sent' ");
?>

<div id="home_lateral_menu_container">
<div id="home_lateral_menu">
	<a href="home.php"><ul><li>Home</li></ul></a>
	<a href="post_product.php"><ul><li>Sell Product</li></ul></a>
	<a href="profile.php?username=<?php echo $active_user; ?>"><ul><li><?php echo $active_user; ?></li></ul></a>
	<a href="messages.php"><ul><li>Messages <?php if(mysqli_num_rows($unread_messageS)>0){echo '('.mysqli_num_rows($unread_messageS).')';} ?></li></ul></a>
	<a href="php/log_out.php"><ul><li>Log Out</li></ul></a>
</div> <!--home_lateral_menu-->
</div><!--home_lateral_menu_container-->