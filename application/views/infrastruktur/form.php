<?php
    if(!empty($infrastruktur)){
        $data = array("$infrastruktur->id_infrastruktur",//0
            "$infrastruktur->kd_infrastruktur", //1
            "$infrastruktur->kontruksi", //1
            "$infrastruktur->luas",     //2
            "$infrastruktur->id_jenis", //3
            "$infrastruktur->status",   //4
            "$infrastruktur->tahun_pengadaan", //5
            "$infrastruktur->dokumen_tanggal", //6
            "$infrastruktur->harga",        //7
            "$infrastruktur->asal_usul",    //8
            "$infrastruktur->keterangan");       //9
    }else{
        $data = array("","","","","","","","","","","");
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
                        <form method="POST" action="<?= base_url();?>admin/infrastruktur/input" enctype="multipart/form-data">
                <div class="col-sm-12">
                 
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kd_infrastruktur">Kode Infrastruktur</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="hidden" name="id_infrastruktur" id="kontruksi" class="form-control" value='<?php echo $data[0]?>' >
                                <input required type="text" name="kd_infrastruktur" id="kd_infrastruktur" class="form-control" placeholder="Kode Infrastruktur" value='<?php echo $data[1]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kontruksi">Kontruksi</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="kontruksi" id="kontruksi" class="form-control" placeholder="Kontruksi" value='<?php echo $data[2]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="luas">Luas</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="number" name="luas" id="luas" class="form-control" placeholder="Luas" value='<?php echo $data[3]?>' >
                            </div>
                        </div>
                    </div>
                </div>
               <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="jenis">Jenis</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                         <select required class="form-control show-tick" name='id_jenis'>
                            <?php foreach ( $jenis as $data2) : ?>
                            <option value="<?= $data2['id_jenis'];?>" <?php if($data2['id_jenis']=$data[4]){echo "selected"; }?>><?= $data2['nama'];?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    </div>
                                
                </div>
               <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="status">Status</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                            <select class="form-control show-tick" name='status'>
                                <option value="AK" <?php if($data[5]=="AK"){echo "selected";}?>>Aktif</option>
                                <option value="TA" <?php if($data[5]=="TA"){echo "selected";}?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="tahun_pengadaan">Tahun Pengadaan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="number" name="tahun_pengadaan" id="tahun_pengadaan" class="form-control" placeholder="Tahun Pengadaan" value='<?php echo $data[6]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="dokumen_tanggal">Dokumen</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="date" name="dokumen_tanggal" id="dokumen_tanggal" class="form-control" placeholder="Dokumen" value='<?php echo $data[7]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="harga">Harga</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="number" name="harga" id="harga" class="form-control" placeholder="Harga" value='<?php echo $data[8]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="asal_usul">Asal Usul</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul" value='<?php echo $data[9]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="keterangan">Keterangan</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="text" name="keterangan" id="keterangan" class="form-control" value='<?php echo $data[10]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="gambar">Gambar</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="file" name="gambar_barang" id="gambar" class="form-control" >
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