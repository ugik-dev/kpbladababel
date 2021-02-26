<div class="tabs-container">
  <ul class="nav nav-tabs" role="tablist">
    <li><a class="nav-link" data-toggle="tab" href="#info"> Informasi Pengiriman</a></li>
    <li><a class="nav-link" data-toggle="tab" href="#dokumen">Dokumen</a></li>
  </ul>
  <div class="tab-content">
    <div role="tabpanel" id="info" class="tab-pane">
      <div class="panel-body"></div>
    </div>
    <div role="tabpanel" id="dokumen" class="tab-pane">
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
    var id_pengiriman = `<?= $contentData['id_pengiriman'] ?>`;
    var user_action = true;
    var load_state = {};

    dataInfo = {}
    getInfo();
    function getInfo() {
      swal({
        title: 'Loading Informasi Pengiriman...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: "<?php echo site_url('PengirimanController/get') ?>",
        data: {
          'id_pengiriman': id_pengiriman
        },
        type: 'GET',
        success: function(data) {
          swal.close();
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataInfo = json['data'];
          renderBreadcrumb([
            [`<?= site_url('PerusahaanController/detail') ?>?id_perusahaan=${dataInfo['id_perusahaan']}`, dataInfo['nama_perusahaan']],
            [null, `Pengiriman ${dataInfo['nama_pengiriman']}`]
          ]);
          init();
        },
        error: function(e) {}
      });
    }

    dataItem = {}
    getPengirimanItem()
    function getPengirimanItem() {
      swal({
        title: 'Loading Informasi Pengiriman...',
        allowOutsideClick: false
      });
      swal.showLoading();
      return $.ajax({
        url: `<?php echo site_url('PengirimanItemController/getAll/') ?>`,
        'type': 'GET',
        data: {
          'id_pengiriman': id_pengiriman
        },
        success: function(data) {
          swal.close();
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataItem = json['data'];
          // console.log('panjang item'+dataItem.length)
        },
        error: function(e) {}
      });
    }


    function init() {
      $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
        var target = $(e.target).attr("href").substring(1);
        if (user_action) {
          var params = new URLSearchParams([
            ['id_pengiriman', id_pengiriman],
            ['tab', target]
          ]);
          if (target == 'dokumen') params.set('tab_child', 'disperindag');
          window.history.pushState({}, "", decodeURIComponent(`${window.location.pathname}?${params}`));
        }

        user_action = true;
        if (load_state[`${target}`]) return;
        $(`#${target} div`).load(`<?= site_url() ?>PengirimanController/${target}_fragment?id_pengiriman=${id_pengiriman}`);
        load_state[`${target}`] = true;
      });

      var params = new URLSearchParams(window.location.search);
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