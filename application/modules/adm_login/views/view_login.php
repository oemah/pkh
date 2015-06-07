<?
if (admin_login()){
    if (get_user_admin('group_id') == 1) {
        redirect(base_url('admin'));
    } else {
        redirect(base_url());
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>        
    <title>Login - Admin Login</title>
    <link rel="icon" type="image/ico" href="<?=base_url()?>files/favicon.ico"/>
    <link href="<?=base_url('assets/css/stylesheets.css')?>" rel="stylesheet" type="text/css" />
    <script src="<?=base_url()?>assets/jquery/jquery.js"></script>
    <script src="<?=base_url()?>assets/jquery/valid.js"></script>
</head>
<body>
    <?=$this->load->view('includes/message');?>
    <div class="loginBox">  
        <div class="loginHead">
            <h4 style="color:white;margin:2px 0px">Login Admin</h4>
        </div>
        <?=form_open('adm_login/login',array('class' => '','id' => 'form_login'));?>
            <div class="control-group">
                <label for="inputEmail">Email</label>                
                <input type="text" name="email" id="inputEmail"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" name="password" id="inputPassword"/>                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-block">Sign in</button>
            </div>
        <?=form_close()?>
    </div>   
</body>
</html>

<script type="text/javascript">
    $(function(){
        $("#form_login").validate({
            rules: {
                'email'          : {'required'  : true,'email' : true},
                'password'       : 'required',
            },
        });
    })
</script>
