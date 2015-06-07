<!DOCTYPE html>
<html lang="en">
<head>        
    <?=$this->load->view('admin_includes/script');?>
</head>
<body>
    <?=$this->load->view('includes/message');?>
    <div class="header">
        <?=$this->load->view('includes/header');?>
    </div>
    <div class="content" style="margin-left:0px !important">
        <?=(isset($main)) ? $this->load->view($main) : '<h4 style="text-align:center">Content Kosong</h4>';?>
    </div>
</body>
</html>