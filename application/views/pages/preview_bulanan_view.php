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
				EFISIENSI PERALATAN<br> AIRPORT TECHNOLOGY, NETWORK OPERATION & SUPPORT SECTION<br>
				POSISI BULAN <?php echo strtoupper(date('F Y'));?>
			</b></p>
		</div>

		<br>
		<table align="center" border="1" width="">
			<thead>
				<tr>
					<th rowspan="2">NO</th>
					<th rowspan="2">NAMA PERALATAN</th>
					<th rowspan="2">MERK,TYPE & SERIES NUMBER</th>
					<th rowspan="2">TAHUN PEROLEHAN</th>
					<th rowspan="2">STATUS</th>
					<th rowspan="2">EFISIENSI KEGUNAAN</th>
					<th rowspan="2">TOTAL KERUSAKAN</th>
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
							<td colspan="8" style="background-color: #b366ff"><?php echo $main->nama_kategori_peralatan; ?></td>
							<?php 
							$sub_kategori = $this->db->query("SELECT * FROM sub_kategori_peralatan where main_kategori='$main->id_main_kategori_peralatan' ORDER BY main_kategori,id_sub_kategori_peralatan ASC");
							foreach ($sub_kategori->result() as $sub) {
								?>
								<tr>
									<td></td>
									<td colspan="8" style="background-color: #cc99ff" ><?php echo $sub->nama_sub_kategori; ?></td>
								</tr>
								<?php
								$peralatan = $this->db->query("SELECT * FROM data_peralatan WHERE main_kategori = '$main->id_main_kategori_peralatan' AND sub_kategori = '$sub->id_sub_kategori_peralatan' ORDER BY main_kategori,sub_kategori,id_peralatan ASC");
								foreach ($peralatan->result() as $alat)
								{
									?>
									<tr>
										<td></td>
										<td><?php echo $alat->nama_peralatan;?></td>
										<td style="text-align: center;"><?php echo $alat->type_alat;?></td>
										<td style="text-align: center;"><?php echo $alat->tahun_perolehan;?></td>
										<td style="text-align: center;"><?php echo $alat->status;?></td>
										<td style="text-align: center;">
											<?php
											$tgl = $this->input->post('bulan2');
											$bulan = date('m', strtotime($tgl));
											$tahun = date('Y', strtotime($tgl));
											$total = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
											$query = $this->db->query("SELECT count(nama_peralatan) AS total FROM laporan_peralatan WHERE nama_peralatan ='$alat->nama_peralatan' AND kondisi ='Rusak' AND COALESCE(to_char(tgl, 'YYYY-MM'),'') = '$tgl'");
											$total_rusak = $query->row('total');
											$rusak = $total - $total_rusak;
											$hasil = ($rusak * 100 )/ $total;
											echo number_format($hasil,2)." %";
											?>
										</td>
										<td style="text-align: center;"><?php echo $total_rusak; ?></td>
										<td style="text-align: center;"><?php echo $alat->kondisi;?></td>
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

