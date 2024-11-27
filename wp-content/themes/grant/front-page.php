<?php
/*
Template Name: Home
*/

get_header(); ?>

<?php
$args = [
    'post_type' => 'grant_sliders',
    'posts_per_page' => 5,
];

$query = new WP_Query($args);


?>

<!-- Carousel Start -->
<div id="default-carousel" class="relative w-full h-[80vh]" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-full overflow-hidden rounded-lg md:h-full">
        <!-- Item -->
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();

                $thumbnail_id = get_post_thumbnail_id();
                $fallback_thumbnail = get_template_directory_uri() . '/assets/img/home_lawyers_2.jpeg';

                $thumbnail_url = $thumbnail_id ? get_the_post_thumbnail_url(get_the_ID(), 'full') : $fallback_thumbnail;

        ?>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="relative flex items-center justify-center w-full h-full">
                        <!-- Text container -->
                        <div class="absolute z-10 text-center w-full sm:w-3/4 md:w-1/2 text-white p-4 sm:p-6 md:p-8 bg-blue-500/85 rounded-md">
                            <h1 class="mb-4 text-2xl sm:text-3xl md:text-4xl font-bold"><?= esc_html(get_the_title()) ?></h1>
                            <p class="text-sm sm:text-base md:text-lg leading-relaxed"><?= wp_kses_post(get_the_content()) ?></p>
                            <a href="<?= esc_url(get_permalink(get_page_by_path('contact'))) ?>">
                                <button type="button" class="mt-4 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Contact Us
                                </button>
                            </a>
                        </div>
                        <!-- End Text Container -->

                        <img src="<?= esc_url($thumbnail_url) ?>" class="absolute top-0 left-0 w-full h-full object-cover rounded-md" alt="...">
                    </div>
                </div>


        <?php
            endwhile;
        endif;
        ?>

    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
        <?php for ($i = 0; $i < $query->post_count; $i++) : ?>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <?php
        endfor; ?>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


<!-- Infinite Scroll Start -->
<?php
$args = [
    'post_type' => 'grant_logos',
];

$query = new WP_Query($args);
?>

<!-- TODO: Finish thiss -->
<div class="w-full h-36 inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
    <ul id="logos" class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
        <?php
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
                <li>
                    <img src="<?= esc_url($thumbnail_url) ?>" alt="<?= esc_attr(get_the_title()) ?>" class="w-24 h-24 object-contain" />
                </li>
        <?php
            endwhile;
        endif;
        ?>
    </ul>
</div>

<!-- Infinite Scroll End -->

<!-- About Start -->
<?php
$about_page = get_page_by_path('About');
$content = apply_filters('the_content', $about_page->post_content);
preg_match('/<p>(.*?)<\/p>/', $content, $matches);
$first_paragraph = $matches[0];

$thumbnail_id = get_post_thumbnail_id($about_page->ID);
$thumbnail_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : 'image.jpg';
?>

<section class="bg-white dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
        <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white"><?= esc_html($about_page->post_title) ?></h2>
            <p class="mb-4"><?= wp_kses_post($first_paragraph) ?></p>
            <a href="<?= esc_url(get_permalink(get_page_by_path('about'))) ?>">
                <button type="button" class="mt-4 text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Read more
                </button>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-4 mt-8">
            <img class="w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-2.png" alt="office content 1">
            <img class="mt-4 w-full lg:mt-10 rounded-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/content/office-long-1.png" alt="office content 2">
        </div>
    </div>
</section>
<!-- About End -->

<!-- TODO: Add content dinamically -->
<!-- Contact Start -->
<section class="bg-white dark:bg-gray-900">
    <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
        <img class="w-full dark:hidden rounded-xl" src="http://localhost/grant/wp-content/uploads/2024/11/lawyer_right.jpeg" alt="dashboard image">
        <img class="w-full hidden dark:block" src="http://localhost/grant/wp-content/uploads/2024/11/lawyer_right.jpeg" alt="dashboard image">
        <div class="mt-4 md:mt-0">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">You did what?</h2>
            <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">
                Are you sure? Our laywers are trained to prove you did nothing wrong! Call us today and let's have a chat, but please stop talking about your crimes on the internet, it's not looking good.
            </p>
            <a href="<?= esc_url(get_permalink(get_page_by_path('contact'))) ?>" class="inline-flex items-center font-medium">
                Contact us
                <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
<!-- Contact End -->

<!-- Stats bar -->
<?php get_template_part('partials/stats/stats-bar'); ?>

<?php get_footer();
