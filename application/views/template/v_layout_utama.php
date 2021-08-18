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

<body class="theme-red">

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
              
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="widgets/index.html">BPBD Yogyakarta</a>
                <img src="<?= base_url('assets/');?>images/logo.png" width="48" height="48" alt="User" > 
            </div>
            
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/');?>images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("username"); ?></div>
                    <!-- <div class="email">john.doe@example.com</div> -->
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <!-- <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li> -->
                            <!-- <li role="seperator" class="divider"></li> -->
                            <li><a href="<?= base_url();?>page/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php if($this->session->userdata("hak_akses")=="A"){ ?>
                    <li class="active">
                        <a href="<?= base_url();?>admin/dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                     <li>
                        <a href="<?= base_url();?>admin/user/" >
                            <i class="material-icons">people</i>
                            <span>User</span>
                        </a>

                    </li>
                    <li>
                        <a href="javascript:void(0);" class='menu-toggle'>
                            <i class="material-icons">menu</i>
                            <span>Master Data</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                            <a href="<?= base_url();?>admin/barang/">
                                <i class="material-icons">local_offer</i>
                                <span>Barang</span>
                            </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>admin/kendaraan/" >
                                <i class="material-icons">directions_car</i>
                                    <span>Kendaraan</span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="<?= base_url();?>admin/infrastruktur/">
                                    <i class="material-icons">domain</i>
                                    <span>Infrastruktur</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>admin/jenis/" >
                                    <i class="material-icons">toc</i>
                                    <span>Jenis</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url();?>admin/peminjaman/" >
                            <i class="material-icons">people</i>
                            <span>Peminjaman</span>
                            <?php if($kembali>0){ ?>
                            <span class="badge bg-yellow"><?= $kembali; ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>admin/peminjaman/riwayat" >
                            <i class="material-icons">people</i>
                            <span>Riwayat Peminjaman</span>
                            
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>admin/kendaraan/pajak" >
                            <i class="material-icons">people</i>
                            <span>Pajak</span> 
                            <?php if($pajak>0){ ?>
                            <span class="badge bg-yellow"><?= $pajak; ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>admin/perawatan/" >
                            <i class="material-icons">people</i>
                            <span>Perawatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url();?>admin/laporan/peminjaman">
                                    <span>Peminjaman</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>admin/laporan/barang">
                                    <span>Barang</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>admin/laporan/kendaraan">
                                    <span>Kendaraan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>admin/laporan/infrastruktur">
                                    <span>Infrastruktur</span>
                                </a>
                            </li>
                        </ul>
                        
                    </li>
                    <?php } else if ($this->session->userdata("hak_akses")=="K"){?>
                    <li class="active">
                        <a href="<?= base_url();?>karyawan/dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>karyawan/peminjaman/" >
                            <span>Peminjaman</span>
                             <?php if($kembali>0){ ?>
                            <span class="badge bg-yellow"><?= $kembali; ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>karyawan/peminjaman/riwayat" >
                            <span>Riwayat Peminjaman</span>
                        </a>
                    </li>
                    <?php }else if ($this->session->userdata("hak_akses")=="KB"){?>
                    <li class="active">
                        <a href="<?= base_url();?>kepala_bidang/dashboard">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>kepala_bidang/peminjaman/" >
                            <span>Peminjaman</span>
                            <?php if($kembali>0){ ?>
                            <span class="badge bg-yellow"><?= $kembali; ?></span>
                            <?php } ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url();?>kepala_bidang/peminjaman/riwayat" >
                            <span>Riwayat Peminjaman</span>
                            
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <span>Laporan</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url();?>kepala_bidang/laporan/peminjaman">
                                    <span>Peminjaman</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>kepala_bidang/laporan/barang">
                                    <span>Barang</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>kepala_bidang/laporan/kendaraan">
                                    <span>Kendaraan</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url();?>kepala_bidang/laporan/infrastruktur">
                                    <span>Infrastruktur</span>
                                </a>
                            </li>
                        </ul>
                        
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 - 2020 <a href="javascript:void(0);">YohDims</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

            <?php
            if (! empty ($isi)){
                echo $isi;
            }
            ?>

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

<script type="text/javascript">
    $('#id_barang').change(function() {
        // var stok = $("#id_barang option:selected").attr("max");
        var stok = $("#id_barang option:selected").attr("max");
         $("#jumlah2").attr("max",stok);
         // $("#jumlah2").val(stok);
    })
     $('#jumlah2').change(function() {
        // var stok = $("#id_barang option:selected").attr("max");
        var stok = new Number($("#id_barang option:selected").attr("max"));
        var jumlah= new Number($("#jumlah2").val());
        // var jumlah=$("#jumlah2").val($stok);
        if(jumlah>=stok){
            $('#peringatan').html("Jumlah mencapai batas");
        }else{
            $('#peringatan').html("");
        }
         // $("#jumlah2").attr("max",stok);
         // $("#jumlah2").val(stok);
    })

     function tambah_barang(){
    var id_barang = $("#id_barang").val();
    var jumlah = $("#jumlah2").val();

    $.ajax({
      type:"POST",
      data:'id_barang='+id_barang+"&jumlah="+jumlah,
      url:'<?= base_url()."admin/peminjaman/tambah_session"; ?>',
      dataType :"json",
      success: function(hasil){
        console.log(hasil);
        
      }
    })
  }
  function hapus(){
    var id_barang = $("#id_barang").val();

    $.ajax({
      type:"POST",
      data:'id_barang='+id_barang,
      url:'<?= base_url()."admin/peminjaman/hapus_session"; ?>',
      dataType :"json",
      success: function(hasil){
        console.log(hasil);
        
      }
    })
  }
</script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets/');?>plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    

    <!-- Custom Js -->
    <script src="<?= base_url('assets/');?>js/admin.js"></script>
    <script src="<?= base_url('assets/');?>js/pages/tables/jquery-datatable.js"></script>
    <script src="<?= base_url('assets/');?>chart/chart.js"></script>
   
    <script type="text/javascript">
        var peminjaman=[];
    <?php 
    foreach ($peminjaman as $key => $value) {
      echo "peminjaman.push(".$value.");";
    }
      ?>
        var ctx = document.getElementById("myChart").getContext('2d');
        var label= ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];
        var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: label,
        datasets: [{
            label: 'Total Peminjaman per Bulan',
            data: peminjaman,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255,99,132,1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
    </script>
    <!-- Demo Js -->
    <script src="<?= base_url('assets/');?>js/demo.js"></script>
    
    <script src="<?= base_url('assets/');?>js/pages/ui/tooltips-popovers.js"></script>
</body>

</html>