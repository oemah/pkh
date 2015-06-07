<?
$group = get_user_admin('group_id');
if (!admin_login() || $group == 2){
    $this->session->set_flashdata('error_message','Maaf, anda belum login. Silahkan login terlebih dahulu.');
    redirect(base_url('app-admin'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>        
    <?=$this->load->view('admin_includes/script');?>
</head>
<body>
    <?=$this->load->view('includes/message');?>
    <div class="header">
        <?=$this->load->view('admin_includes/header');?>
    </div>

    <div class="menu"> 
        <?=$this->load->view('admin_includes/left_menu');?>
    </div>
        
    <div class="content">
        <?=(isset($main)) ? $this->load->view($main) : '<h4 style="text-align:center">Content Kosong</h4>';?>
    </div>
</body>
</html>
