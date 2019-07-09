<?php echo $this->Html->css('mystyle'); ?>
<style type="text/css" media="print">
@page {
    width:100%;
    size: auto;   /* auto is the initial value */
    margin: 0px 0px 0px 0px;  /* this affects the margin in the printer settings */
}
.hide_at_print {
    display:none !important;
}
.show_at_print {
    display:block !important;
}
</style>
<style type="text/css">
    .table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td{
        padding: 0; font-size: 12px;
    }
</style>
<?php $this->set("title", 'Manual Stock | '.$coreVariable['company_name']); ?>
<div class="row" style="margin-top:15px;">
    <div class="col-md-12 main-div">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption"style="padding:13px; color: red;">
                    Manual Stock
                </div>
                <div class="actions" style="margin-right: 10px;">
                    <!--<input id="search3"  class="form-control" type="text" placeholder="Search" style="float: right;">-->
                </div>
                <br/>
                <div class="row">   
                    <div class="col-md-12 horizontal"></div>
                </div>
            </div>
			
            <div class="portlet-body">
               <form method="POST">
					<div style="padding-left:22px">
					<label id="CurrentDate">Date</label>
                    <input name="date" class="form-control" type="text" value="<?php echo date('d-m-Y'); ?>" readonly="readonly" style="width: 150px;">
					</div>
					 <div class="row">   
						<div class="col-md-12 horizontal"></div>
					</div>
                    <div class="ContenedorTabla">
                       <!--  <table class="table table-bordered table-stripped fht-table" id="pruebatabla4"> -->
                        <table class="table table-bordered table-stripped fht-table" id="pruebatabla4">
                            <thead>
                                <tr>
                                   <th rowspan="2" style="background-color: #c8e8ff;">S.No.</th>
                                   <th rowspan="2" style="background-color: #c8e8ff;">Raw materials</th>
                                   <th rowspan="2" style="background-color: #c8e8ff;">Unit</th>
                                  
									<?php
                                   
                                        $start_date=$fromDate;
                                        $end_date=$toDate;
                                        while (strtotime($start_date) <= strtotime($end_date)) {
                                            echo '<th style="white-space: nowrap;text-align:center;background-color: #c8e8ff;" colspan="2" >'.date('d-m-Y', strtotime($start_date)).'</th>';
                                            $start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
                                        }
                                   
                                    ?>
									<th style="white-space: nowrap;text-align:center;background-color: #c8e8ff;" colspan="2" ><?php echo date('d-m-Y', strtotime($date)); ?></th>
                               </tr>
                              <tr>
                                    <?php
                                    
                                        $start_date=$fromDate;
                                        $end_date=$toDate;
                                        while (strtotime($start_date) <= strtotime($end_date)) { ?>
                                            <th style="background-color: #c8e8ff;text-align:center;" class="qaz"><?= ('Phy.') ?></th>
                                            <th style="background-color: #c8e8ff;text-align:center;" class="qaz"><?= ('Comp.') ?></th>
                                            <?php $start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
                                        }
                                   
                                    ?>
                                    <th style="background-color: #c8e8ff;text-align:center;" class="qaz"><?= ('Phy.') ?></th>
                                    <th style="background-color: #c8e8ff;text-align:center;" class="qaz"><?= ('Comp.') ?></th>
                                </tr>
                            </thead>
							<tbody id="main_tbody">
                            <?php $d=0;$x=0; foreach ($RawMaterials as $RawMaterial): ?>
                                <tr style="background-color: #d6d6d6;">
                                    <td colspan="3" raw_material_sub_category_id="<?= h($RawMaterial->raw_material_sub_category->id) ?>" class="subCatRow" >
                                        <?= h($RawMaterial->raw_material_sub_category->name) ?>
                                    </td>
                                </tr>
                                <tr class="main_tr">
                                    <td><?= (++$d) ?></td>
                                    <td style="white-space: nowrap;"><?= h($RawMaterial->name) ?></td>
                                    <td><?= h($RawMaterial->primary_unit->name) ?></td>
                                    <?php
                                    
                                        $start_date=$fromDate;
                                        $end_date=$toDate;
                                        while (strtotime($start_date) <= strtotime($end_date)) { ?>
                                            <td>
                                                <input type="text" class="form-control input-sm" style="width: 50px;height: 20px;padding: 0;" name="old_physical[<?php echo strtotime($start_date); ?>][<?php echo $RawMaterial->id; ?>]" value="<?php echo @$OldPhysical[strtotime($start_date)][$RawMaterial->id]; ?>">
                                            </td>
                                            <td><?php echo round($OldComputerData[strtotime($start_date)][$RawMaterial->id]); ?></td>
                                            <?php $start_date = date ("Y-m-d", strtotime("+1 day", strtotime($start_date)));
                                        }
                                   
                                    ?>
                                    <td>
                                        <input type="text" class="form-control input-sm" style="width: 50px;height: 20px;padding: 0;" name="physical[<?php echo $RawMaterial->id; ?>]" value="<?php echo @$data[$RawMaterial->id]; ?>">
                                    </td>
                                    <td>
                                        <span class="current_stock" name ="quantity"><?= h($RawMaterial->total_in - $RawMaterial->total_out) ?></span> 
                                        <?= h($RawMaterial->primary_unit->quantity) ?> 
                                    </td>
                                </tr>
                                <?php $x++; endforeach; ?>
                            </tbody>
                         </table>
                    </div>   
					 <div align="center">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                </form>
               



            </div>
        </div>
    </div>
</div>


<!-- BEGIN PAGE LEVEL STYLES -->
    <!-- BEGIN COMPONENTS DROPDOWNS -->
    <?php echo $this->Html->css('/assets/global/plugins/clockface/css/clockface.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
    <?php echo $this->Html->css('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
    <?php echo $this->Html->css('/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
    <?php echo $this->Html->css('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
    <?php echo $this->Html->css('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
    <!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

 <!-- BEGIN PAGE LEVEL PLUGINS -->
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/global/plugins/clockface/js/clockface.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php echo $this->Html->script('/assets/global/scripts/metronic.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/admin/layout/scripts/layout.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/admin/layout/scripts/quick-sidebar.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/admin/layout/scripts/demo.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<!-- END PAGE LEVEL SCRIPTS -->


<?php echo $this->Html->css('/fixedHeader/ScrollTabla.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
<?php echo $this->Html->script('/fixedHeader/jquery.CongelarFilaColumna.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>

<?php 
$js="
$(document).ready(function() {
    $('#pruebatabla4').CongelarFilaColumna({Columnas:3});

    $('.fht-tbody table tbody tr td').css('height','21px');
    $('.qaz').css('width','44px');
    $('.fht-tbody').css('height','348px');

    var rows = $('#main_tbody tr');
        $('#search3').on('keyup',function() {
          
            var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
            var v = $(this).val();
            
            if(v){ 
                rows.show().filter(function() {
                    var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        
                    return !~text.indexOf(val);
                }).hide();
            }else{
                rows.show();
            }
        }); 

        var sub_category_id=0;
        $('.subCatRow').each(function(){
            var raw_material_sub_category_id= $(this).attr('raw_material_sub_category_id');
            if(sub_category_id!=raw_material_sub_category_id){
                sub_category_id = raw_material_sub_category_id;
            }else{
                $(this).parent('tr').remove();
            }
        });

    ComponentsPickers.init();
});
";
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>