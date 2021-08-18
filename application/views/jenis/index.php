<?php
    $head = array("#","Nama Jenis","Action");
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
                                        <li><a href="<?= base_url();?>Jenis/export">Laporan</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                        <div class=" m-t-10 m-b-10">
                                        <a href="<?= base_url();?>admin/jenis/form/0">
                                        <button type="submit" class="btn btn-primary waves-effect mb-3">Tambah Data</button>
                                        </a>
                                    </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#barang" data-toggle="tab">BARANG</a></li>
                                <li role="presentation"><a href="#kendaraan" data-toggle="tab">KENDARAAN</a></li>
                                <li role="presentation"><a href="#infrastruktur" data-toggle="tab">INFRASTRUKTUR</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="barang">
                                    <div class="body">
                                    <b>Data Jenis Barang</b>
                                    
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
                                        <td class="col-lg-1"><?= $no; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td class="col-lg-2">
                                        <a href="<?= base_url();?>admin/jenis/form/<?= $data['id_jenis']; ?>" >
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons" style="font-size:16px">edit</i></button>
                                        </a>
                            
                                        </td>
                                    </tr>
                                <?php $no++; endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="kendaraan">
                                    <div class="body">
                                    <b>Data Jenis Kendaraan</b>
   
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
                                <?php $no=1; foreach ( $kendaraan as $data) : ?>
                                    <tr>
                                        <td class="col-lg-1"><?= $no; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td class="col-lg-2">
                                        <a href="<?= base_url();?>admin/kendaraan/form/<?= $data['id_jenis']; ?>" >
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons" style="font-size:16px">edit</i></button>
                                        </a>
                            
                                        </td>
                                    </tr>
                                <?php $no++; endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="infrastruktur">
                                    <div class="body">
                                    <b>Data Jenis Infrastruktur</b>
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
                                <?php $no=1; foreach ( $infrastruktur as $data) : ?>
                                    <tr>
                                        <td class="col-lg-1"><?= $no; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td class="col-lg-2">
                                        <a href="<?= base_url();?>admin/kendaraan/form/<?= $data['id_jenis']; ?>" >
                                                <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons" style="font-size:16px">edit</i></button>
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

                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
            
        </div>
    </section>

