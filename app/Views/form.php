<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Mitra Minummen Thaitea</title>

    <!-- Bootstrap core CSS -->
    <link href="theme/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="theme/css/form.css">
</head>
<body>
    <div class="container px-5">
        <div class="card shadow">
            <div class="card-body" style="padding: 3rem;">
                <h2 class="text-center mb-5">Formulir Mitra Minummen Thaitea</h2>
                <div class="d-block p-5 bg-light">
                    <form action="<?= base_url('store') ?>" method="post" class="form-horizontal">
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" name="nama" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Usia</label>
                            <div class="col-sm-3">
                                <input type="text" name="usia" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Pekerjaan saat ini</label>
                            <div class="col-sm-6">
                                <input type="text" name="pekerjaan" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Alamat sesuai KTP</label>
                            <div class="col-sm-6">
                                <input type="text" name="alamat" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Alamat domisili</label>
                            <div class="col-sm-6">
                                <input type="text" name="domisili" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">No. HP</label>
                            <div class="col-sm-3">
                                <input type="text" name="hp" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Email</label>
                            <div class="col-sm-4">
                                <input type="text" name="email" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Instagram</label>
                            <div class="col-sm-4">
                                <input type="text" name="instagram" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Facebook</label>
                            <div class="col-sm-4">
                                <input type="text" name="facebook" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2">Tempat rencana usaha</label>
                            <div class="col-sm-10">
                                <input type="text" name="tempat_usaha" class="form-control" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Apa yang membuat anda tertarik dengan Minummen Thai Tea ?</label>
                            <textarea name="reason_1" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Bagaimana komentar anda tentang untung-rugi dalam bisnis?</label>
                            <textarea name="reason_2" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Apakah anda siap mengeluarkan dana kemitraan mulai Rp 10.000.000?  (exclude biaya pengiriman, include booth dan semua bahan baku serta peralatan) </label>
                            <textarea name="reason_3" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg">Simpan</button>
                    </form>
                </div>
                <p class="text-center mt-4">
                    <a href="<?= base_url() ?>">Kembali ke beranda</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="theme/vendor/jquery/jquery.min.js"></script>
    <script src="theme/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php if (session()->getFlashdata('success') != null): ?>
    <script>
        Swal.fire({
            title: 'Terima Kasih',
            text: 'Terimakasih telah mengisi formulir ini. Marketing kami akan menghubungi anda dalam 2-3hari kerja.',
            icon: 'success',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then( (result)=> {
            if(result.isConfirmed)
                window.location.replace('<?= base_url() ?>')
        })
    </script>
    <?php endif ?>
    <?php if (session()->getFlashdata('error') != null): ?>
    <script>
        Swal.fire({
            title: 'Error',
            text: '<?= session()->getFlashdata('error') ?>',
            icon: 'error',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then( (result)=> {
            if(result.isConfirmed)
                window.location.replace('<?= base_url().'/form' ?>')
        })
    </script>
    <?php endif ?>
</body>
</html>