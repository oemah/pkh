<?=tiny_mce('mce')?>

<style type="text/css" media="screen">
    .span3{
        text-align: right;
    }
</style>

<div class="breadLine">
    <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin">Home</a> <span class="divider">></span></li>                
        <li class="active">News</li>
    </ul>
</div>

<div class="workplace">
    <div class="row-fluid">
        <div class="span12">                    
            <div class="head clearfix">
                <div class="isw-grid"></div>
                <h1>Manage News <span class="mode_add hide">[add]</span><span class="mode_edit hide">[edit]</span></h1>      
            </div>

            <div class="form_input hide">
            <?=form_open('admin/news',array('id'=>'form_input'))?>
                <div class="block-fluid">                        
                    <div class="row-form clearfix">
                        <div class="span3">Judul</div>
                        <div class="span4"><input name="ds[judul]" id="judul" type="text"/></div>
                    </div>         
                </div>
                <div class="block-fluid">                        
                    <div class="row-form clearfix">
                        <div class="span3">News</div>
                        <div class="span7">
                            <textarea name="ds[news]" id="mce" class="mce"></textarea>
                        </div>
                    </div>         
                </div>
                <div class="block-fluid">                        
                    <div class="row-form sub clearfix">
                        <div>
                            <button class="btn cancel" type="button">Cancel</button>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>

            <div class="table_content">
                <div class="block-fluid">                        
                    <div class="row-form clearfix">
                        <div class="span12" style="text-align:right">
                            <button class="btn btn-small btn-primary add" type="button"><span class="isw-plus"></span>Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="block-fluid table-sorting clearfix">
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                        <thead>
                            <tr>                                    
                                <th class="center" width="5%">#</th>
                                <th>Judul</th>
                                <th>News</th>
                                <th class="center" width="12%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;foreach ($dt as $key): $i++;?>
                            <tr>                                    
                                <td class="center"><?=$i?></td>
                                <td><?=$key['judul']?></td>
                                <td><?=$key['news']?></td>
                                <td class="center">
                                    <a tjudul="<?=$key['judul']?>" tnews="<?=$key['news']?>" class="btn btn-small btn-info center edit" href="<?=base_url()?>admin/editnews/<?=$key['id_news'];?>"><i class="isw-edit"></i></a>
                                    <a class="btn btn-small btn-warning center del" href="<?=base_url()?>admin/deletenews/<?=$key['id_news'];?>"><i class="isw-delete"></i></a>
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
        $('.add').click(function(){
            $('.form_input').slideDown();
            $(".mode_add").fadeIn();
            $(".table_content").fadeOut();
            return false;
        });

        $('.cancel').click(function(){
            $('.form_input').slideUp();
            $(".mode_add").fadeOut();
            $(".mode_edit").fadeOut();
            $(".table_content").fadeIn();

            var action = "admin/news";
            $('#form_input').attr('action',action);

            $("#judul").val("");
            var desc = "";
            tinyMCE.activeEditor.setContent(desc);

            return false;
        })

        $(".edit").click(function(){
            $('.form_input').slideDown();
            $(".mode_edit").fadeIn();
            $(".table_content").fadeOut();

            var desc = $(this).attr('tnews');
            tinyMCE.activeEditor.setContent(desc);

            $("#judul").val($(this).attr('tjudul')).focus();
            $("#mode_edit").fadeIn();

            var action = $(this).attr('href');
            $('#form_input').attr('action',action);
            return false;
        })
    })
</script>

<script type="text/javascript">
    $(function(){
        $("#form_input").validate({
            rules: {
                'ds[judul]'  : 'required',
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
    })
</script>
