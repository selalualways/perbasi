<table border="1px">
 <tr> 
    <td>id_klub</td>
    <td>nama_klub</td>
    <td>pengurus</td>
    <td>logo</td>
    <td>struktur_pengurus</td>
 </tr>
 <?php foreach($data_klub as $row) { ?>
  <tr>
    <td><?php echo $row->id_klub; ?></td>
    <td><?php echo $row->nama_klub; ?></td>
    <td><?php echo $row->pengurus; ?></td>
    <td>
        <a href="<?php echo site_url('Klub/hapus_klub/'. $row->id_klub) ?>"> Hapus</a>
    </td>
 </tr>
 <?php } ?>

</table>
<a href="<?php echo site_url('klub/Tambah_klub') ?>"> Tambah </a>