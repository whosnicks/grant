<footer class="bg-gray-900 p-10 font-[sans-serif] tracking-wide">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <div class="lg:flex lg:items-center">
            <a href="javascript:void(0)">
                <?= the_custom_logo(); ?>
            </a>
        </div>

        <div class="lg:flex lg:items-center text-gray-100">
            <ul class="flex space-x-6">
                <li>
                    <a href="javascript:void(0)" class="hover:text-blue-500" target="_blank">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="hover:text-blue-500" target="_blank">
                        <i class="fab fa-whatsapp fa-lg"></i>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="hover:text-blue-500" target="_blank">
                        <i class="fab fa-facebook-square fa-lg"></i>
                    </a>
                </li>
            </ul>
        </div>

        <div>
            <h4 class="text-lg font-semibold mb-6 text-white">Contact Us</h4>
            <ul class="space-y-4">
                <li>
                    <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm" target="_blank">Email</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm" target="_blank">Phone</a>
                </li>
                <li>
                    <a href=" javascript:void(0)" class="text-gray-300 hover:text-white text-sm" target="_blank">Address</a>
                </li>
            </ul>
        </div>

        <div>
            <h4 class=" text-lg font-semibold mb-6 text-white">Information</h4>
            <ul class="space-y-4">
                <li>
                    <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">About Us</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Terms &amp; Conditions</a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="text-gray-300 hover:text-white text-sm">Privacy Policy</a>
                </li>
            </ul>
        </div>
    </div>

    <p class='text-gray-300 text-sm mt-10'>© NickGabe. All rights reserved.
    </p>
</footer>
<script src="<?= get_template_directory_uri() ?>/node_modules/flowbite/dist/flowbite.min.js"></script>
</body>

<?php wp_footer(); ?>