<div class="box-body">
  <form action="<?=base_url('admin/laporan/filter')?>" method="post" accept-charset="utf-8">
    <div class="row">
      <div class="col-md-6">  
       <div class="form-group">
          <label>Pilih Tahun</label>
          <select name="tahun" class="form-control">
            <option value="" disabled diselected>-- Pilih Tahun --</option>
            <option name="status" value="2020" <?php echo set_select('tahun', 2020, $tahun==2020)?>>2020</option>
            <option name="status" value="2021" <?php echo set_select('tahun', 2021, $tahun==2021)?>>2021</option>
            option
          </select>
        </div>
       </div>
       <div class="col-md-6">  
       <div class="form-group">
          <label>Pilih Bulan</label>
          <select name="bulan" class="form-control">
            <option value="" disabled diselected>-- Pilih Bulan --</option>
                        <option name="status" value="1" <?php echo set_select('bulan', 1, $bulan==1)?>>Januari</option>
                        <option name="status" value="2" <?php echo set_select('bulan', 2, $bulan==2)?>>Februari</option>
                        <option name="status" value="3" <?php echo set_select('bulan', 3, $bulan==3)?>>Maret</option>
                        <option name="status" value="4" <?php echo set_select('bulan', 4, $bulan==4)?>>April</option>
                        <option name="status" value="5" <?php echo set_select('bulan', 5, $bulan==5)?>>Mei</option>
                        <option name="status" value="6" <?php echo set_select('bulan', 6, $bulan==6)?>>Juni</option>
                        <option name="status" value="7" <?php echo set_select('bulan', 7, $bulan==7)?>>Juli</option>
                        <option name="status" value="8" <?php echo set_select('bulan', 8, $bulan==8)?>>Agustus</option>
                        <option name="status" value="9" <?php echo set_select('bulan', 9, $bulan==9)?>>September</option>
                        <option name="status" value="10" <?php echo set_select('bulan', 10, $bulan==10)?>>Oktober</option>
                        <option name="status" value="11" <?php echo set_select('bulan', 11, $bulan==11)?>>November</option>
                        <option name="status" value="12" <?php echo set_select('bulan', 12, $bulan==12)?>>Desember</option>
            option
          </select>
        </div>
       </div> 
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-fw fa-eye"></i> View</button>
    <a href="<?=base_url('admin/laporan/cetak/' . $tahun . '/' . $bulan)?>" class="btn btn-primary"><i class="fa fa-fw fa-print"> </i> Cetak</a>
  </form>

  <br>
  <table id="example1" class="table table-bordered table-striped">
   <thead>
      <tr>
        <th>No</th>      
        <th>Kode Peminjaman</th>
        <th>Nomor Polisi</th>
        <th>Nama Peminjam</th>
        <th>Tanggal Peminjaman</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1; foreach($detail as $d) : ?>
      <tr>
        <td><?=$no++;?></td>
        <td><?=$d->kode_booking;?></td>
        <td><?=$d->nomor_polisi;?></td>
        <td><?=$d->nama;?></td>
        <td><?=$d->tanggal_peminjaman;?></td>
        <td><?=$d->status;?></td>
      </tr>
      <?php endforeach; ?>

    </tbody>
    
</table>
