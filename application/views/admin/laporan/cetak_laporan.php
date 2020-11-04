<html>
  <head>
    <title>Laporan Reservasi Ruang</title>
    <style>
        .line-title{
          border: 1;
          border-top: 3px solid #000;
          color: black;
        }
        table.satu { border-collapse:collapse; }
        td.a {
                border-style:dotted;
                border-width:3px;
                border-color:#000000;
                padding: 3px;
            }
    </style>
  </head>
<body>
  <img src="assets/images/logo.png" style="position: absolute; width: 95px; height: auto;">
  <table style="width: 100%">
        <tr>
          <td align="center">
            <span style="line-height: 1.6; font-weight: bold;">
                KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI</span>
            <span style="font-size: 23px; line-height: 1.3; font-weight: bold;">
                <br>POLITEKNIK NEGERI PADANG</span>
              <br>Jl. Limau Manis, Padang, Sumatera Barat
              <br>laman: http://www.polinpdg.ac.id, email: pnp@polinpdg.ac.id, telp: (0751) 72590
          </td>
        </tr>
  </table>
  <hr class="line-title">
  <p align="center">
      <b>LAPORAN TRANSPORTASI PER PERIODE  </b><br>
  </p>
  <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>
            <?php
              if($bulan == "1") echo " Januari";
              if($bulan == "2") echo " Februari";
              if($bulan == "3") echo " Maret";
              if($bulan == "4") echo " April";
              if($bulan == "5") echo " Mai";
              if($bulan == "6") echo " Juni";
              if($bulan == "7") echo " Juli";
              if($bulan == "8") echo " Agustus";
              if($bulan == "9") echo " September";
              if($bulan == "10") echo " Oktober";
              if($bulan == "11") echo " November";
              if($bulan == "12") echo " Desember";

              ?>
            </td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td><?php echo $tahun; ?> </td>
        </tr>
  </table><br><br>
  <table style="width: 100%" class="satu" border="1">
      <tr>
        <th>No</th>
        <th>Kode Peminjaman</th>
        <th>Nomor Polisi</th>
        <th>Nama Peminjam</th>
        <th>Tanggal Peminjaman</th>
        <th>Status</th>
      </tr>
      <?php $no=1; foreach($detail as $d):?>
        <tr>
          <td align="center" class="a"><?php echo $no++;?></td>
          <td align="center" class="a"><?php echo $d->kode_booking;?></td>
          <td  class="a"><?php echo $d->nomor_polisi;?></td>
          <td  class="a"><?php echo $d->nama;?></td>
          <td align="center" class="a"><?php echo date('d F Y',strtotime($d->tanggal_peminjaman));?></td>
          <td align="center" class="a"><?php echo $d->status;?></td>
        </tr>
      <?php endforeach;?>
    </table>
    <br><br>
    <table style="font-weight: bold;" align="right">
      <tr>
        <td>
          <br><br><br>
        </td>
        <td>Padang, <?php echo date("d") . " " . date("F") . " " . date("Y"); ?><br>Kasubbag Umum</center><br></td>
      </tr>
      <tr>
        <td>
            <br><br><br><br><br><br>
        </td>
        <td height="100">Yuhedmi Noeva, S.Sos.,M.Pd<br>NIP. 19721215 200003 2 001</td><br>
      </tr>
    </table>
    </body>
</html>
