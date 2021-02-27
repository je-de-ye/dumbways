<!doctype html>
<html lang="en">

<head>
    <title>Soal No 4B - Dumbways</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container pb-5">
        <div class="row">
            <div class="col-12 py-3">
                <div class="h3 text-center">Data Perpustakaan</div>
            </div>
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header text-right border-0">
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addBuku"><i class="fa fa-plus" aria-hidden="true"></i> Buku</button>
                        <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addKat"><i class="fa fa-plus" aria-hidden="true"></i> Kategory</button>
                    </div>
                </div>
            </div>
        </div>
        <?php foreach ($kategori as $k) : ?>
            <div class="row">
                <div class="col-12 pt-5">
                    <div class="h5 mb-0">Kategori <?= $k['name'] ?> | <small><button class="btn btn-sm btn-info text-white py-0" data-toggle="modal" data-target="#UpdateKat<?= $k['id'] ?>">Update</button> <a href="<?= base_url('home/deleteKat/') . $k['id'] ?>" class="btn btn-sm btn-danger py-0">delete</a></small></div>
                    <hr class="my-1">
                </div>
                <?php foreach ($buku as $b) : ?>
                    <?php if ($k['id'] == $b['category_id']) : ?>
                        <div class="col-3 py-1">
                            <div class="card">
                                <div class="card-body p-2">
                                    <img src="https://reactnativecode.com/wp-content/uploads/2018/02/Default_Image_Thumbnail.png" alt="img" class="img-fluid">
                                    <div class="pt-2">
                                        <p style="line-height:16px;" class="mb-0"><?= $b['name'] ?></p>
                                    </div>
                                    <div class="text-muted">
                                        Stok : <b class="text-dark"><?= $b['stok'] ?></b>
                                    </div>
                                    <div class="text-center pt-2">
                                        <?php if ($b['stok'] != 0) : ?>
                                            <button class="btn btn-sm btn-primary">Pinjam</button>
                                        <?php endif; ?>
                                        <button class="btn btn-sm btn-warning text-white">Kembalikan</button> <br>
                                        <button class="btn btn-sm btn-info text-white mt-1" data-toggle="modal" data-target="#UpdateBuku<?= $b['id'] ?>">Update</button>
                                        <a href="<?= base_url('home/deleteBuku/') . $b['id'] ?>" class="btn btn-sm btn-danger text-white mt-1">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addBuku" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Tambah buku
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="<?= base_url('home/addbuku') ?>" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" aria-describedby="helpId" placeholder="Judul Buku">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="stok" aria-describedby="helpId" placeholder="Stok">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="desk" aria-describedby="helpId" placeholder="Deskripsi">
                            </div>
                            <div class="form-group">
                                <label for="">Kategori Buku</label>
                                <select class="form-control" name="kategori">
                                    <?php foreach ($kategori as $k) : ?>
                                        <option value="<?= $k['id'] ?>"><?= $k['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addKat" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Tambah Kategori
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="<?= base_url('home/addkategori') ?>" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" aria-describedby="helpId" placeholder="Nama Kategori">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($kategori as $k) : ?>
        <div class="modal fade" id="UpdateKat<?= $k['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Update Kategori
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="<?= base_url('home/UpdateKategori') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $k['id'] ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" aria-describedby="helpId" value="<?= $k['name'] ?>">
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <?php foreach ($buku as $b) : ?>
        <div class="modal fade" id="UpdateBuku<?= $b['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        Tambah buku
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form action="<?= base_url('home/UpdateBuku') ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $b['id'] ?>">

                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" aria-describedby="helpId" value="<?= $b['name'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="stok" aria-describedby="helpId" value="<?= $b['stok'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="desk" aria-describedby="helpId" value="<?= $b['deskripsi'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Kategori Buku</label>
                                    <select class="form-control" name="kategori">
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id'] ?>" <?php if ($k['id'] == $b['category_id']) {
                                                                                echo 'selected';
                                                                            }  ?>><?= $k['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>