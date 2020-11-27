<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Tambah Data</title>
</head>
<body>
    <h2> Form Edit Data </h2>
    <p> <button type="button" onclick="window.location='<?php echo site_url('provinsi/index')?>'"> Kembali Ke Index </button></p>
    <br>
    <?= form_open('provinsi/updatedata') ?>
    <table>
        <tr>
            <td> Nama Provinsi : </td>
            <td> <input type="text" name="namaprov" value="<?php echo $nama; ?>"> </td>
        <tr>
            <td colspan=2><input type="submit" value="Simpan Data"> </td>
    </table>
     
    <?= form_close(); ?>
</body>
</html>