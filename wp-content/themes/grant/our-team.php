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
<div class="bg-gray-100 py-12">
    <div class="max-w-6xl mx-auto px-6 lg:px-8 text-center">
        <h2 class="my-4 font-bold text-3xl sm:text-4xl"><?= $post->post_title ?></h2>
        <p class="text-gray-600 pb-12 max-w-2xl mx-auto">
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
                            <a href="<?= esc_url($metadata_linkedIn) ?>" class="text-gray-500 hover:text-blue-500" target="_blank" aria-label="LinkedIn Profile">
                                <!-- LinkedIn Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                                    <path d="M41,4H9C6.24,4,4,6.24,4,9v32c0,2.76,2.24,5,5,5h32c2.76,0,5-2.24,5-5V9C46,6.24,43.76,4,41,4z M17,20v19h-6V20H17z M11,14.47c0-1.4,1.2-2.47,3-2.47s2.93,1.07,3,2.47c0,1.4-1.12,2.53-3,2.53C12.2,17,11,15.87,11,14.47z M39,39h-6c0,0,0-9.26,0-10 c0-2-1-4-3.5-4.04h-0.08C27,24.96,26,27.02,26,29c0,0.91,0,10,0,10h-6V20h6v2.56c0,0,1.93-2.56,5.81-2.56 c3.97,0,7.19,2.73,7.19,8.26V39z"></path>
                                </svg>
                            </a>
                            <a href="mailto:<?= esc_url($metadata_mail) ?>" class="text-gray-500 hover:text-blue-500" aria-label="Send Email">
                                <!-- Email Icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="black" viewBox="0 0 24 24" width="24" height="24">
                                    <path d="M20 4h-16c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-12c0-1.1-.9-2-2-2zm0 4.66l-8 5.33-8-5.33v-2.66l8 5.33 8-5.33v2.66z" />
                                </svg>
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