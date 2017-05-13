<head>
	<title><?php echo isset($judulHal)?$judulHal: 'Apotek B';?></title>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="bootstrap-3.3.7-dist\css\bootstrap.min.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="javascript/jquery.min.js"></script>
	<script src="javascript/main.js"></script>
</head>

<body>
	<div id="header">
		<a href="index.php"><img src="images/apotek-b.png" alt="Apotek-B"/></a>
		<a href="about.php">Tentang</a>
			<?php
			echo "<div id=\"account-panel\">";
			if(isset($_SESSION['valid'])) {			
				include("connection.php");					
				$result = mysqli_query($mysqli, "SELECT * FROM supplier WHERE kd_supplier='" . $_SESSION['kd_supplier'] . "'");
				if($res = mysqli_fetch_array($result)) {
					echo "<a href=\"profil.php\"><p>$res[nama_supplier]</p></a>";
					echo "<div id=\"account-mini-panel\">";
					if(isset($res['gambar'])) {
					echo "<img src=\"images/supplier/" . $res['gambar'] . "\" alt=\"Login\"/>";
					} else {
						echo "<img src=\"images/supplier/profpict_default.png\" alt=\"". $res['nama_supplier'] . "\"/>";
					}
					echo "</div>";
					echo "</div>";
					echo "<div id=\"account-expand-panel\">";
					echo "<img style='float:right;margin-right:7px;' src='images/segitiga_atas.png'/>";
					echo "<ul>";
					echo "<li><a href='pengaturan.php'>Pengaturan</a></li>";
					echo "<li><a href='logout.php'>Keluar</a></li>";
					echo "</ul>";
					echo "</div>";
				}
			?>
				
			<?php	
			} else {
				echo "<a>Masuk</a>";
				echo "<div id=\"account-mini-panel\" class=\"col-md-4\">";
				echo "<img src=\"images/supplier/profpict_default.png\" alt=\"Login\"/>";
				echo "</div>";
				echo "</div>";
				echo "<div id=\"account-expand-panel\" style='width:300px;height:400px;'>";
				echo "<img style='float:right;margin-right:7px;' src='images/segitiga_atas.png'/>";
				echo "<form name=\"form1\" method=\"post\" action=\"login.php\">
					<h4>Masuk Akun</h4>
					<table width=\"100%\" border=\"0\">
						<tr> 
							<td><input type=\"text\" name=\"kode_supplier\" placeholder=\"Kode Supplier\"></td>
						</tr>
						<tr> 
							<td><input type=\"password\" name=\"password\" placeholder=\"Password\"></td>
						</tr>
						<tr> 
							<td><input type=\"submit\" name=\"submit\" value=\"Submit\"></td>
						</tr>
						<tr>
							<td id=\"tanyaakun\">Belum memiliki akun? <a href=\"register.php\">Daftar disini.</a></td>
						</tr>
					</table>
				</form>";
				echo "</div>";
			}
			?>
		</div>