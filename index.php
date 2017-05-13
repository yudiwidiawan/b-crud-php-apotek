<?php session_start(); ?>
<html>
	<?php
	$judulHal = 'Tentang';
	include('header.php'); ?>
	<div id="content">
	<?php
		if(isset($_SESSION['valid'])) {	
	?>
		<h1>Selamat datang, <?php echo $_SESSION['nama_supplier']; ?> </h1>
		<a href="view.php"><div class="add kotakawal">
				<h5>Lihat dan tambah obat.</h5><br/>
				<h1 style="font-size:72pt;" align="right">+</h1>
			</div>
		</a>
	<?php
		}
	?>
	</div>
	<?php include('footer.php'); ?>	
</body>
</html>
