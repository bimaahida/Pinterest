<div class="row">
    <div class="col-md-8">
        <div class="center-block"><img id="image-gallery-image" class="img-fluid rounded" src="<?= $url;?>"></div>
    </div>
    <div class="col-md-4">
        <img src="<?= $foto;?>" alt="Profile" id="profile" class="img-profile-comment">
        <b id="name-user"><?= $user;?></b>
        <!-- <a href="" class="btn btn-danger float-right" id="button-follow">Follow</a> -->
        <hr>
        <h3 id="title"></h3>
        <p id="description"></p>
        <?php if(!empty($website)){ ?>
            <a href="<?= $website;?>" class="btn btn-light" style="width: 100%;" id="links-web" target="blank"><i class="fas fa-link" style="font-size: 25px;padding-right: 15px;"></i>Website</a>
            <hr>
        <?php } ?>
        <h1>Comment</h1>
        <div class="row">
            <div class="col-md-12">
                <p>Share feedback, ask a question or give a high five</p>
            </div>
        </div>
        <br>
        <?php if(!empty($komentar)){?>
            <?php foreach ($komentar as $key) {?>
                <div id="komentar-list">
                    <div class="row">
                        <div class="col-md-9"><img src="<?= $key->foto?>" alt="Profile" class="img-profile-comment"><b><?= $key->nama?></b></div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                        <?= $key->komentar?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 offset-md-1">
                            <span id="date"><?= $key->date?></span>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>