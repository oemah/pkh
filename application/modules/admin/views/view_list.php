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
                                <th class="center" width="12%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;foreach ($table as $key => $val): $i++;?>
                            <tr>                                    
                                <td class="center"><?=$i?></td>
                                <td><?=$val['id']?></td>
                                <td><?=date_formater($val['dateTime'])?></td>
                                <td><?=$val['nama']?></td>
                                <td><?=$val['point']?></td>
                                <td><?=$val['duration']?> Seconds</td>
                                <td class="center"><a href='<?=base_url()?>admin/download/<?=$val['id']?>' class="btn btn-small btn-primary add" type="button"><span class="isw-print"></span>&nbsp;Download</a></td>
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

<style type="text/css">
    .tt{
        float: left;
        font-weight: bold;
    }
    .ttd{
        margin-left: 22%;
    }
</style>

<script type="text/javascript">
    $(function(){
        $('.view').click(function(){
            $(".name").html($(this).attr('tname'));
            $(".group_id").html($(this).attr('tgroup'));
            $(".email").html($(this).attr('temail'));
            $(".address").html($(this).attr('taddress'));
            $(".post_code").html($(this).attr('tpost_code'));
            $(".phone_number").html($(this).attr('tphone'));
        })

        $('.cancel').click(function(){
            $('.form_input').slideUp();
            $(".mode_edit").fadeOut();
            $(".table_content").fadeIn();

            var action = "";
            $('#form_input').attr('action',action);

            $("#email").val("");
            $("#group_id").val("");

            return false;
        })

        $(".edit").click(function(){
            $('.form_input').slideDown();
            $(".mode_edit").fadeIn();
            $(".table_content").fadeOut();

            $("#email").val($(this).attr('temail')).focus();
            $("#group_id").val($(this).attr('tgroup')).focus();
            $("#mode_edit").fadeIn();

            var action = $(this).attr('href');
            $('#form_input').attr('action',action);
            return false;
        })

        $("#form_input").validate({
            rules: {
                'ds[email]'  : {'required'  : true,'email' : true},
                'ds[group_id]' : 'required',
            },
        });

        $('#tSortable').dataTable( {
            "sPaginationType": "bootstrap",
            'bPaginate' : true,
            "bLengthChange": true,
            "bInfo": false,
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            }
        } );

        $(".enable").change(function(){
            var url = "<?=base_url()?>member/adm_member/enable/"+$(this).attr('uid')+'/';
            if ($(this).is(':checked')){
                url += '1';
            }else{
                url += '0';
            }
            $.get(url);
        })
    })
</script>
