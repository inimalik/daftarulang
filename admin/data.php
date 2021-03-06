<?php
session_start();
if(isset($_SESSION['logged']) && !empty($_SESSION['logged'])){
include "../database.php";
include '_header.php';
?>

<div class="container">
	<h2>Data Kelulusan</h2><hr>
	<div class="row col-sm-8">
		<form class="form-horizontal well" method="post" action="data_upload.php" enctype="multipart/form-data">
			<div class="form-group">
				<label for="importCsv" class="col-sm-3 control-label">CSV/Excel File</label>
				<div class="col-sm-9">
					<div class="fileinput fileinput-new input-group" data-provides="fileinput">
						<div class="form-control" data-trigger="fileinput">
							<i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
						</div>
						<span class="input-group-addon btn btn-default btn-file">
							<span class="fileinput-new">Pilih file</span>
							<span class="fileinput-exists">Ganti</span>
							<input type="file" name="file">
						</span>
						<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Buang</a>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<button type="submit" name="submit" class="btn btn-default">Upload</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="row">
	<div class="container table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>NIS</th>
					<th>Cabang</th>
					<th>Unit</th>
					<th>Kelas Asal</th>
					<th>Naik Ke</th>
					<th>Kode Verifikasi</th>
					<th>Nama</th>
			</thead>
			<tbody>
			<?php
			$qsiswa = mysqli_query($db_conn,"SELECT * FROM daful_siswa");
			
			if(mysqli_num_rows($qsiswa) > 0){
				while($data = mysqli_fetch_array($qsiswa)){
					echo '<tr>';
					echo '<td>'.$data['nis'].'</td>';
					echo '<td>'.$data['cabang'].'</td>';
					echo '<td>'.$data['unit'].'</td>';
					echo '<td>'.$data['kelas_asal'].'</td>';
					echo '<td>'.$data['kelas_naik'].'</td>';
					echo '<td>'.$data['kode_verifikasi'].'</td>';
					echo '<td>'.$data['nama'].'</td>';
					echo '</tr>';
				}
			} else {
				echo '<tr><td colspan="19"><em>Belum ada data! Segera lakukan upload data.</em></td></tr>';
			}
			?>
			</tbody>
		</table>
	</div>
</div>
<?php
include '_footer.php';
} else {
	header('Location: ./login.php');
}
?>