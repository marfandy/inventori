<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header bg-info">
				<h4 class="m-b-0 text-white">Tabel List Peralatan Rusak</h4>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table id="demo-foo-addrow" class="table tablesaw m-t-30 table-hover contact-list" data-tablesaw-mode="swipe" >
						<thead>
							<tr>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Nama Alat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Kategori</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Tanggal</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Model</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Merk,Type & Serie Number</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Pabrik Pembuat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="6">Tahun Perolehan</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="7">Penempatan</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="8">Jumlah</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="9">Nomor Sertifikat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="10">Tahun Sertifikat</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="11">Status</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Keterangan</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Persentase</th>
								<th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Kondisi</th>
							</tr>
						</thead>
						<tbody id="image-popups">
							<?php 
							foreach($get_peralatan as $row){
								?>
								<tr>
									<td data-toggle="tooltip" style="text-align: center;">
										<?php if ($row->gambar == '' OR $row->gambar == NULL) 
										{?>
											<a href="<?php echo base_url()?>assets/images/noimage.png" data-effect="mfp-move-from-top"><img src="<?php echo base_url()?>assets/images/noimage.png" alt="user" width="50" class="img-circle"> <br><?php echo $row->nama_peralatan;?></a>
										<?php } else {?>
											<a href="<?php echo base_url()?>upload/<?php echo $row->gambar;?>" data-effect="mfp-move-from-top"><img src="<?php echo base_url()?>upload/<?php echo $row->gambar;?>" alt="user" width="50" class="img-circle"> <br><?php echo $row->nama_peralatan;?></a>
										<?php } ?>
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
									<td><?php echo date('d F Y', strtotime($row->tgl)); ?></td>
									<td><?php echo $row->model;?></td>
									<td><?php echo $row->type_alat;?></td>
									<td><?php echo $row->pabrik;?></td>
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

<script src="<?php echo base_url()?>assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

<script type="text/javascript">
	$("#alert").fadeOut(6000,function(){
	});

</script>




