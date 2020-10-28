<!-- /.row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-tambah">TAMBAH</a>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Filter</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form>
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <div class="row form-group" style="margin: 3px 1px;">
                                    <div class="col-md-7">
                                        <a class="nav-link"><i class="far fa-limit"></i> Page</a>
                                        <!-- <label for="filter-page"></label> -->
                                    </div>
                                    <div class="col-md-5" id="dtl" data-title="Halaman maksimum: 42">
                                        <input type="number" id="filter-page" name="filter-page" class="form-control" value="1">
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="row" style="margin: 3px 1px;">
                                    <div class="col-md-7">
                                        <a href="#" class="nav-link" style="vertical-align: middle;height:fit-content"><i class="far fa-limit"></i> Limit</a>
                                    </div>
                                    <div class="col-md-5">
                                        <input type="number" id="filter-limit" name="filter-limit" class="form-control" value="50">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" id="filter-cari" name="filter-cari" placeholder="Search Data">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <div class="mailbox-controls">
                        <button type="button" id="back" name="back" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                        <button type="button" id="reload" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                        <span><?= $detail_dashboard; ?></span>
                        <span id="id_detailDashboard" style="display: none;"><?= $id_detailDashboard; ?></span>
                        <div class="float-right">
                            <div class="btn-group">
                                <button type="button" id="filter-previous_page" name="filter-previous_page" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                <button type="button" id="filter-next_page" name="filter-next_page" class="btn btn-default btn-sm"><i class="fas fa-chevron-right"></i></button>
                            </div>
                            <!-- /.btn-group -->
                        </div>
                        <!-- /.float-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                        <table class="table table-hover table-striped">
                            <!-- <thead>
                                    <tr>
                                        <th style="text-align: center;vertical-align: middle;" rowspan="2">No</th>
                                        <th style="text-align: center;vertical-align: middle;" colspan="2">Name</th>
                                        <th style="text-align: center;vertical-align: middle;" rowspan="2">Icon</th>
                                        <th style="text-align: center;vertical-align: middle;" rowspan="2"></th>
                                    </tr>
                                    <tr>
                                        <th style="text-align: center;vertical-align: middle;">Ind</th>
                                        <th style="text-align: center;vertical-align: middle;">En</th>
                                    </tr>
                                </thead> -->
                            <tbody id="data-load">
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<!-- modal -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close bt-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-tambah" enctype="multipart/form-data">
                <input type="hidden" name="id_detailDashboard" value="<?= $id_detailDashboard; ?>" class="form-control">
                <div class="modal-body">
                    <div class="row">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">IND</span>
                                    </div>
                                    <input type="text" name="ind" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">EN</span>
                                    </div>
                                    <input type="text" name="en" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-4 control-label" for="bukti">Icon</label>
                        <div class="form-group">
                            <div class="image-editor ">
                                <div class="col-md-8">
                                    <img id="blah" class="img-def" alt="your image" src="<?php base_url() ?>/assets/transparant.png" />
                                    <input type="file" id="imgInp" name="imgInp" accept="image/*">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default bt-close" data-dismiss="modal">Close</button>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-block btn-primary" value="Tambah">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit">
    <!-- <div class="modal fade" id="modal-edit"> -->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close bt-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_deskripsi" class="form-control">
                    <div class="row">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="ind" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text">IND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" name="en" class="form-control">
                                    <div class="input-group-append">
                                        <span class="input-group-text">EN</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="image-editor ">
                                    <label class="col-md-4 control-label" for="bukti">Icon</label>
                                    <div class="col-md-8">
                                        <img id="blahE" class="img-def" alt="your image" />
                                        <input type="file" name="img" id="img" accept="image/*" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default bt-close" data-dismiss="modal">Close</button>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-block btn-primary" value="Edit">
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
<!-- /.modal -->
<!-- page style -->
<style>
    .img-def {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 200px;
        height: 200px;
    }
</style>
<!-- page script -->
<script type="text/javascript">
    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#imgInp").change(function() {
        readURL(this, '#blah');
    });

    $("#img").change(function() {
        readURL(this, '#blahE');
    });
</script>
<script type="text/javascript">
    var read_buku = {
        id: '<?= $id_detailDashboard; ?>',
        limit: 50,
        page: 1
    }

    function refresh_buku() {
        $.ajax({
                url: '<?= site_url('master/read_deskripsi/show/deskripsi/pagination') ?>',
                type: 'GET',
                dataType: 'json',
                data: read_buku,
            })
            .done(function(data) {
                if (read_buku.page == 1) {
                    $("#filter-previous_page").addClass('disabled');
                } else {
                    $("#filter-previous_page").removeClass('disabled');
                }
                if (read_buku.page == data.total_page) {
                    $("#filter-next_page").addClass('disabled');
                } else {
                    $("#filter-next_page").removeClass('disabled');
                }

                if (data.total_data < data.limit) {
                    $("#filter-limit").attr('value', data.total_data);
                    $("#filter-limit").attr('max', data.total_data);
                }
                $("#filter-page").attr('max', data.total_page);
                $("#dtl").attr('data-title', 'Halaman Maksimum: ' + data.total_page);
                // $("#filter-page").attr('title', 'Halaman Maksimum: ' + data.total_page);
                $("#filter-page").attr('data-original-title', 'Halaman Maksimum: ' + data.total_page);
                $.ajax({
                        url: '<?= site_url('master/read_deskripsi/show/deskripsi') ?>',
                        type: 'GET',
                        dataType: 'html',
                        data: read_buku,
                    })
                    .done(function(data) {
                        $("#data-load").fadeOut(100, function() {
                            $("#data-load").html(data).fadeIn(100);
                            event_buku();
                        });
                    });
            });
    }

    refresh_buku();

    // ----------------------------------------
    // Event reload
    // ----------------------------------------
    $("#reload").click(function(e) {
        refresh_buku();
    });

    // -------------------------------------
    // Event setelah data buku dimuat
    // -------------------------------------
    function event_buku() {
        // ----------------------------------------
        // Event klik edit buku
        // ----------------------------------------
        ctx_modal_edit_buku = $("#modal-edit");
        $(".edit-data").click(function(e) {
            id = $(this).data('id');
            $.ajax({
                    url: '<?= site_url('master/read_deskripsi/single') ?>',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                })
                .done(function(data) {
                    $("#form-edit input[name='id_deskripsi']").val(data[0].id_deskripsi);
                    $("#form-edit input[name='ind']").val(data[0].nama_deskripsi.ind);
                    $("#form-edit input[name='en']").val(data[0].nama_deskripsi.en);
                    $("#form-edit img[id='blahE']").attr('src', '<?php base_url() ?>/' + data[0].icon_deskripsi);
                    ctx_modal_edit_buku.modal('show').on('shown.bs.modal', function(e) {
                        $("#form-edit input[name='ind']").focus();
                    });
                });
        });

        // ----------------------------------------
        // Hapus Data Buku
        // ----------------------------------------
        $(".hapus-data").click(function(e) {
            e.preventDefault();
            id = $(this).data('id');
            if (confirm("Anda yakin?")) {
                $.ajax({
                        url: '<?= site_url('master/write_deskripsi/delete') ?>',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            id: id
                        },
                    })
                    .done(function(data) {
                        if (data) {
                            refresh_buku();
                            buat_notifikasi({
                                icon: 'done_outline',
                                message: "Data berhasil dihapus",
                                type: 'success'
                            });
                        }
                    });
            }
        });

        // ----------------------------------------
        // Sub Detail Data Buku
        // ----------------------------------------
        $(".subdetail-data").click(function(e) {
            e.preventDefault();
            id = $(this).data('id');
            console.log(id);
            $('.content div').remove();
            $('.content').load('show_view/2/' + id + '/<?= $id_dashboard; ?>');
        });

        // ----------------------------------------
        // Detail Data Buku
        // ----------------------------------------
        $(".detail-data").click(function(e) {
            e.preventDefault();
            id = $(this).data('id');
            console.log(id);
            $('.content div').remove();
            $('.content').load('show_view/3/' + id + '/<?= $id_dashboard; ?>');
        });

        // ----------------------------------------
        // Reset Gambar
        // ----------------------------------------
        $(".bt-close").click(function(e) {
            e.preventDefault();
            $(".img-def").attr('src', '<?php base_url() ?>/assets/transparant.png');
        });
    }

    // -------------------------------------
    // Event Filter / Penyaringan Data
    // -------------------------------------
    var ctx_back = $("#back");
    var ctx_limit = $("#filter-limit");
    var ctx_page = $("#filter-page");
    var ctx_next_page = $("#filter-next_page");
    var ctx_previous_page = $("#filter-previous_page");
    var ctx_cari = $("#filter-cari");

    ctx_back.click(function(e) {
        e.preventDefault();
        $('.content div').remove();
        $('.content').load('show_view/1/<?= $id_dashboard; ?>');
    });
    ctx_limit.on('input', function(e) {
        value = $(this).val();
        if (value > 0) {
            read_buku.limit = value;
        } else {
            $(this).val(50);
        }
        $("#filter-page").val(1);
        read_buku.page = 1;
        refresh_buku();
    });
    ctx_page.on('input', function(e) {
        value = $(this).val();
        if (value > 0) {
            read_buku.page = value;
        } else {
            $(this).val(1);
        }
        refresh_buku();
    });
    ctx_next_page.click(function(e) {
        disabled = $(this).hasClass('disabled');
        if (!disabled) {
            read_buku.page++;
            ctx_page.val(read_buku.page);
            refresh_buku();
        }
    });
    ctx_previous_page.click(function(e) {
        disabled = $(this).hasClass('disabled');
        if (!disabled) {
            read_buku.page--;
            ctx_page.val(read_buku.page);
            refresh_buku();
        }
    });
    ctx_cari.on('input', function(e) {
        value = $(this).val();
        if (value != '') {
            read_buku.cari = value;
        } else {
            delete read_buku.cari;
        }
        console.log(value)
        refresh_buku();
    });

    // -------------------------------------
    // Tambah Data Buku
    // -------------------------------------
    $("#form-tambah").submit(function(e) {
        e.preventDefault();
        ctx_modal = $("#modal-tambah");
        form = $(this);

        if (document.getElementById("imgInp").files.length == 0) {
            alert('Gambar tidak boleh kosong');
        } else {
            $.ajax({
                    url: '<?= site_url('master/write_deskripsi/insert') ?>',
                    type: 'POST',
                    dataType: 'json',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                })
                .done(function(data) {
                    console.log(data);
                    if (data == 0) {
                        form[0].reset();
                        ctx_modal.modal('hide');
                        buat_notifikasi({
                            icon: 'done_outline',
                            message: "Data berhasil ditambahkan",
                            type: 'success'
                        });
                        refresh_buku();
                    } else {
                        alert('Tidak dapat terhubung dengan database');
                    }
                });
        }
    });

    // -------------------------------------
    // Edit buku
    // -------------------------------------
    $("#form-edit").submit(function(e) {
        e.preventDefault();
        form = $(this);
        $.ajax({
                url: '<?= site_url('master/write_deskripsi/update') ?>',
                type: 'POST',
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
            })
            .done(function(data) {
                if (data) {
                    form[0].reset();
                    ctx_modal_edit_buku.modal('hide');
                    buat_notifikasi({
                        icon: 'done_outline',
                        message: 'Data berhasil di edit',
                        type: 'success'
                    });
                    refresh_buku();
                }
            });
    });

    function buat_notifikasi(notifikasi) {
        $.notify({
            icon: notifikasi.icon,
            message: notifikasi.message
        }, {
            type: notifikasi.type,
            timer: 3000,
            placement: {
                from: 'top',
                align: 'right'
            },
            offset: {
                x: 50,
                y: 100
            },
            newest_on_top: true
        });

    }
</script>