<?php

if ( !defined('WPINC') ) {
    exit('Not allowed to access this file directly');
}

?>

<style>
    .presser-gallery-image-wrapper-body_items{
        display: flex;
        align-items: center;
    }

    .presser-gallery-image-wrapper-body_items > p{
        padding-left: 5px;
        cursor: pointer;
    }
</style>
<div class="presser-gallery-image=wrapper">
    <div class="presser-gallery-image=wrapper-header">
        <button type="button" class="button button-primary button-large Presser-add-image">Add Image</button>
    </div> <hr>
    <div class="presser-gallery-image-wrapper-body">
        <div class="presser-gallery-image-wrapper-body_items">
            <img src="https://images.unsplash.com/photo-1722352565752-2ceba1ea905c?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" width="120px" height="120px" alt="">
            <p class="Presser-remove-image">Remove</p>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function($) {
        $(".Presser-remove-image").click(function (e) {
            e.preventDefault();
            console.log("removing image");
        })

        $(".Presser-add-image").click(function (e) {
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
                console.log(attachement);
            });

            // open
            mediaUploader.open()
        })
    })
</script>