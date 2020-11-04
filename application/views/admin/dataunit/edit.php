<?php
if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

 }
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/dataunit/edit/'.$dataunit->id_unit), 'class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">id dataunit </label> 
    <div class="col-md-5">
        <input type="text" name="id_unit" readonly="true" class="form-control" placeholder="id_unit " value="<?php echo $dataunit->id_unit?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Unit</label> 
    <div class="col-md-5">
        <input type="text" name="nama_unit" class="form-control" placeholder="Nama Unit" value="<?php echo $dataunit->nama ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kepala Unit</label> 
    <div class="col-md-5">
        <input type="text" name="kepala_unit" class="form-control" placeholder="Kepala Unit " value="<?php echo $dataunit->kepala_unit ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Admin</label> 
    <div class="col-md-5">
        <input type="text" name="admin_unit" class="form-control" placeholder="Admin Unit " value="<?php echo $dataunit->admin_unit ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kontak</label> 
    <div class="col-md-5">
        <input type="text" name="kontak" class="form-control" placeholder="Kontak " value="<?php echo $dataunit->kontak ?>" required>
    </div>
</div>
<input type="hidden" name="id_user"value="<?php echo $dataunit->id_user ?>" required>

<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
   
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $dataunit->id_unit ?>">
        <i class="fa fa-edit"></i>Update
 </button>

 <div class="modal fade" id="update-<?php echo $dataunit->id_unit ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA dataunit</h4>
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