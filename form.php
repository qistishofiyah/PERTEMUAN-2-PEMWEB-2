<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Belanja Online</h2>

    <?php
    // Array untuk menyimpan data produk dan harga
    $daftar_harga = array(
        "TV" => 4200000,
        "KULKAS" => 3100000,
        "MESIN CUCI" => 3800000
    );

    // Variabel untuk menyimpan hasil belanja
    $nama_customer = "";
    $produk_pilihan = "";
    $jumlah_beli = 0;
    $total_belanja = 0;

    // Proses data jika form dikirim
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_customer = $_POST["nama_customer"];
        $produk_pilihan = $_POST["produk"];
        $jumlah_beli = $_POST["jumlah"];

        // Hitung total belanja
        if (array_key_exists($produk_pilihan, $daftar_harga)) {
            $total_belanja = $daftar_harga[$produk_pilihan] * $jumlah_beli;
        }
    }
    ?>

    <div class="row">
        <div class="col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="nama_customer">Nama Customer</label>
                    <input type="text" class="form-control" id="nama_customer" name="nama_customer" required>
                </div>
                <div class="form-group">
                    <label for="produk">Pilih Produk</label>
                    <select class="form-control" id="produk" name="produk" required>
                        <?php foreach ($daftar_harga as $produk => $harga): ?>
                            <option value="<?php echo $produk; ?>"><?php echo $produk; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>

        <div class="col-md-6">
            <h4>Daftar Harga</h4>
            <ul class="list-group">
                <?php foreach ($daftar_harga as $produk => $harga): ?>
                    <li class="list-group-item"><?php echo $produk; ?>: Rp <?php echo number_format($harga, 0, ',', '.'); ?></li>
                <?php endforeach; ?>
            </ul>
            <p class="mt-3">Harga Dapat Berubah Setiap Saat</p>
        </div>
    </div>

    <?php if ($total_belanja > 0): ?>
        <div class="mt-4">
            <h4>Hasil Belanja</h4>
            <p>Nama Customer: <?php echo $nama_customer; ?></p>
            <p>Produk Pilihan: <?php echo $produk_pilihan; ?></p>
            <p>Jumlah Beli: <?php echo $jumlah_beli; ?></p>
            <p>Total Belanja: Rp <?php echo number_format($total_belanja, 0, ',', '.'); ?></p>
        </div>
    <?php endif; ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>