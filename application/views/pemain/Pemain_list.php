<table border="1 px">
    <tr>
        <td>NIK</td>
        <td>Nama Pemain</td>
        <td>Klub</td>
        <td>Tempat Lahir</td>
        <td>Tanggal Lahir</td>
        <td>Tinggi Badan</td>
        <td>Berat Badan</td>
        <td>Foto Pemain</td>
        <td>Aksi</td>
    </tr>
    <?php foreach($data_pemain as $row) { ?>
    <tr>
        <td><?php echo $row->nik; ?></td>
        <td><?php echo $row->nama_pemain; ?></td>
        <td><?php echo $row->id_klub; ?></td>
        <td><?php echo $row->tempat_lahir; ?></td>
        <td><?php echo $row->tanggal_lahir; ?></td>
        <td><?php echo $row->tinggi_badan; ?></td>
        <td><?php echo $row->berat_badan; ?></td>
        <td><?php echo $row->foto_pemain; ?></td>
        <td>
            <a href="<?php echo site_url('Pemain/hapus_pemain/'. $row->nik) ?>"> Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="<?php echo site_url('pemain/Tambah_pemain') ?>"> Tambah </a>