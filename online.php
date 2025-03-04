<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Belanja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Belanja Online</h2>
    <div class="row">
        <!-- Form Input -->
        <div class="col-md-8">
            <form method="POST" action="">
                <div class="form-group">
                    <label>Customer</label>
                    <input type="text" name="customer" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Pilih Produk</label><br>
                    <input type="radio" name="produk" value="TV" required> TV
                    <input type="radio" name="produk" value="Kulkas"> Kulkas
                    <input type="radio" name="produk" value="Mesin Cuci"> Mesin Cuci
                </div>
                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required min="1">
                </div>
                <button type="submit" name="proses" class="btn btn-success">Kirim</button>
            </form>

            <!-- Hasil Belanja -->
            <?php
            // Array harga produk
            $produk_list = [
                "TV" => 4200000,
                "Kulkas" => 3100000,
                "Mesin Cuci" => 3800000
            ];

            // Memproses form setelah submit
            if (isset($_POST['proses'])) {
                $customer = $_POST['customer'];
                $produk = $_POST['produk'];
                $jumlah = $_POST['jumlah'];
                $harga_satuan = $produk_list[$produk];
                $total_harga = $harga_satuan * $jumlah;

                echo "<div class='mt-4 border p-3'>";
                echo "<h5>Nama Customer : <strong>$customer</strong></h5>";
                echo "<p>Produk Pilihan : <strong>$produk</strong></p>";
                echo "<p>Jumlah Beli : <strong>$jumlah</strong></p>";
                echo "<p>Total Belanja : <strong>Rp " . number_format($total_harga, 0, ',', '.') . ",-</strong></p>";
                echo "</div>";
            }
            ?>
        </div>

        <!-- Daftar Harga -->
        <div class="col-md-4">
            <div class="border p-3">
                <h5 class="bg-primary text-white p-2">Daftar Harga</h5>
                <ul class="list-group">
                    <li class="list-group-item">TV : Rp 4.200.000</li>
                    <li class="list-group-item">Kulkas : Rp 3.100.000</li>
                    <li class="list-group-item">Mesin Cuci : Rp 3.800.000</li>
                </ul>
                <div class="bg-primary text-white text-center p-2 mt-2">
                    Harga Dapat Berubah Setiap Saat
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>