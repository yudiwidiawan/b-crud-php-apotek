<?php session_start(); ?>
<html>
<head>
	<title>Login</title>
</head>

<body>
<a href="index.php">Home</a> <br />
<?php
include("connection.php");

if(isset($_POST['submit'])) {
	$kode_supplier = mysqli_real_escape_string($mysqli, $_POST['kode_supplier']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($kode_supplier == "" || $pass == "") {
		echo "Either kode_supplier or password field is empty.";
		echo "<br/>";
		echo "<a href='login.php'>Go back</a>";
	} else {
		$result = mysqli_query($mysqli, "SELECT * FROM supplier WHERE kd_supplier='$kode_supplier' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['kd_supplier'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['nama_supplier'] = $row['nama_supplier'];
			$_SESSION['kd_supplier'] = $row['kd_supplier'];
		} else {
			echo "Invalid username or password.";
			echo "<br/>";
			echo "<a href='login.php'>Go back</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Login</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Kode_Supplier</td>
				<td><input type="text" name="kode_supplier"></td>
			</tr>
			<tr> 
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
