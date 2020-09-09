<div id="wrapper">
  <?php if ($this->session->userdata()['region'] == 'D') { ?>
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <?= $this->load->view('Fragment/SidebarHeaderFragment', NULL, TRUE); ?>
          <li id="dashboard">
            <a href="<?= site_url('BuyerController/') ?>"><i class="fa fa-home"></i> <span class="nav-label">Beranda</span></a>
          </li>
          <li id="dokument_buyer">
            <a href="<?= site_url("BuyerController/dokumen_buyer?id_buyer={$this->session->userdata()['id_buyer']}") ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Dokument</span></a>
          </li>
          <li id="logout">
            <a href="#" class="logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
          </li>
      </div>
    </nav>

  <?php  } else { ?>
    <nav class="navbar-default navbar-static-side" role="navigation">
      <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
          <?= $this->load->view('Fragment/SidebarHeaderFragment', NULL, TRUE); ?>
          <li id="dashboard">
            <a href="<?= site_url('BuyerController/') ?>"><i class="fa fa-home"></i> <span class="nav-label">Dashboard</span></a>
          </li>
          <li id="dokument_buyer">
            <a href="<?= site_url("BuyerController/dokumen_buyer?id_buyer={$this->session->userdata()['id_buyer']}") ?>"><i class="fa fa-users-cog"></i> <span class="nav-label">Document</span></a>
          </li>
          <li id="logout">
            <a href="#" class="logout"><i class="fa fa-sign-out"></i> <span class="nav-label">Logout</span></a>
          </li>
      </div>
    </nav>
  <?php  } ?>

  <script>
    $(document).ready(function() {});
  </script>