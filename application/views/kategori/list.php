<div class="row">
    <?php foreach ($kategori as $key) { ?>
        <div class="col-md-3" style="padding-top: 25px;padding-bottom: 25px;">
            <div class="thumbnail d-flex justify-content-center border" href="#" data-image-id="" data-toggle="modal" data-status-form ="not" data-target="#craete-board">
            <figure class="figure">
                <!-- <?php var_dump(explode('/',$key['image'][0]->url)); ?> -->
                <img src="<?php if(empty($key['image'])){ echo 'http://www.trustvets.com/images/NoImageAvailable.png';}else{if(explode('/',$key['image'][0]->url)[0] == 'assets'){ echo base_url().''.$key['image'][0]->url; }else{echo $key['image'][0]->url;} } ?>"  style="margin: 20px;width: 200px;height: 200px;">
                <!-- <i class="fa fa-plus-circle" aria-hidden="true"></i> -->
                <figcaption class="figure-caption text-center">
                    <p class="font-weight-bold"> 
                        <h4><?= $key['kategori']->kategori?></h4>
                        <?php if($key['status'] == 1){ ?>
                            <a href="<?= base_url().'auth/kategori_action/'.$key['kategori']->id.'/follow'?>" class="btn btn-danger">Follow</a>
                        <?php }else{ ?>
                            <a href="<?= base_url().'auth/kategori_action/'.$key['kategori']->id.'/Unfollow'?>" class="btn btn-danger">Unfollow</a>
                        <?php } ?>
                    </p>
                </figcaption>
            </figure>
            </div>
        </div>
    <?php } ?>
</div>