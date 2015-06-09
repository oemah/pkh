<div class="breadLine">
    <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin">Home</a> <span class="divider">></span></li>                
        <li class="active">View List</li>
    </ul>
</div>

<div class="workplace">
    <div class="row-fluid">
        <div class="span12">                    
            <div class="head clearfix">
                <div class="isw-grid"></div>
                <h1>View List</h1>      
            </div>

            <div class="table_content">
            <div class="block-fluid">                        
                    <div class="row-form clearfix">
                        <div class="span12" style="text-align:right">
                            <a href='<?=base_url()?>admin/export' class="btn btn-small btn-primary add" type="button"><span class="isw-print"></span>&nbsp;Export</a>
                        </div>
                    </div>
                </div>
                <div class="block-fluid table-sorting clearfix">
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                        <thead>
                            <tr>                                    
                                <th class="center" width="5%">#</th>
                                <th>No Pendaftar</th>
                                <th>Tanggal</th>
                                <th>Nama Pendaftar</th>
                                <th>Nilai</th>
                                <th>Durasi</th>
                                <th class="center" width="20%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;foreach ($table as $key => $val): $i++;?>
                            <tr>                                    
                                <td class="center"><?=$i?></td>
                                <td><?=$val['id']?></td>
                                <td><?=date('d M, Y H:i:s',strtotime($val['dateTime']))?></td>
                                <td><?=$val['nama']?></td>
                                <td><?=$val['point']?></td>
                                <td><?=$val['duration']?> Seconds</td>
                                <td class="center">
                                    <a href='<?=base_url()?>admin/download/<?=$val['id']?>' class="btn btn-small btn-primary add" type="button"><span class="isw-print"></span>&nbsp;Download</a>
                                    <?php if (!empty($val['file'])): ?>
                                        <a href='#' tval='<?=base_url()?>files/<?=$val['file']?>' class="btn btn-small btn-warning download" type="button"><span class="isw-print"></span>&nbsp;Biodata</a>
                                    <?php endif ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>                                
    </div>  
    <div class="dr"><span></span></div>
</div>
<script type="text/javascript">
    $(function(){
        $('.download').click(function(){
            var data = $(this).attr('tval');
            window.location.href = data;
        })
    })
</script>
