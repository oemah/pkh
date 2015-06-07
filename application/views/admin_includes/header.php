<script type="text/javascript">
    $(function(){
        $(".top-left").click(function(){
            window.location.href = $(this).attr('href');
            return false;
        })
    })
</script>

<style type="text/css">
	.top-left{
		cursor: pointer;
	}
</style>

<div class="top-left" href="<?=base_url()?>adm_home">
	<div style="float:left; margin-left:2%"><h5 class="logos_name">PKH DIY</h5></div>
</div>
<div>
    <ul class="top-menu">
        <li>
            <a class="user-menu" href="#"><img src="<?=base_url()?>assets/img/userpic.png" alt="">
                <span>Halo, Admin </span>
            </a>
        </li>
        <li><a title="" href="<?=base_url()?>adm_login/logout" class="logouttop toptip" data-original-title="Logout"></a></li>
    </ul>
</div>