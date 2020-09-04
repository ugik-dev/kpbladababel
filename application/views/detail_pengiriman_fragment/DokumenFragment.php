<div class="wrapper wrapper-content animated fadeInRight" id="info_container">
  <div class="row">
    <div class="table-responsive">
      <table id="dokumen_table" class="table table-bordered table-hover" style="padding:0px;font-size:11px">
        <thead>
          <tr>
            <th style="width: 19%; text-align:center!important">Instansi</th>
            <th style="width: 19%; text-align:center!important">Status</th>
            <th style="width: 14%; text-align:center!important">Format Permohonan</th>
            <th style="width: 14%; text-align:center!important">Dokumen</th>
            <th style="width: 28%; text-align:center!important">Catatan</th>
            <th style="width: 5%; text-align:center!important">Action</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
</div>


<div class="modal inmodal" id="kpb_rek_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Balasan KPB</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="kpb_rek_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="status_kpb_rek">Status Approval</label>
            <select class="form-control mr-sm-2" name="status_kpb_rek" id="status_kpb_rek" required="required">
              <option value>Pilih </option>
              <option value="DIPROSES2">Rekomendasi ke - BP3l</option>
              <option value="DITERIMA" hidden>Diterima</option>
              <option value="DITOLAK">Ditolak</option>
            </select>
          </div>
          <!-- <div class="form-group" id="dokumen_kpb_rek_form">
            <label for="dokumen_kpb_rek">Dokumen Rekomendasi</label>
            <p class="no-margins"><span id="dokumen_kpb_rek">-</span></p>
          </div> -->
          <!-- <div class="form-group" id="dokumen_kpb_sertifikat_ig_form">
            <label for="dokumen_kpb_sertifikat_ig">Dokumen Sertifikat IG</label>
            <p class="no-margins"><span id="dokumen_kpb_sertifikat_ig">-</span></p>
          </div> -->
          <div class="form-group" id="catatan_kpb_rek_form">
            <label for="catatan_kpb_rek">Catatan</label>
            <textarea type="text" id="catatan_kpb_rek" class="form-control" name="catatan_kpb_rek" required="required" rows="3"></textarea>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="bp3l_rek_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Balasan BP3L</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="bp3l_rek_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="status_bp3l_rek">Status Approval</label>
            <!-- <select class="form-control mr-sm-2" name="status_bp3l_rek" id="status_bp3l_rek" required="required"> -->
            <select class="form-control mr-sm-2" name="status_bp3l_rek" id="status_bp3l_rek" required="required">

              <option value>Pilih </option>
              <option value="DIPROSES2">Rekomendasi ke - BPSMB</option>
              <option value="DITERIMA" hidden>Diterima</option>
              <option value="DITOLAK">Ditolak</option>
            </select>
          </div>
          <div class="form-group" id="dokumen_bp3l_rek_form">
            <label for="dokumen_bp3l_rek">Dokumen Rekomendasi</label>
            <p class="no-margins"><span id="dokumen_bp3l_rek">-</span></p>
          </div>
          <div class="form-group" id="dokumen_bp3l_sertifikat_ig_form">
            <label for="dokumen_bp3l_sertifikat_ig">Dokumen Sertifikat IG</label>
            <p class="no-margins"><span id="dokumen_bp3l_sertifikat_ig">-</span></p>
          </div>
          <div class="form-group" id="catatan_bp3l_rek_form">
            <label for="catatan_bp3l_rek">Catatan</label>
            <textarea type="text" id="catatan_bp3l_rek" class="form-control" name="catatan_bp3l_rek" required="required" rows="3"></textarea>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="bpsmb_mutu_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Balasan BPSMB</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="bpsmb_mutu_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <input type="hidden" id="jenis_usaha" name="jenis_usaha">

          <div class="form-group">
            <label for="status_bpsmb_mutu">Status Approval</label>
            <select class="form-control mr-sm-2" name="status_bpsmb_mutu" id="status_bpsmb_mutu" required="required">
              <option value>Pilih Approval</option>
              <option value="DIPROSES2">Diterima</option>
              <option value="DITOLAK">Ditolak</option>
            </select>
          </div>
          <div class="form-group" id="dokumen_hasil_mutu_form">
            <label for="dokumen_hasil_mutu">Dokumen Hasil Uji Mutu</label>
            <p class="no-margins"><span id="dokumen_hasil_mutu">-</span></p>
          </div>
          <!-- <div class="form-group" id="dokumen_bp3l_sertifikat_ig_form">
            <label for="dokumen_bp3l_sertifikat_ig">Dokumen Sertifikat IG</label>
            <p class="no-margins"><span id="dokumen_bp3l_sertifikat_ig">-</span></p>
          </div> -->
          <div class="form-group" id="tgl_sampel_form">
            <label for="tgl_sampel">Tanggal Pengambilan Sampel</label>
            <input type="date" id="tgl_sampel" class="form-control" name="tgl_sampel" required="required">
          </div>
          <div class="form-group" id="catatan_bpsmb_mutu_form">
            <label for="catatan_bpsmb_mutu">Catatan</label>
            <textarea type="text" id="catatan_bpsmb_mutu" class="form-control" name="catatan_bpsmb_mutu" required="required" rows="3"></textarea>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal inmodal" id="bpsmb_mutu_modal" tabindex="-1" opd="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Balasan BPSMB</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="bpsmb_mutu_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          
          <div class="form-group">
            <label for="status_bpsmb_mutu">Status Approval</label> 
            <select class="form-control mr-sm-2" name="status_bpsmb_mutu" id="status_bpsmb_mutu" required="required">
              <option value>Pilih Approval</option>
              <option value="DITERIMA">Diterima</option>
              <option value="DITOLAK">Ditolak</option>
            </select>
          </div>
          <div class="form-group" id="dokumen_bpsmb_mutu_form">
            <label for="dokumen_bpsmb_mutu">Dokumen Mutu</label>
            <p class="no-margins"><span id="dokumen_bpsmb_mutu">-</span></p>
          </div>
         
          <div class="form-group" id="catatan_bpsmb_mutu_form">
            <label for="catatan_bpsmb_mutu">Catatan</label> 
            <textarea type="text" id="catatan_bpsmb_mutu" class="form-control" name="catatan_bpsmb_mutu" required="required" rows="3"></textarea>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->

<div class="modal inmodal" id="disperindag_izin_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Balasan Disperindag</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="disperindag_izin_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="status_disperindag_izin">Status Approval</label>
            <select class="form-control mr-sm-2" name="status_disperindag_izin" id="status_disperindag_izin" required="required">
              <option value>Pilih Approval</option>
              <option value="DITERIMA">Diterima</option>
              <option value="DITOLAK">Ditolak</option>
            </select>
          </div>
          <div class="form-group" id="dokumen_disperindag_izin_form">
            <label for="dokumen_disperindag_izin">Dokumen Izin</label>
            <p class="no-margins"><span id="dokumen_disperindag_izin">-</span></p>
          </div>
          <div class="form-group" id="catatan_disperindag_izin_form">
            <label for="catatan_disperindag_izin">Catatan</label>
            <textarea type="text" id="catatan_disperindag_izin" class="form-control" name="catatan_disperindag_izin" required="required" rows="3"></textarea>
          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
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

    var id_pengiriman = `<?= $contentData['id_pengiriman'] ?>`;
    var role = `<?= $this->session->userdata()['nama_role'] ?>`
    var dokumen_table = $('#dokumen_table').DataTable({
      'dom': 't',
      deferRender: true,
      'ordering': false,
    });

    var kpb_rek_modal = {
      self: $('#kpb_rek_modal'),
      form: $('#kpb_rek_form'),
      'id_pengiriman': $('#kpb_rek_form').find('#id_pengiriman'),
      'status_kpb_rek': $('#kpb_rek_form').find('#status_kpb_rek'),
      // 'dokumen_kpb_rek': new FileUploader($('#kpb_rek_form').find('#dokumen_kpb_rek'), "", "dokumen_kpb_rek", ".pdf", false, true),

      // 'dokumen_kpb_rek_form': $('#kpb_rek_form').find('#dokumen_kpb_rek_form'),
      'catatan_kpb_rek': $('#kpb_rek_form').find('#catatan_kpb_rek'),
      'catatan_kpb_rek_form': $('#kpb_rek_form').find('#catatan_kpb_rek_form'),
      save_btn: $('#kpb_rek_form').find('#save_edit_btn'),
    }

    var bp3l_rek_modal = {
      self: $('#bp3l_rek_modal'),
      form: $('#bp3l_rek_form'),
      'id_pengiriman': $('#bp3l_rek_form').find('#id_pengiriman'),
      'status_bp3l_rek': $('#bp3l_rek_form').find('#status_bp3l_rek'),
      'dokumen_bp3l_rek': new FileUploader($('#bp3l_rek_form').find('#dokumen_bp3l_rek'), "", "dokumen_bp3l_rek", ".pdf", false, true),
      'dokumen_bp3l_sertifikat_ig': new FileUploader($('#bp3l_rek_form').find('#dokumen_bp3l_sertifikat_ig'), "", "dokumen_bp3l_sertifikat_ig", ".pdf", false, true),
      'dokumen_bp3l_sertifikat_ig_form': $('#bp3l_rek_form').find('#dokumen_bp3l_sertifikat_ig_form'),

      'dokumen_bp3l_rek_form': $('#bp3l_rek_form').find('#dokumen_bp3l_rek_form'),
      'catatan_bp3l_rek': $('#bp3l_rek_form').find('#catatan_bp3l_rek'),
      'catatan_bp3l_rek_form': $('#bp3l_rek_form').find('#catatan_bp3l_rek_form'),
      save_btn: $('#bp3l_rek_form').find('#save_edit_btn'),
    }

    var bpsmb_mutu_modal = {
      self: $('#bpsmb_mutu_modal'),
      form: $('#bpsmb_mutu_form'),
      'id_pengiriman': $('#bpsmb_mutu_form').find('#id_pengiriman'),
      'jenis_usaha': $('#bpsmb_mutu_form').find('#jenis_usaha'),

      'tgl_sampel': $('#bpsmb_mutu_form').find('#tgl_sampel'),
      'tgl_sampel_form': $('#bpsmb_mutu_form').find('#tgl_sampel_form'),

      'status_bpsmb_mutu': $('#bpsmb_mutu_form').find('#status_bpsmb_mutu'),
      'dokumen_hasil_mutu': new FileUploader($('#bpsmb_mutu_form').find('#dokumen_hasil_mutu'), "", "dokumen_hasil_mutu", ".pdf", false, true),
      'dokumen_hasil_mutu_form': $('#bpsmb_mutu_form').find('#dokumen_hasil_mutu_form'),
      'catatan_bpsmb_mutu': $('#bpsmb_mutu_form').find('#catatan_bpsmb_mutu'),
      'catatan_bpsmb_mutu_form': $('#bpsmb_mutu_form').find('#catatan_bpsmb_mutu_form'),
      // 'jenis_usaha': $('#bpsmb_mutu_form').find('#jenis_usaha'),
      // 'dokumen_bp3l_sertifikat_ig': new FileUploader($('#bpsmb_mutu_form').find('#dokumen_bp3l_sertifikat_ig'), "", "dokumen_bp3l_sertifikat_ig", ".pdf", false, true),
      // 'dokumen_bp3l_sertifikat_ig_form': $('#bpsmb_mutu_form').find('#dokumen_bp3l_sertifikat_ig_form'),

      save_btn: $('#bpsmb_mutu_form').find('#save_edit_btn'),
    }

    var disperindag_izin_modal = {
      self: $('#disperindag_izin_modal'),
      form: $('#disperindag_izin_form'),
      'id_pengiriman': $('#disperindag_izin_form').find('#id_pengiriman'),
      'status_disperindag_izin': $('#disperindag_izin_form').find('#status_disperindag_izin'),
      'dokumen_disperindag_izin': new FileUploader($('#disperindag_izin_form').find('#dokumen_disperindag_izin'), "", "dokumen_disperindag_izin", ".pdf", false, true),
      'dokumen_disperindag_izin_form': $('#disperindag_izin_form').find('#dokumen_disperindag_izin_form'),
      'catatan_disperindag_izin': $('#disperindag_izin_form').find('#catatan_disperindag_izin'),
      'catatan_disperindag_izin_form': $('#disperindag_izin_form').find('#catatan_disperindag_izin_form'),
      save_btn: $('#disperindag_izin_form').find('#save_edit_btn'),
    }

    function statusPermohonan2(status) {
      if (status == 'DIMULAI')
        return `<i class='fa fa-edit text-warning'> Draft</i>`;
      else if (status == 'MENUNGGU')
        return `<i class='fa fa-hourglass-start text-warning'> Belum Memenuhi Prasyarat</i>`;
      else if (status == 'DIPROSES')
        return `<i class='fa fa-hourglass-start text-primary'> Diproses</i>`;
      else if (status == 'DIPROSES2')
        return `<i class='fa fa-hourglass-start text-primary'> Diproses</i>`;
      else if (status == 'DITERIMA')
        return `<i class='fa fa-check text-success'> Diterima</i>`;
      return `<i class='fa fa-times text-danger'> Ditolak</i>`;
    }

    function statusPermohonan3(status) {
      if (status == 'DIMULAI')
        return `<i class='fa fa-edit text-warning'> Draft</i>`;
      else if (status == 'DIPROSES')
        return `<i class='fa fa-hourglass-start text-primary'> Pengiriman Proposal</i>`;
      else if (status == 'DITERIMA')
        return `<i class='fa fa-check text-success'> Selesai</i>`;
      return `<i class='fa fa-times text-danger'> Ditolak</i>`;
    }
    renderDokumen(dataInfo);

    function renderDokumen(data) {
      if (data == null || typeof data != "object") {
        console.log("Dokumen::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      // var kpb_rek_status = statusPermohonan(dataInfo['status_kpb_rek']) + (dataInfo['status_kpb_rek'] == 'MENUNGGU' ? ': Pengiriman Proposal': '');

      var perusahaan_status = statusPermohonan3(dataInfo['status_proposal'])
      var dok_permohonan = dataInfo['dokumen_permohonan'] ? downloadButtonV2("<?= base_url('uploads/dokumen_permohonan/') ?>", dataInfo['dokumen_permohonan'], "Permohonan") : "Tidak Ada Dokumen BP3L";
      // var dokbpsmb = dataInfo['dokumen_bpsmb_mutu'] ? downloadButtonV2("<?= base_url('uploads/dokumen_bpsmb_mutu/') ?>", dataInfo['dokumen_bpsmb_mutu'], "Permohonan BPSMB") : "Tidak Ada Dokumen";
      // if(role == 'perusahaan' || role == 'kpb'){
      var perusahaan_dokumen = dok_permohonan;
      // }else if(role == 'bp3l'){
      // var perusahaan_dokumen = dok_permohonan;  
      // }else if(role == 'mutu'){
      // var perusahaan_dokumen = dokbpsmb;  
      // }
      // var perusahaan_dokumen = 
      if (!empty(dataInfo['date_proposal'])) date = dataInfo['date_proposal'].split(':');
      var perusahaan_status = dataInfo['date_proposal'] ? perusahaan_status += '<br>' + date[0] + ':' + date[1] : perusahaan_status;
      renderData.push(['Perusahaan', perusahaan_status, '-', perusahaan_dokumen, '-', '-']);


      var kpb_rek_status = statusPermohonan2(dataInfo['status_kpb_rek']) + (dataInfo['status_kpb_rek'] == 'MENUNGGU' ? ': Pengiriman Proposal' : '');
      if (!empty(dataInfo['date_kpb'])) date = dataInfo['date_kpb'].split(':');
      if (!empty(dataInfo['date_kpb_acc'])) {
        date_acc = dataInfo['date_kpb_acc'].split(':');
        var kpb_rek_status = dataInfo['date_kpb'] ? kpb_rek_status += '<br>' + date_acc[0] + ':' + date_acc[1] + "<br><i class='fa fa-check text-success'> Rekomendasi </i><br>" + date[0] + ':' + date[1] : kpb_rek_status;
      } else {
        var kpb_rek_status = dataInfo['date_kpb'] ? kpb_rek_status += '<br>' + date[0] + ':' + date[1] : kpb_rek_status;
      }
      // var kpb_pdf_pengiriman = downloadButtonV2("<?= site_url('FormatDokumenController/pdf_pengiriman/') ?>", "?id_pengiriman=" + dataInfo['id_pengiriman'], "Ringkasan Pengiriman");

      var kpb_rek_permohonan = '-';
      var kpb_rek_balasan = '-';
      // var kpb_rek_permohonan = downloadButtonV2("<?= site_url('FormatDokumenController/format_permohonan_to_bp3l/') ?>", "?id_pengiriman=" + dataInfo['id_pengiriman'], "Permohonan");
      // var kpb_rek_balasan = downloadButtonV2("<?= base_url('uploads/dokumen_kpb_rek/') ?>", dataInfo['dokumen_kpb_rek'], "Rekomendasi");
      var kpb_rek_catatan = dataInfo['catatan_kpb_rek'] ? dataInfo['catatan_kpb_rek'] : 'Tidak Ada';
      if (dataInfo['id_tahap_proposal'] == '1' || dataInfo['id_tahap_proposal'] == '6') {
        var kpb_rek_btn = dataInfo['kpb_rek_edit'] ? '-' : `<button class="btn btn-success btn-sm kpb_rek"><i class='fa fa-angle-double-right'></i></button>`;
      } else {
        var kpb_rek_btn = '-';
      }

      if (role == 'kpb') renderData.push(['KPB', kpb_rek_status, kpb_rek_permohonan, kpb_rek_balasan, kpb_rek_catatan, kpb_rek_btn]);

      var bp3l_rek_status = statusPermohonan2(dataInfo['status_bp3l_rek']) + (dataInfo['status_bp3l_rek'] == 'MENUNGGU' ? ': Rekomendasi KPB' : '');
      if (!empty(dataInfo['date_bp3l'])) date = dataInfo['date_bp3l'].split(':');
      if (!empty(dataInfo['date_bp3l_acc'])) {
        date_acc = dataInfo['date_bp3l_acc'].split(':');
        var bp3l_rek_status = dataInfo['date_bp3l'] ? bp3l_rek_status += '<br>' + date_acc[0] + ':' + date_acc[1] + "<br><i class='fa fa-check text-success'> Rekomendasi </i><br>" + date[0] + ':' + date[1] : bp3l_rek_status;
      } else {
        var bp3l_rek_status = dataInfo['date_bp3l'] ? bp3l_rek_status += '<br>' + date[0] + ':' + date[1] : bp3l_rek_status;
      }
      // var bp3l_rek_status = dataInfo['date_bp3l'] ? bp3l_rek_status += '<br>'+date[0]+':'+date[1] : bp3l_rek_status;   

      var bp3l_rek_permohonan = downloadButtonV2("<?= site_url('FormatDokumenController/format_permohonan_bp3l_to_bpsmb/') ?>", "?id_pengiriman=" + dataInfo['id_pengiriman'], "Permohonan");
      var bp3l_rek_balasan = downloadButtonV2("<?= base_url('uploads/dokumen_bp3l_rek/') ?>", dataInfo['dokumen_bp3l_rek'], "Rekomendasi");
      var bp3l_sertifikat_ig_balasan = downloadButtonV2("<?= base_url('uploads/dokumen_bp3l_sertifikat_ig/') ?>", dataInfo['dokumen_bp3l_sertifikat_ig'], "Sertifikat IG");
      var bp3l_rek_catatan = dataInfo['catatan_bp3l_rek'] ? dataInfo['catatan_bp3l_rek'] : 'Tidak Ada';
      if (dataInfo['id_tahap_proposal'] == '2' || dataInfo['id_tahap_proposal'] == '5') {
        var bp3l_rek_btn = dataInfo['bp3l_rek_edit'] ? '-' : `<button class="btn btn-success btn-sm bp3l_rek"><i class='fa fa-angle-double-right'></i></button>`;
      } else {
        var bp3l_rek_btn = '-';
      }
      if (role != 'bp3l') bp3l_rek_permohonan = "-";


      <?php if ($this->session->userdata()['id_role'] == '2') {  ?>
        var bp3l_rek_balasan = "-";
        if (dataInfo['id_tahap_proposal'] == '99') {
          renderData.push(['BP3L', bp3l_rek_status, bp3l_rek_permohonan, bp3l_rek_balasan + '<br><br>' + bp3l_sertifikat_ig_balasan, bp3l_rek_catatan, bp3l_rek_btn]);
        } else {
          renderData.push(['BP3L', bp3l_rek_status, bp3l_rek_permohonan, bp3l_rek_balasan, bp3l_rek_catatan, bp3l_rek_btn]);
        }
        // renderData.push(['BP3L', bp3l_rek_status, bp3l_rek_permohonan,bp3l_sertifikat_ig_balasan, bp3l_rek_catatan, bp3l_rek_btn]);    
      <?php } else { ?>
        renderData.push(['BP3L', bp3l_rek_status, bp3l_rek_permohonan, bp3l_rek_balasan + '<br><br>' + bp3l_sertifikat_ig_balasan, bp3l_rek_catatan, bp3l_rek_btn]);
      <?php }; ?>
      var bpsdm_sertifikat_ig_balasan = dataInfo['dokumen_bp3l_sertifikat_ig'] ? downloadButtonV2("<?= base_url('uploads/dokumen_bp3l_sertifikat_ig/') ?>", dataInfo['dokumen_bp3l_sertifikat_ig'], "Sertifikat IG") : 'Tidak Ada';

      var bpsmb_mutu_status = statusPermohonan(dataInfo['status_bpsmb_mutu']) + (dataInfo['status_bpsmb_mutu'] == 'MENUNGGU' ? ': Rekomendasi BP3L' : '');
      // if(dataInfo['id_tahap_proposal'] == '4' )bpsmb_mutu_status = statusPermohonandataInfo['date_bpsmb_mutu'].split(':');

      if (!empty(dataInfo['date_bpsmb_mutu'])) date = dataInfo['date_bpsmb_mutu'].split(':');
      var bpsmb_mutu_status = dataInfo['date_bpsmb_mutu'] ? bpsmb_mutu_status += '<br>' + date[0] + ':' + date[1] : bpsmb_mutu_status;
      // var bpsmb_pdf_pengiriman = downloadButtonV2("<?= site_url('FormatDokumenController/pdf_pengiriman/') ?>", "?id_pengiriman=" + dataInfo['id_pengiriman'], "Ringkasan Pengiriman");

      var bpsmb_mutu_permohonan = '-';
      var bpsmb_mutu_balasan = downloadButtonV2("<?= base_url('uploads/dokumen_hasil_mutu/') ?>", dataInfo['dokumen_hasil_mutu'], 'Hasil Uji Mutu');
      var bpsmb_mutu_catatan = dataInfo['catatan_bpsmb_mutu'] ? dataInfo['catatan_bpsmb_mutu'] : '';
      if (dataInfo['id_tahap_proposal'] > '3') {
        bpsmb_mutu_catatan = "Tanggal pengambilan sampel : " + data['tgl_sampel'] + " <br>" + bpsmb_mutu_catatan;
      }
      var bpsmb_mutu_btn = dataInfo['bpsmb_mutu_edit'] ? '-' : `<button class="btn btn-success btn-sm bpsmb_mutu"><i class='fa fa-angle-double-right'></i></button>`;

      renderData.push(['BPSMB', bpsmb_mutu_status, bpsmb_mutu_permohonan, bpsmb_mutu_balasan, bpsmb_mutu_catatan, bpsmb_mutu_btn]);

      // var disperindag_izin_status = statusPermohonan(dataInfo['status_disperindag_izin']) + (dataInfo['status_disperindag_izin'] == 'MENUNGGU' ? ': <br>Mutu BPSMB': '');
      // if(!empty(dataInfo['date_disperindag']))date = dataInfo['date_disperindag'].split(':');
      // var disperindag_izin_status = dataInfo['date_disperindag'] ? disperindag_izin_status += '<br>'+date[0]+':'+date[1] : disperindag_izin_status;   

      // disperindag_izin_permohonan = '-'
      // // var disperindag_izin_permohonan = downloadButtonV2("<?= site_url('PengirimanController/permohonan_disperindag_izin/') ?>", "?id_pengiriman=" + dataInfo['id_pengiriman'], "Permohonan") ;
      // var disperindag_izin_balasan = downloadButtonV2("<?= base_url('uploads/dokumen_disperindag_izin/') ?>", dataInfo['dokumen_disperindag_izin'], 'Izin Pengiriman');
      // var disperindag_izin_catatan = dataInfo['catatan_disperindag_izin'] ? dataInfo['catatan_disperindag_izin'] : 'Tidak Ada';
      // var disperindag_izin_btn = dataInfo['disperindag_izin_edit'] ? '-' : `<button class="btn btn-success btn-sm disperindag_izin"><i class='fa fa-angle-double-right'></i></button>`;
      // if(dataInfo['id_jenis_perusahaan'] == '1'){
      //   renderData.push(['Disperindag', disperindag_izin_status, disperindag_izin_permohonan, disperindag_izin_balasan , disperindag_izin_catatan, disperindag_izin_btn]);
      // }
      dokumen_table.clear().rows.add(renderData).draw('full-hold');
    }

    dokumen_table.on('click', '.kpb_rek', function() {
      kpb_rek_modal.form.trigger('reset');
      kpb_rek_modal.self.modal('show');
      kpb_rek_modal.save_btn.show();
      kpb_rek_modal.id_pengiriman.val(id_pengiriman);
      // kpb_rek_modal.dokumen_kpb_rek.resetState();
      kpb_rek_modal.status_kpb_rek.trigger('change');
    });


    dokumen_table.on('click', '.bp3l_rek', function() {

      bp3l_rek_modal.form.trigger('reset');
      bp3l_rek_modal.self.modal('show');
      bp3l_rek_modal.save_btn.show();
      bp3l_rek_modal.id_pengiriman.val(id_pengiriman);
      bp3l_rek_modal.dokumen_bp3l_rek.resetState();
      bp3l_rek_modal.status_bp3l_rek.trigger('change');

    });

    dokumen_table.on('click', '.bpsmb_mutu', function() {
      bpsmb_mutu_modal.form.trigger('reset');
      bpsmb_mutu_modal.self.modal('show');
      bpsmb_mutu_modal.save_btn.show();
      bpsmb_mutu_modal.id_pengiriman.val(id_pengiriman);
      bpsmb_mutu_modal.jenis_usaha.val(dataInfo['id_jenis_perusahaan']);
      bpsmb_mutu_modal.dokumen_hasil_mutu.resetState();
      if (dataInfo['status_bpsmb_mutu'] == 'DIPROSES2') {
        bpsmb_mutu_modal.dokumen_hasil_mutu_form.toggle(true);
        bpsmb_mutu_modal.dokumen_hasil_mutu.setRequired(true);
        bpsmb_mutu_modal.tgl_sampel_form.toggle(true);
        bpsmb_mutu_modal.tgl_sampel.val(dataInfo['tgl_sampel']);
        bpsmb_mutu_modal.tgl_sampel.prop('readonly', 'true');
        bpsmb_mutu_modal.status_bpsmb_mutu.attr('readonly', 'true');
        bpsmb_mutu_modal.status_bpsmb_mutu.val('DIPROSES2');
        // bpsmb_mutu_modal.tgl_sampel.setRequired(status == 'DITERIMA');
        // bpsmb_mutu_modal.dokumen_hasil_mutu.resetState();
        bpsmb_mutu_modal.catatan_bpsmb_mutu_form.toggle(true);
        bpsmb_mutu_modal.catatan_bpsmb_mutu.val(dataInfo['catatan_bpsmb_mutu']);

      } else {

        bpsmb_mutu_modal.status_bpsmb_mutu.trigger('change');
      }
    });

    dokumen_table.on('click', '.disperindag_izin', function() {
      disperindag_izin_modal.form.trigger('reset');
      disperindag_izin_modal.self.modal('show');
      disperindag_izin_modal.save_btn.show();
      disperindag_izin_modal.id_pengiriman.val(id_pengiriman);
      disperindag_izin_modal.dokumen_disperindag_izin.resetState();
      disperindag_izin_modal.status_disperindag_izin.trigger('change');
    });


    kpb_rek_modal.status_kpb_rek.on('change', (e) => {
      if (dataInfo['id_tahap_proposal'] == '6') {
        kpb_rek_modal.status_kpb_rek.val('DITERIMA')
        kpb_rek_modal.status_kpb_rek.attr('readonly', 'true');
        kpb_rek_modal.catatan_kpb_rek.val(dataInfo['catatan_kpb_rek']);
        // kpb_rek_modal.dokumen_kpb_rek_form.toggle(false);
        // kpb_rek_modal.dokumen_kpb_rek.setRequired(false);
      } else {
        var status = kpb_rek_modal.status_kpb_rek.val();
        // kpb_rek_modal.dokumen_kpb_rek_form.toggle(status == 'DIPROSES2');
        // kpb_rek_modal.dokumen_kpb_rek.setRequired(status == 'DIPROSES2');
        // // kpb_rek_modal.dokumen_kpb_rek.resetState();
        kpb_rek_modal.catatan_kpb_rek_form.toggle(true);
        kpb_rek_modal.catatan_kpb_rek.attr('required', status == 'DITOLAK');
        // kpb_rek_modal.dokumen_kpb_rek_form.toggle(true);
        // kpb_rek_modal.dokumen_kpb_rek.setRequired(true);
      }
    });


    bp3l_rek_modal.status_bp3l_rek.on('change', (e) => {
      if (dataInfo['id_tahap_proposal'] == '5') {
        bp3l_rek_modal.status_bp3l_rek.val('DITERIMA')
        bp3l_rek_modal.status_bp3l_rek.attr('readonly', 'true');
        bp3l_rek_modal.dokumen_bp3l_sertifikat_ig_form.toggle(true);
        bp3l_rek_modal.dokumen_bp3l_sertifikat_ig.setRequired(true);
        bp3l_rek_modal.dokumen_bp3l_rek_form.toggle(false);
        bp3l_rek_modal.dokumen_bp3l_rek.setRequired(false);

        bp3l_rek_modal.catatan_bp3l_rek.val(dataInfo['catatan_bp3l_rek']);
      } else {
        var status = bp3l_rek_modal.status_bp3l_rek.val();

        bp3l_rek_modal.dokumen_bp3l_rek_form.toggle(status == 'DIPROSES2');
        bp3l_rek_modal.dokumen_bp3l_rek.setRequired(status == 'DIPROSES2');

        bp3l_rek_modal.dokumen_bp3l_rek.resetState();
        bp3l_rek_modal.dokumen_bp3l_sertifikat_ig_form.toggle(false);
        bp3l_rek_modal.dokumen_bp3l_sertifikat_ig.setRequired(false);
        bp3l_rek_modal.catatan_bp3l_rek.val(dataInfo['catatan_bp3l_rek']);
      }


    })

    bpsmb_mutu_modal.status_bpsmb_mutu.on('change', (e) => {

      var status = bpsmb_mutu_modal.status_bpsmb_mutu.val();
      bpsmb_mutu_modal.dokumen_hasil_mutu_form.toggle(false);
      bpsmb_mutu_modal.dokumen_hasil_mutu.setRequired(false);
      bpsmb_mutu_modal.tgl_sampel_form.toggle(status == 'DIPROSES2');
      // bpsmb_mutu_modal.tgl_sampel.setRequired(status == 'DITERIMA');
      // bpsmb_mutu_modal.dokumen_hasil_mutu.resetState();
      bpsmb_mutu_modal.catatan_bpsmb_mutu_form.toggle(true);
      bpsmb_mutu_modal.catatan_bpsmb_mutu.attr('required', status == 'DITOLAK');
      bpsmb_mutu_modal.catatan_bpsmb_mutu.val(null);
    })

    disperindag_izin_modal.status_disperindag_izin.on('change', (e) => {
      var status = disperindag_izin_modal.status_disperindag_izin.val();
      disperindag_izin_modal.dokumen_disperindag_izin_form.toggle(status == 'DITERIMA');
      disperindag_izin_modal.dokumen_disperindag_izin.setRequired(status == 'DITERIMA');
      disperindag_izin_modal.dokumen_disperindag_izin.resetState();
      disperindag_izin_modal.catatan_disperindag_izin_form.toggle(status == 'DITOLAK');
      disperindag_izin_modal.catatan_disperindag_izin.attr('required', status == 'DITOLAK');
      disperindag_izin_modal.catatan_disperindag_izin.val(null);
    })

    bp3l_rek_modal.form.submit(function(event) {
      event.preventDefault();

      swal(saveConfirmation("Kirim balasan", "Pastikan Format File PDF", "Ya, Kirim!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(bp3l_rek_modal.save_btn);
        $.ajax({
          url: "<?= site_url('PengirimanController/bp3l_rek') ?>",
          'type': 'POST',
          data: new FormData(bp3l_rek_modal.form[0]),
          contentType: false,
          processData: false,
          success: function(data) {
            buttonIdle(bp3l_rek_modal.save_btn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            dataInfo = json['data']
            renderDokumen(dataInfo);
            bp3l_rek_modal.self.modal('hide');
            swal("Simpan Berhasil", "", "success");
          },
          error: function(e) {}
        });
      });
    });

    kpb_rek_modal.form.submit(function(event) {
      event.preventDefault();

      swal(saveConfirmation("Kirim balasan", "Pastikan Format File PDF", "Ya, Kirim!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(kpb_rek_modal.save_btn);
        $.ajax({
          url: "<?= site_url('PengirimanController/kpb_rek') ?>",
          'type': 'POST',
          data: new FormData(kpb_rek_modal.form[0]),
          contentType: false,
          processData: false,
          success: function(data) {
            buttonIdle(kpb_rek_modal.save_btn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            dataInfo = json['data']
            renderDokumen(dataInfo);
            kpb_rek_modal.self.modal('hide');
            swal("Simpan Berhasil", "", "success");
          },
          error: function(e) {}
        });
      });
    });

    bpsmb_mutu_modal.form.submit(function(event) {
      event.preventDefault();

      swal(saveConfirmation("Kirim balasan", "Yakin akan mengirim balasan mutu ini", "Ya, Kirim!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(bpsmb_mutu_modal.save_btn);
        $.ajax({
          url: "<?= site_url('PengirimanController/bpsmb_mutu') ?>",
          'type': 'POST',
          data: new FormData(bpsmb_mutu_modal.form[0]),
          contentType: false,
          processData: false,
          success: function(data) {
            buttonIdle(bpsmb_mutu_modal.save_btn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            dataInfo = json['data']
            renderDokumen(dataInfo);
            bpsmb_mutu_modal.self.modal('hide');
            swal("Simpan Berhasil", "", "success");
          },
          error: function(e) {}
        });
      });
    });

    disperindag_izin_modal.form.submit(function(event) {
      event.preventDefault();

      swal(saveConfirmation("Kirim balasan", "Yakin akan mengirim balasan mutu ini", "Ya, Kirim!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(disperindag_izin_modal.save_btn);
        $.ajax({
          url: "<?= site_url('PengirimanController/disperindag_izin') ?>",
          'type': 'POST',
          data: new FormData(disperindag_izin_modal.form[0]),
          contentType: false,
          processData: false,
          success: function(data) {
            buttonIdle(disperindag_izin_modal.save_btn);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            dataInfo = json['data']
            renderDokumen(dataInfo);
            disperindag_izin_modal.self.modal('hide');
            swal("Simpan Berhasil", "", "success");
          },
          error: function(e) {}
        });
      });
    });

  });
</script>