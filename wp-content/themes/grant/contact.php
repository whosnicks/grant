<?php
/*
Template Name: Contact
*/

get_header();
?>

<?php

global $post;

$contact_page = get_page_by_path('Contact');
?>

<div class="contact-form flex justify-around items-center">
    <div class="md:mt-0 w-96 my-auto pt-[20vh]">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-800 dark:text-white"><?= $contact_page->post_title ?></h2>
        <div class="mb-6 font-light text-gray-100 md:text-lg">
            <?= wpautop(wp_kses_post($contact_page->post_content)) ?>
        </div>
    </div>

    <div class="w-1/2">
        <img src="http://localhost/grant/wp-content/uploads/2024/11/cropped-logo_grant.png" alt="" class="w-48 mx-auto">
        <?php
        echo do_shortcode(
            '[contact-form-7 id="2db535b" title="Contact form 1"]'
        )
        ?>
    </div>
</div>

<?php get_footer();
