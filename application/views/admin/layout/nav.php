  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image"> 
          <img src="<?php echo base_url() ?>template/backend/dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Santi</p>
          </i> Kasubbag Umum</a>
        </div>
      </div>

      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>

        <!-- MENU DASHBORD -->
         <li><a href="<?php echo base_url('admin/dasbord') ?>"><i class="fa fa-dashboard"></i> <span>Dashbord</span></a></li>

  
        <!-- MENU Kendaraan-->
          <li><a href="<?php echo base_url('admin/datakendaraan') ?>"><i class="fa fa-automobile"></i> Data Kendaraan</a></li>

         <!-- MENU Sopir -->
         <!--  <li><a href="<?php echo base_url('admin/datasopir') ?>"><i class="glyphicon glyphicon-user"></i> Data Sopir</a></li> -->

        <!-- MENU Peminjaman -->
          <li class="treeview">
            <a href="#">
            <i class="glyphicon glyphicon-edit"></i> <span>Data Peminjaman</span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>              
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('admin/pending') ?>"><i class="fa fa-circle-o"></i> Pending </a></li>
              <li><a href="<?php echo base_url('admin/confirm') ?>"><i class="fa fa-circle-o"></i> Confirm </a></li>
              <li><a href="<?php echo base_url('admin/cancel') ?>"><i class="fa fa-circle-o"></i> Cancel </a></li>
            </ul>
          </li>

        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-user"></i> <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

           <!-- MENU Registrasi -->
            <li><a href="<?php echo base_url('admin/registrasi') ?>"><i class="fa fa-circle-o"></i> Registrasi Account </a></li>

          <!-- MENU SOPIR -->
            <li><a href="<?php echo base_url('admin/dataumum') ?>"><i class="fa fa-circle-o"></i> Data Umum</a></li>

          <!-- MENU Unit -->
            <li><a href="<?php echo base_url('admin/dataunit') ?>"><i class="fa fa-circle-o"></i> Data Unit</a></li>

          <!-- MENU Ormawa -->
            <li><a href="<?php echo base_url('admin/dataormawa') ?>"><i class="fa fa-circle-o"></i> Data Ormawa</a></li>

          <!-- MENU Jurusan -->
            <li><a href="<?php echo base_url('admin/datajurusan') ?>"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
          <!-- MENU Jurusan -->
            <li><a href="<?php echo base_url('admin/datasopir') ?>"><i class="fa fa-circle-o"></i> Data Sopir</a></li>
          </ul>


          <!-- MENU Laporan -->
          <li><a href="<?php echo base_url('admin/laporan') ?>"><i class="glyphicon glyphicon-book"></i> Data Laporan</a></li>

          <!-- MENU Laporan -->
          <li><a href="<?php echo base_url('login/logout') ?>"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>

        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       <?php echo $title ?>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
             <div class="box-body">