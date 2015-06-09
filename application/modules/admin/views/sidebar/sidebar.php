<ul class="navigation">            
    <li <?=(($this->uri->segment(1) == 'admin')) ? 'class="active "' : '';?>>
        <a href="<?=base_url()?>admin"><span class="isw-grid"></span><span class="text">List Seleksi</span></a>
    </li>  
    <li <?=(($this->uri->segment(2) == 'news')) ? 'class="active "' : '';?>>
        <a href="<?=base_url()?>admin/news"><span class="isw-grid"></span><span class="text">News</span></a>
    </li>  
</ul>