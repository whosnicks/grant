<?php

// FIXME: Not working as expected and not saving
class Grant_Stats_Meta_Boxes
{
    public function add_stats_meta_box()
    {
        add_meta_box(
            'stats_meta_box',
            'Config Stats Numbers',
            [$this, 'display_stats_meta_box'],
            'grant_stats',
            'normal',
            'high'
        );
    }

    public function display_stats_meta_box($post)
    {
        // TODO: Ckeck styles
        // Retrieve existing values or default to empty
        $fields = [
            'number_1' => get_post_meta($post->ID, 'number_1', true),
            'desc_1' => get_post_meta($post->ID, 'desc_1', true),
            'number_2' => get_post_meta($post->ID, 'number_2', true),
            'desc_2' => get_post_meta($post->ID, 'desc_2', true),
            'number_3' => get_post_meta($post->ID, 'number_3', true),
            'desc_3' => get_post_meta($post->ID, 'desc_3', true),
        ];

        // Security nonce for saving the data
        wp_nonce_field('save_stats_meta_data', 'stats_meta_nonce');

        // Start the stats bar container
        echo '<div class="stats-bar-container">';

        // Loop through fields to display each stat
        foreach (range(1, 3) as $index) {
?>
            <div class="stats-item">
                <div class="stats-number-container">
                    <input type="text" placeholder="40%" name="number_<?php echo $index; ?>" id="number_<?php echo $index; ?>" value="<?php echo esc_attr($fields["number_$index"]); ?>" class="stats-number stats-input" />
                </div>
                <div class="stats-description-container">
                    <label for="desc_<?php echo $index; ?>" class="stats-description">Description:</label>
                    <input type="text" placeholder="Reduction in your setence" name="desc_<?php echo $index; ?>" id="desc_<?php echo $index; ?>" value="<?php echo esc_attr($fields["desc_$index"]); ?>" class="stats-input" />
                </div>
            </div>
<?php
        }

        // Close stats container
        echo '</div>';
    }


    public function save_stats_meta_data($post_id)
    {
        // Verify nonce
        if (!isset($_POST['stats_meta_nonce']) || !wp_verify_nonce($_POST['stats_meta_nonce'], 'save_stats_meta_data')) {
            return;
        }

        // Loop through fields and save
        foreach (range(1, 3) as $index) {
            if (isset($_POST["number_$index"])) {
                update_post_meta($post_id, "number_$index", sanitize_text_field($_POST["number_$index"]));
            }
            if (isset($_POST["desc_$index"])) {
                update_post_meta($post_id, "desc_$index", sanitize_text_field($_POST["desc_$index"]));
            }
        }
    }
}
