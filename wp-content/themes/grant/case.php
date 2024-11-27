<?php

/**
 * Template Name: Case
 */
get_header();
?>
<!-- TODO: Not working as expected, fix or remove, API too slow -->
<div class="max-w-sm mx-auto my-10">
    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white text-center">Let's choose your lawyer</h2>
</div>

<form action="" class="max-w-sm mx-auto mt-5" method="POST">
    <div class="mb-5">
        <label for="docket_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Docket Number</label>
        <input type="text" id="docket_number" name="docket_number" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="1:16-cv-00745" required />
    </div>
    <div class="mb-5">
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Next</button>
    </div>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['docket_number'])) {
    $docket_number = htmlspecialchars($_POST['docket_number']);

    $api_token = API_TOKEN; // Get API_token from wp_config
    $api_url = 'https://www.courtlistener.com/api/rest/v4/dockets/?docket_number=' . urlencode($docket_number);

    $response = wp_remote_get(
        esc_url_raw($api_url),
        array(
            'headers' => array(
                'Authorization' => 'Token ' . $api_token,
            ),
            'timeout' => 30,
        )
    );

    if (is_array($response) && !is_wp_error($response)) {
        $body = $response['body'];
        $body_data = json_decode($body);

        if (isset($body_data->results) && is_array($body_data->results)) {
            $results = $body_data->results;
        } else {
            echo 'No results found.';
            $results = [];
        }
    } else {
        echo 'Error fetching data from API.';
        $results = [];
    }
}
?>

<?php if (!empty($results)): ?>
    <div class="max-w-sm mx-auto mb-5">
        <label for="docket_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your case name</label>
        <select id="case_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <?php foreach ($results as $docket):
                $idbData = isset($docket->idb_data) ? $docket->idb_data : null;
            ?>
                <option value="<?= htmlspecialchars($docket->id) ?>">
                    <?= htmlspecialchars($docket->case_name ?? 'Unknown Case') ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif; ?>

<?php
get_footer();
?>