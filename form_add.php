<div id="form-add" class="data-obat">
<a style="float:right;" id="tutup-form" class="btn btn-warning">Batal</a><br/>
<form class="form-horizontal" action="add.php" method="post" name="form1">
	<h4>Tambah Data Obat</h4>
	<div class="form-group">
		<label class="control-label col-sm-2" for="kode_obat">Kode Obat</label>
		<div class="col-sm-10"><input class="form-control" type="text" name="kode_obat"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="nama_obat">Nama Obat</label>
		<div class="col-sm-10"><input class="form-control" type="text" name="nama_obat"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="jenis">Jenis Obat</label>
		<div class="col-sm-10"><input class="form-control" type="text" name="jenis"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="harga">Harga Obat (Rp.)</label>
		<div class="col-sm-10"><input class="form-control" type="text" name="harga"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-sm-2" for="stok">Stok Obat</label>
		<div class="col-sm-10"><input class="form-control" type="number" name="stok"></div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input class="btn btn-primary" type="submit" name="Submit" value="Add">   
		</div>
	</div>
</form>
</div>