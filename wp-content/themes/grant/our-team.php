<?php

/**
 * Template Name: Our Team
 */

get_header();

global $post;

$args = [
    'post_type' => 'grant_team',
];
$query = new WP_Query($args);
?>

<!-- Team Section -->
<div class="bg-gray-100 py-12 shadow-inner border border-gray-200">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 text-center">
        <h2 class="my-4 font-bold text-3xl sm:text-4xl"><?= $post->post_title ?></h2>
        <p class="text-gray-600 pb-5 max-w-2xl mx-auto">
            <?= wp_kses_post($post->post_content) ?>
        </p>
        <div class="grid gap-8 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <?php
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                    $metadata_position = get_post_meta(get_the_ID(), 'position', true);
                    $metadata_linkedIn  = get_post_meta(get_the_ID(), 'linkedin_url', true);
                    $metadata_mail = get_post_meta(get_the_ID(), 'mail', true);
                    $metadata_description = get_post_meta(get_the_ID(), 'description', true);
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            ?>
                    <div class="bg-white rounded-lg shadow-lg p-6 text-center transform transition-transform hover:scale-105 mt-7">
                        <img class="w-24 h-24 rounded-full mx-auto" src="<?= esc_url($thumbnail_url) ?>" alt="<?= esc_attr(get_the_title()) ?>">
                        <h3 class="mt-4 text-xl font-bold text-gray-800"> <?= esc_html(get_the_title()) ?></h3>
                        <p class="text-gray-500"><?= esc_html($metadata_position) ?></p>
                        <p class="mt-2 text-sm text-gray-600">
                            <?= esc_html($metadata_description) ?>
                        </p>
                        <div class="mt-4 flex justify-center space-x-3">
                            <a href="<?= esc_url($metadata_linkedIn) ?>" class="text-gray-700 hover:text-blue-500" target="_blank" aria-label="LinkedIn Profile">
                                <!-- LinkedIn Icon -->
                                <i class="fab fa-linkedin-in fa-lg"></i>
                            </a>
                            <a href="mailto:<?= esc_url($metadata_mail) ?>" class="text-gray-700 hover:text-blue-500" aria-label="Send Email">
                                <!-- Email Icon -->
                                <i class="fas fa-envelope fa-lg"></i>
                            </a>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</div>

<?php get_template_part('partials/stats/stats-bar'); ?>
<?php get_footer(); ?>