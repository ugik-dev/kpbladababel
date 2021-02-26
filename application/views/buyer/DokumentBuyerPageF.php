<div class="wrapper wrapper-content animated fadeInRight">
    <form class="form-inline m-b-sm" id="toolbar_form" onsubmit="return false;">
        <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled" data-loading-text="Loading..." style="display:none"><i class="fal fa-plus"></i> Tambah Dokumen Buyer</button>
    </form>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="dokumen_buyer_datatable" class="table table-bordered table-hover" style="padding:0px">
                            <thead>
                                <tr>
                                    <th style="width: 15%; text-align:center!important">Name Document</th>
                                    <th style="width: 15%; text-align:center!important">Number Document</th>
                                    <th style="width: 15%; text-align:center!important">Document</th>
                                    <th style="width: 5%; text-align:center!important">Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <?php if ($this->session->userdata()['id_role'] == '12') { ?>
                    <h4>Note : <small> Any changes or additions to documents will affect your verification status, if there is a change, you must verify again. </small> </h4>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<div class="modal inmodal" id="dokumen_buyer_modal" tabindex="-1" opd="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Document Form</h4>
            </div>
            <div class="modal-body" id="modal-body">
                <form opd="form" id="dokumen_buyer_form" onsubmit="return false;" type="multipart" autocomplete="off">
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="tipe" name="tipe">
                    <!-- <div class="form-group">
            <label for="id_jenis_dokumen_buyer">Jenis Dokumen Buyer</label>
            <select class="form-control mr-sm-2" name="id_jenis_dokumen_buyer" id="id_jenis_dokumen_buyer" required="required"></select>
          </div> -->
                    <div class="form-group">
                        <label for="no_dokumen_buyer">Number Document</label>
                        <input type="text" placeholder="Number Document" class="form-control" id="no_dokumen_buyer" name="no_dokumen" required="required">
                    </div>
                    <div class="form-group">
                        <label for="dokumen_buyer">Upload Document</label>
                        <p class="no-margins"><span id="dokumen_buyer">-</span></p>
                    </div>
                    <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Save Document</strong></button>
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
        var id = `<?= $this->session->userdata()['id_buyer']; ?>`;
        $('#dokument_buyer').addClass('active');
        var toolbar = {
            'form': $('#toolbar_form'),
            'newBtn': $('#new_btn'),
        }

        // toolbar.newBtn.toggle(null);

        var dokumen_buyer_datatable = $('#dokumen_buyer_datatable').DataTable({
            'columnDefs': [{
                targets: [1, 2, 3],
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

        var dokumen_buyer_modal = {
            'self': $('#dokumen_buyer_modal'),
            'form': $('#dokumen_buyer_modal').find('#dokumen_buyer_form'),
            'add_btn': $('#dokumen_buyer_modal').find('#add_btn'),
            'id': $('#dokumen_buyer_modal').find('#id'),
            'tipe': $('#dokumen_buyer_modal').find('#tipe'),
            'id_jenis_dokumen_buyer': $('#dokumen_buyer_modal').find('#id_jenis_dokumen_buyer'),
            'no_dokumen_buyer': $('#dokumen_buyer_modal').find('#no_dokumen_buyer'),
            // 'dokumen_buyer': new FileUploader($('#dokumen_buyer_modal').find('#dokumen_buyer'), "", "dokumen_buyer", ".png , .pdf , .jpg , .jpeg", false, true),
        }
        dokumen_buyer_modal.id.val(id);

        var dataDokumenBuyer = {}

        $.when(getAllDokumenBuyer()).then((e) => {
            toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllDokumenBuyer() {
            swal({
                title: 'Loading document...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('BuyerController/get/') ?>`,
                'type': 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataDokumenBuyer = json['data'];
                    renderDokumenBuyer(dataDokumenBuyer);
                },
                error: function(e) {}
            });
        }

        function renderDokumenBuyer(data) {
            if (data == null || typeof data != "object") {
                console.log("Dokumen Buyer::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            if (dataDokumenBuyer['region'] == 'D') {
                renderData.push(['KTP', dataDokumenBuyer['no_ktp'], downloadButton("<?= base_url('uploads/ktp/') ?>", dataDokumenBuyer['ktp'], false), button_edit('ktp')]);
                renderData.push(['NPWP', dataDokumenBuyer['no_npwp'], downloadButton("<?= base_url('uploads/npwp/') ?>", dataDokumenBuyer['npwp'], false), button_edit('npwp')]);
                renderData.push(['NIB', dataDokumenBuyer['no_nib'], downloadButton("<?= base_url('uploads/nib/') ?>", dataDokumenBuyer['nib'], false), button_edit('nib')]);
                renderData.push(['Akta Pendiri Perusahaan', dataDokumenBuyer['no_app'], downloadButton("<?= base_url('uploads/app/') ?>", dataDokumenBuyer['app'], false), button_edit('app')]);
                renderData.push(['Surat Keterangan Domisili Perusahaan', dataDokumenBuyer['no_skdp'], downloadButton("<?= base_url('uploads/skdp/') ?>", dataDokumenBuyer['skdp'], false), button_edit('skdp')]);
                renderData.push(['Identitas Direksi Perusahaan', dataDokumenBuyer['no_idp'], downloadButton("<?= base_url('uploads/idp/') ?>", dataDokumenBuyer['idp'], false), button_edit('idp')]);
                renderData.push(['Laporan Keuangan', dataDokumenBuyer['no_lu'], downloadButton("<?= base_url('uploads/lu/') ?>", dataDokumenBuyer['lu'], false), button_edit('lu')]);
            } else {
                renderData.push(['PASSPORT', dataDokumenBuyer['no_paspor'], downloadButtonEn("<?= base_url('uploads/paspor/') ?>", dataDokumenBuyer['paspor'], false), button_edit('paspor')]);
                renderData.push(['Foreign Bank Reference', dataDokumenBuyer['no_srbln'], downloadButtonEn("<?= base_url('uploads/srbln/') ?>", dataDokumenBuyer['srbln'], false), button_edit('srbln')]);
                renderData.push(['Document of Domicile of State of Origin Company', dataDokumenBuyer['no_skdpna'], downloadButtonEn("<?= base_url('uploads/skdpna/') ?>", dataDokumenBuyer['skdpna'], false), button_edit('skdpna')]);
                renderData.push(['Business Licence Dokuments', dataDokumenBuyer['no_skiu'], downloadButtonEn("<?= base_url('uploads/skiu/') ?>", dataDokumenBuyer['skiu'], false), button_edit('skiu')]);
                renderData.push(['Statement Letter as White Pepper User Company', dataDokumenBuyer['no_sp'], downloadButtonEn("<?= base_url('uploads/sp/') ?>", dataDokumenBuyer['sp'], false), button_edit('sp')]);
                renderData.push(['Financial Statements', dataDokumenBuyer['no_lu'], downloadButtonEn("<?= base_url('uploads/lu/') ?>", dataDokumenBuyer['lu'], false), button_edit('lu')]);
                renderData.push(['Deed of Founder of the Company', dataDokumenBuyer['no_app'], downloadButtonEn("<?= base_url('uploads/app/') ?>", dataDokumenBuyer['app'], false), button_edit('app')]);
            }
            dokumen_buyer_datatable.clear().rows.add(renderData).draw('full-hold');
        }

        function set_dok_img(tipe) {
            return `<img src="<?= base_url('uploads/') ?>${tipe}/${dataDokumenBuyer[tipe]}" style="width:170px;height:130px;" class="center">`;
        }

        function button_edit(tipe) {
            return ` 
      <button class="edit btn btn-success btn-sm bp3l_rek" data-id='${dataDokumenBuyer['id']}' data-tipe='${tipe}'><i class='fa fa-angle-double-right'></i></button>
      `;
            //     <a class="edit btn btn-success" data-id='${dataDokumenBuyer['id']}'><i class='fa fa-pencil'></i> >></a>

        }

        function downloadButtonEn(folder, file, use_nama = true) {
            if (file)
                return `<a class="btn btn-success btn-xs btn-download" href="${folder}${file}"><i class='fa fa-download'></i> ${
			use_nama ? file : "Download"
		}</a>`;
            return `Not Complete`;
        }

        function renderJenisDokumenBuyer(data) {
            dokumen_buyer_modal.id_jenis_dokumen_buyer.empty();
            dokumen_buyer_modal.id_jenis_dokumen_buyer.append($('<option>', {
                value: "",
                text: "-- Pilih Jenis Dokumen Buyer --"
            }));
            dokumen_buyer_modal.id_jenis_dokumen_buyer.append($('<option>', {
                value: 'ktp',
                text: 'KTP',
            }));
            dokumen_buyer_modal.id_jenis_dokumen_buyer.append($('<option>', {
                value: 'npwp',
                text: 'NPWP',
            }));

        }

        toolbar.newBtn.on('click', (e) => {
            dokumen_buyer_modal.form.trigger('reset');
            dokumen_buyer_modal.self.modal('show');
        });

        dokumen_buyer_modal.form.submit(function(event) {
            event.preventDefault();
            swal(saveConfirmation("Confirmation add", "Sure to add to this document", "Yes!")).then((result) => {
                if (!result.value) {
                    return;
                }
                // buttonLoading(dokumen_buyer_modal.add_btn);
                $.ajax({
                    url: "<?= site_url('BuyerController/addDokument') ?>",
                    'type': 'POST',
                    data: new FormData(dokumen_buyer_modal.form[0]),
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        buttonIdle(dokumen_buyer_modal.add_btn);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Add Document Fail!!", json['message'], "error");
                            return;
                        }
                        var dokumenBuyer = json['data']

                        swal("Add Document Success!!", "", "success");
                        getAllDokumenBuyer();
                        dokumen_buyer_modal.self.modal('hide');
                    },
                    error: function(e) {}
                });
            });
        });

        dokumen_buyer_datatable.on('click', '.edit', function() {
            event.preventDefault();
            var id = $(this).data('id');
            var tipe = $(this).data('tipe');
            dokumen_buyer_modal.dokumen_buyer = new FileUploader($('#dokumen_buyer_modal').find('#dokumen_buyer'), "", tipe, ".png , .pdf , .jpg , .jpeg", false, true),
                dokumen_buyer_modal.form.trigger('reset');
            dokumen_buyer_modal.self.modal('show');
            dokumen_buyer_modal.tipe.val(tipe);
            dokumen_buyer_modal.no_dokumen_buyer.val(dataDokumenBuyer['no_' + tipe]);

        });
    });
</script>