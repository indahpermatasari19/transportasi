<?php
if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

 }
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/dataormawa/edit/'.$dataormawa->id_ormawa), 'class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">id dataormawa </label> 
    <div class="col-md-5">
        <input type="text" name="id_ormawa" readonly="true" class="form-control" placeholder="id_ormawa " value="<?php echo $dataormawa->id_ormawa?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Ormawa</label> 
    <div class="col-md-5">
        <input type="text" name="nama_ormawa" class="form-control" placeholder="nama_ormawa" value="<?php echo $dataormawa->nama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Logo</label> 
    <div class="col-md-5">
       <?php if(!empty($dataormawa->logo)) :  ?>
        <img src="<?=base_url('assets/upload/logoormawa/' . $dataormawa->logo)?>" alt="">
    <?php endif;?>
        <input type="file" name="logo" class="form-control">
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Pembina</label> 
    <div class="col-md-5">
        <input type="text" name="pembina" class="form-control" placeholder="pembina " value="<?php echo $dataormawa->pembina ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kontak</label> 
    <div class="col-md-5">
        <input type="text" name="kontak" class="form-control" placeholder="kontak " value="<?php echo $dataormawa->kontak ?>" required>
    </div>
</div>

<input type="hidden" name="id_user" value="<?php echo $dataormawa->id_user ?>" required>

<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
   
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $dataormawa->id_ormawa ?>">
        <i class="fa fa-edit"></i>Update
 </button>

 <div class="modal fade" id="update-<?php echo $dataormawa->id_ormawa ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA ORMAWA</h4>
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