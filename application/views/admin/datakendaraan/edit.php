<?php
if (isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';

 }
//Notifikasi error
echo validation_errors('<div class="alert-warning">','</div>');

//Form open
echo form_open_multipart(base_url('admin/datakendaraan/edit/'.$datakendaraan->kode_kendaraan), 'class="form-horizontal"');
?>
<div class="form-group">
    <label class="col-md-2 control-label">Kode Kendaraan</label> 
    <div class="col-md-5">
        <input type="text" name="kode_kendaraan" class="form-control" placeholder="kode_kendaraan " value="<?php echo $datakendaraan->kode_kendaraan ?>" required>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Jenis Kendaraan</label> 
    <div class="col-md-5">
        <input type="text" name="jenis_kendaraan" class="form-control" placeholder="jenis_kendaraan " value="<?php echo $datakendaraan->jenis_kendaraan ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Nomor Polisi</label> 
    <div class="col-md-5">
        <input type="text" name="nomor_polisi" class="form-control" placeholder="nomor_polisi " value="<?php echo $datakendaraan->nomor_polisi ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Gambar Kendaraan</label> 
    <div class="col-md-5">
        <a href="<?php echo base_url('assets/images/kendaraan/' . $datakendaraan->gambar_kendaraan); ?>"><img class="img-thumbnail" style="max-width:400px; max-height: 400px" src="<?php echo base_url('assets/images/kendaraan/' . $datakendaraan->gambar_kendaraan); ?>"></a>
        <input type="file" name="gambar" class="form-control" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Kapasitas</label> 
    <div class="col-md-5">
        <input type="text" name="kapasitas" class="form-control" placeholder="kapasitas" value="<?php echo $datakendaraan->kapasitas ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Warna</label> 
    <div class="col-md-5">
        <input type="text" name="warna" class="form-control" placeholder="warna" value="<?php echo $datakendaraan->warna ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Jumlah Roda</label> 
    <div class="col-md-5">
        <input type="text" name="jumlah_roda" class="form-control" placeholder="jumlah_roda" value="<?php echo $datakendaraan->jumlah_roda ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Peruntukkan</label> 
    <div class="col-md-5">
        <input type="text" name="peruntukkan" class="form-control" placeholder="peruntukkan" value="<?php echo $datakendaraan->peruntukkan ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label> 
    <div class="col-md-5">
   
    <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#update-<?php echo $datakendaraan->kode_kendaraan ?>">
        <i class="fa fa-edit"></i>Update
 </button>

 <div class="modal fade" id="update-<?php echo $datakendaraan->kode_kendaraan ?>">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center">EDIT DATA datakendaraan</h4>
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