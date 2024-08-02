<?php
if (!defined('WPINC')) {
    exit('Not allowed to access this file directly');
}

?>

<style>
    .presser-gallery-image-wrapper-body_items {
        display: flex;
        align-items: center;
        margin-bottom: 5px;
    }

    .presser-gallery-image-wrapper-body_items>p {
        cursor: pointer;
        background: red;
        color: white;
        padding: 2px 28px;
        border-radius: 200px;
        margin-left: 4px;
    }
</style>
<div class="presser-gallery-image=wrapper">
    <div class="presser-gallery-image=wrapper-header">
        <button type="button" class="button button-primary button-large Presser-add-image">Add Image</button>
    </div>
    <hr>
    <div class="presser-gallery-image-wrapper-body">
        <?php
        // get presser_imgs
        $presser_imgs = json_decode(get_post_meta($post->ID, 'presser_imgs', true));
        foreach ($presser_imgs as $presser_img) :
        ?>
        <div class="presser-gallery-image-wrapper-body_items">
                        <input type="hidden" name="Presser-imgs[]" value="<?=$presser_img ?>">
                        <img src="<?=$presser_img ?>" width="120px" height="120px" alt="">
                        <p class="Presser-remove-image" onClick="rmPresserGalleryImg(this, event)">Remove</p>
                    </div>
        <?php endforeach;?>
    </div>
</div>

<script>
    function rmPresserGalleryImg(elem, e) {
        e.preventDefault();
        jQuery(document).ready(function($) {
            let element = $(elem);
            element.parent().remove();
        })
    }


    jQuery(document).ready(function($) {
        $(".Presser-remove-image").click(function(e) {
            e.preventDefault();
            console.log("removing image");
        })

        $(".Presser-add-image").click(function(e) {
            e.preventDefault();
            // load wp media
            let mediaUploader = wp.media({
                title: "Select Press Image",
                button: {
                    text: "Select An Image"
                },
                multiple: false
            });

            // on select
            mediaUploader.on("select", function() {
                let attachement = mediaUploader.state().get("selection").first().toJSON();
                let imgUrl = attachement.url;
                $(".presser-gallery-image-wrapper-body").append(`
                    <div class="presser-gallery-image-wrapper-body_items">
                        <input type="hidden" name="Presser-imgs[]" value="${imgUrl}">
                        <img src="${imgUrl}" width="120px" height="120px" alt="${attachement.url}">
                        <p class="Presser-remove-image" onClick="rmPresserGalleryImg(this, event)">Remove</p>
                    </div>
                `)
                console.log(attachement);

            });

            // open
            mediaUploader.open()
        })
    })
</script>