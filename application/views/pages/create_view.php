
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
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-header bg-info">
                <h4 class="m-b-0 text-white">Input Data Peralatan</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="<?php echo base_url();?>manage/add_peralatan" class="form-horizontal" autocomplete="on">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Nama Alat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="nama_peralatan" class="form-control" placeholder="Nama Alat" required>
                                        <!-- <small class="form-control-feedback"> This is inline help </small>  -->
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Model</label>
                                    <div class="col-md-9">
                                        <input type="text" name="model" class="form-control" placeholder="Model">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kategori</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="main_kategori" id="main_kategori" required>
                                            <option selected value='' >-- MAIN KATEGORI --</option>
                                            <?php foreach ($get_main as $row1) {
                                                ?>  
                                                <option value="<?php echo $row1->id_main_kategori_peralatan;?>"><?php echo $row1->nama_kategori_peralatan; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Sub Kategori</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="sub_kategori" id="sub_kategori" required>
                                            <option selected value='' >-- SUB KATEGORI --</option>

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
                                        <input type="text" name="type_alat" class="form-control" placeholder="Type Alat">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Pabrik Pembuat</label>
                                    <div class="col-md-9">
                                        <input type="text" name="pabrik" class="form-control" placeholder="Pabrik">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Daya</label>
                                    <div class="col-md-9">
                                        <input type="text" name="daya" class="form-control" placeholder="Daya">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Frekuensi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="frekuensi" class="form-control" placeholder="Frekuensi">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tahun Perolehan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="tahun_perolehan" class="form-control" placeholder="Tahun Perolehan" maxlength="4" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Penempatan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="penempatan" class="form-control" placeholder="Penempatan">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Jumlah</label>
                                    <div class="col-md-9">
                                        <input type="text" name="jumlah" class="form-control" placeholder="Jumlah" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Kondisi</label>
                                    <div class="col-md-9">
                                        <select class="form-control custom-select" name="kondisi" id="kondisi">
                                            <option selected value='' >-- KONDISI --</option>
                                            <option value="Baik">Baik</option>
                                            <option value="Rusak">Rusak</option>
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
                                        <input type="text" name="nomor_sertifikasi" class="form-control" placeholder="Nomor Sertifikasi">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Tahun Sertifikasi</label>
                                    <div class="col-md-9">
                                        <input type="text" name="tahun_sertifikasi" class="form-control" placeholder="Tahun Sertifikasi" maxlength="4" onkeypress="return isNumberKey(event)">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Status</label>
                                    <div class="col-md-9">
                                        <input type="text" name="status" class="form-control" placeholder="Status">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="control-label text-right col-md-3">Keterangan</label>
                                    <div class="col-md-9">
                                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button type="reset" class="btn btn-inverse">Batal</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"> </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#alert").fadeOut(9000,function(){
        });

        $('#main_kategori').change(function(){ 
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
                    $('#sub_kategori').html(html);

                }
            });
            return false;
        }); 

    });
</script>
