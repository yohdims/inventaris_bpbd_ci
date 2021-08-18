<?php
    if(!empty($perawatan)){
        $data = array("$perawatan->id_perawatan","$perawatan->id_barang","$perawatan->id_user","$perawatan->tgl_permintaan","$perawatan->biaya","$perawatan->jenis_perawatan");
    }else{
        $data = array("","","","","","","");
    }

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

                            <h2 class="card-inside-title">Form <?= $title?></h2>
                            <div class="row clearfix">
                            <form method="POST" action="<?= base_url();?>admin/perawatan/input" enctype="multipart/form-data">
                <div class="col-sm-12">
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="id_barang">Barang/Kendaraan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                    <input type="hidden" name="id_perawatan" id="id_perawatan" class="form-control" placeholder="id_perawatan" value='<?php echo $data[0]?>' >
                         <select class="form-control show-tick" name='id_barang'>
                            <?php foreach ( $barang as $data2) : ?>
                            <option value="<?= $data2['id_barang'];?>" <?php if($data2['id_barang']==$data[1]){echo "selected"; }?>><?= $data2['merek'];?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    </div>
                    
                                
                </div>
               <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="id_user">Nama Peminta</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                    
                         <select class="form-control show-tick" name='id_user'>
                            <?php foreach ( $user as $data_user) : ?>
                            <option value="<?= $data_user['id_user'];?>" <?php if($data_user['id_user']==$data[2]){echo "selected"; }?>><?= $data_user['nama_lengkap'];?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    </div>
                                
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="tgl_permintaan">Tanggal Permintaan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_permintaan" id="tgl_permintaan" class="form-control" placeholder="tgl_permintaan" value='<?php echo $data[3]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="biaya">Biaya</label>
                    </div>
                    
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="biaya" id="biaya" class="form-control" placeholder="Biaya" value='<?php echo $data[4]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="jenis_perawatan">Jenis Perawatan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" name='jenis_perawatan'>
                                    <option value="PJK" <?php if($data[5]=='PJK'){echo "selected"; }?>>Pajak</option>
                                    <option value="PBK" <?php if($data[5]=='PBK'){echo "selected"; }?>>Perbaikan</option>
                                    <option value="SRV" <?php if($data[5]=='SRV'){echo "selected"; }?>>Service</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                    </div>
                                </div>
                        </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->
            
        </div>
    </section>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/bootstrap-select/js/bootstrap-select.js"></script>