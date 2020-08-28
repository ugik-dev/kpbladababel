<div class="wrapper wrapper-content animated fadeInRight" id="info_container">
    <div class="row">
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>Nama Buyer</h5>
                    <p class="no-margins"><span id="nama_buyer">-</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>Nama Perusahaan</h5>
                    <p class="no-margins"><span id="nama_perusahaan">-</span></p>
                </div>
            </div>
        </div>

        <div class="col-lg-2">
            <div class="ibox">
                <div class="ibox-content">
                    <h5 id="region">Regional</h5>
                    <!-- <p class="no-margins"><span id="region">-</span></p> -->
                    <p class="no-margins"><span id="verificated">-</span></p>
                </div>
            </div>
        </div>

        <!-- <div class="col-lg-2">
      <div class="ibox">
        <div class="ibox-content">
          <h5>Status</h5>
          <p class="no-margins"><span id="verificated">-</span></p>
        </div>
      </div>
    </div> -->

        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Bank</h5>
                            <p class="no-margins"><span id="id_bank">-</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Nama Pemilik Rekening</h5>
                            <p class="no-margins"><span id="an_bank">-</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>No Rekening</h5>
                            <p class="no-margins"><span id="no_rek_bank">-</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>ID KBI</h5>
                    <p class="no-margins"><span id="kbi_id">-</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>Nomor Telepon</h5>
                    <p class="no-margins"><span id="no_telp">-</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>Nomor Fax</h5>
                    <p class="no-margins"><span id="no_fax">-</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>Email</h5>
                    <p class="no-margins"><span id="email">-</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="ibox">
                <div class="ibox-content">
                    <h5>Alamat</h5>
                    <p class="no-margins"><span id="alamat">-</span></p>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <button class="btn btn-primary my-1 mr-sm-2" id="btn_verifikasi"><i class='fa fa-edit'></i>Verifikasi</button>
                    <button class="btn btn-warning my-1 mr-sm-2" id="btn_tolak_verifikasi"><i class='fa fa-edit'></i>Tolak Verifikasi</button>

                </div>
            </div>
        </div>

        <!-- </div> -->

        <!-- <div class="col-lg-3">
      <div class="ibox">
        <div class="ibox-content">
          <p class="no-margins"><span id="layer_dokumen_pdf">-</span></p>
        </div>
      </div>
    </div> -->
    </div>
    <div class="row">
        <div class="col-lg-4">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="dokumen_buyer_datatable" class="table table-bordered table-hover" style="padding:0px">
                            <thead>
                                <tr>
                                    <th style="width: 15%; text-align:center!important">Jenis Dokumen</th>
                                    <th style="width: 15%; text-align:center!important">Nomor Dokumen</th>
                                    <th style="width: 15%; text-align:center!important">Dokumen</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="informasi_modal" tabindex="-1" role="dialog" aria-hidden="true" autocomplete="off">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Informasi Buyer</h4>
                <span class="info"></span>
            </div>
            <div class="modal-body" id="modal-body">
                <form role="form" id="informasi_form" onsubmit="return false;" type="multipart">
                    <input type="hidden" id="id" name="id">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="nama_perusahaanx">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nama_perusahaanx" name="nama_buyer" placeholder="Tidak ada">
                            </div>
                        </div>
                        <!-- <div class="col-sm-3">
              <div class="form-group">
                <label for="id_jenis_buyerx">Jenis Usaha</label>
                <select class="form-control mr-sm-2" id="id_jenis_buyerx" name="id_jenis_buyer" required="required"></select>
              </div>
            </div> -->
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="id_bankx">Bank</label>
                                <!-- <select class="form-control mr-sm-3" id="id_bankx" name="id_bank" required="required"></select> -->
                                <label for="id_bankx">Nama Bank</label>
                                <input type="text" class="form-control" id="id_bankx" name="id_bank" placeholder="Tidak ada" required="required">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="an_bank">Nama Pemilik Bank</label>
                                <input type="text" class="form-control" id="an_bankx" name="an_bank" placeholder="Tidak ada" required="required">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="no_rek_bankx">No Rekening Bank</label>
                                <input type="text" class="form-control" id="no_rek_bankx" name="no_rek_bank" placeholder="Tidak ada" required="required">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_telpx">No Telepon</label>
                                <input type="tel" class="form-control" id="no_telpx" name="no_telp" placeholder="Tidak ada">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="no_faxx">No Fax</label>
                                <input type="tel" class="form-control" id="no_faxx" name="no_fax" placeholder="Tidak ada">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="emailx">Email</label>
                                <input type="email" class="form-control" id="emailx" name="email" placeholder="Tidak ada">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="alamatx">Alamat</label>
                                <textarea rows="4" type="text" placeholder="Alamat" class="form-control" id="alamatx" name="alamat"></textarea>

                                <!-- <input type="text" class="form-control" id="alamatx" name="alamat" placeholder="Tidak ada"> -->
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success my-1 mr-sm-2" type="submit" id="save" data-loading-text="Loading..."><strong>Simpan</strong></button>
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
        $('#request_buyer').addClass('active');

        var id = `<?= $contentData['id_buyer']; ?>`;

        var info = {
            'self': $('#info_container'),
            'nama_buyer': $('#info_container').find('#nama_buyer'),
            'region': $('#info_container').find('#region'),
            'verificated': $('#info_container').find('#verificated'),
            'nama_perusahaan': $('#info_container').find('#nama_perusahaan'),
            'id_bank': $('#info_container').find('#id_bank'),
            'an_bank': $('#info_container').find('#an_bank'),
            'no_rek_bank': $('#info_container').find('#no_rek_bank'),
            'alamat': $('#info_container').find('#alamat'),
            'no_fax': $('#info_container').find('#no_fax'),

            'no_telp': $('#info_container').find('#no_telp'),
            'kbi_id': $('#info_container').find('#kbi_id'),
            'email': $('#info_container').find('#email'),
            'layer_dokumen_pdf': $('#info_container').find('#layer_dokumen_pdf'),

            'btn_verifikasi': $('#btn_verifikasi')
        }
        // info.btn_verifikasi.prop('disabled', false);

        var dokumen_buyer_datatable = $('#dokumen_buyer_datatable').DataTable({
            'columnDefs': [{
                targets: [1, 2],
                className: 'text-center'
            }, ],
            deferRender: true,
            "order": [
                [0, "desc"]
            ],
            paging: false,
            ordering: false,
            searching: false
        });

        var informasiModal = {
            self: $('#informasi_modal'),
            form: $('#informasi_form'),
            id: $('#informasi_modal').find('#id'),
            'nama_perusahaan': $('#informasi_modal').find('#nama_perusahaanx'),
            'id_bank': $('#informasi_modal').find('#id_bankx'),
            'an_bank': $('#informasi_modal').find('#an_bankx'),
            'no_rek_bank': $('#informasi_modal').find('#no_rek_bankx'),
            'nama_perusahaan': $('#informasi_modal').find('#nama_perusahaanx'),
            'alamat': $('#informasi_modal').find('#alamatx'),
            'no_telp': $('#informasi_modal').find('#no_telpx'),
            'no_fax': $('#informasi_modal').find('#no_faxx'),
            'email': $('#informasi_modal').find('#emailx'),
            save_btn: $('#informasi_modal').find('#save'),
        }

        var dataJenisBuyer = {};
        var dataBank = {};
        var dataInfo = {};
        $.when(getAllBank(), getProfile()).then((e) => {
            renderInfo();
            // info.btn_verifikasi.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });


        function getAllJenisBuyer() {
            return $.ajax({
                url: `<?php echo site_url('ParameterController/getAllJenisBuyer/') ?>`,
                'type': 'GET',
                data: {},
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataJenisBuyer = json['data'];
                    renderJenisBuyer(dataJenisBuyer);
                },
                error: function(e) {}
            });
        }

        function getProfile() {
            return $.ajax({
                url: `<?php echo site_url('BuyerController/get/') ?>`,
                'type': 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataInfo = json['data'];
                    renderInfo(dataInfo);
                    renderDokumenBuyer(dataInfo)
                },
                error: function(e) {}
            });
        }

        function renderJenisBuyer(data) {
            informasiModal.id_jenis_buyer.empty();
            informasiModal.id_jenis_buyer.append($('<option>', {
                value: "",
                text: "-- Pilih --"
            }));
            Object.values(data).forEach((d) => {
                informasiModal.id_jenis_buyer.append($('<option>', {
                    value: d['id_jenis_buyer'],
                    text: d['id_jenis_buyer'] + ' :: ' + d['region'],
                }));
            });
        }

        function getAllBank() {
            return $.ajax({
                url: `<?php echo site_url('BankController/getAll/') ?>`,
                'type': 'GET',
                data: {},
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataBank = json['data'];
                    renderBank(dataBank);
                },
                error: function(e) {}
            });
        }

        function renderBank(data) {
            if (data == null || typeof data != "object") return;
            informasiModal.id_bank.typeahead({
                source: Object.values(data).map((e) => {
                    return `${e['nama_bank']} -- ${e['id_bank']}`;
                }),
                afterSelect: function(data) {
                    informasiModal.id_bank.val(data);
                }
            });
            informasiModal.id_bank.on('blur', function(e) {
                if (empty(informasiModal.id_bank.val())) {
                    informasiModal.id_bank.val('');
                }
            });
        }




        function renderInfo() {

            info.an_bank.html(dataInfo['an_bank'] ? dataInfo['an_bank'] : '-');
            info.no_rek_bank.html(dataInfo['no_rek_bank'] ? dataInfo['no_rek_bank'] : '-');
            if (dataInfo['id_bank'] != "") info.id_bank.html(dataInfo['nama_bank']);
            info.kbi_id.html(dataInfo['kbi_id']);
            info.nama_buyer.html(dataInfo['nama']);

            info.verificated.html(dataInfo['verificated'] == 'Y' ? 'Telah di verifikasi' : 'Belum di verifikasi');
            info.region.html(dataInfo['region'] == 'D' ? 'Domestik' : 'Foreign');
            info.nama_perusahaan.html(dataInfo['nama_perusahaan'] ? dataInfo['nama_perusahaan'] : 'Tidak Ada');
            info.alamat.html(dataInfo['alamat'] ? dataInfo['alamat'] : 'Tidak Ada');
            info.no_fax.html(dataInfo['no_fax'] ? dataInfo['no_fax'] : 'Tidak Ada');
            info.no_telp.html(dataInfo['no_telp'] ? dataInfo['no_telp'] : 'Tidak Ada');
            info.email.html(dataInfo['email'] ? dataInfo['email'] : 'Tidak Ada');
            info.btn_verifikasi.toggle('buyer');
            btnx = downloadButtonV2("<?= site_url('FormatDokumenController/pdf_profile_buyer/') ?>", "?id=" + dataInfo['id'], "PDF Informasi Buyer")
            info.layer_dokumen_pdf.html(btnx);
        }

        info.btn_verifikasi.on('click', function() {
            informasiModal.self.modal('show');
            console.log(dataInfo);
            informasiModal.id.val(dataInfo['id']);
            informasiModal.nama_perusahaan.val(dataInfo['nama_perusahaan']);
            // informasiModal.id_jenis_buyer.val(dataInfo['id_jenis_buyer']);
            // informasiModal.nama_perusahaan.val(dataInfo['nama_perusahaan']);
            informasiModal.alamat.val(dataInfo['alamat']);

            informasiModal.an_bank.val(dataInfo['an_bank']);
            informasiModal.no_rek_bank.val(dataInfo['no_rek_bank']);
            if (dataInfo['id_bank'] != "") informasiModal.id_bank.val(dataBank[dataInfo['id_bank']]['nama_bank'] + ' -- ' + dataInfo['id_bank']);

            informasiModal.no_telp.val(dataInfo['no_telp']);
            informasiModal.no_fax.val(dataInfo['no_fax']);
            informasiModal.email.val(dataInfo['email']);
        });

        informasiModal.form.on('submit', (ev) => {
            ev.preventDefault();
            buttonLoading(informasiModal.save_btn);
            $.ajax({
                url: "<?= site_url('BuyerController/update') ?>",
                type: "POST",
                data: new FormData(informasiModal.form[0]),
                contentType: false,
                processData: false,
                success: (data) => {
                    buttonIdle(informasiModal.save_btn);
                    json = JSON.parse(data);
                    if (json['error']) {
                        swal("Ganti Program Renja gagal", json['message'], "error");
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

        function renderDokumenBuyer(data) {
            if (data == null || typeof data != "object") {
                console.log("Dokumen Buyer::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            if (dataInfo['region'] == 'D') {
                renderData.push(['KTP', dataInfo['no_ktp'], downloadButton("<?= base_url('uploads/ktp/') ?>", dataInfo['ktp'], true)]);
                renderData.push(['NPWP', dataInfo['no_npwp'], downloadButton("<?= base_url('uploads/npwp/') ?>", dataInfo['npwp'], true)]);
                renderData.push(['NIB', dataInfo['no_nib'], downloadButton("<?= base_url('uploads/nib/') ?>", dataInfo['nib'], true)]);
                renderData.push(['Akta Pendiri Perusahaan', dataInfo['no_app'], downloadButton("<?= base_url('uploads/app/') ?>", dataInfo['app'], true)]);
                renderData.push(['Surat Keterangan Domisili Perusahaan', dataInfo['no_skdp'], downloadButton("<?= base_url('uploads/skdp/') ?>", dataInfo['skdp'], true)]);
                renderData.push(['Identitas Direksi Perusahaan', dataInfo['no_idp'], downloadButton("<?= base_url('uploads/idp/') ?>", dataInfo['idp'], true)]);
                renderData.push(['Laporan Keuangan', dataInfo['no_lu'], downloadButton("<?= base_url('uploads/lu/') ?>", dataInfo['lu'], true)]);
            } else {
                renderData.push(['PASPOR', dataInfo['no_paspor'], downloadButton("<?= base_url('uploads/paspor/') ?>", dataInfo['paspor'], true), ]);
                renderData.push(['Referensi Bank Luar Negeri', dataInfo['no_srbln'], downloadButton("<?= base_url('uploads/srbln/') ?>", dataInfo['srbln'], true)]);
                renderData.push(['SK Domisili Perusahaan Negara Asal', dataInfo['no_skdpna'], downloadButton("<?= base_url('uploads/skdpna/') ?>", dataInfo['skdpna'], true)]);
                renderData.push(['SK Izin Usaha', dataInfo['no_skiu'], downloadButton("<?= base_url('uploads/skiu/') ?>", dataInfo['skiu'], true)]);
                renderData.push(['Surat Pernyataan sebagai Perusahaan Pengguna Lada Putih', dataInfo['no_sp'], downloadButton("<?= base_url('uploads/sp/') ?>", dataInfo['sp'], true)]);
                renderData.push(['Laporan Keuangan', dataInfo['no_lu'], downloadButton("<?= base_url('uploads/lu/') ?>", dataInfo['lu'], true)]);
                renderData.push(['Akta Pendiri Perusahaan', dataInfo['no_app'], downloadButton("<?= base_url('uploads/app/') ?>", dataInfo['app'], true)]);

            }
            dokumen_buyer_datatable.clear().rows.add(renderData).draw('full-hold');
        }

    });
</script>