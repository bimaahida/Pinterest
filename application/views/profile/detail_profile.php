<div class="row">
  <div class="col-12 col-md-6 offset-sm-3 offset-md-3">
    <div class="row">
      <div class="col-md-10 col-9">
        <div class="row">
          <div class="col-12"><h3><?= $user->nama; ?></h3></div>
        </div>
        <div class="row">
          <div class="col-12"><a href=""><i class="fas fa-upload"></i></a> . <a href="">1 Follower</a> . <a href="">0 Follower</a></div>
        </div>
      </div>
      <div class="col-md-2 col-3">
        <img src="<?= $user->foto; ?>" class="rounded-circle" style="width: 120px;height: 120px;">
      </div>
    </div>
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="pill" href="#board">Board</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="pill" href="#pins">Pins</a>
      </li>
    </ul>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="tab-content">
    <div class="tab-pane container active" id="board">
      <div class="row">
        <div class="col-md-3" style="padding-top: 25px;padding-bottom: 25px;">
          <a class="thumbnail d-flex justify-content-center border" href="#" data-image-id="" data-toggle="modal" data-status-form ="not" data-target="#craete-board">
            <figure class="figure">
              <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 50px;margin: 79px;"></i>
              <figcaption class="figure-caption text-center"><p class="font-weight-bold">Create boards.</p></figcaption>
            </figure>
          </a>
        </div>
        <?php foreach ($board_public as $key => $value) { ?>
          <div class="col-md-3" style="padding-top: 25px;padding-bottom: 25px;">
            <a href="" class="d-flex justify-content-center border">
              <figure class="figure">
                <img src="<?php if(empty($value['image'])){ echo 'http://www.trustvets.com/images/NoImageAvailable.png';}else{echo $value['image']->url;} ?>" class="figure-img img-fluid rounded board-image" alt="<?= $value['board']->nama_board; ?>." style="width: 200px;height: 200px;">
                <figcaption class="figure-caption text-center"><p class="font-weight-bold"><?= $value['board']->nama_board; ?>.</p></figcaption>
              </figure>
            </a>
          </div>
        <?php } ?>
      </div>
      <div class="row" style="background-color:rgb(247, 247, 247);">
        <div class="col-12">
          <div class="row" style="padding-top: 25px;">
            <div class="col-12 col-md-6 offset-sm-3 offset-md-3">
              <p>
                <b>Secret boards <i class="fa fa-lock" aria-hidden="true"></i></b> <br>
                Only you and people you invite can see these boards. Learn more
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3" style="padding-top: 25px;padding-bottom: 25px;">
              <a href="#" class="thumbnail d-flex justify-content-center border" data-image-id="" data-toggle="modal" data-status-form ="Checked" data-target="#craete-board">
                <figure class="figure">
                  <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 50px;margin: 79px;"></i>
                  <figcaption class="figure-caption text-center"><p class="font-weight-bold">Create boards private.</p></figcaption>
                </figure>
              </a>
            </div>
            <?php foreach ($board_private as $key => $value) { ?>
              <div class="col-md-3" style="padding-top: 25px;padding-bottom: 25px;">
                <a href="" class="d-flex justify-content-center border">
                  <figure class="figure">
                    <img src="<?php if(empty($value['image'])){ echo 'http://www.trustvets.com/images/NoImageAvailable.png';}else{echo $value['image']->url;} ?>" class="figure-img img-fluid rounded board-image" alt="<?= $value['board']->nama_board; ?>." style="width: 200px;height: 200px;">
                    <figcaption class="figure-caption text-center"><p class="font-weight-bold"><?= $value['board']->nama_board; ?>.</p></figcaption>
                  </figure>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane container fade" id="pins" style="padding-top: 25px;padding-bottom: 25px;">
    <div class="row">
        <div class="gallery" id="gallery">
        <div class="mb-3 pics animation all 2">
          <a href="#" class="d-flex justify-content-center border" data-image-id="" data-toggle="modal" data-status-form ="" data-target="#craete-image">
            <figure class="figure">
              <i class="fa fa-plus-circle" aria-hidden="true" style="font-size: 50px;margin: 79px;"></i>
              <figcaption class="figure-caption text-center"><p class="font-weight-bold">Create boards.</p></figcaption>
            </figure>
          </a>
        </div>
        <?php foreach($pins as $val){?>
          <div class="mb-3 pics animation all 2">
              <a class="thumbnail" href="#" data-actionCommant="<?= base_url().'image/komentar_action/'.$val->id?>" data-imageId="<?= $val->id?>" data-user="<?= $val->user?>" data-foto="<?= $val->foto?>" data-description="<?php if(!empty($val->deskripsi)){echo $val->deskripsi;} ?>" data-website="<?= $val->website?>" data-profile="<?= $val->user?>" data-toggle="modal" data-title="<?php if(!empty($val->nama)){echo $val->nama;} ?>" data-image="<?= $val->url;?>" data-target="#image-gallery">
                  <img class="img-fluid rounded" src="<?php if(explode('/',$val->url)[0] == 'assets'){ echo base_url().$val->url;}else{ echo $val->url; };?>" alt="<?php if(!empty($val->nama)){echo $val->nama;} ?>">
              </a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

<div class="modal fade" id="craete-board" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <div class="modal-title">
            <h4>Create Board</h4>
          </div>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
          </button>
      </div>
      <div class="modal-body">
        <form id="create-action" action="<?= base_url().'board/create_action'?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Like 'Places to Go' or 'Recipes to Make'">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Secret Learn more  </label>
            <label class="switch" style="margin-left: 15px;">
              <input type="checkbox" id="status" name="status">
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="modal-footer" style="display: block;">
          <div class="float-right">
            <button type="submit" class="btn btn-light">Done</button>
          </div>
        </form>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>