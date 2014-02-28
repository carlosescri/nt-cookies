<?php
if ($_POST['nt_cp_post'] === 'Y')
{
    $nt_cp_message_text = $_POST['nt_cp_message_text'];
    update_option('nt_cp_message_text', $nt_cp_message_text);

    $nt_cp_label_text = $_POST['nt_cp_label_text'];
    update_option('nt_cp_label_text', $nt_cp_label_text);
?>
    <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>
<?php
}
else
{
    $nt_cp_message_text = get_option('nt_cp_message_text');
    $nt_cp_label_text = get_option('nt_cp_label_text');
}
?>
<div class="wrap">
    <h2><?php echo __('Cookie Policy Message Options', 'nt-cookies') ?></h2>

    <form name="nt_cp_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']) ?>">
        <input type="hidden" name="nt_cp_post" value="Y">

        <h3><?php echo __('Configuration', 'nt-cookies') ?></h3>

        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row">
                        <label for="nt_cp_message_text"><?php echo __('Message Warning of Cookies', 'nt-cookies') ?></label>
                    </th>
                    <td>
                        <input type="text" name="nt_cp_message_text" id="nt_cp_message_text"
                            placeholder="<?php echo __('This site uses cookies...', 'nt-cookies') ?>"
                            class="regular-text" value="<?php echo $nt_cp_message_text ?>">
                        <p class="description"><?php echo __('This text will be inserted inside a &lt;p&gt; tag.', 'nt-cookies') ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">
                        <label for="nt_cp_label_text"><?php echo __('Confirm Button Text', 'nt-cookies') ?></label>
                    </th>
                    <td>
                        <input type="text" name="nt_cp_label_text" id="nt_cp_label_text"
                            placeholder="<?php echo __('Agree', 'nt-cookies') ?>" class="regular-text"
                            value="<?php echo $nt_cp_label_text ?>">
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php echo __('Save Changes', 'nt-cookies') ?>">
        </p>
    </form>
</div>
