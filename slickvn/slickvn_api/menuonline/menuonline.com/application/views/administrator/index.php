<input type="hidden" id="curr_page" value="btn_banner">
<div id="panel_upload_banner" class="tabs">
    <form action="<?php echo $url; ?>index.php/administrator/index_administrator_control/index" method="post" enctype="multipart/form-data" id="frm_banner_upload">
        <fieldset>
            <legend>Upload banner</legend>
            <label for="file">Chọn hình:</label>
            <input type="file" name="file_upload" id="fle_banner_upload"><br>
            <input type="hidden" name="hid_upload" value="uploaded">
            <button type="button" id="btn_banner_upload">Upload</button>
            <div class="error"><?php echo $upload_error; ?></div>
        </fieldset>        
    </form>
    <br>
    <?php 
        if($result):
            $n = 0;
    ?>
    <table border="0" cellpadding="5" cellspacing="0" width="900px" align="left" class="table_banner">
        <thead>
            <tr valign="midle">
                <td width="50">STT</td>
                <td width="700" align="center">Banner</td>
                <td width="50" align="center"></td>
                <td width="100" align="center">Default</td>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($result as $field):
            $n++;
    ?>
    
        <tr valign="midle" align="center" id="<?php echo $field['_id']; ?>" data-url="<?php echo $field['image_url']; ?>">
            <td><?php echo $n; ?></td>
            <td><img src="<?php echo $url.'images/'.$field['image_url']; ?>"</td>
            <td align="right"></td>
            <td><span class="ui-icon ui-icon-trash"></span>
                <?php
                    if($field['image_status'] == 1){
                        $default = 'checked="checked"';
                    }else{
                        $default = '';
                    }
                    echo '<input type="radio" name="banner_default" class="banner_default" '.$default.' >';
                ?>
            </td>
        </tr>        
    <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="error">Không có Banner nào!</div>
    <?php endif; ?>
</div>