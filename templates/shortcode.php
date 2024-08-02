<?php
if (!defined('WPINC')) {
    exit('Not allowed to access this file directly');
}

$presser_id = $post->ID;
$presser_title = $post->post_title;
?>

<div class="presser_gallery_shortcode_wrapper">
    <b class="presser_gallery_shortcode">
        [presser_gallery title="<?= $presser_title ?>" id="<?= $presser_id ?>"]
    </b>
</div>
