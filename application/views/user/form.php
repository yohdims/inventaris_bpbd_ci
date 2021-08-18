<?php
    if(!empty($user)){
        $data = array("$user->id_user","$user->nama_lengkap","$user->nip","$user->username","$user->password","$user->hak_akses","$user->alamat","$user->no_hp","$user->divisi");
    }else{
        $data = array("","","","","","","","","");
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
                                <?php echo (set_value('nama_user')!='')?set_value('nama_user'):"";?>
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
 <!-- <?= $this->session->flashdata('message'); ?> -->
                        <?php if (!empty($this->session->flashdata('message'))):?>
                            <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <?php echo $this->session->flashdata('message');?> 
                            </div>
                        <?php endif;?>
                            <h2 class="card-inside-title">Form <?= $title?></h2>
                            <div class="row clearfix">
                            <form method="POST" action="<?= base_url();?>admin/user/input" enctype="multipart/form-data">
                <div class="col-sm-12">
                 
    
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_lengkap">Nama Lengkap</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="hidden" name="id_user" id="id_user" class="form-control" placeholder="Nama Lengkap" value='<?php echo $data[0]?>' >
                                <input required type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value='<?php echo $data[1]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nip">NIK</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="number" name="nip" id="nip" class="form-control" placeholder="NIK" value='<?php echo $data[2]?>' >
                            </div>
                        </div>
                    </div>
                </div>
               <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="username" id="username" class="form-control" placeholder="Username" value='<?php echo $data[3]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <?php if(empty($user)){ ?>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="username">Password</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="password" id="username" class="form-control" placeholder="Username" value='<?php echo $data[4]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
               <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="hak_akses">Hak Akses</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                         <select class="form-control show-tick" name='hak_akses'>
                            <option value="A" <?php if($data[5]=="A"){echo "selected";}?> >Admin</option>
                            <option value="K" <?php if($data[5]=="K"){echo "selected";}?>>Karyawan</option>
                            <option value="KB" <?php if($data[5]=="KB"){echo "selected";}?>>Kepala Bidang</option>
                        </select>
                        </div>
                    </div>
                                
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="alamat">Alamat</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value='<?php echo $data[6]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="no_hp">No Handphone</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No Handphone" value='<?php echo $data[7]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="no_hp">Divisi</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="divisi" id="no_hp" class="form-control" placeholder="Divisi" value='<?php echo $data[8]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="no_hp">Foto</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input <?= $data[0]==0? "required":"" ?> type="file" name="foto" id="no_hp" class="form-control" >
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