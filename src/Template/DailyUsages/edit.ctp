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

<?php $this->set("title", 'Daily Usage | '.$coreVariable['company_name']); ?>
<div class="row" style="margin-top:15px;">
    <div class="col-md-12 main-div">
        <div class="portlet box blue-hoki">
            <div class="portlet-title hide_at_print">
                <table width="100%" style=" margin-top: 5px; margin-bottom: 5px; ">
                    <tr>
                        <td width="20%">
                            <div class="caption"style="padding:13px; color: red;">
                                Daily Usage
                            </div>
                        </td>
                        <td valign="button">
                            <div align="center">
                                <form method="GET">
                                    <table>
                                        <tr>
                                            <td>
                                                <input name="current_date" class="form-control date-picker" type="text" value="<?php echo date('d-m-Y',strtotime(@$dailyUsage->transaction_date)); ?>" data-date-format="dd-mm-yyyy" required="required" placeholder="Month">
                                            </td>
                                           
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </td>
                        <td width="20%">
                            
                        </td>
                    </tr>
                </table>
                <div class="row">   
                    <div class="col-md-12 horizontal"></div>
                </div>
            </div>

            <div class="portlet-body"  id="ExcelPage">
                <?php if($dailyUsage){ ?>
                <?= $this->Form->create($dailyUsage) ?>
                    <div class="table-scrollable" style="width: 50%;">
                        <table class="table table-bordered table-stripped" >
                            <tr>
                               <th>Raw Materials</th>
                               <th>Quantity</th>
                           </tr>
                           <?php 
                            foreach ($rawMaterials as $rawMaterial) { ?>
                                <tr>
                                    <td>
                                        <?= h($rawMaterial->name) ?>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control input-sm" name="quantity[]" placeholder="0" value=<?php echo $rowMeterialQty[$rawMaterial->id]; ?> >
										<input class="form-control input-sm" name="raw_material_id[]" placeholder="0" value="<?php echo $rawMaterial->id; ?>" type="hidden" />
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div align="">
                        <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                <?= $this->Form->end() ?>
                <?php } ?>
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
<?php 
$js="
$(document).ready(function() {
    
		/* function rename_rows(){
			var i=0;
			$('#main_table tbody#main_tbody tr.main_tr').each(function(){
				
				$(this).find('td:nth-child(3) input').attr({name:'purchase_voucher_rows['+i+'][quantity]', id:'Purchase_Voucher_Rows-'+i+'-quantity'
						});
				
				
				i++;
			});
		} */

    ComponentsPickers.init();
});
";
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>