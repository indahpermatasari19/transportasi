<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open('admin/datasopir/tambah',' class="form-horizontal"');

?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama</label> 
    <div class="col-md-5">
        <input type="text" name="nama_sopir" class="form-control" placeholder="Nama" value="<?php echo set_value('nama_sopir') ?>"  required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kontak</label> 
    <div class="col-md-5">
        <input type="text" name="kontak" class="form-control" placeholder="Kontak" value="<?php echo set_value('kontak') ?>"  required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
 	<div class="col-md-5">
        <button class="btn btn-success btn-sm" name="submit" type="submit">
        	<i class="fa fa-save"></i> Simpan 
        </button>
        <button class="btn btn-info btn-sm" name="reset" type="reset">
        	<i class="fa fa-times"></i> Reset 
        </button>
    </div>
</div>

<?php echo form_close(); ?>