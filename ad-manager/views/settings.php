<div class="wrap">
    <h1>DFP settings</h1>
    <?php settings_errors(); ?>

<div class="option-page-wrap">
    <form action="<?php echo admin_url('options.php') ?>" method="post" id="dfp-form" novalidate>
        <?php
        //wp inbuilt nonce field , etc
        settings_fields($option_group);
        ?>

        <table class="form-table">
            <tr>
                <th scope="row">Network Key*</th>
                <td>
                    <input type="text"
                           class="full-width"
                           placeholder="NETWORK KEY"
                           name="dfp_options[network_key]"
                           value="<?php echo esc_attr($db['network_key']); ?>">
                </td>
            </tr>
        </table>
        <?php submit_button() ?>
    </form>
</div>
</div>
