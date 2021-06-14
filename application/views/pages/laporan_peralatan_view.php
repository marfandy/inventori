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
				<div class="col-12">
					<div class="col-lg-6 col-xlg-6 m-b-30">
						<a href="<?php echo base_url()?>laporan/preview_alat" target="_blank" class="btn btn-outline-secondary waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-eye"></i></span> Preview</a>
						<a href="<?php echo base_url()?>laporan/excel_alat" class="btn btn-outline-secondary waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-file-excel-o"></i> </span> Export Excel</a>
					</div>
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
									<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Kondisi</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach($get_peralatan as $row){
									?>
									<tr>
										<td>
											<a href="javascript:void(0)"><?php echo $row->nama_peralatan;?></a>
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

									</tr>
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




