<?php
$key = str_replace(".", "", Util::generateString(5).microtime(true));
?>
<tr>
    <td>
        <input type="checkbox" name="Answer[<?php echo $key ?>][is_right]" <?php echo $data->is_right ? "checked='checked'" : "" ?> value="1"/>
        <input type="hidden" name="Answer[<?php echo $key ?>][id]" value="<?php echo $data->id ?>" />
    </td>
    <?php if ($type == QaQuestion::QA_OPTION_TEXT) { ?>
    <td>
        <input type="text" class="input-xxlarge" name="Answer[<?php echo $key ?>][name]" value="<?php echo $data->name ?>" />
    </td>
    <?php }elseif ($type == QaQuestion::QA_OPTION_IMAGE){ ?>
    <td>
        <input type="file" name="resource<?php echo $key ?>" />
    </td>
    <td><?php echo $data->getImage() ?></td>
    <td>
        <input type="checkbox" name="Answer[<?php echo $key ?>][is_delete]" value="1"/>
    </td>
    <?php } ?>
</tr>