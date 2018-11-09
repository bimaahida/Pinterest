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

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container border-bottom" style="padding-bottom: 5px;">
        <a class="navbar-brand" href="<?= base_url().'image'?>"><img src="http://www.stickpng.com/assets/images/580b57fcd9996e24bc43c52e.png" class="logo" alt="Pinterest"></a>
        
        <div class="col-sm-9 col-xs-4 col-md-9 col-lg-9 col">
          <form class="card card-xs">
              <div class="card-body row no-gutters align-items-center search">
                  <div class="col-auto">
                      <i class="fas fa-search"></i>
                  </div>
                  <!--end of col-->
                  <div class="col">
                      <input class="form-control form-control-xs form-control-borderless" type="search" placeholder="Search">
                  </div>
                  <!--end of col-->
              </div>
          </form>
        </div>
        
      <!--end of col-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="<?= base_url().'image'?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Folowing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url().'auth/profile'?>"><img src="<?php  if(explode('/',$this->session->userdata('logged_in')->foto    ) == 'assets'){ echo base_url().$this->session->userdata('logged_in')->foto;}else{ echo $this->session->userdata('logged_in')->foto;} ?>" class="logo rounded-circle" alt="Pinterest"><?= $this->session->userdata('logged_in')->nama; ?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fas fa-bell" style="font-size: 25px;"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: auto;right: 10px;">
                    <a class="dropdown-item" href="#">Edit Seting</a>
                    <a class="dropdown-item" href="<?= base_url().'auth/logout'?>">Logout</a>
                  </div>
              <!-- <a class="nav-link" href="#"><i class="fas fa-ellipsis-h" style="font-size: 25px;"></i></a> -->
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container" style="padding-top: 30px;">
      <?= $content;?>
    </div>
    <!-- Grid column -->

<div id="mybutton">
    <a class="btn btn-light btn-lg feedback btn-round" href="#" data-image-id="" data-toggle="modal" data-title="Another alt text" data-target="#craete-image">
        <i class="fas fa-plus"></i>
    </a>
</div>
<!-- Grid column -->
<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
  <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
            <div class="row">
                <div class="col-1">
                    <a href="#" id="edit-button"><i class="fas fa-pen"></i></a>
                </div>
                <div class="col-1">
                    <div class="dropdown show">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
          </button>
      </div>
      <div class="modal-body">
        <div class="row" id="detail">
            <div class="col-md-8">
                <div class="center-block"><img id="image-gallery-image" class="img-fluid rounded" src=""></div>
            </div>
            <div class="col-md-4">
              <img src="" alt="Profile" id="profile" class="img-profile-comment">
              <b id="name-user"></b>
              <a href="" class="btn btn-danger float-right">Follow</a>
              <hr>
              <h3 id="title"></h3>
              <p id="description"></p>
              <a href="" class="btn btn-light" style="width: 100%;" id="links-web" target="blank"><i class="fas fa-link" style="font-size: 25px;padding-right: 15px;"></i>Website</a>
              <hr>
              <h1>Comment</h1>
              <div class="row">
                <div class="col-md-12">
                    <p>Share feedback, ask a question or give a high five</p>
                    <form id="commant-form" action="" method="post">
                        <textarea class="form-control form-control-xs" name="commant-text" id="commant-text" cols="70" rows="3" placeholder="Comment" required></textarea>
                    </form>
                </div>
              </div>
              <br>
              <div id="komentar-list"></div>
            </div>
        </div>
        <div class="row" id="edit-image">
            <div class="col-12">
                <form id="edit-action" action="" method="post">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name-edit" name="name-edit" placeholder="Add the name this Pin">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Website:</label>
                        <input type="text" class="form-control" id="website-edit" name="website-edit" placeholder="Add the URL this Pin links to">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description:</label>
                        <textarea class="form-control form-control-xs" name="description-edit" id="description-edit" cols="70" rows="3" placeholder="Say more about this pin"></textarea>
                    </div>
                    <hr>
                    <div class="float-left">
                        <a href="" class="btn btn-primary" id="delete-image">Delete</a>
                    </div>    
                    <div class="float-right">
                        <button type="button" id="cancel-edit" class="btn btn-light">Cancel</button>
                        <button type="submit" class="btn btn-danger">Done</button>
                    </div>  
                </form>
            </div>
        </div>
      </div>
  </div>
</div>
</div>
<div class="modal fade" id="craete-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <div class="modal-title">
          <h4>Create Pin</h4>
        </div>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
        </button>
    </div>
    <div class="modal-body">
    <form id="create-action" action="<?= base_url().'/image/create_action'?>" method="post" enctype="multipart/form-data">
        <div class="row" id="upload-pin-form">
            <div class="col-md-5 col-sm-12">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-btn">
                            <span class="btn btn-secondary btn-file">
                                Browse… <input type="file" id="imgInp" name="imgInp">
                            </span>
                        </span>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <img id='img-upload'/>
                </div>
            </div>
            <div class="col-md-7 col-sm-12">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="name-create" name="name-create" placeholder="Add the name this Pin">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Website:</label>
                    <input type="text" class="form-control" id="website-create" name="website-create" placeholder="Add the URL this Pin links to">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Kategori:</label>
                    <select name="kategori-create" id="kategori-create" class="form-control">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control form-control-xs" name="description-create" id="description-create" cols="70" rows="3" placeholder="Say more about this pin"></textarea>
                </div>
            </div>
        </div>
        <div class="row" id="save-form-web">
            <div class="col-12">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Name:</label>
                    <input type="text" class="form-control" id="url-name" name="url-name" placeholder="Add the URL this Pin links to">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Add URL:</label>
                    <input type="text" class="form-control" id="url-web" name="url-web" placeholder="Add the URL this Pin links to">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Website:</label>
                    <input type="text" class="form-control" id="url-website" name="url-website" placeholder="Add the URL this Pin links to">
                </div>
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Kategori:</label>
                    <select name="url-kategori" id="url-kategori" class="form-control">
                        <option value="1">Option 1</option>
                        <option value="2">Option 2</option>
                        <option value="3">Option 3</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Description:</label>
                    <textarea class="form-control form-control-xs" name="url-deskripsi" id="url-deskripsi" cols="70" rows="3" placeholder="Say more about this pin"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer" style="display: block;">
        <div class="float-left">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-secondary active" id="upload-pin">
                  <input type="radio" name="options" id="option1" autocomplete="off" checked> Upload Pin
                </label>
                <label class="btn btn-secondary" id="save-web">
                  <input type="radio" name="options" id="option2" autocomplete="off"> Save Form Web
                </label>
              </div>
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-light">Done</button>
        </div>
    </form>
      <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
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
</html>
