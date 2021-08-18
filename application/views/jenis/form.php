
<?php
     if(!empty($jenis)){
        $value_form = array("$jenis->id_jenis","$jenis->nama","$jenis->fk_jenis");
    }else{
        $value_form = array("","","","","","","");
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
                <form method="POST" action="<?= base_url();?>admin/jenis/input" enctype="multipart/form-data">
                <div class="col-sm-12">
                    <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_jenis">Jenis</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <select name="fk_jenis" id="jenis" class="form-control" placeholder="Id Jenis">
                                <?php foreach ( $level as $data) : ?>
                                <option value='<?= $data['id_jenis']; ?>'><?= $data['nama']; ?></option>
                                <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="nama_jenis">Nama Jenis</label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <div class="form-group">
                            <div class="form-line">
                                <input type="hidden" name="id_jenis" id="jenis" class="form-control" placeholder="Id Jenis" value='<?php echo $value_form[0]?>' >
                                <input type="text" name="nama" id="jenis" class="form-control" placeholder="Nama Jenis" value='<?php echo $value_form[1]?>' >
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