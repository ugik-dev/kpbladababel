<div id="wrapper">

  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <?= $this->load->view('Fragment/SidebarHeaderFragment', NULL, TRUE); ?>
        <li id="dashboard">
          <a href="<?= site_url('PerusahaanController/') ?>"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
        </li>
        <li id="request_buyer">
          <a href="<?= site_url('AdminController/request_buyer') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Request Buyer</span></a>
        </li>
        <li id="request_seler">
          <a href="<?= site_url('AdminController/request_seller') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Request Seller</span></a>
        </li>

        <li id="daftar_req_kpb">
          <a href="<?= site_url("KPBController/daftar_req_kpb") ?>"><i class="fa fa-file-alt"></i> <span class="nav-label">Daftar Permohonan</span></a>
        </li>
        <li id="jadwal_pengambilan_sampel">
          <a href="<?= site_url("KPBController/jadwal_pengambilan_sampel") ?>"><i class="fa fa-file-alt"></i> <span class="nav-label">Pengambilan Sampel</span></a>
        </li>
        <li id="logout">
          <a href="#" class="logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
        </li>
    </div>
  </nav>
  <script>
    $(document).ready(function() {});
  </script>