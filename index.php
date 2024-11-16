<?php
    require_once('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/boostrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Form</title>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 form-container">
            <h3 class="text-center mb-4">Form Pengunjung</h3>
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Pengunjung</label>
                    <input type="text" class="form-control" name="nama_pengunjung" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" required>
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" name="nomor_telepon" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Keperluan</label>
                    <textarea class="form-control" name="keperluan" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="kirim">Kirim</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 table-container">
            <h4 class="text-center mb-3">Data Pengunjung</h4>
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Nomor Telepon</th>
                        <th>Tanggal</th>
                        <th>Keperluan</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $sql = "SELECT * FROM pengunjung";
                    if (!empty($search)) {
                        $sql .= " WHERE nama_pengunjung LIKE '%$search%' OR jenis_kelamin LIKE '%$search%'";
                    }
                    $result = mysqli_query($connect, $sql);
                    $no = 1;
                    while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_pengunjung']; ?></td>
                        <td><?php echo $data['jenis_kelamin']; ?></td>
                        <td><?php echo $data['nomor_telepon']; ?></td>
                        <td><?php echo $data['tanggal']; ?></td>
                        <td><?php echo $data['keperluan']; ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
