<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox ssection-container">
        <div class="ibox-content">
            <form class="form-inline" id="toolbar_form" onsubmit="return false;">
                <input type="hidden" id="is_not_self" name="is_not_self" value="1">
                <select class="form-control mr-sm-2" name="region" id="region"></select>
                <button type="button" class="btn btn-success my-1 mr-sm-2" id="new_btn" disabled="disabled"><i class="fal fa-plus"></i> Tambah User Baru</button>
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
            // toolbar.newBtn.prop('disabled', false);
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
        }



        toolbar.region.on('change', (e) => {
            UserModal.region.attr('readonly', !empty(toolbar.region.val()));
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
                'type': 'POST',
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
                renderData.push([user['id_user'], user['nama_perusahaan'], user['alamat'], user['region'] == 'D' ? 'Domestic' : 'Foreig', user['verificated'] == 'N' ? 'Belum di verifikasi' : 'Sudah verifikasi', button]);
            });
            FDataTable.clear().rows.add(renderData).draw('full-hold');
        }

        function resetUserModal() {
            UserModal.form.trigger('reset');
            UserModal.region.val(toolbar.region.val());
            UserModal.opd.val(toolbar.id_opd.val() != -1 ? toolbar.id_opd.val() : "");
        }

        toolbar.newBtn.on('click', (e) => {
            resetUserModal();
            UserModal.self.modal('show');
            UserModal.addBtn.show();
            UserModal.saveEditBtn.hide();
            UserModal.password.prop('placeholder', 'Password');
            UserModal.password.prop('required', true);
        });

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

        //     UserModal.form.submit(function(event) {
        //         event.preventDefault();
        //         var isAdd = UserModal.addBtn.is(':visible');
        //         var url = "<?= site_url('UserController/') ?>";
        //         url += isAdd ? "addUser" : "editUser";
        //         var button = isAdd ? UserModal.addBtn : UserModal.saveEditBtn;

        //         swal(swalSaveConfigure).then((result) => {
        //             if (!result.value) {
        //                 return;
        //             }
        //             buttonLoading(button);
        //             $.ajax({
        //                 url: url,
        //                 'type': 'POST',
        //                 data: UserModal.form.serialize(),
        //                 success: function(data) {
        //                     buttonIdle(button);
        //                     var json = JSON.parse(data);
        //                     if (json['error']) {
        //                         swal("Simpan Gagal", json['message'], "error");
        //                         return;
        //                     }
        //                     var user = json['data']
        //                     dataUser[user['id_user']] = user;
        //                     swal("Simpan Berhasil", "", "success");
        //                     renderUser(dataUser);
        //                     UserModal.self.modal('hide');
        //                 },
        //                 error: function(e) {}
        //             });
        //         });
        //     });

        //     FDataTable.on('click', '.delete', function() {
        //         event.preventDefault();
        //         var id = $(this).data('id');
        //         swal(swalDeleteConfigure).then((result) => {
        //             if (!result.value) {
        //                 return;
        //             }
        //             $.ajax({
        //                 url: "<?= site_url('UserController/deleteUser') ?>",
        //                 'type': 'POST',
        //                 data: {
        //                     'id_user': id
        //                 },
        //                 success: function(data) {
        //                     var json = JSON.parse(data);
        //                     if (json['error']) {
        //                         swal("Delete Gagal", json['message'], "error");
        //                         return;
        //                     }
        //                     delete dataUser[id];
        //                     swal("Delete Berhasil", "", "success");
        //                     renderUser(dataUser);
        //                 },
        //                 error: function(e) {}
        //             });
        //         });
        //     });
    });
</script>