<!-- Grid row -->
<div class="gallery" id="gallery">
<!-- Grid column -->
<?php foreach($image as $val){?>
<div class="mb-3 pics animation all 2">
    <a class="thumbnail" href="#" data-actionCommant="<?= base_url().'image/komentar_action/'.$val->id?>" data-imageId="<?= $val->id?>" data-user="<?= $val->user?>" data-foto="<?= $val->foto?>" data-description="<?php if(!empty($val->deskripsi)){echo $val->deskripsi;} ?>" data-website="<?= $val->website?>" data-profile="<?= $val->user?>" data-toggle="modal" data-title="<?php if(!empty($val->nama)){echo $val->nama;} ?>" data-image="<?= $val->url;?>" data-target="#image-gallery">
        <img class="img-fluid rounded" src="<?= $val->url;?>" alt="<?php if(!empty($val->nama)){echo $val->nama;} ?>">
    </a>
</div>
<?php } ?>
