<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="region" id="region"></select>
                <select class="form-control mr-sm-2" name="verificated" id="stat_verifikasi"></select>
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
                                    <th style="width: 24%; text-align:center!important">Nama Perusahaan</th>
                                    <th style="width: 24%; text-align:center!important">Alamat</th>
                                    <th style="width: 16%; text-align:center!important">Region</th>
                                    <th style="width: 16%; text-align:center!important">Status</th>
                                    <th style="width: 5%; text-align:center!important">Detail</th>
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

<script>
    $(document).ready(function() {
        $('#request_buyer').addClass('active');

        var toolbar = {
            'form': $('#toolbar_form'),
            'region': $('#toolbar_form').find('#region'),
            'stat_verifikasi': $('#toolbar_form').find('#stat_verifikasi'),
            'id_opd': $('#toolbar_form').find('#id_opd'),
        }

        var FDataTable = $('#FDataTable').DataTable({
            'columnDefs': [],
            deferRender: true,
            "order": [
                [0, "desc"]
            ]
        });

        var UserModal = {
            'self': $('#user_modal'),
            'info': $('#user_modal').find('.info'),
            'form': $('#user_modal').find('#user_form'),
            'addBtn': $('#user_modal').find('#add_btn'),
            'saveEditBtn': $('#user_modal').find('#save_edit_btn'),
            'idUser': $('#user_modal').find('#id_user'),
            'username': $('#user_modal').find('#username'),
            'nama': $('#user_modal').find('#nama'),
            'password': $('#user_modal').find('#password'),
            'region': $('#user_modal').find('#region'),
            'opd': $('#user_modal').find('#opd'),
        }

        var dataRole = {}
        var dataUser = {}

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

        $.when(getAllUser()).then((e) => {

        }).fail((e) => {
            console.log(e)
        });

        renderRoleSelectionFilter();

        function renderRoleSelectionFilter() {
            toolbar.region.empty();
            toolbar.region.append($('<option>', {
                value: "",
                text: "-- Semua Region --"
            }));
            toolbar.region.append($('<option>', {
                value: 'D',
                text: 'Domestic :: Dalam Negeri',
            }));
            toolbar.region.append($('<option>', {
                value: 'F',
                text: 'Foreig :: Luar Negeri',
            }));

            toolbar.stat_verifikasi.append($('<option>', {
                value: "",
                text: "-- Semua Status --"
            }));
            toolbar.stat_verifikasi.append($('<option>', {
                value: 'Y',
                text: 'Telah Diverifikasi',
            }));
            toolbar.stat_verifikasi.append($('<option>', {
                value: 'N',
                text: 'Belum Diverifikasi',
            }));
            toolbar.stat_verifikasi.append($('<option>', {
                value: 'R',
                text: 'Request Verifikasi',
            }));
        }



        toolbar.region.on('change', (e) => {
            UserModal.region.attr('readonly', !empty(toolbar.region.val()));
            getAllUser();
        });

        toolbar.stat_verifikasi.on('change', (e) => {
            getAllUser();
        });

        function getAllUser() {
            swal({
                title: 'Loading user...',
                allowOutsideClick: false
            });
            swal.showLoading();
            return $.ajax({
                url: `<?php echo site_url('BuyerController/getAll/') ?>`,
                'type': 'GET',
                data: toolbar.form.serialize(),
                success: function(data) {
                    swal.close();
                    var json = JSON.parse(data);
                    if (json['error']) {
                        return;
                    }
                    dataUser = json['data'];
                    renderUser(dataUser);
                },
                error: function(e) {}
            });
        }

        function renderUser(data) {
            if (data == null || typeof data != "object") {
                console.log("User::UNKNOWN DATA");
                return;
            }
            var i = 0;

            var renderData = [];
            Object.values(data).forEach((user) => {
                var button = `
                <a type="button" class="btn btn-success my-1 mr-sm-3" href="<?php echo base_url() . 'index.php/AdminController/DetailRequest?id_buyer='; ?>${user['id']}"><i class="fal fa-eye"></i>  </a>
      `;
                renderData.push([user['id_user'], user['nama_perusahaan'], user['alamat'], user['region'] == 'D' ? 'Domestic' : 'Foreig', statusVerifikasi(user['verificated']), button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function resetUserModal() {
            UserModal.form.trigger('reset');
            UserModal.region.val(toolbar.region.val());
            UserModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
        }

        FDataTable.on('click', '.edit', function() {
            resetUserModal();
            UserModal.self.modal('show');
            UserModal.addBtn.hide();
            UserModal.saveEditBtn.show();
            UserModal.password.prop('placeholder', '(Unchanged)')
            UserModal.password.prop('required', false);

            var currentData = dataUser[$(this).data('id')];
            UserModal.idUser.val(currentData['id_user']);
            UserModal.username.val(currentData['username']);
            UserModal.nama.val(currentData['nama']);
            UserModal.opd.val(currentData['id_opd']);
        });

        function statusVerifikasi(status) {
            if (status == 'R')
                return `<i class='fa fa-hourglass-start text-primary'>Request Verifikasi </i>`;
            else if (status == 'Y')
                return `<i class='fa fa-check text-success'> Telah Diverifikasi</i>`;
            else
                return `<i class='fa fa-edit text-warning'> Belum Diverifikasi</i>`;
        }
    });
</script>