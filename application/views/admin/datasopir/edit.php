<?php
if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

 }
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/datasopir/edit/'.$datasopir->id_sopir), 'class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">id datasopir </label> 
    <div class="col-md-5">
        <input type="text" name="id_sopir" readonly="true" class="form-control" placeholder="id_sopir " value="<?php echo $datasopir->id_sopir?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nama </label> 
    <div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $datasopir->nama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Kontak</label> 
    <div class="col-md-5">
        <input type="text" name="kontak" class="form-control" placeholder="kontak " value="<?php echo $datasopir->kontak ?>" required>
    </div>
</div>
<input type="hidden" name="id_user" value="<?php echo $datasopir->id_user ?>" >

<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
   
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $datasopir->id_sopir ?>">
        <i class="fa fa-edit"></i>Update
 </button>

 <div class="modal fade" id="update-<?php echo $datasopir->id_sopir ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA datasopir</h4>
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