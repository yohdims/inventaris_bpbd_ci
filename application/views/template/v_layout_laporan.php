<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= $judul_tab;?></title>

    <!-- Favicon-->
    <link rel="icon" href="<?= base_url('assets/');?>favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="<?= base_url('assets/');?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Waves Effect Css -->
    <link href="<?= base_url('assets/');?>plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?= base_url('assets/');?>plugins/animate-css/animate.css" rel="stylesheet" />
    
    <!-- Bootstrap Select Css -->
    <link href="<?= base_url('assets/');?>plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="<?= base_url('assets/');?>css/style.css" rel="stylesheet">

    <link href="<?= base_url('assets/');?>plugins/morrisjs/morris.css" rel="stylesheet" />


    <link href="<?= base_url('assets/');?>css/themes/all-themes.css" rel="stylesheet" />
    <link href="<?= base_url('assets/');?>plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- Dropzone Css -->
    <link href="<?= base_url('assets/');?>plugins/dropzone/dropzone.css" rel="stylesheet">
     <!-- Multi Select Css -->
    <link href="<?= base_url('assets/');?>plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- JQuery DataTable Css -->
    <link href="<?= base_url('assets/');?>plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Multi Select Css -->
</head>

<body>

   
    <?php 
        $data_tempat =array(
            array('nama'=>"Provinsi","keterangan"=>"ACEH"),
            array('nama'=>"Kab./Kota","keterangan"=>"KABUPATEN ACEH BARAT"),
            array('nama'=>"Bidang","keterangan"=>"Bidang Sosial"),
            array('nama'=>"Sub Unit Organisasi","keterangan"=>"Badan Penanggulangan Bencana Daerah"),
            array('nama'=>"UPB","keterangan"=>"Badan Penanggulangan Bencana Daerah"),
            array('nama'=>"No. Kode Lokasi","keterangan"=>"12.01.08.09.03.01.01")
        );
     ?>
<table width="100%">
    <tr>
        <td width="150px"><img src="<?= base_url();?>/assets/images/logo_laporan.png" width="100px"></td>
        <td colspan="2">
             <center><b>
            KABUPATEN ACEH BARAT<br>
            REKAPITULASI KARTU INVENTARIS BARANG (KIB) B <br>
            PERALATAN DAN MESIN
            </b></center>
        </td>
    </tr>
    <?php foreach ($data_tempat as $data) { ?>
    <tr>
        <td><b><?= $data['nama']?></b></td>
        <td>:</td>
        <td><?= $data['keterangan']?></td>
    </tr>
    <?php } ?>
    
</table>
            <?php
            if (! empty ($isi)){
                echo $isi;
            }
            ?>
            <script type="text/javascript"> window.print()</script>

    <!-- Jquery Core Js -->
    <!-- <script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script> -->
    <script src="<?= base_url('assets/');?>plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?= base_url('assets/');?>plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <!-- Multi Select Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/multi-select/js/jquery.multi-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/node-waves/waves.js"></script>

    

    <!-- Custom Js -->
    <script src="<?= base_url('assets/');?>js/admin.js"></script>
    <script src="<?= base_url('assets/');?>js/pages/tables/jquery-datatable.js"></script>
    <script src="<?= base_url('assets/');?>chart/chart.js"></script>
  
    <!-- Demo Js -->
    <script src="<?= base_url('assets/');?>js/demo.js"></script>
    
    <script src="<?= base_url('assets/');?>js/pages/ui/tooltips-popovers.js"></script>
</body>

</html>