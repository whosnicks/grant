<?php

class Grant_Team_Meta_Box
{
    public function add_team_meta_box()
    {
        add_meta_box(
            'team_meta_box',
            'Team Member Details',
            [$this, 'display_team_meta_box'],
            'grant_team',
            'normal',
            'high'
        );
    }

    public function display_team_meta_box($post)
    {
        $position = get_post_meta($post->ID, 'position', true);
        $linkedin_url = get_post_meta($post->ID, 'linkedin_url', true);
        $description = get_post_meta($post->ID, 'description', true);
        $mail = get_post_meta($post->ID, 'mail', true);

        // Security nonce for saving the data
        wp_nonce_field('save_team_meta_data', 'team_meta_nonce');

?>
        <div style="width: 100%; padding: 10px; font-size: 16px; box-sizing: border-box;">
            <label for="position">Position:</label>
            <input type="text" name="position" id="position" value="<?php echo esc_attr($position); ?>" placeholder="Criminal law" style="width: 100%;" />
        </div>

        <div style=" width: 100%; padding: 10px; font-size: 16px; box-sizing: border-box;">
            <label for="linkedin_url">LinkedIn URL:</label>
            <input type="text" name="linkedin_url" id="linkedin_url" value="<?php echo esc_attr($linkedin_url); ?>" placeholder="https://linkedin.com" style="width: 100%;" />
        </div>

        <div style=" width: 100%; padding: 10px; font-size: 16px; box-sizing: border-box;">
            <label for="mail">Mail:</label>
            <input type="text" name="mail" id="mail" value="<?php echo esc_attr($mail); ?>" placeholder="example@gmail.com" style="width: 100%;" />
        </div>

        <div style=" width: 100%; padding: 10px; font-size: 16px; box-sizing: border-box;">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="<?php echo esc_attr($description); ?>" placeholder="Specializing in corporate law and litigation." style="width: 100%;" />
        </div>

<?php
    }

    public function save_team_meta_data($post_id)
    {
        // Verify nonce
        if (!isset($_POST['team_meta_nonce']) || !wp_verify_nonce($_POST['team_meta_nonce'], 'save_team_meta_data')) {
            return;
        }

        // Save position
        if (array_key_exists('position', $_POST)) {
            update_post_meta($post_id, 'position', sanitize_text_field($_POST['position']));
        }

        // Save LinkedIn URL
        if (array_key_exists('linkedin_url', $_POST)) {
            update_post_meta($post_id, 'linkedin_url', esc_url_raw($_POST['linkedin_url']));
        }

        if (array_key_exists('mail', $_POST)) {
            update_post_meta($post_id, 'mail', esc_url_raw($_POST['mail']));
        }

        if (array_key_exists('description', $_POST)) {
            update_post_meta($post_id, 'description', sanitize_text_field($_POST['description']));
        }
    }
}
