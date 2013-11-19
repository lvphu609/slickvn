<input type="hidden" id="hid_url" value="<?php echo $url; ?>">
<div id="right_column">
    <ul class="nav nav-tabs" id="right_column_tab">
        <li class="active"><a href="#control">Thao tác</a></li>
        <li><a href="#setting">Cài đặt</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane right_border active" id="control">          
            <div id="lbl_table_title"></div>
            <div id="lbl_room_title"></div>
            <div id="table_status" title="Click để chuyển bàn sang trạng thái có khách!" data-table_id=""></div>
        </div>
        <div class="tab-pane right_border" id="setting">
            <div class="form-group">
                <label for="txt_room_name" class="text-error"><b>Tên phòng/khu vực</b></label>
                <input type="text" class="form-control" id="txt_room_name" placeholder="Room name">
            </div>
            <div class="form-group">
                <label for="txt_add_table" class="text-error"><b>Thêm bàn</b></label>
                <input type="text" class="form-control number" id="txt_add_table" placeholder="Số lượng">
            </div>
            <div>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#frm_add_room"><span class="icon icon-plus"></span> Thêm phòng</button>
                <button type="button" class="btn btn-success"><span class="icon icon-thumbs-up"></span> Save</button>
            </div>
        </div>
    </div>
</div>
<div id="table_content">
    <?php if($result): ?>
    <ul class="nav nav-tabs" id="table_conten_tab">
        <?php foreach($result as $field): ?>
        <li class=""><a href="#<?php echo $field['_id']; ?>" data-id="<?php echo $field['_id']; ?>" data-table="<?php echo $field['room_table']; ?>"><?php echo $field['room_name']; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <div class="tab-content" id="tab_table_content">
        <?php foreach($result as $field): ?>
        <div class="tab-pane" id="<?php echo $field['_id']; ?>" data-table="<?php echo $field['room_table']; ?>" data-room="<?php echo $field['room_name']; ?>">
            <?php for($i=1; $i<=$field['room_table']; $i++): ?>
            <div class="table_item" data-table="<?php echo $i; ?>" id="<?php echo $field['_id'].$i; ?>" data-status="">
                <div class="table_item_title">
                    <?php
                        if($i < 10){
                            echo '0'.$i;
                        }else{
                            echo $i;
                        }
                    ?>
                </div>
                <div class="table_item_status"></div>
            </div>
            <?php endfor; ?>                       
        </div>
        <?php endforeach; ?>
    </div>    
    <?php endif; ?>
</div>
<div id="step_1" class="step <?php echo $first; ?>">
    <a href="#" class="animation">Setting</a>
    <div>
        Chọn "Setting" để vào menu thiết lập hệ thống!
        <div></div>       
    </div>
    <img src="<?php echo $url.'includes/img/hand.gif'; ?>">
    <button type="button" class="btn btn_skip_step">Bỏ qua</button>
</div>
<div id="step_2" class="step">
    <button type="button" class="btn btn-warning"><span class="icon icon-plus"></span> Thêm phòng</button>
    <div>
        Chọn "Thêm phòng" để tạo phòng mới và số bàn trong phòng!
        <div></div>
    </div>
    <img src="<?php echo $url.'includes/img/hand.gif'; ?>">
    <button type="button" class="btn btn_skip_step">Bỏ qua</button>
</div>
<div id="step_3" class="step">
    <div class="modal show">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h3 class="modal-title">Thông tin phòng/khu vực</h3>
            </div>
            <div class="modal-body">
                <table border="0" align="center">
                    <tr>
                        <td align="right"><label for="txt_add_room_name" class="col-lg-2 control-label"><b>Tên phòng</b></label></td>
                        <td width="20px"></td>
                        <td><input type="text" class="form-control" id="txt_add_room_name_step" placeholder="Tên phòng/khu vực"></td>
                    </tr>
                    <tr>
                        <td align="right"><label for="txt_add_room_table" class="col-lg-2 control-label"><b>Số bàn</b></label></td>
                        <td></td>
                        <td><input type="text" class="form-control number" id="txt_add_room_table_step" placeholder="Số bàn"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center"><div class="loading hide" id="img_add_room_step_loading"></div></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Hủy</button>
                <button class="btn btn-success" id="btn_add_room_step">Thêm</button>
            </div>
          </div>
        </div>
        <img src="<?php echo $url.'includes/img/hand.gif'; ?>">
        <div id="step_3_info">
            Nhập vào tên phòng/khu vực và số bàn!
            <div></div>
        </div>
    </div>
    <button type="button" class="btn btn_skip_step">Bỏ qua</button>
</div>





//dialog them phong
<div id="frm_add_room" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Thông tin phòng/khu vực</h3>
    </div>
    <div class="modal-body">
        <table border="0" align="center">
            <tr>
                <td align="right"><label for="txt_add_room_name" class="col-lg-2 control-label"><b>Tên phòng</b></label></td>
                <td width="20px"></td>
                <td><input type="text" class="form-control" id="txt_add_room_name" placeholder="Tên phòng/khu vực"></td>
            </tr>
            <tr>
                <td align="right"><label for="txt_add_room_table" class="col-lg-2 control-label"><b>Số bàn</b></label></td>
                <td></td>
                <td><input type="text" class="form-control number" id="txt_add_room_table" placeholder="Số bàn"></td>
            </tr>
            <tr>
                <td colspan="3" id="add_room_error" class="error"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Hủy</button>
        <button class="btn btn-success" id="btn_add_room">Thêm</button>        
    </div>
</div>