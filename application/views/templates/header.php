<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title><?= $title; ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets') ?>/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="blog.css" rel="stylesheet">
</head>

<body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="text-muted"></a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-dark"></a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <a class="text-muted">

                    </a>
                    <p class="btn btn-sm btn-outline-secondary"><?= anchor('', 'Log out') ?></p>
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <p class="p-2 text-muted"><?= anchor('Dashboard', 'Dashboard', 'class="btn btn-primary"') ?></p>
                <p class="p-2 text-muted"><?= anchor('kategori', 'kategori Barang', 'class="btn btn-primary"') ?></p>
                <p class="p-2 text-muted"><?= anchor('barang', 'Data Barang', 'class="btn btn-primary"') ?></p>
                <p class="p-2 text-muted"><?= anchor('operator', 'operator sistem', 'class="btn btn-primary"') ?></p>
                <p class="p-2 text-muted"><?= anchor('transaksi', 'Form Transaksi', 'class="btn btn-primary"') ?></p>
                <p class="p-2 text-muted"><?= anchor('transaksi/laporan', 'Laporan Transaksi', 'class="btn btn-primary"') ?></p>
                <p class="p-2 text-muted"><?= anchor('transaksi/excel', 'cetak Laporan Excel', 'class="btn btn-primary"') ?></p>
                <p class="p-2 text-muted"><?= anchor('transaksi/pdf', 'cetak Laporan PDF', 'class="btn btn-danger"') ?></p>
            </nav>
        </div>