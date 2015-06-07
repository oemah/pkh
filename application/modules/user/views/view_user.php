<div class="breadLine">
    <ul class="breadcrumb">
        <li><a href="<?=base_url()?>admin">Home</a> <span class="divider">></span></li>                
        <li class="active">Manage User</li>
    </ul>
</div>

<div class="workplace">
    <div class="row-fluid">
        <div class="span12">                    
            <div class="head clearfix">
                <div class="isw-grid"></div>
                <h1>Manage User <span class="mode_add hide">[add]</span><span class="mode_edit hide">[edit]</span></h1>      
            </div>

            <div class="form_input hide">
            <?php echo form_open('user/add',array('id'=>'form_input'))?>
                <div class="block-fluid">                        
                    <div class="row-form clearfix">
                        <div class="span2">Email</div>
                        <div class="span4"><input name="ds[email]" id="email" placeholder="Email" type="text"/></div>
                    </div>   
                    <div class="row-form clearfix">
                        <div class="span2">Name</div>
                        <div class="span4"><input name="ds[name]" id="name" placeholder="Name" type="text"/></div>
                    </div>    
                    <div class="row-form clearfix">
                        <div class="span2">User Group</div>
                        <div class="span2">
                            <select name="ds[group_id]" id="group_id">
                                <option value="1">Admin</option>
                            </select>
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
            <?php echo form_close()?>
            </div>

            <div class="table_content">
                <div class="block-fluid table-sorting clearfix">
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                        <thead>
                            <tr>                                    
                                <th class="center" width="5%">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Group</th>
                                <th class="center">Active</th>
                                <th class="center" width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=0;foreach ($table as $key => $val): $i++;?>
                            <tr>                                    
                                <td class="center"><?=$i?></td>
                                <td><?=$val['name']?></td>
                                <td><?=$val['email']?></td>
                                <td class="center"><?=($val['group_id'] == 1) ? 'Admin' : 'Member' ;?></td>
                                <td class="center"><input uid="<?=$val['user_id'];?>" class="enable" type="checkbox" name="check" <?=($val['status'] == 1) ? 'checked="checked"' : ''?> ></td>
                                <td class="center">
                                    <a class="btn btn-small btn-info center edit" href="<?=base_url()?>user/edit/<?=$val['user_id'];?>"
                                        tgroup = "<?=$val['group_id']?>"
                                        temail = "<?=$val['email']?>"
                                    ><i class="isw-edit"></i></a>
                                    <a class="btn btn-small btn-warning center del" href="<?=base_url()?>user/delete/<?=$val['user_id'];?>"><i class="isw-delete"></i></a>
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
            var url = "<?=base_url()?>user/enable/"+$(this).attr('uid')+'/';
            if ($(this).is(':checked')){
                url += '1';
            }else{
                url += '0';
            }
            $.get(url);
        })
    })
</script>
