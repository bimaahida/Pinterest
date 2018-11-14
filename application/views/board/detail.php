<div class="row">
  <div class="col-12 col-md-6 offset-sm-3 offset-md-3">
    <div class="row" style="padding-bottom: 10px;">
        <div class="col-12">
            <a href="#" data-image-id="" data-toggle="modal" data-status-form ="" data-target="#craete-image">
                <i class="fas fa-plus" style="font-size: 30px;"></i>
            </a> 
            <a href="#" data-image-id="" data-toggle="modal" data-status-form ="" data-target="#update-board">
                <i class="fas fa-pen" style="font-size: 30px;padding-left: 10px;"></i>
            </a>
        </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-9">
        <div class="row">
          <div class="col-12"><h1><?= $board->nama_board?></h1></div>
        </div>
        <div class="row">
          <div class="col-12"><p><?= count($image);?> Pin</p></div>
        </div>
      </div>
      <div class="col-md-2 col-3">
        <img src="https://i.pinimg.com/564x/1e/4b/34/1e4b34f36e658bfc8811782a31cdb5e3.jpg" class="rounded-circle" style="width: 120px;height: 120px;">
      </div>
    </div>
  </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="gallery" id="gallery">
            <?php foreach($image as $val){?>
                <div class="mb-3 pics animation all 2">
                    <a style="cursor: zoom-in;" class="thumbnail board-panel" href="#" data-actionCommant="<?= base_url().'image/komentar_action/'.$val->id?>" data-imageId="<?= $val->id?>" data-user="<?= $val->user?>" data-foto="<?= $val->foto?>" data-description="<?php if(!empty($val->deskripsi)){echo $val->deskripsi;} ?>" data-website="<?= $val->website?>" data-profile="<?= $val->user?>" data-toggle="modal" data-title="<?php if(!empty($val->nama)){echo $val->nama;} ?>" data-image="<?= $val->url;?>"  data-user_id="<?= $val->user_id;?>" data-target="#image-gallery">
                        <img class="img-fluid rounded" src="<?= $val->url;?>" alt="<?php if(!empty($val->nama)){echo $val->nama;} ?>">
                    </a>
                    <div class="row middle">
                        <div class="col-12">
                            <div class="float-left">
                                <a class="thumbnail btn btn-danger" href="#" data-imageId="<?=$val->id?>" data-toggle="modal" data-title="Another alt text" data-target="#share-image"><i class="fas fa-pen"></i>  Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="modal fade" id="update-board" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
          <div class="modal-title">
            <h4>Upload Board</h4>
          </div>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
          </button>
      </div>
      <div class="modal-body">
        <form id="create-action" action="<?= base_url().'board/update_action'?>" method="post">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Like 'Places to Go' or 'Recipes to Make'" value="<?= $board->nama_board?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Secret Learn more  </label>
            <label class="switch" style="margin-left: 15px;">
              <input type="checkbox" id="status" name="status" <?php if($board->status == 1){ echo 'checked';} ?>>
              <span class="slider round"></span>
            </label>
          </div>
          <input type="hidden" id="id" name="id" value="<?= $board->id?>">
        </div>
        <div class="modal-footer" style="display: block;">
          <div class="float-left">
            <a href="<?= base_url().'board/delete/'.$board->id?>" class="btn btn-light">Delete</a>
          </div>
          <div class="float-right">
            <button type="submit" class="btn btn-danger">Done</button>
          </div>
        </form>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>