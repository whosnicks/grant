<?php

get_header();

if (have_posts()) : ?>

    <main class="dark:bg-gray-900 antialiased py-1">

        <!-- TODO: Don't display all posts? -->
        <!-- Main Content Section -->
        <div class="flex flex-row lg:flex-row justify-between space-y-8 lg:space-y-0">
            <!-- Sidebar Section -->
            <div class="w-auto lg:w-1/4 bg-gray-50 dark:bg-gray-900 p-4 rounded-md">
                <aside class="space-y-6">
                    <!-- Search Bar -->
                    <div>
                        <form method="get" action="<?php echo esc_url(home_url('/')); ?>" aria-label="Search">
                            <input type="text" name="s" placeholder="Search..." class="w-full p-2 border border-gray-300 rounded" aria-label="Search">
                            <button type="submit" class="w-full p-2 mt-2 bg-blue-600 text-white rounded">Search</button>
                        </form>
                    </div>

                    <!-- Categories -->
                    <div>
                        <p class="text-xl font-semibold text-gray-800 dark:text-white">Categories</p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <?php wp_list_categories(array('title_li' => '')); ?>
                        </ul>
                    </div>

                    <!-- Latest Posts -->
                    <div>
                        <p class="text-xl font-semibold text-gray-800 dark:text-white">Latest Articles</p>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <?php
                            $latest_posts = new WP_Query(array(
                                'posts_per_page' => 5, // Show latest 5 posts
                            ));
                            while ($latest_posts->have_posts()) : $latest_posts->the_post();
                            ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
                                </li>
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </ul>
                    </div>
                </aside>
            </div>

            <!-- Posts Section -->
            <div class="w-full lg:w-3/4 bg-white dark:bg-gray-800 p-4">
                <section class="space-y-8">
                    <?php
                    while (have_posts()) : the_post();
                        $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'medium')
                    ?>
                        <article class="bg-gray-100 dark:bg-gray-700 p-6 rounded-lg flex">
                            <div class="mx-5">
                                <?= $thumbnail_url ?
                                    '<img src="' . $thumbnail_url . '" alt="image">'
                                    : 'No image available';
                                ?>
                            </div>
                            <div>

                                <div>
                                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">
                                        <a href="<?php the_permalink(); ?>" class="hover:underline"><?php the_title(); ?></a>
                                    </h2>
                                </div>
                                <div class="text-gray-500 dark:text-gray-300 mt-4">
                                    <?php the_excerpt(); ?>
                                </div>
                                <div class="mt-4">
                                    <a href="<?php the_permalink(); ?>" class="inline-block text-blue-600 dark:text-blue-500 hover:text-blue-800 dark:hover:text-blue-400">
                                        Read more
                                    </a>
                                </div>
                            </div>
                        </article>
                    <?php
                    endwhile;
                    ?>
                </section>
            </div>

        </div>

    </main>

<?php
endif;

get_footer();
