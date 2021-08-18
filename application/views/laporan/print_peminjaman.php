<?php
    $head = array("#","Kode Peminjaman","Nama Peminjam","Tanggal Pinjam","Tanggal Kembali","Barang");
?>
      
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
            <thead>
                <?php for($i=0;$i<count($head);$i++){?>
                    <th><?php echo $head[$i]?></th>
                <?php }?>
          </thead>
            <tfoot>
                <?php for($i=0;$i<count($head);$i++){?>
                    <th><?php echo $head[$i]?></th>
                <?php }?>
            </tfoot>
            <tbody>
        <?php $no=1; foreach ( $peminjaman as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['kode_peminjaman']; ?></td>
                <td><?= $data['nama_lengkap']; ?></td>
                <td><?= $data['tgl_pinjam']; ?></td>
                <td><?= $data['tgl_kembali']; ?></td>
                <td><?php foreach ($this->M_Detail_Pinjam->getAll($data['id_peminjaman']) as $detail_pinjam) {
                    echo $detail_pinjam['merek'].",";
                } ?></td>
               
            </tr>
        <?php $no++; endforeach ?>
            </tbody>
        </table>

    </div>

