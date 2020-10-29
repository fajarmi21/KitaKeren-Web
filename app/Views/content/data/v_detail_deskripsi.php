<!-- /.row -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Deskripsi</h5>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-center">
                                <strong id="nama_deskripsi"></strong>
                            </p>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-wrap">
                                    <tbody>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td id="alamat_detailDeskripsi"> - </td>
                                        </tr>
                                        <tr>
                                            <td>Buka</td>
                                            <td>:</td>
                                            <td id="buka_detailDeskripsi"> - </td>
                                        </tr>
                                        <tr>
                                            <td>Nomor tlp</td>
                                            <td>:</td>
                                            <td id="nomor_detailDeskripsi"> - </td>
                                        </tr>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td id="harga_detailDeskripsi"> - </td>
                                        </tr>
                                        <tr>
                                            <td>Pemandu Wisata</td>
                                            <td>:</td>
                                            <td id="pemandu_detailDeskripsi"> - </td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi (en)</td>
                                            <td>:</td>
                                            <td id="deskripsi_detailDeskripsi_en"> - </td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi (ind)</td>
                                            <td>:</td>
                                            <td id="deskripsi_detailDeskripsi_ind"> - </td>
                                        </tr>
                                        <tr>
                                            <?php if ($count == 0) { ?>
                                                <a class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-tambah">TAMBAH</a>
                                            <?php } else { ?>
                                                <a class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#modal-edit">EDIT</a>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <p class="text-center">
                                <strong>Foto</strong>
                            </p>
                            <div class="form-group">
                                <div class="file-loading">
                                    <input id="file-4" type="file" class="file" multiple data-theme="fas">
                                </div>
                            </div>
                            <!-- /.progress-group -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6 col-6">
                            <div class="description-block border-right">
                                <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                                <h5 class="description-header">$35,210.43</h5>
                                <span class="description-text">TOTAL RATING</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6 col-6">
                            <div class="description-block border-right">
                                <!-- <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span> -->
                                <h5 class="description-header">$10,390.90</h5>
                                <span class="description-text">TOTAL USER</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Rating</h5>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
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
                                    <div class="mailbox-messages">
                                        <button type="button" id="back" name="back" class="btn btn-default btn-sm"><i class="fas fa-chevron-left"></i></button>
                                        <button type="button" id="reload" class="btn btn-default btn-sm"><i class="fas fa-sync-alt"></i></button>
                                        <span>xxx</span>
                                        <span id="id_dashboard" style="display: none;"><?= $id_dashboard; ?></span>
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
                                                <th>No</th>
                                                <th>Email</th>
                                                <th>Comment</th>
                                                <th>Rating</th>
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
                <!-- ./card-body -->
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
                <input type="hidden" name="id_dashboard" value="<?= $id_dashboard; ?>" class="form-control">
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
                            <div class="icheck-primary">
                                <input type="checkbox" id="checkbox1">
                                <label for="checkbox1">
                                    Checkbox Label
                                </label>
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
    <div class="modal-dialog" style="max-width: 60% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Modal</h4>
                <button type="button" class="close bt-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-edit" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id_detailDashboard" class="form-control">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-md-12 control-label">Judul</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" name="ind" class="form-control">
                                            <div class="input-group-append">
                                                <span class="input-group-text">IND</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
                                <label class="col-md-12 control-label">Deskripsi</label>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea  name="ind" class="form-control"></textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text">IND</span>
                                            </div>
                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <textarea name="en" class="form-control"></textarea>
                                            <div class="input-group-append">
                                                <span class="input-group-text">EN</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <label class="col-md-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="ind" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 control-label">Jam Buka</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="ind" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 control-label">No. Telp</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="number" name="ind" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 control-label">Harga</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="ind" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 control-label">Pemandu</label>
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <input type="text" name="ind" class="form-control">
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
<!-- <style>
    .img-def {
        background-color: #f8f8f8;
        background-size: cover;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 200px;
        height: 200px;
    }
</style> -->
<!-- page script -->
<script type="text/javascript">
    $("#file-4").fileinput({
        theme: 'fas',
        uploadUrl: '<?= site_url('master/write_detail_deskripsi/1/insert') ?>',
    }).on('fileuploaded', function(event, fileId) {
        console.log('File Uploaded', 'ID: ' + fileId);
    });
</script>
<!-- <script type="text/javascript">
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
</script> -->
<script type="text/javascript">
    var read_buku = {
        id: '<?= $id_detailDashboard; ?>',
        limit: 50,
        page: 1
    }

    function refresh_buku() {
        $.ajax({
                url: '<?= site_url('master/read_rating/rating/pagination') ?>',
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
                        url: '<?= site_url('master/read_rating/rating') ?>',
                        type: 'GET',
                        dataType: 'html',
                        data: read_buku,
                    })
                    .done(function(data) {
                        $("#data-load").fadeOut(100, function() {
                            $("#data-load").html(data).fadeIn(100);
                        });
                    });
            });

        $.ajax({
                url: '<?= site_url('master/read_detail_deskripsi') ?>',
                type: 'GET',
                dataType: 'json',
                data: read_buku,
            })
            .done(function(data) {
                console.log(data)
                $("#nama_deskripsi").html(data.nama_deskripsi.ind + " / " + data.nama_deskripsi.en);
                $("#alamat_detailDeskripsi").html(data.alamat_detailDeskripsi);
                $("#buka_detailDeskripsi").html(data.buka_detailDeskripsi);
                $("#nomor_detailDeskripsi").html(data.nomor_detailDeskripsi);
                $("#harga_detailDeskripsi").html(data.harga_detailDeskripsi);
                $("#pemandu_detailDeskripsi").html(data.pemandu_detailDeskripsi);
                $("#deskripsi_detailDeskripsi_en").html(data.deskripsi_detailDeskripsi.en);
                $("#deskripsi_detailDeskripsi_ind").html(data.deskripsi_detailDeskripsi.ind);
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
        $('.content').load('show_view/0');
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
</script>