<div class="card-group">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="icon-note"></i></h3>
                            <p class="text-muted">LAPORAN HARI INI</p>
                        </div>
                        <div class="ml-auto">
                            <a href="#myTable"><h2 class="counter text-primary"><?php echo count($get_report); ?></h2></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="icon-chart"></i></h3>
                            <p class="text-muted">PRESENTASE ALAT < 50%</p>
                        </div>
                        <div class="ml-auto">
                            <a href="<?php echo base_url()?>main/presentase_alat"><h2 class="counter text-cyan">666</h2></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="ti-unlink"></i></h3>
                            <p class="text-muted">TOTAL ALAT RUSAK</p>
                        </div>
                        <div class="ml-auto">
                            <a href="<?php echo base_url()?>main/total_rusak"><h2 class="counter text-purple"><?php echo $count_rusak->total;?></h2></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-purple" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex no-block align-items-center">
                        <div>
                            <h3><i class="icon-wrench"></i></h3>
                            <p class="text-muted">TOTAL ALAT KESELURUHAN</p>
                        </div>
                        <div class="ml-auto">
                            <a href="<?php echo base_url()?>manage"><h2 class="counter text-success"><?php echo $count_all->total;?></h2></a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Column -->
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Tabel Laporan Peralatan <?php echo date('d | M Y'); ?></h4>
            </div>
            <div class="card-body" id="tableload">
                <div class="table-responsive m-t-40">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Presentase</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($get_report as $report){ ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $report->nama_peralatan; ?></td>
                                    <td>
                                        <?php echo $report->kondisi_persen; ?>
                                    </td>
                                    <td><?php echo $report->kondisi;?></td>
                                    <td><?php echo $report->keterangan;?></td>
                                    <td style="text-align: center;">
                                        <button type="button" title="Delete" class="btn btn-sm btn-icon btn-outline-danger" data-toggle="modal" data-target=".dalete<?php echo $report->id_laporan;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <div id="modal<?php echo $report->id_laporan;?>" class="modal fade dalete<?php echo $report->id_laporan;?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <form method="POST" id="delete<?php echo $report->id_laporan;?>">
                                            <div class="modal-content">
                                                <div class="modal-header" style="text-align: center;">
                                                    <h4 class="modal-title" id="mySmallModalLabel" style="margin: 0 auto; font-weight: bold;">Hapus <?php echo $report->nama_peralatan;?></h4>
                                                </div>
                                                <input type="hidden" name="id_laporan" class="form-control" value="<?php echo $report->id_laporan;?>">

                                                <div class="modal-body" style="text-align: center;">
                                                    Yakin untuk menghapus data peralatan <?php echo $report->nama_peralatan;?> ? 
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info waves-effect" id="succes<?php echo $report->id_laporan;?>">Ya</button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    $('#delete<?php echo $report->id_laporan;?>').on('submit', function(e){
                                        e.preventDefault();
                                        $.ajax({
                                            url     : "<?php echo base_url()?>main/delete_report",
                                            method  : "POST",
                                            data    : new FormData(this),
                                            contentType:false,
                                            cache:false,
                                            processData:false,
                                            success : function(data){
                                                setTimeout(function(){location.reload(true);},0);
                                            }
                                        })
                                    });
                                </script>
                                <?php 
                                $no++; 
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Column -->
    <div class="col-lg-4 col-md-12">
        <div class="row">
            <!-- Column -->
            <div class="col-md-12">
                <div class="card bg-danger text-white">
                    <div class="card-body ">
                        <div class="row weather">
                            <div class="col-6 m-t-40">
                                <h3>&nbsp;</h3>
                                <div class="display-4"><a href="<?php echo base_url()?>main/laporan_rusak" class="text-white"><?php echo count($get_rusak);?></a></div>
                                <p class="text-white">TOTAL LAPORAN KERUSAKAN</p>
                            </div>
                            <div class="col-6 text-right">
                                <h1><i class="icon-wrench"></i></h1>
                                <b class="text-white"><?php echo date('F') ?></b>
                                <p class="op-5"><?php echo date('Y') ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
            <div class="col-md-12">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                            <!-- Carousel items -->
                            <div class="carousel-inner" id="image-popups">
                                <?php 
                                $no = 1;
                                foreach($get_rusak as $rusak)
                                {
                                    ?>

                                    <div class="carousel-item <?php if($no == 1) { echo "active"; } else { echo ""; } ?>">
                                        <h4 class="cmin-height"><span class="font-medium"><?php echo $rusak->nama_peralatan; ?></span> <br/><?php echo $rusak->penempatan ?> <br/><?php echo $rusak->keterangan?></h4>
                                        <div class="d-flex no-block">
                                            <span>
                                                <?php if ($rusak->gambar == '' OR $rusak->gambar == NULL) 
                                                {?>
                                                    <a href="<?php echo base_url()?>assets/images/noimage.png" data-effect="mfp-move-from-top"><img src="<?php echo base_url()?>assets/images/noimage.png" alt="user" width="50" class="img-circle"></a>
                                                <?php } else {?>
                                                    <a href="<?php echo base_url()?>upload/<?php echo $rusak->gambar;?>" data-effect="mfp-move-from-top"><img src="<?php echo base_url()?>upload/<?php echo $rusak->gambar;?>" alt="user" width="50" class="img-circle"></a>
                                                <?php } ?>
                                            </span>
                                            <span class="m-l-10">
                                                <h4 class="text-white m-b-0"><?php echo $rusak->keterangan;?></h4>
                                                <p class="text-white"><?php echo date('d - F Y', strtotime($rusak->tgl)); ?></p>
                                            </span>
                                        </div>
                                    </div>
                                    <?php $no++;
                                } 
                                ?>
                                <!-- <div class="carousel-item">
                                    <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                    <div class="d-flex no-block">
                                        <span><img src="../assets/images/users/2.jpg" alt="user" width="50" class="img-circle"></span>
                                        <span class="m-l-10">
                                            <h4 class="text-white m-b-0">Govinda</h4>
                                            <p class="text-white">Actor</p>
                                        </span>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <h4 class="cmin-height">My Acting blown <span class="font-medium">Your Mind</span> and you also <br/>laugh at the moment</h4>
                                    <div class="d-flex no-block">
                                        <span><img src="../assets/images/users/3.jpg" alt="user" width="50" class="img-circle"></span>
                                        <span class="m-l-10">
                                            <h4 class="text-white m-b-0">Govinda</h4>
                                            <p class="text-white">Actor</p>
                                        </span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
    </div>
</div>

<script src="<?php echo base_url()?>assets/node_modules/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();

    });
</script>
