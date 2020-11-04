<?php
if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

 }
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/datajurusan/edit/'.$datajurusan->id_jurusan), 'class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">id datajurusan </label> 
    <div class="col-md-5">
        <input type="text" name="id_jurusan" readonly="true" class="form-control" placeholder="id_jurusan " value="<?php echo $datajurusan->id_jurusan?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nama jurusan</label> 
    <div class="col-md-5">
        <input type="text" name="nama_jurusan" class="form-control" placeholder="nama_jurusan" value="<?php echo $datajurusan->nama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Logo</label> 
    <div class="col-md-5">
       <?php if(!empty($datajurusan->logo)) :  ?>
        <img src="<?=base_url('assets/upload/logojurusan/' . $datajurusan->logo)?>" alt="">
    <?php endif;?>
        <input type="file" name="logo" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Ketua Jurusan</label> 
    <div class="col-md-5">
        <input type="text" name="ketua_jurusan" class="form-control" placeholder="ketua_jurusan " value="<?php echo $datajurusan->ketua_jurusan ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kontak</label> 
    <div class="col-md-5">
        <input type="text" name="kontak" class="form-control" placeholder="kontak " value="<?php echo $datajurusan->kontak ?>" required>
    </div>
</div>
<input type="hidden" name="id_user" value="<?php echo $datajurusan->id_user ?>" required>

<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
   
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $datajurusan->id_jurusan ?>">
        <i class="fa fa-edit"></i>Update
 </button>

 <div class="modal fade" id="update-<?php echo $datajurusan->id_jurusan ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA datajurusan</h4>
        </div>
        <div class="modal-body">
            <div class="callout callout-warning">
                <h4>Peringatan!</h4>
                    Yakin ingin mengubah data ini?
            </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
        <input type="submit" class="btn btn-warning" name="submit" value="Ya">
        </div>
    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

    </div>
</div>

<?php echo form_close(); ?>