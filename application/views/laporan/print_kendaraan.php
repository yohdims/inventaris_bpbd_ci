<?php
$head = array("#","Merek","Kondisi","Jenis","Status","No Rangka","BPKB","Harga","Asal Usul","Tahun Pengadaan","Tanggal Pajak");
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
        <?php $no=1; foreach ( $kendaraan as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data['merek']; ?></td>
                <td><?= $data['kondisi']=="B"? "Baru": $data['kondisi']=="LP"?"Layak Pakai":"Ganti"; ?></td>
                <td><?= $data['nama']; ?></td>
                <td><?= $data['status']=="AK"? "Aktif":"Tidak Aktif"; ?></td>
                <td><?= $data['no_rangka']; ?></td>
                <td><?= $data['no_bpkb']; ?></td>
                <td><?= $data['harga']; ?></td>
                <td><?= $data['asal_usul']; ?></td>
                <td><?= $data['tahun_pengadaan']; ?></td>
                <td><?= $data['tgl_pajak']; ?></td>
            </tr>
        <?php $no++; endforeach ?>
            </tbody>
        </table>

    </div>

