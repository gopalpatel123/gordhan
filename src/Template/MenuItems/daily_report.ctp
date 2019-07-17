<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", ' Today Menu | '.$coreVariable['company_name']); ?>
<div style="height: 15px;" >.</div>
<div class="row">
    <div class="col-md-1 main-div"></div>
    <div class="col-md-10 main-div">
        <!-- BEGIN ALERTS PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    
                </div>
                <div class="tools">
                    

                </div>
                <div class="actions">
                   
                </div>
                <div class="row">   
                        <div class="col-md-12 horizontal "></div>
                </div>
            </div>
	<div class="portlet box grey-cascade">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-coffee"></i>Daily Menu
			</div>
			<div class="tools">
				 <!--<input name="current_date" class="form-control date-picker" type="text" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" required="required" placeholder="Month">-->
			</div>
		</div>
		<div class="portlet-body">
		<?= $this->Form->create($menuSubCategory,['id'=>'CountryForm']) ?>

			<div class="table-responsive">
				<table class="table table-bordered"  id="main_table">
				<thead>
					<tr>
						<th width="5%"> #</th>
						<th width="10%">Menu Category</th>
						<th width="15%">Menu Sub Category</th>
						<th width="25%">Menu Items</th>
						
					</tr>
				</thead>
				<tbody id="main_tbody">
				<?php 
				$categoryRowspan=[]; $subCategoryWiseItem=[];  $defaultSelect=[]; 
					foreach($MenuSubCategories as $MenuSubCategorie){
							@$categoryRowspan[$MenuSubCategorie->menu_category_id]=@$categoryRowspan[$MenuSubCategorie->menu_category_id] + 1;
							foreach($MenuSubCategorie->menu_items as $menu_item ){
								$subCategoryWiseItem[$MenuSubCategorie->id][]=['text'=>$menu_item->name,'value'=>$menu_item->id]; 
								if($menu_item->daily=="Yes"){
								$defaultSelect[$MenuSubCategorie->id]=$menu_item->id;
								}
							}
							
					}
					// 
				?>
				
				
				<?php $groups=[]; $i=1; $q=1; foreach($MenuSubCategories as $MenuSubCategorie){ 
					
					//pr($MenuSubCategorie->menu_category_id); exit;
					?>
					<tr class="main_tr">
						<?php if(!in_array($MenuSubCategorie->menu_category_id, $groups)){ ?>
						<td  rowspan="<?php echo $categoryRowspan[$MenuSubCategorie->menu_category_id]; ?>" ><?php echo $i++; ?></td>
						<td  rowspan="<?php echo $categoryRowspan[$MenuSubCategorie->menu_category_id]; ?>" ><?php echo $MenuSubCategorie->menu_category->name; ?></td>
						<?php 
						$groups[]=$MenuSubCategorie->menu_category_id;
						} ?>
						<td><?php echo $MenuSubCategorie->name; ?></td>
						<td><?php echo $this->Form->input('today_menu_rows['.$q.'][menu_item_id]',['options' =>@$subCategoryWiseItem[$MenuSubCategorie->id],'label' => false,'class'=>'form-control select2me selectState','empty'=> 'Select...','value'=>$defaultSelect[$MenuSubCategorie->id]]);?></td>
					</tr>
					
				<?php   $q++; } ?>
				
				</tbody>
				</table>
				<div class="form-actions ">
				<div class="row">
					<div class="col-md-12" style=" text-align: center;">
						<hr></hr>
						<?php echo $this->Form->button('SUBMIT',['class'=>'btn btn-danger btn-sm']); ?> 
					</div>
				</div>
			</div>
			</div>
			
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
</div>


</div>

<!-- BEGIN PAGE LEVEL STYLES -->
	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->
	
	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>			
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?> 
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	 
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-dropdowns.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/pages/scripts/form-validation.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END VALIDATEION -->  
    <!-- END PAGE LEVEL SCRIPTS -->
	
	<?php
	$js="
	$(document).ready(function() {
			  ComponentsPickers.init();
		});
	";

echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>