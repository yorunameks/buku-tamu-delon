<?php
    $connect = mysqli_connect('localhost', 'root', '', 'bukutamu_delon');

    if(isset($_POST['kirim'])) {
        $nama = $_POST['nama_pengunjung'];
        $jk = $_POST['jenis_kelamin'];
        $notelepon = $_POST['nomor_telepon'];
        $tanggal = date('Y-m-d H:i:s');
        $keterangan = $_POST['keperluan'];

        $query = "INSERT INTO pengunjung VALUES ('', '$nama', '$jk', '$notelepon', '$tanggal', '$keterangan')";

        $sql = mysqli_query($connect, $query);

        echo"<script>
            alert('Berhasil');
            location.href='index.php';
        </script>";
    }
?>