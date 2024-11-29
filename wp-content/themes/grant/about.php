<?php

/**
 * Template Name: About 
 */

get_header(); ?>

<!-- About Section Start -->
<?php
$about_page = get_page_by_path('about');

$thunbnail_url = get_the_post_thumbnail_url($about_page, 'full');
?>

<div class="sm:flex items-center justify-center max-w-screen-xl mx-auto mt-4">
    <div class="sm:w-1/2 p-10">
        <div class="image object-center text-center">
            <img src="<?= esc_url($thunbnail_url) ?>" class="mx-auto rounded-xl mt-5">
        </div>
    </div>
    <div class="sm:w-1/2 p-5">
        <div class="text">
            <span class="text-gray-500 border-b-2 border-blue-500 uppercase"><?= esc_html($about_page->post_title) ?></span>
            <h2 class="my-4 font-bold text-3xl  sm:text-4xl">About <span class="text-blue-600"><?= esc_html(bloginfo('name')) ?></span>
            </h2>
            <div class="text-gray-700 space-y-4">
                <?= wp_kses_post(apply_filters('the_content', $about_page->post_content)) ?>
            </div>

        </div>
    </div>
</div>

<!-- Why Us Section -->
<section class="bg-gray-100 shadow-inner dark:bg-gray-900 py-12 mt-10">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8 text-gray-900 dark:text-white">
            Why Choose Our Law Firm?
        </h2>
        <div class="flex flex-wrap justify-center">
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <div class="flex justify-center text-blue-600 dark:text-blue-400 mb-4">
                        <i class="fas fa-balance-scale fa-3x"></i>
                    </div>
                    <h4 class="text-xl font-medium text-gray-900 dark:text-white">Expertise</h4>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Decades of experience in various areas of law.
                    </p>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <div class="flex justify-center text-blue-600 dark:text-blue-400 mb-4">
                        <i class="fas fa-handshake fa-3x"></i>
                    </div>
                    <h4 class="text-xl font-medium text-gray-900 dark:text-white">Client Focus</h4>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Your success and satisfaction are our priorities.
                    </p>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <div class="flex justify-center text-blue-600 dark:text-blue-400 mb-4">
                        <i class="fas fa-gavel fa-3x"></i>
                    </div>
                    <h4 class="text-xl font-medium text-gray-900 dark:text-white">Trust</h4>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Reliable representation you can count on.
                    </p>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <div class="flex justify-center text-blue-600 dark:text-blue-400 mb-4">
                        <i class="fas fa-trophy fa-3x"></i>
                    </div>
                    <h4 class="text-xl font-medium text-gray-900 dark:text-white">Proven Success</h4>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        A strong track record of favorable outcomes.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats bar -->
<?php get_template_part('partials/stats/stats-bar'); ?>

<!-- About Section End -->

<?php get_footer(); ?>