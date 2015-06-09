<div class="workplace">
    <div class="row-fluid">
        <div class="span12">                    
            <div class="head clearfix">
                <div class="isw-grid"></div>
                <h1 style="font-size:16px">Pengumuman</h1>      
            </div>

            <div class="form_input">
                <?php foreach ($dt as $key):?>
                <div class="block-fluid">
                    <div class="row-form clearfix">
                        <div class="span12" style="text-align:center">
                            <h3><?=$key['judul']?></h3>
                            <div>
                                <?=$key['news']?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach ?>
            </div>

        </div>                                
    </div>  
    <div class="dr"><span></span></div>
</div>
