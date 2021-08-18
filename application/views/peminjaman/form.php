<?php
    if(!empty($peminjaman)){
        $data = array("$peminjaman->id_peminjaman","$peminjaman->nama_lengkap","$peminjaman->kode_peminjaman","$peminjaman->tgl_pinjam","$peminjaman->tgl_kembali","$peminjaman->id_user");
        // $data2 = array("$detail_pinjam->id_barang");
    }else{
        $data = array("","","$random","","",$this->session->userdata('id_user'),"");
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
                                <?php echo (set_value('nama_barang')!='')?set_value('nama_barang'):"";?>
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
                            <?php if ($this->session->userdata("hak_akses")=="A"){?>
                            <form method="POST" action="<?= base_url();?>admin/peminjaman/set_peminjam" enctype="multipart/form-data">
                            <?php }elseif ($this->session->userdata("hak_akses")=="K"){?>
                            <form method="POST" action="<?= base_url();?>karyawan/peminjaman/set_peminjam" enctype="multipart/form-data">
                            <?php }elseif ($this->session->userdata("hak_akses")=="KB"){?>
                            <form method="POST" action="<?= base_url();?>kepala_bidang/peminjaman/set_peminjam" enctype="multipart/form-data">
                            <?php }?>
                <div class="col-sm-12">
                 
    
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_peminjam">Nama Peminjam</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                                <input type="hidden" name="id_peminjaman" id="id_peminjaman" class="form-control" value='<?php echo $data[0]?>'>
                                <input type="hidden" name="id_user" id="id_peminjaman" class="form-control" value='<?php echo $data[5]?>'>
                                <?php if(!empty($peminjaman)){ ?>
                                <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" placeholder="Nama Peminjam" value='<?php echo $data[1]?>' readonly>
                                <?php }else{ ?>
                                <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control" placeholder="Nama Peminjam" value='<?php echo $this->session->userdata("nama_lengkap"); ?>' readonly>
                                <?php }?>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kode_peminjaman">Kode Peminjaman</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nama Peminjam" value='<?php echo $data[2]?>' readonly>
                                <input type="hidden" name="kode_peminjaman" id="kode_peminjaman" class="form-control" value='<?php echo $data[2]?>' required>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-md-2 form-control-label">
                        <label for="tgl_pinjam" class="text-center">Tgl Pinjam</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        
                            <div class="form-line">
                                <input required type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value='<?php echo $data[3]?>' >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 form-control-label">
                        <label for="tgl_kembali" class="text-center">Tgl Kembali</label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" value='<?php echo $data[4]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Lanjut</button>
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

 