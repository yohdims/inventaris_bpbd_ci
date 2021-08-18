<?php
    if(!empty($barang)){
        $data = array("$barang->id_barang","$barang->merek","$barang->kondisi","$barang->id_jenis","$barang->status","$barang->no_rangka","$barang->no_bpkb","$barang->harga","$barang->asal_usul","$barang->tahun_pengadaan","$barang->tgl_pajak","$barang->stok");
    }else{
        $data = array("","","","","","","","","","","","");
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
                        <form method="POST" action="<?= base_url();?>admin/kendaraan/input" enctype="multipart/form-data">
                <div class="col-sm-12">
                 
    
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="merek">Merek</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="id_barang" id="merek" class="form-control" value='<?php echo $data[0]?>' >
                                <input type="text" name="merek" id="merek" class="form-control" placeholder="Merek" value='<?php echo $data[1]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="kondisi">Kondisi</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <select class="form-control show-tick" name='kondisi'>
                                <option value="B" <?php if($data[2]=="B"){echo "selected";}?>>Baru</option>
                                <option value="LP" <?php if($data[2]=="LP"){echo "selected";}?>>Layak Pakai</option>
                                <option value="G" <?php if($data[2]=="G"){echo "selected";}?>>Ganti</option>
                                </select>
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
                         <select class="form-control show-tick" name='id_jenis'>
                            <?php foreach ( $jenis as $data2) : ?>
                            <option value="<?= $data2['id_jenis'];?>" <?php if($data2['id_jenis']=$data[3]){echo "selected"; }?>><?= $data2['nama'];?></option>
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
                                <option value="AK" <?php if($data[4]=="AK"){echo "selected";}?>>Aktif</option>
                                <option value="TA" <?php if($data[4]=="TA"){echo "selected";}?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="no_rangka">No Rangka</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="no_rangka" id="no_rangka" class="form-control" placeholder="No Rangka" value='<?php echo $data[5]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="no_bpkb">BPKB</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="text" name="no_bpkb" id="no_bpkb" class="form-control" placeholder="No Rangka" value='<?php echo $data[6]?>' >
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
                                <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga" value='<?php echo $data[7]?>' >
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
                                <input type="text" name="asal_usul" id="asal_usul" class="form-control" placeholder="Asal Usul" value='<?php echo $data[8]?>' >
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
                                <input type="text" name="tahun_pengadaan" id="tahun_pengadaan" class="form-control" placeholder="Tahun Pengadaan" value='<?php echo $data[9]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="tgl_pajak">Tanggal Pajak</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="date" name="tgl_pajak" id="tgl_pajak" class="form-control" value='<?php echo $data[10]?>' >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="harga">Stok</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input required type="number" name="stok" id="harga" class="form-control" placeholder="Stok" value='<?php echo $data[11]?>' >
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