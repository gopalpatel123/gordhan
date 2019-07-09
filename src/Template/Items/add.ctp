<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", 'Item | '.$coreVariable['company_name']); ?>
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-top:15px;">
	<div class="col-md-6">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<?php if(!empty($id)){ ?>
						Edit Item
					<?php }else{ ?>
						Add Item
					<?php } ?>
				</div>
				<div class="tools">
					<?php if(!empty($id)){ ?>
						<?php echo $this->Html->link('<i class="fa fa-plus"></i> Add ','/ItemCategories/add/',array('escape'=>false,'style'=>'color:#fff'));?>
					<?php }?>
				</div>
				<div class="row">	
						<div class="col-md-12 horizontal "></div>
				</div>
			</div>
			<div class="portlet-body">
				<div class="">
					<?= $this->Form->create($item,['id'=>'CountryForm']) ?>
						<div class="form-group">
							<label class="control-label col-md-4">Item Name  <span class="required"> * </span>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$item->name."'"; } ?> name="name" class="form-control" Placeholder="Enter item Name">
								</div>
							</div>
							<label class="control-label col-md-4">Brand Name  <span class="required"> * </span>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$item->rate."'"; } ?> name="rate" class="form-control  " Placeholder="Enter item sales rate" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="required" >
								</div>
							</div>
							<label class="control-label col-md-4">Sub Category  <span class="required"> * </span>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<?php echo $this->Form->input('item_sub_category_id',['options' =>$itemSubCategories,'label' => false,'class'=>'form-control select2me selectState ','empty'=> 'Select...']);?>
								</div>
							</div>
							<label class="control-label col-md-4">Description  <span class="required"> * </span>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<?php echo $this->Form->input('description',['label' => false,'class'=>'form-control', 'placeholder' => 'Description']);?>
								</div>
							</div>
							<label class="control-label col-md-4">Select Tax  <span class="required"> * </span>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<?php echo $this->Form->input('tax_id',['options' =>$Taxes,'label' => false,'class'=>'form-control select2me ','empty'=> 'Select...']);?>
								</div>
							</div>
							<label class="control-label col-md-4">Discount Applicable  <span class="required"> * </span>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<label class="radio-inline">
									<input type="radio" name="discount_applicable" value="1" <?php  if(!empty($id)){ if($item->discount_applicable==1){ echo "checked";} }else{ echo "checked"; } ?>> Applicable</label>
									<label class="radio-inline">
									<input type="radio" name="discount_applicable" value="0" <?php  if(!empty($id)){ if($item->discount_applicable==0){ echo "checked";} } ?>> Not Applicable </label>
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
					 Item List
				</div>
				<div class="tools" style=" margin-right: 10px; margin-top: -7px; height:10px;"> 
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
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php $x=0; foreach ($itemslist as $country): ?>
						<tr class="main_tr">
							<td><?= ++$x; ?></td> 
							<td><?= h($country->name) ?></td>
							<td class="actions">
								<?php
									if($country->is_deleted==0){
									echo $this->Html->link('Edit ', '/Companies/add/'.$country->id, ['class' => 'btn btn-xs blue showLoader']);
									echo $this->Html->link('Freeze ', '#' ,['data-target'=>'#deletemodal'.$country->id,'data-toggle'=>'modal','data-container'=>'body', 'class'=>'btn btn-xs red']);
									} else { ?>
										<?php 
										echo $this->Html->link('Unfreeze ', '#' ,['data-target'=>'#undeletemodal'.$country->id,'data-toggle'=>'modal','class'=>'btn btn-xs red','data-container'=>'body']);
									}
									?>
								<div id="deletemodal<?php echo $country->id; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog modal-md" >
										<form method="post" action="<?php echo $this->Url->build(array('controller'=>'Items','action'=>'delete',$country->id)) ?>">
											<div class="modal-content">
											  <div class="modal-header">
												
													<h4 class="modal-title">
													Are you sure you want to freeze this Item?
													</h4>
												</div>
												<div class="modal-footer" style="border:none;">
													<button type="submit" class="btn  btn-sm btn-danger showLoader">Yes</button>
													<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal" style="color:#000000;background-color:#DDDDDD">Cancel</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div id="undeletemodal<?php echo $country->id; ?>" class="modal fade" role="dialog">
									<div class="modal-dialog modal-md" >
										<form method="post" action="<?php echo $this->Url->build(array('controller'=>'Items','action'=>'undelete',$country->id)) ?>">
											<div class="modal-content">
											  <div class="modal-header">
												
													<h4 class="modal-title">
													Are you sure you want to unfreeze this Item?
													</h4>
												</div>
												<div class="modal-footer" style="border:none;">
													<button type="submit" class="btn  btn-sm btn-danger showLoader">Yes</button>
													<button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal" style="color:#000000;background-color:#DDDDDD">Cancel</button>
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
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
<!-- END COMPONENTS DROPDOWNS -->	

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/pages/scripts/form-validation.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END VALIDATEION --> 
<!-- END PAGE LEVEL SCRIPTS -->

<?php
$js="var form3 = $('#form_sample_1');
		var error3 = $('.alert-danger', form3);
		var success3 = $('.alert-success', form3);
		form3.validate({
			errorElement: 'span', //default input error message container
			errorClass: 'help-block help-block-error', // default input error message class
			focusInvalid: true, // do not focus the last invalid input
			rules: {
		            name: {
		                required: true
		            },
		            item_sub_category_id: {
		                required: true,
		            }, 
		            tax_id: {
		                required: true,
		            },
		            rate: {
		                required: true,
		                number: true
		            }, 
		        },

			errorPlacement: function (error, element) { // render error placement for each input type
				if (element.parent('.input-group').size() > 0) {
					error.insertAfter(element.parent('.input-group'));
				} else if (element.attr('data-error-container')) { 
					error.appendTo(element.attr('data-error-container'));
				} else if (element.parents('.radio-list').size() > 0) { 
					error.appendTo(element.parents('.radio-list').attr('data-error-container'));
				} else if (element.parents('.radio-inline').size() > 0) { 
					error.appendTo(element.parents('.radio-inline').attr('data-error-container'));
				} else if (element.parents('.checkbox-list').size() > 0) {
					error.appendTo(element.parents('.checkbox-list').attr('data-error-container'));
				} else if (element.parents('.checkbox-inline').size() > 0) { 
					error.appendTo(element.parents('.checkbox-inline').attr('data-error-container'));
				} else {
					error.insertAfter(element); // for other inputs, just perform default behavior
				}
			},

			invalidHandler: function (event, validator) { //display error alert on form submit   
				success3.hide();
				error3.show();
			},

			highlight: function (element) { // hightlight error inputs
			   $(element)
					.closest('.form-group').addClass('has-error'); // set error class to the control group
			},

			unhighlight: function (element) { // revert the change done by hightlight
				$(element)
					.closest('.form-group').removeClass('has-error'); // set error class to the control group
			},

			success: function (label) {
				label
					.closest('.form-group').removeClass('has-error'); // set success class to the control group
			},

			submitHandler: function (form) {
				success3.show();
				error3.hide();
				$('#loading').show();
				form[0].submit(); // submit the form
			}

		});";

if(!empty($id)){  
	foreach($item->item_rows as $rowData){  
	$js.='

		$(".main_tr").each(function(){
			var selectedval=$(this).closest("tr").find(".ShowUnit option:selected").attr("unit_name");
			$(this).closest("tr").find(".unitType").val(selectedval); 
		});
	';
	}
}

if(!$focus_id){ $focus_id=0; }
$url = $this->Url->build(["controller"=>"items","action"=>"index"]);
$js.=';
$(document).ready(function() {

	$("input[name=name]").live("keyup",function() {
		var rows = $("#main_tbody2 tr.main_tr");
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
	
	$.ajax({
      url: "'.$url.'",
      success: function( data ) {
        $("#itemList").html(data);

        //$("tr[data-id='.$focus_id.']").find("a").focus();

        var rows = $("#main_tbody2 tr.main_tr");
		$("#search3").live("keyup",function() {
			var val = $.trim($(this).val()).replace(/ +/g, " ").toLowerCase();
			var v = $(this).val();
			console.log(v);
			if(v){ 
				rows.show().filter(function() {
					var text = $(this).text().replace(/\s+/g, " ").toLowerCase();
		
					return !~text.indexOf(val);
				}).hide();
			}else{
				rows.show();
			}
		}); 
      },
      error: function(e){
      	//console.log(e.responseText);
      }
    });

    $(".markFav").die().live("click",function(event){
    	event.preventDefault();
    	var row_no=$(this).attr("row_no");
		var url=$(this).closest("a").attr("href");
		$.ajax({
			url: url,
		}).done(function(response) {
			$("span.unfavbox[row_no="+row_no+"]").show();
			$("span.favbox[row_no="+row_no+"]").hide();
		});
	});

	$(".markunFav").die().live("click",function(event){
    	event.preventDefault();
    	var row_no=$(this).attr("row_no");
		var url=$(this).closest("a").attr("href");
		$.ajax({
			url: url,
		}).done(function(response) {
			$("span.unfavbox[row_no="+row_no+"]").hide();
			$("span.favbox[row_no="+row_no+"]").show();
		});
	});


	rename_rows();
	$(document).on("change",".ShowUnit", function(){
		var unit_name = $("option:selected", this).attr("unit_name");
		$(this).closest("tr.main_tr").find(".unitType").val(unit_name); 
	});

	$(document).on("click", ".add_row", function(e)
    { 
		add_row();
	});
';
if(empty($id)){ 
	$js.='add_row();';
}
$js.='	
	function add_row(){ 
		var tr=$("#sample tbody tr.main_tr").clone();
		$("#main_table tbody#main_tbody").append(tr);
	
		rename_rows();
	}
	$(document).on("click", ".remove_row", function(e)
    { 
		var rowCount = $("#main_table tbody#main_tbody tr.main_tr").length; 
		if(rowCount>1)
		{
			$(this).closest("tr").remove();
			rename_rows();
		}
	});
	function rename_rows(){
		var i=0;
		$("#main_table tbody#main_tbody tr.main_tr").each(function(){
            var row_no = $(this).attr("row_no");					
			$(this).find("td:nth-child(1)").html(i+1);
			$(this).find("td:nth-child(2) select").attr({name:"item_rows["+i+"][raw_material_id]", id:"item_rows-"+i+"-raw_material_id"});
			$(this).find("td:nth-child(3) input").attr({name:"item_rows["+i+"][quantity]", id:"item_rows-"+i+"-quantity"});
			$(this).find("td:nth-child(2) select").select2();
			i++;
		});
		if(i > 1){
			$("#main_table tbody#main_tbody tr:last").find("td:nth-child(2) select").select2("open");
			$("#main_table tbody#main_tbody tr:last").find("td:nth-child(2) select").focus();
		}


	}

	jQuery(".loadingshow").submit(function(){
		jQuery("#loader-1").show();
	});
	$.validator.addMethod("specialChars", function( value, element ) {
		var regex = new RegExp("^[a-zA-Z ]+$");
		var key = value;

		if (!regex.test(key)) {
		   return false;
		}
		return true;
	}, "please use only alphabetic characters");
	 
 });

FormValidation.init();
'; 
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>
<table id="sample" style="display:none;"  width="1500px">
	<tbody class="table_br">
		<tr class="main_tr">
			<td style="vertical-align: top !important;"></td>
			<td width="30%" align="left">
				<?php echo $this->Form->input('raw_material_id',['options'=>$option,'class'=>'form-control input-sm select2 ShowUnit','empty' => '--Select Item--','label'=>false,'required'=>'required']); ?>
			</td>
			<td width="30%" align="">
				<?php echo $this->Form->control('quantity', ['label' => false,'placeholder'=>'Please Enter Quantity','class'=>'form-control input-sm rightAligntextClass','required'=>'required','oninput'=>"this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"]); ?>
			</td>
			<td width="15%" class="">
				<?php echo $this->Form->control('dasd', ['label' => false,'placeholder'=>'Unit','class'=>'form-control input-sm unitType','readonly'=>'readonly','tabindex'=>'1']); ?>
			</td>
			<td  width="20%">
				<?php echo $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-times']),['class'=>'btn  btn-danger btn-xs remove_row','type'=>'button']); ?>
			</td>
		</tr>
	</tbody>		
</table>