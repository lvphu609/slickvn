<!DOCTYPE html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/ui-1.10.3/jquery-ui.css" >
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/bootstrap.css" > 
        <link  rel="stylesheet" type="text/css"  href="<?php echo $url; ?>/includes/css/layout_adminstrator_restaurant.css" >        
        <script src="<?php echo $url; ?>/includes/js/jquery-1.9.1.js"></script>
        <script src="<?php echo $url; ?>/includes/js/jquery-ui.js"></script>
        <script src="<?php echo $url; ?>/includes/js/bootstrap.js"></script>
        <script src="<?php echo $url; ?>/includes/js/control_restaurant_admin_login.js"></script>
    </head>
    <body>
        <input type="hidden" id="hid_url" value="<?php echo $url; ?>">
        <div id="panel_admin_login" class="modal hide fade">
            <div class="modal-header">
                <h3>Login to Restaurant Admin Control Panel</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="frm_admin_login">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">Email</label>
                        <div class="controls">
                            <input type="text" name="txt_email_login" id="txt_email_login" placeholder="Email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="inputPassword">Password</label>
                        <div class="controls">
                            <input type="password" name="txt_pass_login" id="txt_pass_login" placeholder="Password">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox" id="chk_save_password" checked="checked"> Remember me
                            </label>                           
                      </div>
                    </div>
                    <div class="text-error text-center" id="lbl_error"></div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="<?php echo $url; ?>" class="btn">Close</a>
                <button type="button" id="btn_login" class="btn btn-primary">Sign in</button>
            </div>
        </div>
    </body>
</html>