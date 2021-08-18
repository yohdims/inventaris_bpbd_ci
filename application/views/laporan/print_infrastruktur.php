<?php
$head = array("#","Kode Infrastuktur","Kontruksi","Luas","Jenis","Status","Tahun Pengadaan","Dokumen","Harga","Asal Usul","Keterangan");
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
        <?php $no=1; foreach ( $infrastruktur as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['kd_infrastruktur']; ?></td>
                <td><?= $data['kontruksi']; ?></td>
                <td><?= $data['luas']; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['status']=="AK"? "Aktif":"Tidak Aktif"; ?></td>
                <td><?= $data['tahun_pengadaan']; ?></td>
                <td><?= $data['dokumen_tanggal']; ?></td>
                <td><?= $data['harga']; ?></td>
                <td><?= $data['asal_usul']; ?></td>
                <td><?= $data['keterangan']; ?></td>
            </tr>
        <?php $no++; endforeach ?>
            </tbody>
        </table>

    </div>

