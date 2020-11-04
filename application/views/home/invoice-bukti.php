<html>
  <head>
    <title>Bukti Peminjaman Transportasi</title>
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
                padding: 10px;
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

  <hr class="line-title"><br>

  <table>
        <tr>
            <td>Perihal</td>
            <td>:</td>
            <td><b>Persetujuan Peminjaman Transportasi</b></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            <td></td><td></td><td></td><td></td>
            
            <td>Padang, <?php echo date("d") . " " . date("F") . " " . date("Y"); ?></td>
        </tr>
        <tr>
            <td>Kode Peminjaman</td>
            <td>:</td>
            <td> <b><?php echo $hasil->kode_booking ?></b></td>
        </tr>
  </table>

  <br><br> 

  Menyetujui

        <strong>Kasubbag. Umum</strong>
        <br>Politeknik Negeri Padang<br><br>
                
  <b>Dengan Hormat,
  <p align="justivy">Menindaklanjuti Permohonan Peminjaman Ruangan yang telah diajukan oleh <b><?php echo $hasil->nama ?></b>
  dalam rangka Kegiatan  <b><?php echo $hasil->nama_kegiatan ?></b> yang akan diadakan pada: </p><br>
  <table>
        <tr>
            <td>Tanggal Peminjaman</td>
            <td>:</td>
            <td><?php echo date('d F Y',strtotime($hasil->tanggal_peminjaman));?></td>
        </tr>
        
        <tr>
            <td>Nomor Polisi</td>
            <td>:</td>
            <td><?php  echo $hasil->nomor_polisi ?></td>
        </tr>
        <tr>
            <td>Alamat Tujuan</td>
            <td>:</td>
            <td><?php  echo $hasil->alamat_tujuan ?> </td>
        </tr>
  </table><br><br>
  
  <p align="justivy">Untuk itu kami menyetujui Saudara/i untuk menggunakan transportasi tersebut sesuai dengan jadwal
  yang telah tertera.</p>
  <p align="justivy">Saudara dapat menggunakan fasilitas yang terdapat di dalam ruangan tersebut dengan sebaik-
  baiknya selama masa peminjaman. Setelah kegiatan selesai, harap segala fasilitas dikembalikan seperti semula.
  Semoga kepercayaan ini dapat dijalankan dengan baik.</p>
  <p align="justivy">Atas perhatiannya, kami ucapkan terima kasih.</p>
  <br>

 <br>
    <table style="font-weight: bold;" align="right">
      <tr>
        <td>
          <br>
        </td>
        <td>Kasubag Umum<br>Politeknik Negeri Padang</center>
            <img src="assets/images/acc.png">
        </td>
      </tr>
      <tr>
        <td></td>
        <td>Yuhedmi Noeva, S.Sos.,M.Pd<br>NIP. 19721215 200003 2 001</td>
      </tr>
    </table>
</body>
</html>