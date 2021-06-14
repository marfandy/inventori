<script type="text/javascript">
	function isNumberKey(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;

		return true;
	}
</script>
<?php
$info =$this->session->flashdata('info');
if(!empty($info))
{ 
	?>  
	<div id="alert" class="alert alert-block alert-success">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<i class="ace-icon fa fa-check green"></i>
		<?php echo $info; ?>
	</div>
	<?php
} 

?>

<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Tabel List Peralatan</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="demo-foo-addrow" class="table tablesaw m-t-30 table-hover contact-list" data-tablesaw-mode="swipe" >
						<thead>
							<tr>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Nama Alat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Kategori</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Sub Kategori</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Model</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Merk,Type & Serie Number</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Pabrik Pembuat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="4">Daya</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="5">Frekuensi</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Tahun Perolehan</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">Penempatan</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">Jumlah</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">Nomor Sertifikat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">Tahun Sertifikat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">Status</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="12">Keterangan</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Persentase</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Kondisi</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($get_peralatan as $row){
								?>
								<tr>
									<td data-toggle="tooltip" data-original-title="Edit">
										<a href="javascript:void(0)" onclick="myFunction<?php echo $row->id_peralatan;?>()" data-toggle="modal" data-target="#edit_alat<?php echo $row->id_peralatan;?>"><?php echo $row->nama_peralatan;?></a>
									</td>
									<td>
										<?php 
										foreach($get_main as $main){
											if($main->id_main_kategori_peralatan == $row->main_kategori){
												echo $main->nama_kategori_peralatan;
											}else{
												echo "";
											}
										} 
										?>		
									</td>
									<td>
										<?php 
										foreach($get_sub as $sub){
											if($sub->id_sub_kategori_peralatan == $row->sub_kategori){
												echo $sub->nama_sub_kategori;
											}else{
												echo "";
											}
										} 
										?>											
									</td>
									<td><?php echo $row->model;?></td>
									<td><?php echo $row->type_alat;?></td>
									<td><?php echo $row->pabrik;?></td>
									<td><?php echo $row->daya;?></td>
									<td><?php echo $row->frekuensi;?></td>
									<td><?php echo $row->tahun_perolehan;?></td>
									<td><?php echo $row->penempatan;?></td>
									<td><?php echo $row->jumlah;?></td>
									<td><?php echo $row->nomor_sertifikasi;?></td>
									<td><?php echo $row->tahun_sertifikasi;?></td>

									<td><?php echo $row->status;?></td>
									<td><?php echo $row->keterangan;?></td>
									<td>
										<?php
										date_default_timezone_set("Asia/Makassar");
										$now = date('Y');

										if($row->tahun_perolehan == NULL OR $row->tahun_perolehan == '')
										{
											$persen = NULL;
											echo $persen;
										}
										else
										{   
											$tahun_perolehan = $row->tahun_perolehan;
											$persen = (1-($now-$tahun_perolehan)/10)*100;
											echo $persen." %";
										}
										?>
									</td>
									<td>
										<?php 
										if ($row->kondisi == 'Baik'){
											$label = "success";
										}else {
											$label = "danger";
										}
										?>
										<span class="label label-<?php echo $label; ?>	">
											<?php echo $row->kondisi;?>		
										</span>
									</td>
									<td>
										<button type="button" title="Delete" class="btn btn-sm btn-icon btn-outline-danger" data-toggle="modal" data-target=".dalete<?php echo $row->id_peralatan;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
									</td>
								</tr>
								<div class="modal fade dalete<?php echo $row->id_peralatan;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
									<div class="modal-dialog modal-dialog-centered modal-sm">
										<form method="POST" action="<?php echo base_url();?>manage/delete_peralatan">

											<div class="modal-content">
												<div class="modal-header" style="text-align: center;">
													<h4 class="modal-title" id="mySmallModalLabel" style="margin: 0 auto; font-weight: bold;">Hapus <?php echo $row->nama_peralatan;?></h4>
												</div>
												<input style="display: none;" type="text" name="id_peralatan" class="form-control" value="<?php echo $row->id_peralatan;?>">

												<div class="modal-body" style="text-align: center;">
													Yakin untuk menghapus data peralatan <?php echo $row->nama_peralatan;?> ? 
												</div>
												<div class="modal-footer">
													<button type="submit" class="btn btn-info waves-effect">Ya</button>
													<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
												</div>
											</div>
										</form>
									</div>
								</div>

								<div id="edit_alat<?php echo $row->id_peralatan;?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<form method="POST" action="<?php echo base_url();?>manage/update_peralatan">

												<from class="form-horizontal form-material">
													<div class="modal-header">
														<h4 class="modal-title" id="myModalLabel" style="margin: 0 auto; font-weight: bold;">Edit <?php echo $row->nama_peralatan;?></h4>
													</div>
													<div class="modal-body">
														<div class="form-body">
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Nama Peralatan</label>
																		<div class="col-md-9">
																			<input type="text" name="nama_peralatan" class="form-control" value="<?php echo $row->nama_peralatan;?>">
																			<input style="display: none;" type="text" name="id_peralatan" class="form-control" value="<?php echo $row->id_peralatan;?>">
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Model</label>
																		<div class="col-md-9">
																			<input type="text" name="model" class="form-control" value="<?php echo $row->model;?>">
																		</div>
																	</div>
																</div>

															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Kategori</label>
																		<div class="col-md-9">
																			<select class="form-control custom-select" name="main_kategori" id="main_kategori<?php echo $row->id_peralatan;?>">
																				<?php foreach ($get_main as $row1) {
																					?>  
																					<option <?php if($row1->id_main_kategori_peralatan == $row->main_kategori) {echo "selected";} ?> value="<?php echo $row1->id_main_kategori_peralatan;?>"><?php echo $row1->nama_kategori_peralatan; ?></option>
																				<?php } ?>
																			</select>
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Sub Kategori</label>
																		<div class="col-md-9">
																			<select class="form-control custom-select" name="sub_kategori" id="sub_kategori<?php echo $row->id_peralatan;?>">
																			</select>
																		</div>
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Merk,Type & Serie Number</label>
																		<div class="col-md-9">
																			<input type="text" name="type_alat" class="form-control" value="<?php echo $row->type_alat;?>">
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Pabrik Pembuat</label>
																		<div class="col-md-9">
																			<input type="text" name="pabrik" class="form-control" value="<?php echo $row->pabrik;?>">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Daya</label>
																		<div class="col-md-9">
																			<input type="text" name="daya" class="form-control" value="<?php echo $row->daya;?>">
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Frekuensi</label>
																		<div class="col-md-9">
																			<input type="text" name="frekuensi" class="form-control" value="<?php echo $row->frekuensi;?>">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Tahun Perolehan</label>
																		<div class="col-md-9">
																			<input type="text" name="tahun_perolehan" class="form-control" maxlength="4" onkeypress="return isNumberKey(event)" value="<?php echo $row->tahun_perolehan;?>">
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Penempatan</label>
																		<div class="col-md-9">
																			<input type="text" name="penempatan" class="form-control" value="<?php echo $row->penempatan;?>">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Jumlah</label>
																		<div class="col-md-9">
																			<input type="text" name="jumlah" class="form-control" onkeypress="return isNumberKey(event)" value="<?php echo $row->jumlah;?>">
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Kondisi</label>
																		<div class="col-md-9">
																			<select class="form-control custom-select" name="kondisi" id="kondisi">
																				<option <?php if($row->kondisi == 'Baik') echo "selected"; ?> value="Baik">Baik</option>
																				<option <?php if($row->kondisi == 'Rusak') echo "selected"; ?> value="Rusak">Rusak</option>
																			</select>
																		</div>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Nomor Sertifikasi</label>
																		<div class="col-md-9">
																			<input type="text" name="nomor_sertifikasi" class="form-control" value="<?php echo $row->nomor_sertifikasi;?>">
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Tahun Sertifikasi</label>
																		<div class="col-md-9">
																			<input type="text" name="tahun_sertifikasi" class="form-control" maxlength="4" onkeypress="return isNumberKey(event)" value="<?php echo $row->tahun_sertifikasi;?>">
																		</div>
																	</div>
																</div>
															</div>

															<div class="row">
																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Status</label>
																		<div class="col-md-9">
																			<input type="text" name="status" class="form-control" value="<?php echo $row->status;?>">
																		</div>
																	</div>
																</div>

																<div class="col-md-6">
																	<div class="form-group row">
																		<label class="control-label text-right col-md-3">Keterangan</label>
																		<div class="col-md-9">
																			<input type="text" name="keterangan" class="form-control"value="<?php echo $row->keterangan;?>">
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" class="btn btn-info waves-effect">Simpan</button>
														<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
													</div>
												</from>
											</form>
										</div>
									</div>
								</div>
								<script type="text/javascript">
									function myFunction<?php echo $row->id_peralatan;?>() {
										var id = $('#main_kategori<?php echo $row->id_peralatan;?>').val();
										$.ajax({
											url : "<?php echo site_url('manage/get_sub_kategori');?>",
											method : "POST",
											data : {id: id},
											async : true,
											dataType : 'json',
											success: function(data){

												var html = '';
												var i;
												for(i=0; i<data.length; i++){
													html += '<option value='+data[i].id_sub_kategori_peralatan+'>'+data[i].nama_sub_kategori+'</option>';
												}
												$('#sub_kategori<?php echo $row->id_peralatan;?>').html(html);

											}
										});
										return false;
									};
									$(document).ready(function(){

										$('#main_kategori<?php echo $row->id_peralatan;?>').change(function(){ 
											var id=$(this).val();
											$.ajax({
												url : "<?php echo site_url('manage/get_sub_kategori');?>",
												method : "POST",
												data : {id: id},
												async : true,
												dataType : 'json',
												success: function(data){

													var html = '';
													var i;
													for(i=0; i<data.length; i++){
														html += '<option value='+data[i].id_sub_kategori_peralatan+'>'+data[i].nama_sub_kategori+'</option>';
													}
													$('#sub_kategori<?php echo $row->id_peralatan;?>').html(html);

												}
											});
											return false;
										}); 
									});

								</script>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="12">
									<div class="text-right">
										<ul class="pagination"> </ul>
									</div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>


<script src="<?php echo base_url()?>assets/node_modules/tablesaw-master/dist/tablesaw.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/tablesaw-master/dist/tablesaw-init.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/footable/js/footable.all.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/pages/footable-init.js"></script>

<script type="text/javascript">
	$("#alert").fadeOut(6000,function(){
	});

</script>




