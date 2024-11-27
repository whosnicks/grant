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
            <p class="text-gray-700">
                <?= wp_kses_post($about_page->post_content) ?>
            </p>
        </div>
    </div>
</div>

<!-- Why Us Section -->
<section class="bg-white dark:bg-gray-900 py-12">
    <div class="container mx-auto text-center">
        <div class="flex flex-wrap justify-center">
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/58/97/7C/E53960D1295621EFCB5B13F335_1623567851299.png?output-format=webp" class="w-32 mb-3" alt="Latest Milling Machinery">
                    </div>
                    <h4 class="text-2xl font-medium text-gray-900">Latest Milling Machinery</h4>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image2.jdomni.in/banner/13062021/3E/57/E8/1D6E23DD7E12571705CAC761E7_1623567977295.png?output-format=webp" class="w-32 mb-3" alt="Reasonable Rates">
                    </div>
                    <h4 class="text-2xl font-medium text-gray-900">Reasonable Rates</h4>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/16/7E/7E/5A9920439E52EF309F27B43EEB_1623568010437.png?output-format=webp" class="w-32 mb-3" alt="Time Efficiency">
                    </div>
                    <h4 class="text-2xl font-medium text-gray-900">Time Efficiency</h4>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="https://image3.jdomni.in/banner/13062021/EB/99/EE/8B46027500E987A5142ECC1CE1_1623567959360.png?output-format=webp" class="w-32 mb-3" alt="Expertise in Industry">
                    </div>
                    <h4 class="text-2xl font-medium text-gray-900">Expertise in Industry</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats bar -->
<?php get_template_part('partials/stats/stats-bar'); ?>

<!-- About Section End -->

<?php get_footer(); ?>