<?php
   
    $data = array("","","","","","","");
    $head = array("#","Barang","Jumlah","Action");
?>
	<section class="content">
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?= $title?>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- <pre> -->
                            <?php //print_r($this->session->userdata('peminjam'));?>
                        <!-- </pre> -->
                            <h2 class="card-inside-title">Form <?= $title?></h2>
                            <div class="row clearfix">
                            <?php if ($this->session->userdata("hak_akses")=="A"){?>
                            <form method="POST" action="<?= base_url();?>admin/peminjaman/tambah_session" enctype="multipart/form-data">
                            <?php }elseif ($this->session->userdata("hak_akses")=="K"){?>
                            <form method="POST" action="<?= base_url();?>karyawan/peminjaman/tambah_session" enctype="multipart/form-data">
                            <?php }elseif ($this->session->userdata("hak_akses")=="KB"){?>
                            <form method="POST" action="<?= base_url();?>kepala_bidang/peminjaman/tambah_session" enctype="multipart/form-data">
                            <?php }?>
                <div class="col-sm-12">
               
              <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="merek">Pilih Barang</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-8 col-xs-7">
                        <select class="form-control show-tick" name="id_barang" id="id_barang" required data-live-search="true" >
                            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Barang (Stok)</option>
                            <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Barang" >
                            <?php foreach ( $barang as $data) : ?>
                                <option value="<?= $data['id_barang']; ?>" max="<?= $data['stok']; ?>" 
                                <?php if(!empty($peminjaman)){ ?>
                                <?php 
                                foreach ( $detail_pinjam as $data2) : 
                                    if($data['id_barang']==$data2['id_barang']) { echo "selected";} 
                                endforeach ?>
                                <?php } ?>
                                >
                                <?= '&nbsp;&nbsp;'.$data['merek']." (".$data['stok'].")"; ?>
                                </option>
                            <?php endforeach ?>
                            </optgroup>
                            <optgroup label="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kendaraan" >
                            <?php foreach ( $kendaraan as $data) : ?>
                                <option value="<?= $data['id_barang']; ?>" max="<?= $data['stok']; ?>"
                                <?php if(!empty($peminjaman)){ ?>
                                <?php 
                                foreach ( $detail_pinjam as $data2) : 
                                    if($data['id_barang']==$data2['id_barang']) { echo "selected";} 
                                endforeach ?>
                                <?php } ?>
                                >
                                <?= '&nbsp;&nbsp;'.$data['merek']; ?>
                                </option>
                            <?php endforeach ?>
                            </optgroup>
                        </select>
                        <small id="peringatan" style="color:red"></small>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 ">
                        <input required type="number" name="jumlah" id="jumlah2" value="1" class="form-control" placeholder="Jumlah" min='1' max="">
                        <br>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 ">
                         <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambah</button>
                        
                    </div>
                </div>
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <?php if ($this->session->userdata("hak_akses")=="A"){?>
                        <a href="<?= base_url();?>admin/peminjaman/input">
                        <button type="button" class="btn btn-primary m-t-15 waves-effect">Selesai</button>
                        </a>
                        <?php }elseif ($this->session->userdata("hak_akses")=="KB"){?>
                        <a href="<?= base_url();?>kepala_bidang/peminjaman/input">
                        <button type="button" class="btn btn-primary m-t-15 waves-effect">Selesai</button>
                        </a>
                        <?php }elseif ($this->session->userdata("hak_akses")=="K"){?>
                        <a href="<?= base_url();?>karyawan/peminjaman/input">
                        <button type="button" class="btn btn-primary m-t-15 waves-effect">Selesai</button>
                        </a>
                        <?php }?>
                    </div>
                                </div>
                        </form>

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
                                <?php $no=1; foreach ( $detail_pinjam as $data) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $data['merek']; ?></td>
                                        <td><?= $data['jumlah']; ?></td>
                                        <td>
                          <a href="<?= base_url();?>admin/peminjaman/hapus_session/<?= $data['id_barang']; ?>" >
                                    <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="hapus" onClick="hapus()"><i class="material-icons" style="font-size:16px">delete</i></button>
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
            <!-- #END# Input -->

            
        </div>
    </section>

 