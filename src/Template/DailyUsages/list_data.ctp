<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", 'Raw-Material-Category | '.$coreVariable['company_name']); ?>
<!-- BEGIN PAGE CONTENT-->



<div class="row" style="margin-top:15px;">
   
    <div class="col-md-2"></div>
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
                            <th scope="col"><?= ('Transaction Date') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody id="main_tbody">
                        <?php $x=0; foreach ($DailyUsages as $DailyUsage): ?>
                        <tr>
                            <td><?= ++$x; ?></td> 
                            <td><?= h($DailyUsage->transaction_date) ?></td>
                            <td class="actions">
                                <?php
                                   
                                    echo $this->Html->link('Edit ', '/DailyUsages/edit/'.$DailyUsage->id, ['class' => 'btn btn-xs blue showLoader']);
                                   
                                ?>
                               
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

