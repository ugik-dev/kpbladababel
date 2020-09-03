<div class="tabs-container">
  <ul class="nav nav-tabs" role="tablist">
    <li><a class="nav-link" data-toggle="tab" href="#info"> Informasi Perusahaan</a></li>
    <li><a class="nav-link" data-toggle="tab" href="#dokumen_perusahaan">Dokumen Perusahaan</a></li>
    <li><a class="nav-link" data-toggle="tab" href="#product"> Produk</a></li>
    <li><a class="nav-link" data-toggle="tab" href="#pengiriman">Pengiriman</a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" id="info" class="tab-pane">
      <div class="panel-body"></div>
    </div>
    <div role="tabpanel" id="dokumen_perusahaan" class="tab-pane">
      <div class="panel-body"></div>
    </div>
    <div role="tabpanel" id="product" class="tab-pane">
      <div class="panel-body"></div>
    </div>
    <div role="tabpanel" id="pengiriman" class="tab-pane">
      <div class="panel-body"></div>
    </div>
  </div>
</div>
<style>
  .tabs-container {
    margin: 0px -15px;
  }

  .ibox-content {
    background-color: #f7f7f7;
  }

  .tabs-container .panel-body {
    padding-top: 0px
  }
</style>
<script src="<?= base_url('assets/') ?>js/FileUploaderV2.js"></script>
<script>
  $(document).ready(function() {
    $('#detail_perusahaan').addClass('active');
    var id_perusahaan = `<?= $contentData['id_perusahaan'] ?>`;
    var params = new URLSearchParams(window.location.search);
    var user_action = true;
    var load_state = {};

    dataInfo = {};

    getInfo();

    function getInfo() {
      swal({
        title: 'Loading Informasi Perusahaan...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: "<?php echo site_url('PerusahaanController/get') ?>",
        data: {
          'id_perusahaan': id_perusahaan
        },
        type: 'GET',
        success: function(data) {
          swal.close();
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataInfo = json['data'];
          init();
        },
        error: function(e) {}
      });
    }

    function init() {
      $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = $(e.target).attr("href").substring(1);
        if (user_action) {
          params.set('tab', target);
          window.history.pushState({}, "", decodeURIComponent(`${window.location.pathname}?${params}`));
        }

        user_action = true;
        if (load_state[`${target}`]) return;
        $(`#${target} div`).load(`<?= site_url() ?>PerusahaanController/${target}_fragment?id_perusahaan=${id_perusahaan}`);
        load_state[`${target}`] = true;
      });

      changeTabWithParam(params);

      function changeTabWithParam(params) {
        var prevState = Object.fromEntries(params);
        user_action = false;
        $(`a[href="#${!empty(prevState['tab']) ? prevState['tab'] : 'info'}"]`).tab('show');
      }

      $(window).on("popstate", function(e) {
        var params = new URLSearchParams(e.currentTarget.location.search);
        changeTabWithParam(params);
      });
    }
  });
</script>