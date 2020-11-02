<div class="wrapper wrapper-content animated fadeInRight" id="info_container">
  <div class="row">
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nama Perusahaan</h5>
          <p class="no-margins"><span id="nama_perusahaan">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nama Pengiriman</h5>
          <p class="no-margins"><span id="nama_pengiriman">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nomor Surat</h5>
          <p class="no-margins"><span id="no_surat">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nama Komoditi</h5>
          <p class="no-margins"><span id="nama_komoditi">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Rencana Pengapalan</h5>
          <p class="no-margins"><span id="rencana_pengapalan">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Jumlah Berat</h5>
          <p class="no-margins"><span id="jumlah_berat">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Jumlah Partai</h5>
          <p class="no-margins"><span id="jumlah_partai">-</span></p>
        </div>
      </div>
    </div>
    <!-- <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Nomor Kontrak</h5>
          <p class="no-margins"><span id="nomor_kontrak">-</span></p>
        </div>
      </div>
    </div>     -->
    <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Status Proposal</h5>
          <p class="no-margins"><span id="status_pengiriman">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-3" id="layer_dokumen_permohonan" style="display:none">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Dokumen Permohonan</h5>
          <p class="no-margins"><span id="status_dokumen_permohonan">-</span></p>
        </div>
      </div>
    </div>
    <div class="col-lg-6 m-t-n-sm">
      <button class="btn btn-success my-1 mr-sm-2" id="edit_info_btn" style="display:none"><i class='fa fa-edit'></i> Edit Pengiriman</button>
      <button class="btn btn-success my-1 mr-sm-2" id="dok_permohonan_bp3l_btn" style="display:none"><i class='fa fa-upload'></i> Upload Permohonan</button>
      <button hidden class="btn btn-success my-1 mr-sm-2" id="dok_permohonan_bpsmb_btn" style="display:none"><i class='fa fa-upload'></i> Upload Permohonan ke BPSMB</button>
    </div>
  </div>
  <div class="row m-t-sm">
    <div class="col-lg-12">
      <div class="table-responsive">
        <table id="pengiriman_item_table" class="table table-bordered table-hover" style="padding:0px;font-size:11px">
          <thead>
            <tr>
              <th style="width: 19%; text-align:center!important">Spesifikasi Item</th>
              <th style="width: 19%; text-align:center!important">Importir</th>
              <th style="width: 19%; text-align:center!important">Ports</th>
              <th style="width: 19%; text-align:center!important">Pengemasan</th>
              <th style="width: 19%; text-align:center!important">Tanggal Pengiriman</th>
              <th style="width: 5%; text-align:center!important">Action</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-12">
      <button class="btn btn-success my-1 mr-sm-2" id="pengiriman_item_tambah_btn" style="display:none"><i class='fa fa-edit'></i> Tambah Item</button>
    </div>
  </div>
  <div class="row m-t-sm">
    <div class="col-lg-12">
      <button class="btn btn-success my-1 mr-sm-2" id="process_btn" style="display:none"><i class='fa fa-paper-plane'></i> Kirim Proposal</button>
      <button class="btn btn-danger my-1 mr-sm-2" id="delete_btn" style="display:none"><i class='fa fa-times'></i> Hapus Proposal</button>
    </div>
  </div>
</div>

<div class="modal inmodal" id="informasi_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Informasi Pengiriman</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form role="form" id="informasi_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <div class="form-group">
            <label for="nama_pengirimanx">Nama Pengiriman</label>
            <input type="text" placeholder="Nama Pengiriman" class="form-control" id="nama_pengirimanx" name="nama_pengiriman" required="required">
          </div>
          <div class="form-group">
            <label for="no_suratx">Nomor Surat</label>
            <input type="text" placeholder="Nomor Surat" class="form-control" id="no_suratx" name="no_surat" required="required">
          </div>
          <div class="form-group">
            <label for="nama_komoditix">Nama Komoditi</label>
            <input type="text" placeholder="Nama Komoditi" class="form-control" id="nama_komoditix" name="nama_komoditi" required="required">
          </div>
          <div class="form-group">
            <label for="rencana_pengapalanx">Rencana Pengapalan</label>
            <input type="text" placeholder="Rencana Pengapalan" class="form-control" id="rencana_pengapalanx" name="rencana_pengapalan" required="required">
          </div>
          <div class="form-group">
            <label for="jumlah_beratx">Jumlah Berat (Metric Ton)</label>
            <input type="number" placeholder="Jumlah Berat" step="0.01" class="form-control" id="jumlah_beratx" name="jumlah_berat" required="required">
          </div>
          <div class="form-group">
            <label for="jumlah_partaix">Jumlah Partai</label>
            <input type="number" placeholder="Jumlah Partai" class="form-control" id="jumlah_partaix" name="jumlah_partai" required="required">
          </div>
          <!-- <div class="form-group">
              <label for="nomor_kontrakx">Nomor Kontrak</label> 
              <input type="text" placeholder="Nomor Kontrak" class="form-control" id="nomor_kontrakx" name="nomor_kontrak" required="required">
            </div> -->

          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="pengiriman_item_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Kelola Item Pengiriman</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">
        <form opd="form" id="pengiriman_item_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">
          <input type="hidden" id="id_pengiriman_item" name="id_pengiriman_item">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="netto">Netto (Kg)</label>
                <input required="required" type="number" min="0" step="1" placeholder="0" class="form-control" id="netto" name="netto">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gross">Gross (Kg)</label>
                <input required="required" type="number" min="0" step="1" placeholder="0" class="form-control" id="gross" name="gross">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="netto_karung">Netto Karung (Kg)</label>
                <input required="required" type="number" min="0" step="0.01" placeholder="0" class="form-control" id="netto_karung" name="netto_karung">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gross_karung">Gross Karung (Kg)</label>
                <input required="required" type="number" min="0" step="0.01" placeholder="0" class="form-control" id="gross_karung" name="gross_karung">
              </div>
            </div>

            <div class="col-sm-8">
              <div class="form-group">
                <label for="nama_importir">Nama Importir</label>
                <input required="required" type="text" class="form-control" placeholder="Nama Importir" id="nama_importir" name="nama_importir">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="id_jenis_mutu">Target Mutu</label>
                <select required="required" class="form-control mr-sm-2" name="id_jenis_mutu" id="id_jenis_mutu"></select>
                <div><a href="<?= base_url('assets/Rincian_Standar_Mutu.xlsx?v=0.0.1') ?>" target="_blank"> <small>Rincian Standar Mutu</small></a></div>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="nomor_kontrak">Nomor Kontrak</label>
                <input required="required" type="text" class="form-control" placeholder="Nomor Kontrak" id="nomor_kontrak" name="nomor_kontrak">
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="keterangan_marking">Keterangan Marking</label>
                <input required="required" type="text" class="form-control" placeholder="Keterangan Marking" id="keterangan_marking" name="keterangan_marking">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="city">City</label>
                <input required="required" type="text" class="form-control" placeholder="City" id="city" name="city">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="province">Province</label>
                <input required="required" type="text" class="form-control" placeholder="Province" id="province" name="province">
              </div>
            </div>
            <div class="col-sm-4">
              <div class="form-group">
                <label for="id_negara">Negara</label>
                <select required="required" class="form-control mr-sm-2" name="id_negara" id="id_negara"></select>
              </div>
            </div>
            <!--  -->
            <div class="col-lg-12" id='ly_id_negara'>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="nama_buyer">Nama Buyer / Penerima</label>
                    <input required="required" class="form-control mr-sm-2" placeholder="Nama Buyer / Penerima" name="nama_buyer" id="nama_buyer"></input>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="alamat_buyer">Alamat Buyer / Penerima</label>
                    <!-- <input required="required" class="form-control mr-sm-2" name="alamat_buyer" id="alamat_buyer"></input> -->
                    <textarea required="required" rows="4" type="text" placeholder="Alamat Buyer / Penerima" class="form-control" id="alamat_buyer" name="alamat_buyer"></textarea>

                  </div>
                </div>
              </div>
            </div>
            <!--  -->
            <div class="col-sm-6">
              <div class="form-group">
                <label for="id_port_of_origin">Port Of Origin</label>
                <select required="required" class="form-control mr-sm-2" name="id_port_of_origin" id="id_port_of_origin"></select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="port_of_destination">Port of Destination</label>
                <input required="required" type="text" class="form-control" placeholder="Port of Destination" id="port_of_destination" name="port_of_destination">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="id_jenis_pengemasan">Jenis Pengemasan</label>
                <select required="required" class="form-control mr-sm-2" name="id_jenis_pengemasan" id="id_jenis_pengemasan"></select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="tanggal_pengiriman">Tanggal Pengiriman</label>
                <input required="required" type="text" class="form-control" placeholder="Tanggal Pengiriman" id="tanggal_pengiriman" name="tanggal_pengiriman">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="shipping_mark">Shipping Mark</label>
                <!-- <input type="text" class="form-control" placeholder="Shipping Mark" id="shipping_mark" name="shipping_mark"> -->
                <textarea required="required" rows="4" type="text" placeholder="Shipping Mark" class="form-control" id="shipping_mark" name="shipping_mark"></textarea>

              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="keterangan_penggunaan_produk">Keterangan Penggunaan Produk</label>
                <textarea required="required" rows="4" type="text" placeholder="Keterangan Penggunaan Produk" class="form-control" id="keterangan_penggunaan_produk" name="keterangan_penggunaan_produk"></textarea>

                <!-- <input type="text" class="form-control" placeholder="Keterangan Penggunaan Produk" id="keterangan_penggunaan_produk" name="keterangan_penggunaan_produk"> -->
              </div>
            </div>

          </div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Tambah</strong></button>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save_edit_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="dok_permohonan_all_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Upload Dokukmen Permohonan </h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">

        <form opd="form" id="dok_permohonan_all_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">

          <div class="form-group" id="dokumen_permohonan_all_form">
            <label for="dokumen_permohonan_all">Dokumen Permohonan <small>*pdf</small></label>
            <p class="no-margins"><span id="dokumen_permohonan_all">-</span></p>
          </div>
          <div id='format_permohonan_pengiriman_all'></div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="upload_to_all_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal" id="dok_permohonan_bpsmb_modal" tabindex="-1" opd="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Upload Dokukmen Permohonan BPSMB</h4>
        <span class="info"></span>
      </div>
      <div class="modal-body" id="modal-body">

        <form opd="form" id="dok_permohonan_bpsmb_form" onsubmit="return false;" type="multipart" autocomplete="off">
          <input type="hidden" id="id_pengiriman" name="id_pengiriman">

          <div class="form-group" id="dokumen_permohonan_bpsmb_form">
            <label for="dokumen_disperindag_izin">Dokumen Permohonan <small>*pdf</small></label>
            <p class="no-margins"><span id="dokumen_permohonan_bpsmb">-</span></p>
          </div>
          <div id='format_permohonan_pengiriman_bpsmb'></div>
          <button class="btn btn-success my-1 mr-sm-2" type="submit" id="upload_to_bpsmb_btn" data-loading-text="Loading..."><strong>Simpan</strong></button>
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
    var info = {
      'self': $('#info_container'),
      'nama_perusahaan': $('#info_container').find('#nama_perusahaan'),
      'nama_pengiriman': $('#info_container').find('#nama_pengiriman'),
      'no_surat': $('#info_container').find('#no_surat'),
      'nama_komoditi': $('#info_container').find('#nama_komoditi'),
      // 'nomor_kontrak' : $('#info_container').find('#nomor_kontrak'),
      'rencana_pengapalan': $('#info_container').find('#rencana_pengapalan'),
      'jumlah_berat': $('#info_container').find('#jumlah_berat'),
      'jumlah_partai': $('#info_container').find('#jumlah_partai'),
      'status_pengiriman': $('#info_container').find('#status_pengiriman'),
      'status_dokumen_permohonan': $('#info_container').find('#status_dokumen_permohonan'),
      'edit_info_btn': $('#edit_info_btn'),
      'layer_dokumen_permohonan': $('#layer_dokumen_permohonan'),
      'dok_permohonan_bpsmb_btn': $('#dok_permohonan_bpsmb_btn'),
      'dok_permohonan_bp3l_btn': $('#dok_permohonan_bp3l_btn'),
      'delete_btn': $('#delete_btn'),
      'process_btn': $('#process_btn'),
    }

    $('#format_permohonan_pengiriman_bpsmb').html(downloadButtonV2("<?= site_url('FormatDokumenController/format_permohonan_to_bpsmb_mutu/') ?>", "?id_pengiriman=" + id_pengiriman, "Download Format BPSMB Word"))
    $('#format_permohonan_pengiriman_all').html(downloadButtonV2("<?= site_url('FormatDokumenController/format_permohonan_pergub/') ?>", "?id_pengiriman=" + id_pengiriman, "Download Format Word"))

    var informasiModal = {
      self: $('#informasi_modal'),
      form: $('#informasi_form'),
      'id_pengiriman': $('#informasi_form').find('#id_pengiriman'),
      'nama_pengiriman': $('#informasi_form').find('#nama_pengirimanx'),
      'no_surat': $('#informasi_form').find('#no_suratx'),
      'nama_komoditi': $('#informasi_form').find('#nama_komoditix'),
      // 'nomor_kontrak' : $('#informasi_form').find('#nomor_kontrakx'),
      'rencana_pengapalan': $('#informasi_form').find('#rencana_pengapalanx'),
      'jumlah_berat': $('#informasi_form').find('#jumlah_beratx'),
      'jumlah_partai': $('#informasi_form').find('#jumlah_partaix'),
      save_btn: $('#informasi_modal').find('#save'),
    }

    var DokPermohonanBpsmb = {
      self: $('#dok_permohonan_bpsmb_modal'),
      form: $('#dok_permohonan_bpsmb_form'),
      'id_pengiriman': $('#dok_permohonan_bpsmb_form').find('#id_pengiriman'),
      'dokumen_permohonan_bpsmb_form': $('#dok_permohonan_bpsmb_form').find('#dokumen_permohonan_bpsmb_form'),
      'dokumen_permohonan_bpsmb': new FileUploader($('#dok_permohonan_bpsmb_form').find('#dokumen_permohonan_bpsmb'), "", "dokumen_bpsmb_mutu", ".pdf", false, true),
      save_btn: $('#dok_permohonan_bpsmb_form').find('#upload_to_bpsmb_btn'),
    }

    var DokPermohonanAll = {
      self: $('#dok_permohonan_all_modal'),
      form: $('#dok_permohonan_all_form'),
      'id_pengiriman': $('#dok_permohonan_all_form').find('#id_pengiriman'),
      'dokumen_permohonan_all_form': $('#dok_permohonan_all_form').find('#dokumen_permohonan_all_form'),
      'dokumen_permohonan_all': new FileUploader($('#dok_permohonan_all_form').find('#dokumen_permohonan_all'), "", "dokumen_permohonan", ".pdf", false, true),
      save_btn: $('#dok_permohonan_all_form').find('#upload_to_all_btn'),
    }

    var pengiriman_item_table = $('#pengiriman_item_table').DataTable({
      'dom': 't',
      deferRender: true,
      'ordering': false,
    });

    var pengiriman_item_tambah_btn = $('#pengiriman_item_tambah_btn');

    var pengiriman_item_modal = {
      self: $('#pengiriman_item_modal'),
      form: $('#pengiriman_item_form'),
      'id_pengiriman': $('#pengiriman_item_form').find('#id_pengiriman'),
      'id_pengiriman_item': $('#pengiriman_item_form').find('#id_pengiriman_item'),
      'netto': $('#pengiriman_item_form').find('#netto'),
      'gross': $('#pengiriman_item_form').find('#gross'),
      'netto_karung': $('#pengiriman_item_form').find('#netto_karung'),
      'gross_karung': $('#pengiriman_item_form').find('#gross_karung'),
      'id_jenis_mutu': $('#pengiriman_item_form').find('#id_jenis_mutu'),
      'nama_importir': $('#pengiriman_item_form').find('#nama_importir'),
      'city': $('#pengiriman_item_form').find('#city'),
      'province': $('#pengiriman_item_form').find('#province'),
      'id_negara': $('#pengiriman_item_form').find('#id_negara'),
      'nama_buyer': $('#pengiriman_item_form').find('#nama_buyer'),
      'alamat_buyer': $('#pengiriman_item_form').find('#alamat_buyer'),
      'ly_id_negara': $('#pengiriman_item_form').find('#ly_id_negara'),

      'id_port_of_origin': $('#pengiriman_item_form').find('#id_port_of_origin'),
      'port_of_destination': $('#pengiriman_item_form').find('#port_of_destination'),
      'id_jenis_pengemasan': $('#pengiriman_item_form').find('#id_jenis_pengemasan'),
      'tanggal_pengiriman': $('#pengiriman_item_form').find('#tanggal_pengiriman'),
      'shipping_mark': $('#pengiriman_item_form').find('#shipping_mark'),
      'nomor_kontrak': $('#pengiriman_item_form').find('#nomor_kontrak'),
      'keterangan_marking': $('#pengiriman_item_form').find('#keterangan_marking'),
      'keterangan_penggunaan_produk': $('#pengiriman_item_form').find('#keterangan_penggunaan_produk'),

      add_btn: $('#pengiriman_item_form').find('#add_btn'),
      save_btn: $('#pengiriman_item_form').find('#save_edit_btn'),
    }

    pengiriman_item_modal.tanggal_pengiriman.datepicker({
      todayBtn: "linked",
      autoclose: true,
      format: "yyyy-mm-dd"
    });

    pengiriman_item_modal.id_negara.on('change', function() {
      if (pengiriman_item_modal.id_negara.val() == 'ID') {
        pengiriman_item_modal.alamat_buyer.prop('disabled', false)
        pengiriman_item_modal.nama_buyer.prop('disabled', false)
        pengiriman_item_modal.alamat_buyer.prop('hidden', false)
        pengiriman_item_modal.nama_buyer.prop('hidden', false)
        pengiriman_item_modal.ly_id_negara.prop('hidden', false)
      } else {
        pengiriman_item_modal.ly_id_negara.prop('hidden', 'hidden')
        pengiriman_item_modal.alamat_buyer.prop('hidden', 'hidden')
        pengiriman_item_modal.nama_buyer.prop('hidden', 'hidden')
        pengiriman_item_modal.alamat_buyer.prop('disabled', 'disabled')
        pengiriman_item_modal.nama_buyer.prop('disabled', 'disabled')
      }
    });

    var dataJenisMutu = {};
    var dataNegara = {};
    var dataPortOfOrigin = {};
    var dataJenisPengemasan = {};
    var dataPengirimanItem = {};

    swal({
      title: 'Loading harga_mwp...',
      allowOutsideClick: false
    });
    swal.showLoading();
    $.when(getAllJenisMutu(), getAllNegara(), getAllPortOfOrigin(), getAllJenisPengemasan(), getAllPengirimanItem()).then((e) => {
      swal.close();
      renderInfo();
    }).fail((e) => {
      console.log(e)
    });

    function getAllJenisMutu() {
      return $.ajax({
        url: `<?php echo site_url('JenisMutuController/getAll/') ?>`,
        'type': 'GET',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataJenisMutu = json['data'];
          renderAllJenisMutu(dataJenisMutu);
        },
        error: function(e) {}
      });
    }

    function renderAllJenisMutu(data) {
      pengiriman_item_modal.id_jenis_mutu.empty();
      pengiriman_item_modal.id_jenis_mutu.append($('<option>', {
        value: "",
        text: "-- Pilih Mutu --"
      }));
      Object.values(data).forEach((d) => {
        pengiriman_item_modal.id_jenis_mutu.append($('<option>', {
          value: d['id_jenis_mutu'],
          text: d['id_jenis_mutu'] + ' :: ' + d['nama_jenis_mutu'],
        }));
      });
    }

    function getAllNegara() {
      return $.ajax({
        url: `<?php echo site_url('ParameterController/getAllNegara/') ?>`,
        'type': 'GET',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataNegara = json['data'];
          renderAllNegara(dataNegara);
        },
        error: function(e) {}
      });
    }

    function renderAllNegara(data) {
      pengiriman_item_modal.id_negara.empty();
      pengiriman_item_modal.id_negara.append($('<option>', {
        value: "",
        text: "-- Pilih Negara --"
      }));
      Object.values(data).forEach((d) => {
        pengiriman_item_modal.id_negara.append($('<option>', {
          value: d['id_negara'],
          text: d['id_negara'] + ' :: ' + d['nama_negara'],
        }));
      });
    }

    function getAllPortOfOrigin() {
      return $.ajax({
        url: `<?php echo site_url('PortOfOriginController/getAll/') ?>`,
        'type': 'GET',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataPortOfOrigin = json['data'];
          renderAllPortOfOrigin(dataPortOfOrigin);
        },
        error: function(e) {}
      });
    }

    function renderAllPortOfOrigin(data) {
      pengiriman_item_modal.id_port_of_origin.empty();
      pengiriman_item_modal.id_port_of_origin.append($('<option>', {
        value: "",
        text: "-- Pilih Port Of Origin --"
      }));
      Object.values(data).forEach((d) => {
        pengiriman_item_modal.id_port_of_origin.append($('<option>', {
          value: d['id_port_of_origin'],
          text: d['id_port_of_origin'] + ' :: ' + d['nama_port_of_origin'],
        }));
      });
    }

    function getAllJenisPengemasan() {
      return $.ajax({
        url: `<?php echo site_url('JenisPengemasanController/getAll/') ?>`,
        'type': 'GET',
        data: {},
        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataJenisPengemasan = json['data'];
          renderAllJenisPengemasan(dataJenisPengemasan);
        },
        error: function(e) {}
      });
    }

    function renderAllJenisPengemasan(data) {
      pengiriman_item_modal.id_jenis_pengemasan.empty();
      pengiriman_item_modal.id_jenis_pengemasan.append($('<option>', {
        value: "",
        text: "-- Pilih Jenis Pengemasan --"
      }));
      Object.values(data).forEach((d) => {
        pengiriman_item_modal.id_jenis_pengemasan.append($('<option>', {
          value: d['id_jenis_pengemasan'],
          text: d['id_jenis_pengemasan'] + ' :: ' + d['nama_jenis_pengemasan'],
        }));
      });
    }

    function renderInfo() {
      info.nama_perusahaan.html(`<a href="<?= site_url('PerusahaanController/detail') ?>?id_perusahaan=${dataInfo['id_perusahaan']}">${dataInfo['nama_perusahaan']}</a>`);
      info.nama_pengiriman.html(dataInfo['nama_pengiriman'] ? dataInfo['nama_pengiriman'] : 'Tidak Ada');
      info.nama_pengiriman.html(dataInfo['no_surat'] ? dataInfo['no_surat'] : 'Tidak Ada');
      info.nama_komoditi.html(dataInfo['nama_komoditi'] ? dataInfo['nama_komoditi'] : '-');
      // info.nomor_kontrak.html(dataInfo['nomor_kontrak'] ? dataInfo['nomor_kontrak'] : '-');
      info.rencana_pengapalan.html(dataInfo['rencana_pengapalan'] ? dataInfo['rencana_pengapalan'] : '-');
      info.jumlah_berat.html(dataInfo['jumlah_berat'] ? dataInfo['jumlah_berat'] + ' Metric / Ton' : '-');
      info.jumlah_partai.html(dataInfo['jumlah_partai'] ? dataInfo['jumlah_partai'] : '-');
      btnx = dataInfo['dokumen_permohonan'] ? downloadButtonV2("<?= base_url('uploads/dokumen_permohonan/') ?>", dataInfo['dokumen_permohonan'], "Dokumen Permohonan") : "Tidak Ada";
      info.status_dokumen_permohonan.html(btnx);
      info.status_pengiriman.html(statusPermohonan(dataInfo['status_proposal']));
      info.edit_info_btn.toggle(!dataInfo['edit_perusahaan_eks']);
      info.layer_dokumen_permohonan.toggle(!dataInfo['edit_perusahaan_eks']);
      info.dok_permohonan_bpsmb_btn.toggle(!dataInfo['edit_perusahaan_eks']);
      info.dok_permohonan_bp3l_btn.toggle(!dataInfo['edit_perusahaan_eks']);
      info.delete_btn.toggle(!dataInfo['edit_perusahaan_eks']);
      pengiriman_item_tambah_btn.toggle(!dataInfo['edit_perusahaan_eks']);
      info.process_btn.toggle(!dataInfo['edit_perusahaan_eks']);

    }

    info.edit_info_btn.on('click', function() {
      informasiModal.self.modal('show');
      informasiModal.id_pengiriman.val(dataInfo['id_pengiriman']);
      informasiModal.nama_pengiriman.val(dataInfo['nama_pengiriman']);
      informasiModal.no_surat.val(dataInfo['no_surat']);
      informasiModal.nama_komoditi.val(dataInfo['nama_komoditi']);
      // informasiModal.nomor_kontrak.val(dataInfo['nomor_kontrak']);
      informasiModal.rencana_pengapalan.val(dataInfo['rencana_pengapalan']);
      informasiModal.jumlah_berat.val(dataInfo['jumlah_berat']);
      informasiModal.jumlah_partai.val(dataInfo['jumlah_partai']);
    });

    info.dok_permohonan_bpsmb_btn.on('click', function() {
      DokPermohonanBpsmb.self.modal('show');
      DokPermohonanBpsmb.id_pengiriman.val(dataInfo['id_pengiriman']);
      // DokPermohonanBpsmb.nama_pengiriman.val(dataInfo['nama_pengiriman']);
      DokPermohonanBpsmb.dokumen_permohonan_bpsmb_form.toggle(true);
      DokPermohonanBpsmb.dokumen_permohonan_bpsmb.setRequired(true);
    });

    info.dok_permohonan_bp3l_btn.on('click', function() {
      DokPermohonanAll.self.modal('show');
      DokPermohonanAll.id_pengiriman.val(dataInfo['id_pengiriman']);
      // DokPermohonanBpsmb.nama_pengiriman.val(dataInfo['nama_pengiriman']);
      DokPermohonanAll.dokumen_permohonan_all_form.toggle(true);
      DokPermohonanAll.dokumen_permohonan_all.setRequired(true);
    });


    DokPermohonanBpsmb.form.on('submit', (ev) => {
      console.log('sub');
      ev.preventDefault();
      buttonLoading(DokPermohonanBpsmb.save_btn);
      $.ajax({
        url: "<?= site_url('PengirimanController/dok_permohonan_upload_bpsmb') ?>",
        type: "POST",
        data: new FormData(DokPermohonanBpsmb.form[0]),
        contentType: false,
        processData: false,
        success: (data) => {
          buttonIdle(DokPermohonanBpsmb.save_btn);
          json = JSON.parse(data);
          if (json['error']) {
            swal("Harap Menggunakan Format PDF", json['message'], "error");
            return;
          }
          dataInfo = json['data'];
          renderInfo();
          swal("Berhasil Menamkan Dokumen", 'Upload Dokumen Berhasil', "success");
          DokPermohonanBpsmb.self.modal('hide');
        },
        error: () => {
          buttonIdle(DokPermohonanBpsmb.save_btn);
        },
      });
    });

    DokPermohonanAll.form.on('submit', (ev) => {
      console.log('sub');
      ev.preventDefault();
      buttonLoading(DokPermohonanAll.save_btn);
      $.ajax({
        url: "<?= site_url('PengirimanController/dok_permohonan_upload') ?>",
        type: "POST",
        data: new FormData(DokPermohonanAll.form[0]),
        contentType: false,
        processData: false,
        success: (data) => {
          buttonIdle(DokPermohonanAll.save_btn);
          json = JSON.parse(data);
          if (json['error']) {
            swal("Harap Menggunakan Format PDF", json['message'], "error");
            return;
          }
          dataInfo = json['data'];
          renderInfo();
          swal("Berhasil Menamkan Dokumen", 'Upload Dokumen Berhasil', "success");
          DokPermohonanAll.self.modal('hide');
        },
        error: () => {
          buttonIdle(DokPermohonanAll.save_btn);
        },
      });
    });


    informasiModal.form.on('submit', (ev) => {
      ev.preventDefault();
      buttonLoading(informasiModal.save_btn);
      $.ajax({
        url: "<?= site_url('PengirimanController/edit') ?>",
        type: "POST",
        data: new FormData(informasiModal.form[0]),
        contentType: false,
        processData: false,
        success: (data) => {
          buttonIdle(informasiModal.save_btn);
          json = JSON.parse(data);
          if (json['error']) {
            swal("Gagal Pengiriman Proposal", json['message'], "error");
            return;
          }
          dataInfo = json['data'];
          renderInfo();
          swal("Berhasil disimpan", 'Input Informasi Berhasil', "success");
          informasiModal.self.modal('hide');
        },
        error: () => {
          buttonIdle(informasiModal.save_btn);
        },
      });
    });

    info.process_btn.on('click', function() {
      if (dataInfo['dokumen_permohonan'] == null) {
        swal("Harap Upload Dokumen Permohonan!!", '', "error");
        return;
      }
      swal(saveConfirmation("Kirim Proposal", "Yakin kirim proposal?", "Ya, Kirim!")).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('PengirimanController/edit') ?>",
          'type': 'POST',
          data: {
            'id_pengiriman': id_pengiriman,
            'status_proposal': 'DIPROSES'
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Delete Gagal", json['message'], "error");
              return;
            }
            dataInfo = json['data'];
            renderInfo();
            swal("Berhasil dikirim", 'Proposal berhasil dikirim', "success");
          },
          error: function(e) {}
        });
      });
    });

    info.delete_btn.on('click', function() {
      swal(deleteConfirmation("Konfirmasi hapus", "Yakin akan menghapus pengiriman ini?", "Ya, Hapus!")).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('PengirimanController/delete') ?>",
          'type': 'POST',
          data: {
            'id_pengiriman': id_pengiriman
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Delete Gagal", json['message'], "error");
              return;
            }
            $(location).attr('href', `<?= site_url('PerusahaanController/detail') ?>?id_perusahaan=${dataInfo['id_perusahaan']}&tab=pengiriman`);
          },
          error: function(e) {}
        });
      });
    });

    function getAllPengirimanItem() {

      return $.ajax({
        url: `<?php echo site_url('PengirimanItemController/getAll/') ?>`,
        'type': 'GET',
        data: {
          'id_pengiriman': id_pengiriman
        },

        success: function(data) {
          var json = JSON.parse(data);
          if (json['error']) {
            return;
          }
          dataPengirimanItem = json['data'];
          renderPengirimanItem(dataPengirimanItem);
        },
        error: function(e) {}
      });
    }

    function renderPengirimanItem(data) {
      if (data == null || typeof data != "object") {
        console.log("PengirimanItem::UNKNOWN DATA");
        return;
      }
      var i = 0;

      var renderData = [];
      Object.values(data).forEach((d) => {
        var editButton = `
        <a class="edit dropdown-item" data-id='${d['id_pengiriman_item']}'><i class='fa fa-pencil'></i> Edit Pengiriman Item</a>
      `;
        var deleteButton = `
        <a class="delete dropdown-item" data-id='${d['id_pengiriman_item']}'><i class='fa fa-trash'></i> Hapus Pengiriman Item</a>
      `;
        var button = dataInfo['edit_perusahaan_eks'] ? '' : `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${editButton}
            ${deleteButton}
          </div>
        </div>
      `;
        var spesifikasi = `
        <b>Netto:</b> ${d['netto']} Kg<br>
        <b>Mutu:</b> ${d['nama_jenis_mutu']}<br>
      `;
        var importir = `
        <b>Nama:</b> ${d['nama_importir']}<br>
        <b>Lokasi:</b> ${d['city']}, ${d['province']}, ${d['nama_negara']}<br>
      `;
        var ports = `
        <b>POO:</b> ${d['nama_port_of_origin']}<br>
        <b>POD:</b> ${d['port_of_destination']}<br>
        <b>Nomor Kontrak:</b> ${d['nomor_kontrak']}<br>
      `;
        var pengemasan = `
        <b>Jenis:</b> ${d['nama_jenis_pengemasan']}<br>
      `;
        var tanggal_pengiriman = `
        <b>Tanggal:</b> ${d['tanggal_pengiriman']}<br>
      `;
        renderData.push([spesifikasi, importir, ports, pengemasan, tanggal_pengiriman, button]);
      });
      pengiriman_item_table.clear().rows.add(renderData).draw('full-hold');
    }

    pengiriman_item_tambah_btn.on('click', (e) => {
      pengiriman_item_modal.form.trigger('reset');
      pengiriman_item_modal.self.modal('show');
      pengiriman_item_modal.add_btn.show();
      pengiriman_item_modal.save_btn.hide();
      pengiriman_item_modal.id_pengiriman.val(id_pengiriman);
    });

    pengiriman_item_table.on('click', '.edit', function() {
      pengiriman_item_modal.form.trigger('reset');
      pengiriman_item_modal.self.modal('show');
      pengiriman_item_modal.add_btn.hide();
      pengiriman_item_modal.save_btn.show();

      var currentData = dataPengirimanItem[$(this).data('id')];
      pengiriman_item_modal.id_pengiriman.val(currentData['id_pengiriman']);
      pengiriman_item_modal.id_pengiriman_item.val(currentData['id_pengiriman_item']);
      pengiriman_item_modal.netto.val(currentData['netto']);
      pengiriman_item_modal.gross.val(currentData['gross']);
      pengiriman_item_modal.netto_karung.val(currentData['netto_karung']);
      pengiriman_item_modal.gross_karung.val(currentData['gross_karung']);
      pengiriman_item_modal.id_jenis_mutu.val(currentData['id_jenis_mutu']);
      pengiriman_item_modal.nama_importir.val(currentData['nama_importir']);
      pengiriman_item_modal.city.val(currentData['city']);
      pengiriman_item_modal.province.val(currentData['province']);
      pengiriman_item_modal.id_negara.val(currentData['id_negara']);
      pengiriman_item_modal.id_port_of_origin.val(currentData['id_port_of_origin']);
      pengiriman_item_modal.port_of_destination.val(currentData['port_of_destination']);
      pengiriman_item_modal.id_jenis_pengemasan.val(currentData['id_jenis_pengemasan']);
      pengiriman_item_modal.tanggal_pengiriman.val(currentData['tanggal_pengiriman']);
      pengiriman_item_modal.shipping_mark.val(currentData['shipping_mark']);
      pengiriman_item_modal.nomor_kontrak.val(currentData['nomor_kontrak']);
      pengiriman_item_modal.keterangan_marking.val(currentData['keterangan_marking']);
      pengiriman_item_modal.keterangan_penggunaan_produk.val(currentData['keterangan_penggunaan_produk']);

      if (currentData['id_negara'] == 'ID') {
        pengiriman_item_modal.alamat_buyer.prop('disabled', false)
        pengiriman_item_modal.nama_buyer.prop('disabled', false)
        pengiriman_item_modal.alamat_buyer.prop('hidden', false)
        pengiriman_item_modal.nama_buyer.prop('hidden', false)
        pengiriman_item_modal.ly_id_negara.prop('hidden', false)
        pengiriman_item_modal.alamat_buyer.val(currentData['alamat_buyer'])
        pengiriman_item_modal.nama_buyer.val(currentData['nama_buyer'])

      } else {
        pengiriman_item_modal.ly_id_negara.prop('hidden', 'hidden')
        pengiriman_item_modal.alamat_buyer.prop('hidden', 'hidden')
        pengiriman_item_modal.nama_buyer.prop('hidden', 'hidden')
        pengiriman_item_modal.alamat_buyer.prop('disabled', 'disabled')
        pengiriman_item_modal.nama_buyer.prop('disabled', 'disabled')
      }

    });

    pengiriman_item_modal.form.submit(function(event) {
      event.preventDefault();
      var isAdd = pengiriman_item_modal.add_btn.is(':visible');
      var url = "<?= site_url('PengirimanItemController/') ?>";
      url += isAdd ? "add" : "edit";
      var button = isAdd ? pengiriman_item_modal.add_btn : pengiriman_item_modal.save_btn;

      swal(saveConfirmation("Konfirmasi simpan", "Yakin akan menyimpan item ini", "Ya, Simpan!")).then((result) => {
        if (!result.value) {
          return;
        }
        buttonLoading(button);
        $.ajax({
          url: url,
          'type': 'POST',
          data: pengiriman_item_modal.form.serialize(),
          success: function(data) {
            buttonIdle(button);
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Simpan Gagal", json['message'], "error");
              return;
            }
            var pengiriman_item = json['data']
            dataPengirimanItem[pengiriman_item['id_pengiriman_item']] = pengiriman_item;
            swal("Simpan Berhasil", "", "success");
            renderPengirimanItem(dataPengirimanItem);
            pengiriman_item_modal.self.modal('hide');
          },
          error: function(e) {}
        });
      });
    });

    pengiriman_item_table.on('click', '.delete', function() {
      event.preventDefault();
      var id = $(this).data('id');
      swal(deleteConfirmation("Konfirmasi hapus", "Yakin akan menghapus item ini?", "Ya, Hapus!")).then((result) => {
        if (!result.value) {
          return;
        }
        $.ajax({
          url: "<?= site_url('PengirimanItemController/delete') ?>",
          'type': 'POST',
          data: {
            'id_pengiriman_item': id
          },
          success: function(data) {
            var json = JSON.parse(data);
            if (json['error']) {
              swal("Delete Gagal", json['message'], "error");
              return;
            }
            delete dataPengirimanItem[id];
            swal("Delete Berhasil", "", "success");
            renderPengirimanItem(dataPengirimanItem);
          },
          error: function(e) {}
        });
      });
    });

  });
</script>