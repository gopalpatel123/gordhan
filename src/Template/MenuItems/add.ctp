<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MenuItem $menuItem
 */
?>
<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", 'Menu Items | '.$coreVariable['company_name']); ?>


<div class="row" style="margin-top:15px;">
<div class="col-md-6">
<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<?php if(!empty($id)){ ?>
						Edit Menu Items 
					<?php }else{ ?>
						Add Menu Items 
					<?php }  ?>
				</div>
				<div class="tools">
					<?php if(!empty($id)){ ?>
						<?php echo $this->Html->link('<i class="fa fa-plus"></i> Add ','/MenuItems/add/',array('escape'=>false,'style'=>'color:#121212'));?>
					<?php }?>
				</div>
				<div class="row">	
						<div class="col-md-12 horizontal "></div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<?= $this->Form->create($menuItems,['id'=>'CountryForm']) ?>
						<div class="form-group">
							<label class="control-label col-md-4"> Select  Category <span class="required" >*
							 </span></label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<?php echo $this->Form->input('menu_category_id',['options' =>$menuCategories,'label' => false,'class'=>'form-control select2 selectState menu_category_id','empty'=> 'Select...' ,'value'=>$menuItem->menu_category_id]);?>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4"> Select Sub Category <span class="required" >*
							 </span></label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<div id="vendor_wise_select">
									<?php echo $this->Form->input('menu_sub_category_id',['options' =>$menuSubCategories,'label' => false,'class'=>'form-control select2 selectState','empty'=> 'Select...' ,'value'=>$menuItem->menu_sub_category_id]);?>
								</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Menu Items (English)  <span class="required"> * </span>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$menuItem->name."'"; } ?> name="name" class="form-control" Placeholder="Enter Menu Item Name">
								</div> 
							</div>
							
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Menu Items (हिंदी) 
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$menuItem->name_hindi."'"; } ?> name="name_hindi" class="form-control" Placeholder="Enter Menu Items (हिंदी)  Name">
								</div> 
							</div>
							
						</div>
						<div class="form-group">
							<label class="control-label col-md-4"> Fixed  <span class="required" >*
							 </span></label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<div id="vendor_wise_select">
									<?php 
									$daily_data[]=["text"=>"No","value"=>"No"];
									$daily_data[]=["text"=>"Yes","value"=>"Yes"];
									?>
									<?php echo $this->Form->input('daily',['options' =>$daily_data,'label' => false,'class'=>'form-control select2 selectState','value'=>$menuItem->daily]);?>
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
					Menu Item  List
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
							<th scope="col"><?= ('Menu Sub Category') ?></th> 
							
							
						
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $x=0; foreach ($menuItems as $country): 
					//	pr($country);die;
						?>
						
						<tr class="main_tr">
							<td><?= ++$x; ?></td> 
								<td><?= h($country->name) ?></td>
							<td><?= h($country->menu_sub_category->name) ?></td>
						
						
							<td class="actions">
								<?php
									if($country->is_deleted==0){
									echo $this->Html->link('Edit ', '/MenuItems/add/'.$country->id, ['class' => 'btn btn-xs blue showLoader']);
									echo $this->Html->link('Freeze ', '#' ,['data-target'=>'#deletemodal'.$country->id,'data-toggle'=>'modal','data-container'=>'body', 'class'=>'btn btn-xs red']);
									} else { ?>
										<?php 
										echo $this->Html->link('Unfreeze ', '#' ,['data-target'=>'#undeletemodal'.$country->id,'data-toggle'=>'modal','class'=>'btn btn-xs red','data-container'=>'body']);
									}
									?>
								<div id="deletemodal<?php echo $country->id; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog modal-md" >
										<form method="post" action="<?php echo $this->Url->build(array('controller'=>'MenuItems','action'=>'delete',$country->id)) ?>">
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
										<form method="post" action="<?php echo $this->Url->build(array('controller'=>'MenuItems','action'=>'undelete',$country->id)) ?>">
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
	
<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END VALIDATEION --> 
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
 
 ';
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>