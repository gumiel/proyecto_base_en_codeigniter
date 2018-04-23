<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php echo validation_errors(); ?>
	<p>Hello wold from view /moduleTwo/exampleTwo.php</p>
	<p>Sended data from Controller "Salute: <?php echo $dataSend ?>"</p>
	<?php echo form_open('moduleTwo/exampleTwo/processForm'); ?>
		
		Name: <input type ="text" name="user[name]" ><br>
		Login: <input type ="text" name="user[login]" ><br>
		Password: <input type ="text" name="user[password]" ><br>
		<input type="submit" name="" value="Submit">

	<?php echo form_close(); ?>

</body>
</html>