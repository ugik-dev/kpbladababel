<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="id_jenis_perusahaan" id="id_jenis_perusahaan"></select>
                <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah DokumenPerusahaan Baru</button>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table id="FDataTable" class="table table-bordered table-hover" style="padding:0px">
                            <thead>
                                <tr>
                                    <th style="width: 7%; text-align:center!important">ID</th>
                                    <th style="width: 24%; text-align:center!important">Nama Dokumen</th>
                                    <th style="width: 24%; text-align:center!important">Persyaratan</th>
                                    <th style="width: 16%; text-align:center!important">Status</th>
                                    <th style="width: 16%; text-align:center!important">Type </th>
                                    <th style="width: 5%; text-align:center!important">Action</th>
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

<div class="modal inmodal" id="jenis_dokumen_perusahaan_modal" tabindex="-1" opd="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Kelola DokumenPerusahaan</h4>
                <span class="info"></span>
            </div>
            <div class="modal-body" id="modal-body">
                <form opd="form" id="jenis_dokumen_perusahaan_form" onsubmit="return false;" type="multipart" autocomplete="off">
                    <input type="hidden" id="id_jenis_dokumen_perusahaan" name="id_jenis_dokumen_perusahaan">
                    <div class="form-group">
                        <label for="nama_jenis_dokumen_perusahaan">Nama Dokumen</label>
                        <input type="text" placeholder="Nama Dokumen" class="form-control" id="nama_jenis_dokumen_perusahaan" name="nama_jenis_dokumen_perusahaan" required="required">
                    </div>
                    <div class="form-group">
                        <label for="judul">Jenis Perusahaan</label>
                        <select class="form-control mr-sm-2" name="id_jenis_perusahaan" id="id_jenis_perusahaan" required="required"></select>
                    </div>

                    <div class="form-group">
                        <label for="allow_type">Type </label>
                        <select class="form-control mr-sm-2" name="allow_type" id="allow_type" required="required"></select>
                    </div>

                    <div class="form-group">
                        <label for="status">Active </label>
                        <select class="form-control mr-sm-2" name="ACT" id="status" required="required"></select>
                    </div>
                    <button class="btn btn-success my-1 mr-sm-2" type="submit" id="add_btn" data-loading-text="Loading..."><strong>Tambah Data</strong></button>
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
        $('#kelola_jenis_dokumen_perusahaan').addClass('active');
        $('#setting_parm').addClass('active');
        var toolbar = {
            'form': $('#toolbar_form'),
            'id_jenis_perusahaan': $('#toolbar_form').find('#id_jenis_perusahaan'),
            'id_opd': $('#toolbar_form').find('#id_opd'),
            'newBtn': $('#new_btn'),
        }

        var FDataTable = $('#FDataTable').DataTable({
            'columnDefs': [],
            deferRender: true,
            "order": [
                [0, "desc"]
            ]
        });

        var DokumenPerusahaanModal = {
            'self': $('#jenis_dokumen_perusahaan_modal'),
            'info': $('#jenis_dokumen_perusahaan_modal').find('.info'),
            'form': $('#jenis_dokumen_perusahaan_modal').find('#jenis_dokumen_perusahaan_form'),
            'addBtn': $('#jenis_dokumen_perusahaan_modal').find('#add_btn'),
            'saveEditBtn': $('#jenis_dokumen_perusahaan_modal').find('#save_edit_btn'),
            'id_jenis_dokumen_perusahaan': $('#jenis_dokumen_perusahaan_modal').find('#id_jenis_dokumen_perusahaan'),
            'nama_jenis_dokumen_perusahaan': $('#jenis_dokumen_perusahaan_modal').find('#nama_jenis_dokumen_perusahaan'),
            'status': $('#jenis_dokumen_perusahaan_modal').find('#status'),
            'allow_type': $('#jenis_dokumen_perusahaan_modal').find('#allow_type'),

            'password': $('#jenis_dokumen_perusahaan_modal').find('#password'),
            'id_jenis_perusahaan': $('#jenis_dokumen_perusahaan_modal').find('#id_jenis_perusahaan'),
            'opd': $('#jenis_dokumen_perusahaan_modal').find('#opd'),
        }

        var dataJenisPerusahaan = {}
        var dataDokumenPerusahaan = {}

        var swalSaveConfigure = {
            title: "Konfirmasi simpan",
            text: "Yakin akan menyimpan data ini?",
            type: "info",
            showCancelButton: true,
            confirmButtonColor: "#18a689",
            confirmButtonText: "Ya, Simpan!",
        };

        var swalDeleteConfigure = {
            title: "Konfirmasi hapus",
            text: "Yakin akan menghapus data ini?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
        };
        //, getAllDokumenPerusahaan()
        $.when(getAllJenisPerusahaan(), getAllDokumenPerusahaan()).then((e) => {
            toolbar.newBtn.prop('disabled', false);
        }).fail((e) => {
            console.log(e)
        });

        function getAllJenisPerusahaan() {
            return $.ajax({
                url: `<?php echo site_url('ParameterController/getAllJenisPerusahaan/') ?>`,
                'type': 'POST',
                data: {},
                success: function(data) {
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataJenisPerusahaan = json['data'];
                    renderJenisPerusahaanSelectionFilter(dataJenisPerusahaan);
                    renderJenisPerusahaanSelectionAdd(dataJenisPerusahaan);
                },
                error: function(e) {}
            });
        }

        function renderJenisPerusahaanSelectionFilter(data) {
            toolbar.id_jenis_perusahaan.empty();
            toolbar.id_jenis_perusahaan.append($('<option>', {
                value: "",
                text: "-- Semua Jenis Perusahaan --"
            }));
            Object.values(data).forEach((d) => {
                toolbar.id_jenis_perusahaan.append($('<option>', {
                    value: d['id_jenis_perusahaan'],
                    text: d['id_jenis_perusahaan'] + ' :: ' + d['nama_jenis_perusahaan'],
                }));
            });
        }

        function renderJenisPerusahaanSelectionAdd(data) {
            DokumenPerusahaanModal.id_jenis_perusahaan.empty();
            DokumenPerusahaanModal.id_jenis_perusahaan.append($('<option>', {
                value: "",
                text: "-- Pilih Jenis Perusahaan --"
            }));
            Object.values(data).forEach((d) => {
                DokumenPerusahaanModal.id_jenis_perusahaan.append($('<option>', {
                    value: d['id_jenis_perusahaan'],
                    text: d['id_jenis_perusahaan'] + ' :: ' + d['nama_jenis_perusahaan'],
                }));
            });

            DokumenPerusahaanModal.status.empty();
            DokumenPerusahaanModal.status.append($('<option>', {
                value: 'Y',
                text: 'Active',
            }));
            DokumenPerusahaanModal.status.append($('<option>', {
                value: 'N',
                text: 'Non Active',
            }));

            DokumenPerusahaanModal.allow_type.empty();
            DokumenPerusahaanModal.allow_type.append($('<option>', {
                value: 'pdf',
                text: '.pdf',
            }));
            DokumenPerusahaanModal.allow_type.append($('<option>', {
                value: 'img',
                text: '.jpg .jpeg .png ',
            }));
        }

        toolbar.id_jenis_perusahaan.on('change', (e) => {
            // DokumenPerusahaanModal.id_jenis_perusahaan.attr('readonly', !empty(toolbar.id_jenis_perusahaan.val()));
            getAllDokumenPerusahaan();
        });

        function getAllDokumenPerusahaan() {
            swal({
                title: 'Loading jenis_dokumen_perusahaan...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('ParameterController/getAllJenisDokumenPerusahaan/') ?>`,
                'type': 'GET',
                data: toolbar.form.serialize(),
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataDokumenPerusahaan = json['data'];
                    renderDokumenPerusahaan(dataDokumenPerusahaan);
                },
                error: function(e) {}
            });
        }

        function renderDokumenPerusahaan(data) {
            if (data == null || typeof data != "object") {
                console.log("DokumenPerusahaan::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((jenis_dokumen_perusahaan) => {
                var editButton = `
        <a class="edit dropdown-item" data-id='${jenis_dokumen_perusahaan['id_jenis_dokumen_perusahaan']}'><i class='fa fa-pencil'></i> Edit DokumenPerusahaan</a>
      `;
                var deleteButton = `
        <a class="delete dropdown-item" data-id='${jenis_dokumen_perusahaan['id_jenis_dokumen_perusahaan']}'><i class='fa fa-trash'></i> Hapus DokumenPerusahaan</a>
      `;
                var button = `
        <div class="btn-group" opd="group">
          <button id="action" type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class='fa fa-bars'></i></button>
          <div class="dropdown-menu" aria-labelledby="action">
            ${editButton}
          
          </div>
        </div>
      `;
                renderData.push([jenis_dokumen_perusahaan['id_jenis_dokumen_perusahaan'], jenis_dokumen_perusahaan['nama_jenis_dokumen_perusahaan'], jenis_dokumen_perusahaan['nama_jenis_perusahaan'], jenis_dokumen_perusahaan['ACT'] == 'Y' ? 'Active' : 'Non Active', jenis_dokumen_perusahaan['allow_type'] == 'img' ? 'jpg jpeg png' : 'pdf', button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function resetDokumenPerusahaanModal() {
            DokumenPerusahaanModal.form.trigger('reset');
            DokumenPerusahaanModal.id_jenis_perusahaan.val(toolbar.id_jenis_perusahaan.val());
            DokumenPerusahaanModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
        }

        toolbar.newBtn.on('click', (e) => {
            resetDokumenPerusahaanModal();
            DokumenPerusahaanModal.self.modal('show');
            DokumenPerusahaanModal.addBtn.show();
            DokumenPerusahaanModal.saveEditBtn.hide();
        });

        FDataTable.on('click', '.edit', function() {
            resetDokumenPerusahaanModal();
            DokumenPerusahaanModal.self.modal('show');
            DokumenPerusahaanModal.addBtn.hide();
            DokumenPerusahaanModal.saveEditBtn.show();
            DokumenPerusahaanModal.password.prop('placeholder', '(Unchanged)')
            DokumenPerusahaanModal.password.prop('required', false);

            var currentData = dataDokumenPerusahaan[$(this).data('id')];
            DokumenPerusahaanModal.id_jenis_dokumen_perusahaan.val(currentData['id_jenis_dokumen_perusahaan']);
            DokumenPerusahaanModal.id_jenis_perusahaan.val(currentData['id_jenis_perusahaan']);
            DokumenPerusahaanModal.allow_type.val(currentData['allow_type']);
            DokumenPerusahaanModal.nama_jenis_dokumen_perusahaan.val(currentData['nama_jenis_dokumen_perusahaan']);
        });

        DokumenPerusahaanModal.form.submit(function(event) {
            event.preventDefault();
            var isAdd = DokumenPerusahaanModal.addBtn.is(':visible');
            var url = "<?= site_url('ParameterController/') ?>";
            url += isAdd ? "addJenisDokumenPerusahaan" : "editJenisDokumenPerusahaan";
            var button = isAdd ? DokumenPerusahaanModal.addBtn : DokumenPerusahaanModal.saveEditBtn;

            swal(swalSaveConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                buttonLoading(button);
                $.ajax({
                    url: url,
                    'type': 'POST',
                    data: DokumenPerusahaanModal.form.serialize(),
                    success: function(data) {
                        buttonIdle(button);
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Simpan Gagal", json['message'], "error");
                            return;
                        }
                        var jenis_dokumen_perusahaan = json['data']
                        dataDokumenPerusahaan[jenis_dokumen_perusahaan['id_jenis_dokumen_perusahaan']] = jenis_dokumen_perusahaan;
                        swal("Simpan Berhasil", "", "success");
                        renderDokumenPerusahaan(dataDokumenPerusahaan);
                        DokumenPerusahaanModal.self.modal('hide');
                    },
                    error: function(e) {}
                });
            });
        });

        FDataTable.on('click', '.delete', function() {
            event.preventDefault();
            var id = $(this).data('id');
            swal(swalDeleteConfigure).then((result) => {
                if (!result.value) {
                    return;
                }
                $.ajax({
                    url: "<?= site_url('DokumenPerusahaanController/deleteDokumenPerusahaan') ?>",
                    'type': 'POST',
                    data: {
                        'id_jenis_dokumen_perusahaan': id
                    },
                    success: function(data) {
                        var json = JSON.parse(data);
                        if (json['error']) {
                            swal("Delete Gagal", json['message'], "error");
                            return;
                        }
                        delete dataDokumenPerusahaan[id];
                        swal("Delete Berhasil", "", "success");
                        renderDokumenPerusahaan(dataDokumenPerusahaan);
                    },
                    error: function(e) {}
                });
            });
        });
    });
</script>