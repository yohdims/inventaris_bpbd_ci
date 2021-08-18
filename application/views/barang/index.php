<?php
    $head = array("#","Merek","Kondisi","Status","Jenis","Asal Usul","Keterangan","Tahun Pengadaan","Harga","Stok","Gambar","Action");
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
                            <a href="<?= base_url();?>admin/barang/form/0">
                            <button type="submit" class="btn btn-primary waves-effect mb-3">Tambah Data</button>
                            </a>
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
                                <?php $no=1; foreach ( $barang as $data) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $data['merek']; ?></td>
                                        <td><?= $data['kondisi']=="B"? "Baru": $data['kondisi']=="LP"?"Layak Pakai":"Ganti"; ?></td>
                                        <td><?= $data['status']=="AK"? "Aktif":"Tidak Aktif"; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['asal_usul']; ?></td>
                                        <td><?= $data['keterangan']; ?></td>
                                        <td><?= $data['tahun_pengadaan']; ?></td>
                                        <td><?= $data['harga']; ?></td>
                                        <td><?= $data['stok']; ?></td>
                                        <td><img src="<?= base_url(); ?>assets/images/barang/<?= $data['gambar_barang']; ?>" width='50px'></td>
                                        <td>
                            <a href="<?= base_url();?>admin/barang/form/<?= $data['id_barang']; ?>" >
                                    <button type="submit" class="btn btn-primary waves-effect mb-3" data-type="confirm">Edit</button>
                            </a>
                            <a href="<?= base_url();?>admin/barang/riwayat/<?= $data['id_barang']; ?>" >
                                    <button type="submit" class="btn btn-primary waves-effect mb-3" data-type="confirm">Riwayat</button>
                            </a>
                            <a href="<?= base_url();?>admin/barang/hapus/<?= $data['id_barang']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                                    <button type="submit" class="btn btn-danger waves-effect mb-3">Hapus</button>
                            </a>
                                        </td>
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


    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
   
    <script src="<?= base_url('assets/');?>js/pages/tables/jquery-datatable.js"></script>
    <script src="<?= base_url('assets/');?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <link href="<?= base_url('assets/');?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
