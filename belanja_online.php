<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belanja Online</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Belanja Online</h2>
    <div class="row">
            <div class="col-md-6">
<form action="belanja_online.php" method="post">
  <div class="form-group row">
    <label for="customer" class="col-4 col-form-label">Customer</label> 
    <div class="col-8">
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <i class="fa fa-address-card"></i>
          </div>
        </div> 
        <input id="customer" name="customer" type="text" class="form-control">
      </div>
    </div>
  </div>
  
  <div class="form-group row">
    <label class="col-4">Pilih Produk </label> 
    <div class="col-8">
      <div class="custom-control custom-radio custom-control-inline">
        <input name="produk" id="produk_0" type="radio" class="custom-control-input" value="TV"> 
        <label for="produk_0" class="custom-control-label">TV</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="produk" id="produk_1" type="radio" class="custom-control-input" value="KULKAS"> 
        <label for="produk_1" class="custom-control-label">KULKAS</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input name="produk" id="produk_2" type="radio" class="custom-control-input" value="MESIN CUCI"> 
        <label for="produk_2" class="custom-control-label">MESIN CUCI</label>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="jumlah" class="col-4 col-form-label">Jumlah</label> 
    <div class="col-8">
      <input id="jumlah" name="jumlah" placeholder="Jumlah" type="text" class="form-control" required min="1">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Kirim</button>
    </div>
  </div>
</form> 

<?php

// Daftar harga
$daftar_harga = array(
    "TV" => 4200000,
    "Kulkas" => 3100000,
    "Mesin Cuci" => 3800000,
);

if (isset($_POST['submit'])) {
    $customer = htmlspecialchars($_POST["customer"]);
    $produk = ucwords(strtolower($_POST["produk"])); // Mengubah input agar sesuai dengan kunci array
    $jumlah = intval($_POST["jumlah"]);

    if (isset($daftar_harga[$produk]) && $jumlah > 0) {
        $harga_satuan = $daftar_harga[$produk];
        $total_belanja = $harga_satuan * $jumlah;

        echo "<h3>Hasil Belanja</h3>";
        echo "<p>Customer: " . $customer . "</p>";
        echo "<p>Produk Pilihan: " . $produk . "</p>";
        echo "<p>Jumlah Beli: " . $jumlah . "</p>";
        echo "<p>Total Belanja: Rp " . number_format($total_belanja, 0, ',', '.') . "</p>";
    } else {
        echo "<p class='text-danger'>Data tidak valid!</p>";
    }
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
</body>
</html>