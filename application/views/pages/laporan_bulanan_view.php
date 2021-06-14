<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Tabel Laporan Bulanan</h4>
            </div>

            <div class="card-body">
                <div class="col-12">
                    <form method="POST" action="<?php echo base_url()?>laporan/laporan_bulanan">
                        <div class="col-lg-6 col-xlg-6 m-b-30">
                            <div class="row">
                                <div class="example">
                                    <h5 class="box-title m-t-30">Pilih Bulan</h5>
                                    <?php $tgl = $this->input->post('bulan'); ?>
                                    <div class="input-group">
                                        <input name="bulan" type="month" class="form-control mydatepicker" value="<?php echo $tgl; ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-info waves-effect waves-light" name="cari" type="submit"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div <?php if($this->input->post('bulan') == NULL ) {echo "style='display: none'";} else { echo "";} ?>>
                        <div class="col-lg-6 col-xlg-6 m-b-30">
                            <form method="POST" action="<?php echo base_url()?>laporan/preview_bulanan" target="_blank">
                                <input type="hidden" name="bulan2" value="<?php echo $this->input->post('bulan'); ?>">
                                <button name="priview" class="btn btn-outline-secondary waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-eye"></i></span> Preview</buttn>
                                <button name="export" class="btn btn-outline-secondary waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-file-excel-o"></i> </span> Export Excel</button>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table id="demo-foo-addrow" class="table tablesaw m-t-30 table-hover contact-list" data-tablesaw-mode="swipe" >
                                <thead>
                                    <tr>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Nama Alat</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Kategori</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Sub Kategori</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="1">Merk,Type & Serie Number</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="2">Tahun Perolehan</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="3">Status</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Efisiensi Kegunaan</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Total Kerusakan</th>
                                        <th scope="col" data-tablesaw-sortable-col data-tablesaw-priority="persist">Kondisi Akhir</th>
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
                                            <td><?php echo $row->type_alat;?></td>
                                            <td><?php echo $row->tahun_perolehan;?></td>
                                            <td><?php echo $row->status;?></td>
                                            <td>
                                                <?php
                                                $tgl = $this->input->post('bulan');
                                                $bulan = date('m', strtotime($tgl));
                                                $tahun = date('Y', strtotime($tgl));
                                                $total = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
                                                $query = $this->db->query("SELECT count(nama_peralatan) AS total FROM laporan_peralatan WHERE nama_peralatan ='$row->nama_peralatan' AND kondisi ='Rusak' AND COALESCE(to_char(tgl, 'YYYY-MM'),'') = '$tgl'");
                                                $total_rusak = $query->row('total');
                                                $rusak = $total - $total_rusak;
                                                $hasil = ($rusak * 100 )/ $total;
                                                echo number_format($hasil,2)." %";
                                                ?>
                                            </td>
                                            <td><?php echo $total_rusak; ?></td>
                                            <td>
                                                <?php 
                                                if ($row->kondisi == 'Baik'){
                                                    $label = "success";
                                                }else {
                                                    $label = "danger";
                                                }
                                                ?>
                                                <span class="label label-<?php echo $label; ?>  ">
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