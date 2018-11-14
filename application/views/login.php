<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="Pinterest" content="">
    <meta name="Lul" content="">

    <title>Pinterest</title>
    <link rel="shortcut icon" href="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c52e.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?= base_url()?>assets/css/thumbnail-gallery.css" rel="stylesheet">
    <link href="<?= base_url()?>assets/css/custom.css" rel="stylesheet">

  </head>

  <body style="padding-top: 20px;overflow: hidden;">
    <div class="container">
        <div class="gallery" id="gallery" style="opacity: 0.5;">
            <?php foreach($image as $val){?>
            <div class="mb-3 pics animation all 2">
                <img class="img-fluid rounded" src="<?= $val->url;?>" alt="<?php if(!empty($val->nama)){echo $val->nama;} ?>">
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="container" style="position: fixed;z-index: 1;top: 150px;">
        <div class="row" style="position: relative;top: -110px;" id="btn-register">
            <div class="col-12">
                <div class="float-right">
                    <a href="#" class="btn btn-lg btn-danger">Register</a>
                </div>
            </div>
        </div>
        <div class="row" style="position: relative;top: -110px;" id="btn-login">
            <div class="col-12">
                <div class="float-right">
                    <a href="#" class="btn btn-lg btn-danger">Login</a>
                </div>
            </div>
        </div>
        <div class="row" id="login">
            <div class="col-sm-9 col-md-3 col-lg-3 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c52e.png" class="rounded mx-auto d-block" alt="Logo" style="max-width: 50px;">
                        <h5 class="card-title text-center">Welcome to Pinterest</h5>
                        <h6 class="text-center">Find new ideas to try</h6>
                        <form class="form-signin" action="<?= base_url().'auth/loginAction'?>" method="post">
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
                            </div>
                            <br>
                            <div class="form-label-group">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <br>
                            <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Sign in</button>
                            </form>
                            <hr class="my-4">
                            <a class="btn btn-google btn-block text-uppercase" href="<?= $url_google ?>" target="_blank" > <i class="fab fa-google mr-2"></i> Sign in with Google</a>
                            <button class="btn btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="register">
            <div class="col-sm-9 col-md-3 col-lg-3 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c52e.png" class="rounded mx-auto d-block" alt="Logo" style="max-width: 50px;">
                        <h5 class="card-title text-center">Sign up to see more</h5>
                        <h6 class="text-center">Access Pinterest's best ideas with a free account</h6>
                        <form class="form-signin" action="<?= base_url().'auth/register'?>" method="post" enctype="multipart/form-data">
                            <div id="register-first">
                                <div class="form-label-group">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>
                                </div>
                                <br>
                                <div class="form-label-group">
                                    <input type="email" id="email-create" name="email" class="form-control" placeholder="Email address" required>
                                </div>
                                <br>
                                <div class="form-label-group">
                                    <input type="password" id="password-create" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <br>
                                <button id="register-continue" class="btn btn-lg btn-danger btn-block text-uppercase">Continue</button>
                            </div>
                            <div id="register-secon">
                                <div class="form-label-group">
                                    <input type="file" id="profile" name="profile" class="form-control" required>
                                </div>
                                <br>
                                <button id="register-back" class="btn btn-lg btn-light btn-block text-uppercase">Back</button>
                                <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Continue</button>
                            </div>
                            <hr class="my-4">
                            <button class="btn btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Continue with Google</button>
                            <button class="btn btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Continue with Facebook</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
    <!-- Bootstrap core JavaScript -->
    <script src="<?= base_url()?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url()?>assets/vendor/bootstrap/js/model.js"></script>
    <script src="<?= base_url()?>assets/js/custom.js"></script>
  </body>
  <script>
    $(document).ready( function() {
        $('#login').hide();
        $('#btn-register').hide();
        $('#register-secon').hide();

        $('#btn-login').click(function(){
            $('#login').show();
            $('#register').hide();
            $('#btn-register').show();
            $('#btn-login').hide();
        });

        $('#btn-register').click(function(){
            $('#login').hide();
            $('#register').show();
            $('#btn-register').hide();
            $('#btn-login').show();
        });
        $('#register-continue').click(function(){
            $('#register-first').hide();
            $('#register-secon').show();
        })
        $('#register-back').click(function(){
            $('#register-first').show();
            $('#register-secon').hide();
        })
    });
  </script>
</html>
