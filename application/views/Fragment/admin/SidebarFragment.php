<div id="wrapper">

  <nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
      <ul class="nav metismenu" id="side-menu">
        <?= $this->load->view('Fragment/SidebarHeaderFragment', NULL, TRUE); ?>
        <li id="dashboard">
          <a href="<?= site_url('AdminController/') ?>"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
        </li>
        <li id="news_post">
          <a href="<?= site_url('AdminController/news_post') ?>"><i class="fa fa-newspaper"></i> <span class="nav-label">News Post</span></a>
        </li>
        <li id="kelola_user">
          <a href="<?= site_url('AdminController/kelola_user') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Kelola User</span></a>
        </li>
        <li id="request_buyer">
          <a href="<?= site_url('AdminController/request_buyer') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Request Buyer</span></a>
        </li>
        <li id="request_seler">
          <a href="<?= site_url('AdminController/request_seller') ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Request Seller</span></a>
        </li>
        <li id="kelola_harga_mwp">
          <a href="<?= site_url('AdminController/kelola_harga_mwp') ?>"><i class="fa fa-chart-line"></i> <span class="nav-label">Harga MWP</span></a>
        </li>
        <li id="setting_parm">
          <a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Setting</span> <span class="fa arrow"></span></a>
          <ul class="nav nav-second-level" aria-expanded="true">
            <li id="kelola_standar_mutu">
              <a href="<?= site_url('AdminController/kelola_standar_mutu') ?>"><i class="fa fa-balance-scale"></i> <span class="nav-label"> Mutu</span></a>
            </li>
            <li id="kelola_jenis_dokumen_perusahaan">
              <a href="<?= site_url('AdminController/kelola_jenis_dokumen_perusahaan') ?>"><i class="fa fa-archive"></i> <span class="nav-label"> Dokumen</span></a>
            </li>
            <li id="kelola_email">
              <a href="<?= site_url('AdminController/kelola_email') ?>"><i class="fa fa-link"></i> <span class="nav-label">Kelolah Email</span></a>
            </li>
          </ul>
        </li>

        <li id="logout">
          <a href="#" class="logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
        </li>
    </div>
  </nav>
  <script>
    $(document).ready(function() {});
  </script>