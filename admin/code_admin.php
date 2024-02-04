<?php
include('koneksi.php');


//  Create (Tambah Data admin)
if (isset($_POST['admin_btn'])) {
    // echo "Form submit detected";
    // $id = $_POST['Id'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];


    // Cetak variabel untuk debugging
    echo "Username: $username, Email: $email, Password: $password";
    var_dump($username, $email, $password); // Tambahkan ini
    

    // Query untuk menambah data ke database
    $query = "INSERT INTO admin (`username`, `email`, `password`) VALUES ('$username','$email','$password')";
    echo $query; // Tambahkan ini

    // Eksekusi query
    if ($koneksi->query($query) === TRUE) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
        var_dump($koneksi->error); // Tambahkan ini
    }
    header('Location: admin.php'); // Ganti dengan halaman yang sesuai
}

// Update (Edit Data Custommer)
if (isset($_POST['update_btn'])) {
    $id = $_POST['id_admin'];
    $username = $_POST['edit_Usernmae'];
    $email = $_POST['edit_Email'];
    $password = $_POST['edit_Password'];

    $query = "UPDATE `admin` SET `Username`='$username', `Email`='$email', `Password`='$password' WHERE `id`='$id'";
    echo "ID: $id, Username: $username, Email: $email, Password: $password";

    if ($koneksi->query($query) === TRUE) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error updating record: " . $koneksi->error;
        var_dump($koneksi->error);
    }

    header('Location: admin.php'); // Ganti dengan halaman yang sesuai
}

// Delete (Hapus Data obat)
if (isset($_POST['dlt_admin'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM admin WHERE id='$id'";
    $koneksi->query($query);
    header('Location: admin.php'); 
}

?>