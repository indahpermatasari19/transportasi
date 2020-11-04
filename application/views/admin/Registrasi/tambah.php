<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

// Form Open
echo form_open('admin/registrasi',' class="form-horizontal"');
?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama</label>
 	<div class="col-md-5">
        <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Username</label>
 	<div class="col-md-5">
        <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Password</label>
    <div class="col-md-5">
        <input type="text" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Kontak</label>
    <div class="col-md-5">
        <input type="text" name="kontak" class="form-control" placeholder="Kontak" value="<?php echo set_value('kontak') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Level</label>

    <div class="col-md-5">
        <!-- <input type="text" name="level" class="form-control" placeholder="Level" value="<?php echo set_value('level') ?>" required> -->
        <select class="form-control" name="level" >
            <?php  foreach($level as $lvl) :
             foreach ($lvl as $value) : ?>
            <option value="<?php echo $value->id_level;?>"><?php echo $value->nama;?></option>
            <?php endforeach;?>
            <?php endforeach;?>
        </select>
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