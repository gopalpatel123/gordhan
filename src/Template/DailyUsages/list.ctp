<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", 'Raw-Material-Category | '.$coreVariable['company_name']); ?>
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-top:15px;">
   
    <div class="col-md-6">
        <!-- BEGIN ALERTS PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                     Daily Usage List
                </div>
                <div class="tools"> 
                    <input id="search3"  class="form-control" type="text" placeholder="Search" >
                </div>
                <div class="row">   
                        <div class="col-md-12 horizontal "></div>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-str table-hover"  >
                    <thead>
                        <tr>
                            <th scope="col"><?= ('S.No') ?></th> 
                            <th scope="col"><?= ('Name') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody id="main_tbody">
                        <?php $x=0; foreach ($rawMaterialCategories as $country): ?>
                        <tr>
                            <td><?= ++$x; ?></td> 
                            <td><?= h($country->name) ?></td>
                            <td class="actions">
                                <?php
                                    if($country->is_deleted==0){
                                    echo $this->Html->link('Edit ', '/RawMaterialCategories/add/'.$country->id, ['class' => 'btn btn-xs blue showLoader']);
                                    echo $this->Html->link('Freeze ', '#', ['data-target'=>'#deletemodal'.$country->id,'data-toggle'=>'modal','class'=>'btn btn-xs red','data-container'=>'body']);
                                    } else {
                                        echo $this->Html->link('Unfreeze ', '#', ['data-target'=>'#undeletemodal'.$country->id,'data-toggle'=>'modal','class'=>'btn btn-xs red','data-container'=>'body']);
                                    }
                                ?>
                                <div id="deletemodal<?php echo $country->id; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md" >
                                        <form method="post" action="<?php echo $this->Url->build(array('controller'=>'RawMaterialCategories','action'=>'delete',$country->id)) ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Are you sure you want to freeze this Category?
                                                    </h4>
                                                </div>
                                                <div class="modal-footer" style="border:none;">
                                                    <button type="submit" class="btn  btn-sm btn-danger showLoader">Yes</button>
                                                    <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"style="color: #000000;    background-color: #DDDDDD;;">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="undeletemodal<?php echo $country->id; ?>" class="modal fade" role="dialog">
                                    <div class="modal-dialog modal-md" >
                                        <form method="post" action="<?php echo $this->Url->build(array('controller'=>'RawMaterialCategories','action'=>'undelete',$country->id)) ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">
                                                        Are you sure you want to unfreeze this Category?
                                                    </h4>
                                                </div>
                                                <div class="modal-footer" style="border:none;">
                                                    <button type="submit" class="btn  btn-sm btn-danger showLoader ">Yes</button>
                                                    <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"style="color: #000000;    background-color: #DDDDDD;;">Cancel</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<!-- BEGIN PAGE LEVEL STYLES -->
    

<!-- BEGIN PAGE LEVEL PLUGINS -->
    <!-- BEGIN VALIDATEION -->
    <?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
    <!-- END VALIDATEION --> 
<!-- END PAGE LEVEL SCRIPTS -->

<?php 
$js='
$(document).ready(function() {

    var rows = $("#main_tbody tr");
    $("#search3").on("keyup",function() {
        var val = $.trim($(this).val()).replace(/ +/g, " ").toLowerCase();
        var v = $(this).val();
        
        if(v){
            rows.show().filter(function() {
                var text = $(this).text().replace(/\s+/g, " ").toLowerCase();
    
                return !~text.indexOf(val);
            }).hide();
        }else{
            rows.show();
        }
    }); 

 });';
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>

