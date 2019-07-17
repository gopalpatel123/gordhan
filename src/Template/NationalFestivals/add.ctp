<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\NationalFestival $nationalFestival
 */
?>
<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", 'National Festivals | '.$coreVariable['company_name']); ?>
<!--<div class="nationalFestivals form large-9 medium-8 columns content">
    <?= $this->Form->create($nationalFestival) ?>
    <fieldset>
        <legend><?= __('Add National Festival') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('effected_date');
            echo $this->Form->control('statas');
            echo $this->Form->control('changed_fixed');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>-->
<style>
.portlet > .portlet-title > .tools {
    float: right;
    display: inline-block;
    padding: 12px 0 8px 0;
    margin-right: 30px;
}
</style>
<div class="row" style="margin-top:15px;">
<div class="col-md-6">
<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<?php if(!empty($id)){ ?>
						Edit National Festivals
					<?php }else{ ?>
						Add National Festivals
					<?php }  ?>
				</div>
				<div class="tools">
					<?php if(!empty($id)){ ?>
						<?php echo $this->Html->link('<i class="fa fa-plus"></i> Add ','/NationalFestivals/add/',array('escape'=>false,'style'=>'color:black;'));?>
					<?php }?>
				</div>
				<div class="row">	
						<div class="col-md-12 horizontal "></div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<?= $this->Form->create($nationalFestival,['id'=>'CountryForm']) ?>
						<div class="form-group">
							<label class="control-label col-md-4"> Name <span class="required" >*
							 </span></label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$nationalFestival->name."'"; } ?> name="name" class="form-control" Placeholder="Enter Menu Item Name">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Effected Date<span class="required" >*
							 </span></label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<div id="vendor_wise_select">
									<input type="text" <?php if(!empty($id)){ echo "value='".$nationalFestival->effected_date."'"; } ?> name="effected_date" data-date-format="dd-mm-yyyy" class="form-control date-picker" Placeholder="Enter Effected Date">
								</div>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-4">Fixd/Changed<span class="required" >*
							 </span></label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<div id="vendor_wise_select">
									<?php 
									
									$daily_data[]=["text"=>"fixd","value"=>"fixd"];
									$daily_data[]=["text"=>"changed","value"=>"changed"];
								
									
									?>
									<?php echo $this->Form->input('changed_fixed',['options' =>$daily_data,'label' => false,'class'=>'form-control select2 selectState','empty'=> 'Select...' ,'value'=>$nationalFestival->changed_fixed]);?>
								</div>
								</div>
							</div>
						</div>
						<div class="form-actions ">
							<div class="row">
								<div class="col-md-12" style=" text-align: center;">
									<hr></hr>
									<?php echo $this->Form->button('SUBMIT',['class'=>'btn btn-danger btn-sm']); ?> 
								</div>
							</div>
						</div>
 						 
					<?= $this->Form->end() ?>
				</div> 
			</div>
		</div>
</div>
<div class="col-md-6">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					National Festivals List
				</div>
				<div class="tools" style="margin-right: 10px; margin-top: -7px; height:10px;"> 
					<input id="search3"  class="form-control" type="text" placeholder="Search" >
 				</div>
				<div class="row">	
						<div class="col-md-12 horizontal "></div>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-str table-hover " cellpadding="0" cellspacing="0" id="main_tbody">
					<thead>
						<tr>
							<th scope="col"><?= ('S.No') ?></th> 
							<th scope="col"><?= ('Name') ?></th>
							<th scope="col"><?= ('Date') ?></th>
							
							
							
						
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $x=0; foreach ($nationalFestivals as $country): 
					//	pr($country);die;
						?>
						
						<tr class="main_tr">
							<td><?= ++$x; ?></td> 
								<td><?= h($country->name) ?></td>
							<td><?= h($country->effected_date) ?></td>
						
						
							<td class="actions">
								<?php
									if($country->is_deleted==0){
									echo $this->Html->link('Edit ', '/NationalFestivals/add/'.$country->id, ['class' => 'btn btn-xs blue showLoader']);
									echo $this->Html->link('Disactive ', '#' ,['data-target'=>'#deletemodal'.$country->id,'data-toggle'=>'modal','data-container'=>'body', 'class'=>'btn btn-xs red']);
									} else { ?>
										<?php 
										echo $this->Html->link('Active ', '#' ,['data-target'=>'#undeletemodal'.$country->id,'data-toggle'=>'modal','class'=>'btn btn-xs red','data-container'=>'body']);
									}
									?>
								<div id="deletemodal<?php echo $country->id; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog modal-md" >
										<form method="post" action="<?php echo $this->Url->build(array('controller'=>'NationalFestivals','action'=>'delete',$country->id)) ?>">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">
														Are you sure you want to Disactive this National Festivals?
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
										<form method="post" action="<?php echo $this->Url->build(array('controller'=>'NationalFestivals','action'=>'undelete',$country->id)) ?>">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title">
														Are you sure you want to Active this National Festivals?
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
<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END VALIDATEION --> 
<!-- END PAGE LEVEL SCRIPTS -->
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
$js='
$(document).ready(function() {
	jQuery(".loadingshow").submit(function(){
		jQuery("#loader-1").show();
	});
	 
	
	//-- Validation
	var form2 = $("#CountryForm");
	var error2 = $(".alert-danger", form2);
	var success2 = $(".alert-success", form2);

	form2.validate({
		errorElement: "span", //default input error message container
		errorClass: "help-block help-block-error", // default input error message class
		focusInvalid: false, // do not focus the last invalid input
		ignore: "",  // validate all fields including form hidden input
		rules: {
			name: { 
				required: true, 
			},
			menu_sub_category_id: { 
				required: true, 
			},
			menu_category_id: { 
				required: true, 
			},daily: { 
				required: true, 
			},
		},

		 

		errorPlacement: function (error, element) { // render error placement for each input type
			var icon = $(element).parent(".input-icon").children("i");
			icon.removeClass("fa-check").addClass("fa-warning");  
			icon.attr("data-original-title", error.text()).tooltip({"container": "body"});
		},

		highlight: function (element) { // hightlight error inputs
			$(element)
				.closest(".form-group").removeClass("has-success").addClass("has-error"); // set error class to the control group   
		},
		success: function (label, element) {
			var icon = $(element).parent(".input-icon").children("i");
			$(element).closest(".form-group").removeClass("has-error").addClass("has-success"); // set success class to the control group
			icon.removeClass("fa-warning").addClass("fa-check");
		},

		submitHandler: function (form) {
			
			success2.show();
			$("#loading").show();
			error2.hide();
			
			form[0].submit(); // submit the form
		}
	}); 


	var rows = $("#main_tbody tr.main_tr");
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
		
		

 });
 $(".menu_category_id").change(function () {
	var category_id=$(".menu_category_id option:selected").val();
	var url="'.$this->Url->build(['controller'=>'MenuItems','action'=>'supplierWiseItem']).'";
	//$(".vendor_wise_select")find("tr td").remove();
	url=url+"/"+category_id;

	$.ajax({
		url: url,
		type: "POST"
	}).done(function(response) {
		$("#vendor_wise_select").html(response);
	});
  });
 ComponentsPickers.init();
 ';
?>

<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>