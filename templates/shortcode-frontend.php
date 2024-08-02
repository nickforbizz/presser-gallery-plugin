<?php
if (!defined('WPINC')) {
    exit('Not allowed to access this file directly');
}

$presser_id = $post->ID;
$presser_title = $post->post_title;
?>

<div class="presser_gallery_front_shortcode_wrapper">
    <div id="presser_gallery-lightgallery">
        <?php
        // $presser_imgs = json_decode(get_post_meta($presser_id, 'presser_imgs', true));
        foreach ($presser_imgs as $presser_img) :
        ?>
            <a href="<?= esc_attr($presser_img) ?>" data-lg-size="1600-2400">
                <img alt="img1" src="<?= esc_attr($presser_img) ?>" />
            </a>
        <?php endforeach; ?>
    </div>
</div>