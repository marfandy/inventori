<style type="text/css">
	.fileContainer {
		overflow: hidden;
		position: relative;
	}

	.fileContainer [type=file] {
		cursor: inherit;
		display: block;
		font-size: 999px;
		filter: alpha(opacity=0);
		min-height: 100%;
		min-width: 100%;
		opacity: 0;
		position: absolute;
		right: 0;
		text-align: right;
		top: 0;
	}
</style>
<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<input type="button" class="btn btn-info btn-rounded" id="buat" value="Buat Laporan">
			</div>
			<div class="col-md-4" id="date">
				<div class="text-center">
					<h5 class="box-title m-t-30">Pilih Tanggal</h5>
					<center>
						<div id="datepicker-inline"></div>
						<input type="hidden" id="my_hidden_input">
					</center>
				</div>
			</div>
		</div>
		<section class="cd-horizontal-timeline" id="report">
			<div class="timeline">
				<div class="events-wrapper">
					<div class="events">
						<ol>
							<?php 
							$no = 1;
							foreach($get_main as $main)
							{
								?>
								<li><a href="#0" data-date="<?php echo $no; ?>/01/2019" class="<?php if($no == 1) echo "selected"; ?>"><?php echo $no;?></a></li>
								<?php $no++; 
							} ?>
						</ol>
						<span class="filling-line" aria-hidden="true"></span>
					</div>
				</div>
				<ul class="cd-timeline-navigation">
					<li><a href="#0" class="prev inactive">Prev</a></li>
					<li><a href="#0" class="next">Next</a></li>
				</ul>
			</div>
			<div class="events-content">
				<ol>
					<?php 
					$no = 1;
					foreach ($get_main as $main)
					{
						?>
						<li class="<?php if($no == 1) echo "selected";?>" data-date="<?php echo $no;?>/01/2019">
							<h2><?php echo $main->nama_kategori_peralatan;?></h2>
							<?php 
							$sub_kategori = $this->db->query("SELECT * FROM sub_kategori_peralatan where main_kategori='$main->id_main_kategori_peralatan' ORDER BY main_kategori,id_sub_kategori_peralatan ASC");
							foreach ($sub_kategori->result() as $sub) {
								?>
								<div class="card-body">
									<?php 
									$query = $this->db->query("SELECT * FROM data_peralatan WHERE main_kategori = '$main->id_main_kategori_peralatan' AND sub_kategori = '$sub->id_sub_kategori_peralatan' ORDER BY main_kategori,sub_kategori,id_peralatan ASC");
									?>
									<h4 class="card-title"><?php echo $sub->nama_sub_kategori; ?></h4>
									<div class="table-responsive">
										<table <?php if($query->num_rows() == 0){ echo "style='display: none'";} ?> class="table table-striped">
											<thead>
												<tr>
													<th>Nama Alat</th>
													<th>Persentase</th>
													<th style="width: 100%">Kondisi</th>
													<th style="text-align: center;">Gambar</th>
													<th>Keterangan</th>
													<th class="text-nowrap">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$peralatan = $this->db->query("SELECT * FROM data_peralatan WHERE main_kategori = '$main->id_main_kategori_peralatan' AND sub_kategori = '$sub->id_sub_kategori_peralatan' ORDER BY main_kategori,sub_kategori,id_peralatan ASC");
												foreach ($peralatan->result() as $alat)
												{
													?>
													<form method="post" id="upload_form<?php echo $alat->id_peralatan;?>" enctype="multipart/form-data"/>
														<tr id="row<?php echo $alat->id_peralatan;?>">
															<td><?php echo $alat->nama_peralatan; ?></td>
															<td style="text-align: center;">
																<?php
																date_default_timezone_set("Asia/Makassar");
																$now = date('Y');

																if($alat->tahun_perolehan == NULL OR $alat->tahun_perolehan == '')
																{
																	$persen = NULL;
																	echo $persen;
																}
																else
																{   
																	$tahun_perolehan = $alat->tahun_perolehan;
																	$persen = (1-($now-$tahun_perolehan)/10)*100;
																	echo $persen." %";
																}
																?>
																<input type="hidden" name="tgl" id="tgl<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->id_peralatan;?>" name="id_peralatan" id="id_peralatan<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->model;?>" name="model" id="model<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->nama_peralatan;?>" name="nama_peralatan" id="nama_peralatan<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->main_kategori;?>" name="main_kategori" id="main_kategori<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->sub_kategori;?>" name="sub_kategori" id="sub_kategori<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->type_alat;?>" name="type_alat" id="type_alat<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->pabrik;?>" name="pabrik" id="pabrik<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->daya;?>" name="daya" id="daya<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->frekuensi;?>" name="frekuensi" id="frekuensi<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->tahun_perolehan;?>" name="tahun_perolehan" id="tahun_perolehan<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->penempatan;?>" name="penempatan" id="penempatan<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->jumlah;?>" name="jumlah" id="jumlah<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $persen;?>" name="kondisi_persen" id="kondisi_persen<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->nomor_sertifikasi;?>" name="nomor_sertifikasi" id="nomor_sertifikasi<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->tahun_sertifikasi;?>" name="tahun_sertifikasi" id="tahun_sertifikasi<?php echo $alat->id_peralatan;?>">
																<input type="hidden" value="<?php echo $alat->status;?>" name="status" id="status<?php echo $alat->id_peralatan;?>">
															</td>
															<td style="width: 100%">
																<select class="form-control custom-select" name="kondisi" id="kondisi">
																	<option <?php if($alat->kondisi == 'Baik') {echo "selected";} ?> value="Baik">Baik</option>
																	<option <?php if($alat->kondisi == 'Rusak') {echo "selected";} ?> value="Rusak">Rusak</option>
																</select>
															</td>
															<td style="text-align: center;">
																<label class="fileContainer">
																	Click here to trigger the file uploader!
																	<input type="file" id="gambar" name="gambar" class="dropify" data-max-file-size="5M" />
																</label>
															</td>
															<td>
																<input class="form-control" type="text" value="<?php echo $alat->keterangan;?>" name="keterangan" id="keterangan<?php echo $alat->id_peralatan;?>">
															</td>
															<td class="text-nowrap">
																<button type="submit" name="simpan" id="simpan<?php echo $alat->id_peralatan;?>" class="btn btn-outline-info" data-toggle="tooltip" data-original-title="Simpan"> <i class="fa fa-save"></i></button>
																<button id="berhasil<?php echo $alat->id_peralatan;?>" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Berhasil"> <i class="fa fa-check"></i></button>
																<button id="hapus<?php echo $alat->id_peralatan;?>" class="btn btn-outline-danger" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close"></i></button>
															</td>
														</tr>
													</form>
													<script type="text/javascript">
														$(document).ready(function() {
															$('#berhasil<?php echo $alat->id_peralatan;?>').hide(0);
															$('#datepicker-inline').on('changeDate', function() {
																var date = $('#tgl<?php echo $alat->id_peralatan;?>').val(
																	$('#datepicker-inline').datepicker('getFormattedDate')
																	)
															});

															$('#hapus<?php echo $alat->id_peralatan;?>').click(function(){
																$('#row<?php echo $alat->id_peralatan;?>').hide(0);
															});

															$('#upload_form<?php echo $alat->id_peralatan;?>').on('submit', function(e){
																e.preventDefault();
																$('#berhasil<?php echo $alat->id_peralatan;?>').show(0);
																$('#simpan<?php echo $alat->id_peralatan;?>').hide(0);
																$('#hapus<?php echo $alat->id_peralatan;?>').hide(0);

																$.ajax({
																	url		: "<?php echo base_url()?>laporan/insert_data",
																	method	: "POST",
																	data 	: new FormData(this),
																	contentType:false,
																	cache:false,
																	processData:false,
																	success	: function(data){
																		// alert(data);
																	}
																})

															});

														});

													</script>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<?php 
							} ?>
						</li>
						<?php $no++; 
					} ?>
				</ol>
			</div>
		</section>
	</div>
</div>



<script src="<?php echo base_url()?>assets/node_modules/horizontal-timeline/js/horizontal-timeline.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/dropify/dist/js/dropify.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/sweetalert.min.js"></script>

<script src="<?php echo base_url()?>assets/node_modules/moment/moment.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>



<script type="text/javascript">
	$(document).ready(function() {
		$('#report').hide(0);
		$('#buat').click(function(){
			if($('#buat').val() == "Buat Laporan" && $('#my_hidden_input').val() == "" ){
				swal({
					text: "Pilih Tanggal Dahulu !!!",
					icon: "warning"
				});			
			} else if($('#buat').val() == "Buat Laporan" && $('#my_hidden_input').val() != "" ){
				$('#report').show(0);
				$('#date').hide(0);
				$('#buat').val('Selesai');				
			} else {
				setTimeout(function(){location.reload(true);},2000); 
				swal({
					text: "Data berhasil di simpan !!!",
					icon: "success",
					button: false,
				});
			}
		});

		jQuery('#datepicker-inline').datepicker({
			todayHighlight: true,
			format: 'yyyy-mm-dd',
		});
		$('#datepicker-inline').on('changeDate', function() {
			var date = $('#my_hidden_input').val(
				$('#datepicker-inline').datepicker('getFormattedDate')
				)

		});
	});
</script>
