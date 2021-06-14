<?php 
// header("Content-type: application/vnd-ms-excel");
// header("Content-Disposition: attachment; filename=$title.xls");
// header("Pragma: no-cache");
// header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Preview Laporan Peralatan</title>
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/ap.png">
</head>
<style type="text/css">
	table,th,td{
		border-collapse: collapse;
		padding: 15px;
		margin: 10px;
		color: #000;
		font-size: 12px;
		text-align: center;
	}

</style>
<body>
	<p style="font-size: 10px;">PT. ANGKASAPURA I (PERSERO) <br>CABANG BANDARA INTERNASIONAL SULTAN HASANUDDIN MAKASSAR</P>
		<div style="text-align: center;margin-top: 10px;">
			<p><b>LAPORAN BULANAN<br>
				DATA PERALATAN AIRPORT TECHNOLOGY, NETWORK OPERATION & SUPPORT SECTION<br>
				POSISI BULAN <?php echo strtoupper(date('F Y'));?>
			</b></p>
		</div>

		<br>
		<table align="center" border="1" width="">
			<thead>
				<tr>
					<th rowspan="2">NO</th>
					<th rowspan="2">NAMA PERALATAN</th>
					<th rowspan="2">MODEL</th>
					<th rowspan="2">MERK,TYPE & SERIES NUMBER</th>
					<th rowspan="2">PABRIK PEMBUAT</th>
					<th rowspan="2">DAYA</th>
					<th rowspan="2">FREKUENSI</th>
					<th rowspan="2">TAHUN PEROLEHAN</th>
					<th rowspan="2">PENEMPATAN</th>
					<th rowspan="2">JUMLAH</th>
					<th rowspan="2">KONIDISI</th>
					<th rowspan="2">NOMOR SERTIFIKAT</th>
					<th rowspan="2">TAHUN SERTIFIKASI</th>
					<th rowspan="2">STATUS</th>
					<th rowspan="2">KETERANGAN</th>
				</tr>
			</thead>
			<tbody>
				<tr></tr>
				<?php
				$no = 1;
				foreach ($get_main as $main)
				{
					?>
					<tr>
						<td style="background-color: #b366ff"><?php echo $no; ?></td>
						<td colspan="14" style="background-color: #b366ff"><?php echo $main->nama_kategori_peralatan; ?></td>
						<?php 
						$sub_kategori = $this->db->query("SELECT * FROM sub_kategori_peralatan where main_kategori='$main->id_main_kategori_peralatan' ORDER BY main_kategori,id_sub_kategori_peralatan ASC");
						foreach ($sub_kategori->result() as $sub) {
							?>
							<tr>
								<td></td>
								<td colspan="14" style="background-color: #cc99ff" ><?php echo $sub->nama_sub_kategori; ?></td>
							</tr>
							<?php
							$peralatan = $this->db->query("SELECT * FROM data_peralatan WHERE main_kategori = '$main->id_main_kategori_peralatan' AND sub_kategori = '$sub->id_sub_kategori_peralatan' ORDER BY main_kategori,sub_kategori,id_peralatan ASC");
							foreach ($peralatan->result() as $alat)
							{
								?>
								<tr>
									<td></td>
									<td><?php echo $alat->nama_peralatan;?></td>
									<td style="text-align: center;"><?php echo $alat->model;?></td>
									<td style="text-align: center;"><?php echo $alat->type_alat;?></td>
									<td style="text-align: center;"><?php echo $alat->pabrik;?></td>
									<td style="text-align: center;"><?php echo $alat->daya;?></td>
									<td style="text-align: center;"><?php echo $alat->frekuensi;?></td>
									<td style="text-align: center;"><?php echo $alat->tahun_perolehan;?></td>
									<td style="text-align: center;"><?php echo $alat->penempatan;?></td>
									<td style="text-align: center;"><?php echo $alat->jumlah;?></td>
									<td style="text-align: center;"><?php echo $alat->kondisi;?></td>
									<td style="text-align: center;"><?php echo $alat->nomor_sertifikasi;?></td>
									<td style="text-align: center;"><?php echo $alat->tahun_sertifikasi;?></td>
									<td style="text-align: center;"><?php echo $alat->status;?></td>
									<td style="text-align: center;"><?php echo $alat->keterangan;?></td>
								</tr>
								<?php
							} } ?>
						</tr>
						<?php $no++; } ?>
					</tbody>

				</table>
			</body>
			</html>

