<html>
<body>
    <h2> Data Provinsi </h2>

    <p> <button type="button" onclick="window.location='<?php echo site_url('')?>'"> Tambah Data</button></p>
    <table border="2" style="width : 100%">
    <thead>
        <tr>
            <th> No </th>
            <th> Nama Provinsi </th>
            <th> Aksi </th>
        </tr>
    </thead>
    <tbody>
    <?php
    $nomor = 1;
        foreach ($tampilData as $row):
    ?>
        <tr>
            <td> <?php echo $nomor; ?> </td>
            <td> <?php echo $row->namaprov ?>  </td>
            <td> <?php echo anchor('Provinsi/edit/'.$row->id, "Ubah Data"); ?> | <?php echo anchor('Provinsi/hapus/'.$row->id, "Hapus Data", "onclick=\"return confirm('Are you sure? Delete this data?');\""); ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php endforeach; ?>
</tbody>
    </table>

</body>
</html>
