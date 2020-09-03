<div class="wrapper wrapper-content animated fadeInRight">
  <!-- <div class="ibox ssection-container">
    <div class="ibox-content">
      <form class="form-inline" id="toolbar_form" onsubmit="return false;">
        <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah Standar Mutu Baru</button>
        <div class="bg-primary p-w-xs">.</div><span class="m-l-xs">Harga Petani</span>
        <div class="bg-success p-w-xs m-l-sm">.</div><span class="m-l-xs">Harga FOB</span>
      </form>
    </div>
  </div> -->

  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-content">
          <div class="table-responsive">
            <table id="StandarMutuTable" class="table table-bordered stripe" style="padding:0px">
              <thead>
                <tr>
                  <th style="width: 20%;">Parameter </th>
                  <th style="width: 10%;">SNI I</th>
                  <th style="width: 10%;">SNI II</th>
                  <th style="width: 10%;">ASTA</th>
                  <th style="width: 10%;">ESA</th>
                  <th style="width: 10%;">IPC</th>
                  <th style="width: 10%;">ISO</th>
                  <th style="width: 10%;">MWP 1</th>
                  <th style="width: 10%;">MWP 2</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal inmodal" id="standar_mutu_modal" tabindex="-1" opd="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content animated fadeIn">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Kelola Standar Mutu</h4>
          <span class="info"></span>
        </div>
        <div class="modal-body" id="modal-body">
          <form opd="form" id="standar_mutu_form" onsubmit="return false;" type="multipart" autocomplete="off">
            <input type="hidden" id="id_mutu" name="id_mutu">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="nama_mutu">Nama Standar Mutu</label>
                  <input readonly='readonly' type="text" class="form-control" placeholder="Tanggal Berlaku" id="nama_mutu" name="nama_mutu" required="required">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="cemaran_serangga">Cemaran Serangga</label>
                  <textarea type="text" id="cemaran_serangga" class="form-control" name="cemaran_serangga" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kerapatan">Kerapatan (g/1)</label>
                  <textarea type="text" id="kerapatan" class="form-control" name="kerapatan" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kadar_air">Kadar Air (%)</label>
                  <textarea type="text" id="kadar_air" class="form-control" name="kadar_air" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kadar_biji_enteng">Kadar Biji Enteng (%)</label>
                  <textarea type="text" id="kadar_biji_enteng" class="form-control" name="kadar_biji_enteng" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kadar_benda_asing">Kadar Benda Asing (%)</label>
                  <textarea type="text" id="kadar_benda_asing" class="form-control" name="kadar_benda_asing" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kadar_cemaran">Kadar Cemaran Kapang (%)</label>
                  <textarea type="text" id="kadar_cemaran" class="form-control" name="kadar_cemaran" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kadar_hitam_putih">Kadar Lada berwarna putih kehitaman (%)</label>
                  <textarea type="text" id="kadar_hitam_putih" class="form-control" name="kadar_hitam_putih" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="e_colli">E Colli (MPN/g)</label>
                  <textarea type="text" id="e_colli" class="form-control" name="e_colli" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="salmonella">Salmonella (Detection/25g)</label>
                  <textarea type="text" id="salmonella" class="form-control" name="salmonella" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kadar_piperin">Kadar Piperin (%)</label>
                  <textarea type="text" id="kadar_piperin" class="form-control" name="kadar_piperin" required="required" rows="3"></textarea>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="kadar_minyak">Kadar Minyak Atsiri (%)</label>
                  <textarea type="text" id="kadar_minyak" class="form-control" name="kadar_minyak" required="required" rows="3"></textarea>
                </div>
              </div>

            </div>

            <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan Perubahan</strong></button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $('#kelola_standar_mutu').addClass('active');
      $('#setting_parm').addClass('active');
      var toolbar = {
        'form': $('#toolbar_form'),
        'id_role': $('#toolbar_form').find('#id_role'),
        'newBtn': $('#new_btn'),
      }

      var StandarMutuTable = $('#StandarMutuTable').DataTable({
        'columnDefs': [{
          targets: [0, 1, 2, 3, 4, 5, 6, 7, 8],
          className: 'text-center'
        }],
        deferRender: true,
        "ordering": false,
        "dom": "t",
        "aLengthMenu": [12]
      });

      var standar_mutu_modal = {
        'self': $('#standar_mutu_modal'),
        'info': $('#standar_mutu_modal').find('.info'),
        'form': $('#standar_mutu_modal').find('#standar_mutu_form'),
        'saveEditBtn': $('#standar_mutu_modal').find('#save_edit_btn'),
        'id_mutu': $('#standar_mutu_modal').find('#id_mutu'),
        'nama_mutu': $('#standar_mutu_modal').find('#nama_mutu'),
        'cemaran_serangga': $('#standar_mutu_modal').find('#cemaran_serangga'),
        'kerapatan': $('#standar_mutu_modal').find('#kerapatan'),
        'kadar_air': $('#standar_mutu_modal').find('#kadar_air'),
        'kadar_biji_enteng': $('#standar_mutu_modal').find('#kadar_biji_enteng'),
        'kadar_benda_asing': $('#standar_mutu_modal').find('#kadar_benda_asing'),
        'kadar_cemaran': $('#standar_mutu_modal').find('#kadar_cemaran'),
        'kadar_hitam_putih': $('#standar_mutu_modal').find('#kadar_hitam_putih'),
        'e_colli': $('#standar_mutu_modal').find('#e_colli'),
        'salmonella': $('#standar_mutu_modal').find('#salmonella'),
        'kadar_piperin': $('#standar_mutu_modal').find('#kadar_piperin'),
        'kadar_minyak': $('#standar_mutu_modal').find('#kadar_minyak'),
        'harga_sni1_fob': $('#standar_mutu_modal').find('#harga_sni1_fob'),
        'harga_iso_petani': $('#standar_mutu_modal').find('#harga_iso_petani'),
        'harga_iso_fob': $('#standar_mutu_modal').find('#harga_iso_fob'),
      }



      var dataStandarMutu = {}

      $.when(getStandarMutu()).then((e) => {
        toolbar.newBtn.prop('disabled', false);
      }).fail((e) => {
        console.log(e)
      });

      function getStandarMutu() {
        swal({
          title: 'Loading standar_mutu...',
          allowOutsideClick: false
        });
        swal.showLoading();
        return $.ajax({
          url: `<?php echo site_url('HargaMWPController/getStandarMutu/') ?>`,
          'type': 'GET',
          data: {},
          success: function(data) {
            swal.close();
            var json = JSON.parse(data);
            if (json['error']) {
              return;
            }
            dataStandarMutu = json['data'];
            renderStandarMutu(dataStandarMutu);
          },
          error: function(e) {}
        });
      }

      function renderStandarMutu(data) {
        if (data == null || typeof data != "object") {
          console.log("HargaMWP::UNKNOWN DATA");
          return;
        }
        var i = 0;

        var renderData = [];
        renderData.push(["Cemaran Serangga (By count Maks)", data['1']['cemaran_serangga'], data['2']['cemaran_serangga'], data['3']['cemaran_serangga'], data['4']['cemaran_serangga'], data['5']['cemaran_serangga'], data['6']['cemaran_serangga'], data['7']['cemaran_serangga'], data['8']['cemaran_serangga']]);
        renderData.push(["Kerapatan (g/1)", data['1']['kerapatan'], data['2']['kerapatan'], data['3']['kerapatan'], data['4']['kerapatan'], data['5']['kerapatan'], data['6']['kerapatan'], data['7']['kerapatan'], data['8']['kerapatan']]);
        renderData.push(["Kadar Air (%)", data['1']['kadar_air'], data['2']['kadar_air'], data['3']['kadar_air'], data['4']['kadar_air'], data['5']['kadar_air'], data['6']['kadar_air'], data['7']['kadar_air'], data['8']['kadar_air']]);
        renderData.push(["Kadar Biji Enteng (%)", data['1']['kadar_biji_enteng'], data['2']['kadar_biji_enteng'], data['3']['kadar_biji_enteng'], data['4']['kadar_biji_enteng'], data['5']['kadar_biji_enteng'], data['6']['kadar_biji_enteng'], data['7']['kadar_biji_enteng'], data['8']['kadar_biji_enteng']]);
        renderData.push(["Kadar Benda Asing (%)", data['1']['kadar_benda_asing'], data['2']['kadar_benda_asing'], data['3']['kadar_benda_asing'], data['4']['kadar_benda_asing'], data['5']['kadar_benda_asing'], data['6']['kadar_benda_asing'], data['7']['kadar_benda_asing'], data['8']['kadar_benda_asing']]);
        renderData.push(["Kadar Cemaran Kapang (%)", data['1']['kadar_cemaran'], data['2']['kadar_cemaran'], data['3']['kadar_cemaran'], data['4']['kadar_cemaran'], data['5']['kadar_cemaran'], data['6']['kadar_cemaran'], data['7']['kadar_cemaran'], data['8']['kadar_cemaran']]);
        renderData.push(["Kadar Lada berwarna putih kehitaman (%)", data['1']['kadar_hitam_putih'], data['2']['kadar_hitam_putih'], data['3']['kadar_hitam_putih'], data['4']['kadar_hitam_putih'], data['5']['kadar_hitam_putih'], data['6']['kadar_hitam_putih'], data['7']['kadar_hitam_putih'], data['8']['kadar_hitam_putih']]);
        renderData.push(["E Colli (MPN/g)", data['1']['e_colli'], data['2']['e_colli'], data['3']['e_colli'], data['4']['e_colli'], data['5']['e_colli'], data['6']['e_colli'], data['7']['e_colli'], data['8']['e_colli']]);
        renderData.push(["Salmonella (Detection/25g)", data['1']['salmonella'], data['2']['salmonella'], data['3']['salmonella'], data['4']['salmonella'], data['5']['salmonella'], data['6']['salmonella'], data['7']['salmonella'], data['8']['salmonella']]);
        renderData.push(["Kadar Piperin (%)", data['1']['kadar_piperin'], data['2']['kadar_piperin'], data['3']['kadar_piperin'], data['4']['kadar_piperin'], data['5']['kadar_piperin'], data['6']['kadar_piperin'], data['7']['kadar_piperin'], data['8']['kadar_piperin']]);
        renderData.push(["Kadar Minyak Atsiri (%)", data['1']['kadar_minyak'], data['2']['kadar_minyak'], data['3']['kadar_minyak'], data['4']['kadar_minyak'], data['5']['kadar_minyak'], data['6']['kadar_minyak'], data['7']['kadar_minyak'], data['8']['kadar_minyak']]);
        renderData.push(["Edit", buttonEditStandarMutu(1), buttonEditStandarMutu(2), buttonEditStandarMutu(3), buttonEditStandarMutu(4), buttonEditStandarMutu(5), buttonEditStandarMutu(6), buttonEditStandarMutu(7), buttonEditStandarMutu(8)]);



        StandarMutuTable.clear().rows.add(renderData).draw('full-hold');
      }

      function buttonEditStandarMutu(id_standar_mutu) {
        return `<button type='button' class='edit btn btn-success btn-sm' data-id='${id_standar_mutu}' aria-haspopup='true' aria-expanded='false'><i class='fa fa-pencil'></i></button>`;
      }


      toolbar.newBtn.on('click', (e) => {
        standar_mutu_modal.form.trigger('reset');
        standar_mutu_modal.self.modal('show');

        standar_mutu_modal.saveEditBtn.hide();
      });

      StandarMutuTable.on('click', '.edit', function() {
        console.log('s')
        standar_mutu_modal.form.trigger('reset');
        standar_mutu_modal.self.modal('show');

        standar_mutu_modal.saveEditBtn.show();

        var currentData = dataStandarMutu[$(this).data('id')];
        standar_mutu_modal.id_mutu.val(currentData['id_mutu']);
        standar_mutu_modal.nama_mutu.val(currentData['nama_mutu']);
        standar_mutu_modal.cemaran_serangga.val(currentData['cemaran_serangga']);
        standar_mutu_modal.kerapatan.val(currentData['kerapatan']);
        standar_mutu_modal.kadar_air.val(currentData['kadar_air']);
        standar_mutu_modal.kadar_biji_enteng.val(currentData['kadar_biji_enteng']);
        standar_mutu_modal.kadar_benda_asing.val(currentData['kadar_benda_asing']);
        standar_mutu_modal.kadar_cemaran.val(currentData['kadar_cemaran']);
        standar_mutu_modal.kadar_hitam_putih.val(currentData['kadar_hitam_putih']);
        standar_mutu_modal.e_colli.val(currentData['e_colli']);
        standar_mutu_modal.salmonella.val(currentData['salmonella']);
        standar_mutu_modal.kadar_piperin.val(currentData['kadar_piperin']);
        standar_mutu_modal.kadar_minyak.val(currentData['kadar_minyak']);
        standar_mutu_modal.harga_sni1_fob.val(currentData['harga_sni1_fob']);
        standar_mutu_modal.harga_iso_petani.val(currentData['harga_iso_petani']);
        standar_mutu_modal.harga_iso_fob.val(currentData['harga_iso_fob']);
      });

      standar_mutu_modal.form.submit(function(event) {
        event.preventDefault();

        var url = "<?= site_url('HargaMWPController/edit_standar_mutu') ?>";
        var button = standar_mutu_modal.saveEditBtn;

        swal(saveConfirmation("Konfirmasi simpan", "Yakin akan menyimpan Standar Mutu ini?", "Ya, Simpan!")).then((result) => {
          if (!result.value) {
            return;
          }
          buttonLoading(button);
          $.ajax({
            url: url,
            'type': 'POST',
            data: standar_mutu_modal.form.serialize(),
            success: function(data) {
              buttonIdle(button);
              var json = JSON.parse(data);
              if (json['error']) {
                swal("Simpan Gagal", json['message'], "error");
                return;
              }
              var standar_mutu = json['data']
              dataStandarMutu[standar_mutu['id_mutu']] = standar_mutu;
              swal("Simpan Berhasil", "", "success");
              console.log(dataStandarMutu)
              renderStandarMutu(dataStandarMutu);
              standar_mutu_modal.self.modal('hide');
            },
            error: function(e) {}
          });
        });
      });

      // HargaMWPTable.on('click','.delete', function(){
      //   event.preventDefault();
      //   var id = $(this).data('id');
      //   swal(deleteConfirmation("Konfirmasi hapus", "Yakin akan menghapus harga MWP ini?", "Ya, Hapus!")).then((result) => {
      //     if(!result.value){ return; }
      //     $.ajax({
      //       url: "<?= site_url('HargaMWPController/delete') ?>", 'type': 'POST',
      //       data: {'id_mutu': id},
      //       success: function (data){
      //         var json = JSON.parse(data);
      //         if(json['error']){
      //           swal("Delete Gagal", json['message'], "error");
      //           return;
      //         }
      //         delete dataStandarMutu[id];
      //         swal("Delete Berhasil", "", "success");
      //         renderHargaMWP(dataStandarMutu);
      //       },
      //       error: function(e) {}
      //     });
      //   });
      // });
    });
  </script>