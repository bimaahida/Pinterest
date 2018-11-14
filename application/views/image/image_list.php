<!-- Grid row -->
<div class="gallery" id="gallery">
    <!-- Grid column -->
    <?php foreach($image as $val){?>
        <div class="mb-3 pics animation all 2">
            <a style="cursor: zoom-in;" class="thumbnail board-panel" href="#" data-actionCommant="<?= base_url().'image/komentar_action/'.$val->id?>" data-imageId="<?= $val->id?>" data-user="<?= $val->user?>" data-foto="<?= $val->foto?>" data-description="<?php if(!empty($val->deskripsi)){echo $val->deskripsi;} ?>" data-website="<?= $val->website?>" data-profile="<?= $val->user?>" data-toggle="modal" data-title="<?php if(!empty($val->nama)){echo $val->nama;} ?>" data-image="<?= $val->url;?>" data-user_id="<?= $val->user_id;?>" data-target="#image-gallery">
                <img class="img-fluid rounded" src="<?= $val->url;?>" alt="<?php if(!empty($val->nama)){echo $val->nama;} ?>">
            </a>
            <div class="row middle">
                <div class="col-12">
                    <div class="float-left">
                        <a class="thumbnail btn btn-danger" href="#" data-imageId="<?=$val->id?>" data-toggle="modal" data-title="Another alt text" data-target="#share-image"><i class="far fa-share-square"></i>Share</a>
                    </div>
                    <div class="float-right">
                        <a class="thumbnail btn btn-danger" href="#" data-imageId="<?=$val->id?>" data-image="<?= $val->url;?>"  data-toggle="modal" data-title="Another alt text" data-target="#pin-image"><i class="fas fa-thumbtack"></i> Save</a>
                    </div>
                </div>
            </div>
            <?php if(!empty($val->website)){?>
                <div class="row middle" style="top: 85%;">
                    <div class="col-12">
                        <div class="float-left">
                            <button type="button" class="btn btn-light" onclick="window.open('<?= $val->website;?>')"><i class="fas fa-external-link-alt"></i> <?php $s = explode('/',$val->website); echo $s[0].''.$s[1].'//'.$s[2]?></button>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<div class="modal fade" id="share-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h4>Share Image</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="btn-group">
                    <!-- Mail -->
                    <a id="email-share" href="">
                        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
                    </a>
                    <!-- Facebook -->
                    <a id="fb-share" href="" target="_blank">
                        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
                    </a>
                    <!-- Google+ -->
                    <a id="google-share" href="" target="_blank">
                        <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
                    </a>
                    <!-- Twitter -->
                    <a id="twitter-share" href="" target="_blank">
                        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="pin-image" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h4>Pins Image</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <div class="row" id="detail">
                    <div class="col-md-8">
                        <div class="center-block"><img id="image-gallery-image-pins" class="img-fluid rounded" src=""></div>
                    </div>
                    <div class="col-md-4">
                        <h5>Choose Board</h5>
                        <div class="list-group">
                            <div id="board-list"></div>
                            <a href="#" class="list-group-item list-group-item-action"><i class="fa fa-plus-circle" aria-hidden="true"></i>   Create Board</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>