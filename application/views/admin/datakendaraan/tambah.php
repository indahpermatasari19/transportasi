<?php
// Notifikasi error
echo validation_errors('<div class="alert alert-warning">','</div>');

if($this->session->flashdata('error')) {
    echo '<p class="alert alert-danger">';
    echo $this->session->flashdata('error');
    echo '</div>';
}

// Form Open
echo form_open_multipart('admin/datakendaraan/tambah',' class="form-horizontal"');

?>

<div class="form-group">
    <label class="col-md-2 control-label">Kode Kendaraan</label> 
    <div class="col-md-5">
        <input type="text" name="kode_kendaraan" class="form-control" placeholder="kode kendaraan " value="<?php echo set_value('kode_kendaraan') ?>"  required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Jenis Kendaraan</label> 
    <div class="col-md-5">
        <input type="text" name="jenis_kendaraan" class="form-control" placeholder="jenis kendaraan " value="<?php echo set_value('jenis_kendaraan') ?>"  required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nomor Polisi</label> 
    <div class="col-md-5">
        <input type="text" name="nomor_polisi" class="form-control" placeholder="nomor polisi " value="<?php echo set_value('nomor_polisi')?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Gambar Kendaraan</label> 
    <div class="col-md-5">
        <input type="file" class="form-control" name="gambar" >
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Kapasitas</label> 
    <div class="col-md-5">
        <input type="text" name="kapasitas" class="form-control" placeholder="kapasitas" value="<?php echo set_value('kapasitas')?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Warna</label> 
    <div class="col-md-5">
        <input type="text" name="warna" class="form-control" placeholder="warna" value="<?php echo set_value('warna')?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Jumlah Roda</label> 
    <div class="col-md-5">
        <input type="text" name="jumlah_roda" class="form-control" placeholder="jumlah roda" value="<?php echo set_value('jumlah_roda')?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Peruntukkan</label> 
    <div class="col-md-5">
        <input type="text" name="peruntukkan" class="form-control" placeholder="peruntukkan" value="<?php echo set_value('peruntukkan')?>" required>
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