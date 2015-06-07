<ul class="navigation">            
    <li <?=(($this->uri->segment(1) == 'user')) ? 'class="active "' : '';?>>
        <a href="<?=base_url()?>user"><span class="isw-grid"></span><span class="text">Manage User</span></a>
    </li>  
</ul>