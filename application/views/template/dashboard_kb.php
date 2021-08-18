<?php
$bulan=array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?= $title?></h2>
            </div>

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                    <div class="card" >
                        <div class="header">
                            <h2>Dashboard</h2>
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

<form class="align-left col-lg-4" method="POST">
<div class="rows form-group">
<div class="col-lg-2">
      <label>Tahun</label>
       
</div>
<div class="col-lg-5">
    <select name="tahun" class="form-control show-tick">
        <?php 
            $tahun_mulai = 2019;
            $tahun_sekarang = date("Y");
            for ($i=$tahun_sekarang; $i >= $tahun_mulai; $i--) { 
        ?>
            <option value="<?= $i ?>" <?php if($tahun==$i){echo "selected";}?>><?= $i ?></option>
        <?php
            }
        ?>
       </select>
</div>
<div class="col-lg-4">
       <button type="submit" class="btn btn-success">Tampilkan</button>
</div>
</div>
</form>
                            <div class="row clearfix">
                            <div class="col-lg-9">
                              <canvas id="myChart" ></canvas>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
        </div>
    </section>