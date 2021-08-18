<?php
if ($this->session->userdata("hak_akses")=="A"){
    $head = array("#","Kode Peminjaman","Nama Peminjam","Tanggal Pinjam","Tanggal Kembali","Status","Nama Barang/Kendaraan","Action");
}else{
    $head = array("#","Kode Peminjaman","Nama Peminjam","Tanggal Pinjam","Tanggal Kembali","Status","Nama Barang/Kendaraan");
}
?>
      <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <!-- <?= $this->session->flashdata('message'); ?> -->
                        <?php if (!empty($error)):?>
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo $error;?> 
                            </div>
                        <?php endif;?>
                        <div class="header">
                            <h2>
                                <?= $title; ?>
                            </h2>   
                            
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="<?= base_url();?>kendaraan/export">Laporan</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <div class=" m-b-10">
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                        <td><?= $data['status_peminjaman']; ?></td>
                                        <td>
                                            <?php 
                                                foreach ($this->M_Detail_Pinjam->getAll($data['id_peminjaman']) as $detail_pinjam) {
                                                    echo $detail_pinjam['merek']."(".$detail_pinjam['jumlah'].'), ';
                                                }
                                            ?>
                                        </td>
                            <?php if ($this->session->userdata("hak_akses")=="A"){?>
                                        <td>
                            <a href="<?= base_url();?>admin/peminjaman/form/<?= $data['id_peminjaman']; ?>" >
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons" style="font-size:16px">edit</i></button>
                            </a>
                                        </td>
                            <?php }?>
                                    </tr>
                                <?php $no++; endforeach ?>
                                    </tbody>
                                </table>

                            </div>

                
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>



