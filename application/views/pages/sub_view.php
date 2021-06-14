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
                <h4 class="m-b-0 text-white">Tabel Kategori Peralatan</h4>
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#add-sub">Tambah sub Kategori Baru</button>

                <div class="table-responsive">
                    <table id="demo-foo-addrow" class="table m-t-30 table-hover contact-list" data-page-size="10">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No</th>
                                <th>Nama sub Kategori</th>
                                <th>Nama Kategori</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $no = 1;
                            foreach($get_sub as $sub)
                            {
                                ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                    <td><?php echo $sub->nama_sub_kategori;?></td>
                                    <td>
                                        <?php foreach ($get_main as $main){
                                            if ($main->id_main_kategori_peralatan == $sub->main_kategori )
                                            {
                                                echo $main->nama_kategori_peralatan;
                                            }
                                            else
                                            {
                                                echo "";
                                            }
                                        } ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <button type="button" title="Edit" class="btn btn-sm btn-icon btn-outline-info" data-toggle="modal" data-target="#edit_sub<?php echo $sub->id_sub_kategori_peralatan;?>"><i class="fa fa-edit " aria-hidden="true"></i></button>
                                        <button type="button" title="Delete" class="btn btn-sm btn-icon btn-outline-danger" data-toggle="modal" data-target="#hapus_sub<?php echo $sub->id_sub_kategori_peralatan;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <div id="edit_sub<?php echo $sub->id_sub_kategori_peralatan;?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content">
                                            <form method="POST" action="<?php echo base_url();?>manage/update_sub">

                                                <from class="form-horizontal form-material">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel" style="margin: 0 auto; font-weight: bold;">Edit Kategori</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <from class="form-horizontal form-material">
                                                            <div class="form-group">
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" name="nama_sub_kategori" onkeyup="this.value = this.value.toUpperCase();" class="form-control" value="<?php echo $sub->nama_sub_kategori;?>">
                                                                    <input style="display: none;" type="text" name="id_sub" class="form-control" value="<?php echo $sub->id_sub_kategori_peralatan;?>">
                                                                </div>
                                                                <div class="col-md-12 m-b-20">
                                                                    <select class="form-control custom-select" name="main_kategori" id="main_kategori" required>
                                                                        <option selected value='' >-- MAIN KATEGORI --</option>
                                                                        <?php foreach ($get_main as $row1) {
                                                                            ?>  
                                                                            <option <?php if($row1->id_main_kategori_peralatan == $sub->main_kategori) {echo "selected";} ?> value="<?php echo $row1->id_main_kategori_peralatan;?>"><?php echo $row1->nama_kategori_peralatan; ?></option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </from>


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
                                <div id="hapus_sub<?php echo $sub->id_sub_kategori_peralatan;?>" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content">
                                            <form method="POST" action="<?php echo base_url();?>manage/delete_sub">

                                                <from class="form-horizontal form-material">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel" style="margin: 0 auto; font-weight: bold;">Hapus Kategori</h4>
                                                    </div>
                                                    <div class="modal-body" style="text-align: center;">
                                                        Yakin untuk menghapus Kategori <?php echo $sub->nama_sub_kategori;?> ?
                                                        <input style="display: none;" type="text" name="id_sub" class="form-control" value="<?php echo $sub->id_sub_kategori_peralatan;?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-info waves-effect">Ya</button>
                                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                                                    </div>
                                                </from>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $no++;
                            } 
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2">
                                </td>
                                <div id="add-sub" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form method="POST" action="<?php echo base_url();?>manage/insert_sub">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel" style="margin: 0 auto; font-weight: bold;">Tambah Sub Kategori Baru</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <from class="form-horizontal form-material">
                                                        <div class="form-group">
                                                            <div class="col-md-12 m-b-20">
                                                                <input type="text" onkeyup="this.value = this.value.toUpperCase();" name="nama_sub_kategori" class="form-control" placeholder="Nama Sub Kategori">
                                                            </div>
                                                            <div class="col-md-12 m-b-20">
                                                                <select class="form-control custom-select" name="main_kategori" id="main_kategori" required>
                                                                    <option selected value='' >-- PILIH KATEGORI --</option>
                                                                    <?php foreach ($get_main as $row1) {
                                                                        ?>  
                                                                        <option value="<?php echo $row1->id_main_kategori_peralatan;?>"><?php echo $row1->nama_kategori_peralatan; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </from>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-info waves-effect">Simpan</button>
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <td colspan="3">
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

<script type="text/javascript">
    $("#alert").fadeOut(6000,function(){
    });

</script>

<script src="<?php echo base_url()?>assets/node_modules/tablesaw-master/dist/tablesaw.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/tablesaw-master/dist/tablesaw-init.js"></script>
<script src="<?php echo base_url()?>assets/node_modules/footable/js/footable.all.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/pages/footable-init.js"></script>
