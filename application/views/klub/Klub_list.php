<table border="1px">
 <tr> 
    <td>ID Klub</td>
    <td>Nama Klub</td>
    <td>Nama Pengurus</td>
    <td>Logo</td>
    <td>Struktur Pengurus</td>
    <td>Aksi</td>
 </tr>
 <?php foreach($data_klub as $row) { ?>
  <tr>
    <td><?php echo $row->id_klub; ?></td>
    <td><?php echo $row->nama_klub; ?></td>
    <td><?php echo $row->pengurus; ?></td>
    <td><?php echo $row->logo; ?></td>
    <td><?php echo $row->struktur_pengurus; ?></td>
    <td>
        <a href="<?php echo site_url('Klub/hapus_klub/'. $row->id_klub) ?>"> Hapus</a>
    </td>
 </tr>
 <?php } ?>

</table>
<a href="<?php echo site_url('klub/Tambah_klub') ?>"> Tambah </a>