<?php
    $head = array("#","Kode Peminjaman","Nama Peminjam","Tanggal Pinjam","Tanggal Kembali","Barang");
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
                            <form method="post" target="blank" class="form-horizontal" action="<?=base_url();?>/admin/laporan/cetak">
                              <div class="row clearfix">
                                <div class="col-lg-4 ">
                                <input type="date" name="tgl_awal" value="<?= empty($tgl_awal)? "" : $tgl_awal ;?>" class="form-control" required>
                                </div>
                                <div class="col-lg-4 ">
                                <input type="date" name="tgl_akhir" value="<?= empty($tgl_akhir)? "" : $tgl_akhir ;?>" class="col-lg-3 form-control" required>
                                <input type="hidden" name="laporan" value="peminjaman" class="col-lg-3 form-control" required>
                                </div>
                                <div class="col-lg-4 ">
                                <!-- <button   type="submit" class="btn btn-sm btn-primary"> Cek</button> -->
                                <button   type="submit" name='print' class="btn btn-sm btn-primary"> Print</button>
                                </div>
                              </div>
                            </form>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example ">
                                    <!-- js-exportable -->
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

                
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>



