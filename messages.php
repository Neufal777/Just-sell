<?php
	session_start();
	if (isset($_SESSION['id'])) {
		# code...
	}else{
		header("location: index.php");
	}
	$a_u = $_SESSION['username'];
	include 'php/connection.php';
	mysqli_query($db_con,"UPDATE messages set message_status='readed' where seller='$a_u' ");
	$select_messages = mysqli_query($db_con,"SELECT * FROM messages WHERE seller='$a_u' order by  1 desc");
?>

<html>
<head>
	<title>Messages</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include 'comp/page_header.php'; ?>
<?php include 'comp/bar_menu.php'; ?>

<!-- DISPLAY ALL THE MESSAGES FOR THE ACTIVE USER -->

<div id="all_messages_container">
	<?php
	if (mysqli_num_rows($select_messages)>0) {
		// m_info = message_information
		while ($m_info = $select_messages->fetch_assoc()) {
				
				$mi = array($m_info['product_name'],
							$m_info['message_author'],
							$m_info['message_date'],
							$m_info['message_author_contact'],
							$m_info['message_content'],
							$m_info['product_id']
							);

				echo "<div id='single_message_container'>
	<p style='color:grey;'>Message From: $mi[1]</p><br>
<p style='color:grey;'>Product name: <a style='text-decoration:none; color:#f44336;' target='_blank' href='product.php?product=$mi[5]'>$mi[0]</a></p><br>
<p style='color:grey;'>Date: $mi[2]</p><br>
<p style='color:grey;'>Contact Information: $mi[3]</p><br><br>
<h3 style='color:#f44336; font-style:italic;'>Message</h3><br>
<p style='color:grey;'>$mi[4]</p><br>
</div><!--single_message_container-->";
		}
	}else{
		echo "You Have No Messages";
	}
?>



</div><!--all_messages_container-->
</body>
</html>