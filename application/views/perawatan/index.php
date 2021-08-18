<?php
    $head = array("#","Nama Peminta","Jenis Perawatan","Tanggal Permintaan","Biaya","Action");
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
                            <a href="<?= base_url();?>admin/perawatan/form/0">
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
                                <?php $no=1; foreach ( $perawatan as $data) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $data['nama_lengkap']; ?></td>
                                        <td>
                                            <?php
                                                if($data['jenis_perawatan']=="PJK"){
                                                    echo "Pajak";
                                                }elseif($data['jenis_perawatan']=="SRV"){
                                                    echo "Service";
                                                }elseif($data['jenis_perawatan']=="PBK"){
                                                    echo "Perbaikan";
                                                } 
                                            ?>
                                        </td>
                                        <td><?= $data['tgl_permintaan']; ?></td>
                                        <td>Rp. <?= number_format($data['biaya']); ?></td>
                                        <td>
                            <a href="<?= base_url();?>admin/perawatan/form/<?= $data['id_perawatan']; ?>" >
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons" style="font-size:16px">edit</i></button>
                            </a>
                            <a href="<?= base_url();?>admin/perawatan/hapus/<?= $data['id_perawatan']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                                    <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="material-icons" style="font-size:16px">delete</i></button>
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



