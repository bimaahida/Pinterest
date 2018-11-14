<div class="row">
    <?php foreach ($user as $key) { ?>
        <div class="col-md-3" style="padding-top: 25px;padding-bottom: 25px;">
            <div class="thumbnail d-flex justify-content-center border" href="#" >
            <figure class="figure">
                <!-- <?php var_dump(explode('/',$key['user']->foto)); ?> -->
                <img src="<?php if(empty($key['user']->foto)){ echo 'http://www.trustvets.com/images/NoImageAvailable.png';}else{if(explode('/',$key['user']->foto)[0] == 'assets'){ echo base_url().''.$key['user']->foto; }else{echo $key['user']->foto;} } ?>"  style="margin: 20px;width: 200px;height: 200px;">
                <!-- <i class="fa fa-plus-circle" aria-hidden="true"></i> -->
                <figcaption class="figure-caption text-center">
                    <p class="font-weight-bold"> 
                        <h4><?= $key['user']->nama?></h4>
                        <?php if($key['status'] == 'Not Followed'){ ?>
                            <a href="<?= base_url().'follow/follow_action/'.$key['user']->id.'/follow'?>" class="btn btn-danger">Follow</a>
                        <?php }else{ ?>
                            <a href="<?= base_url().'follow/follow_action/'.$key['user']->id.'/Unfollow'?>" class="btn btn-danger">Unfollow</a>
                        <?php } ?>
                    </p>
                </figcaption>
            </figure>
            </div>
        </div>
    <?php } ?>
</div>