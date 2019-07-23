
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
			<div class="portlet box purple">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Assign Table
							</div>
							<div class="tools">
								
							</div>
						</div>
						<div class="portlet-body">
							<ul class="nav nav-pills">
								<li class="active">
									<a href="#tab_2_1" data-toggle="tab" aria-expanded="true">
									Dine-In </a>
								</li>
								<li class="">
									<a href="#tab_2_2" data-toggle="tab" aria-expanded="false">
									Parcel </a>
								</li>
								
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade active in" id="tab_2_1">
									<div class="">
									<?= $this->Form->create($Table,['id'=>'CountryForm']) ?>
										<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">Select Table </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<?php echo $this->Form->input('table_id',['options' =>$Tables,'label' => false,'class'=>'form-control select2me ','empty'=> 'Select...','required']);?>
													 
												</div>
											</div>
										</div>
										</br>
										<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">No Of Pax </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" name="no_of_pax" class="form-control no_of_pax" Placeholder="No Of Pax" required="required" >
													 
												</div>
											</div>
										</div></br>
										<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">No Of Adult </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" name="no_of_adult" class="form-control no_of_adult" Placeholder="No Of Adult" value=0>
													 
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">No Of Child </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" name="no_of_child" class="form-control no_of_child" Placeholder="No Of Child"value=0>
													 
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">Comment </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" name="comment" class="form-control" Placeholder="Comment">
													 
												</div>
											</div>
										</div>	
										<div class="form-actions ">
											<div class="row">
												<div class="col-md-12" style=" text-align: center;">
													<hr></hr>
													<button type="submit" name="dineinSubmit" class="btn blue"value= "dinein">Book</button>
												</div>
											</div>
										</div>
										 
									<?= $this->Form->end() ?>
								</div>
							</div>
					<div class="tab-pane fade" id="tab_2_2">
						<div class="">
									<?= $this->Form->create($Table,['id'=>'CountryForm']) ?>
										<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">Select Table </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<?php echo $this->Form->input('table_id',['options' =>$Tables,'label' => false,'class'=>'form-control select2me ','empty'=> 'Select...']);?>
													 
												</div>
											</div>
										</div>
										</br>
										<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">Comment </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<input type="text" name="comment" class="form-control" Placeholder="Comment">
													 
												</div>
											</div>
										</div>	
										<!--<div class="form-group">
											<label class="control-label col-md-4" style="padding-left:14px;">Items </label>
											</span>
											</label>
											<div class="col-md-8">
												<div class="input-icon right">
													<i class="fa"></i>
													<?php echo $this->Form->input('item_lists',['options' =>$Items,'label' => false,'class'=>'form-control select2 selectState select2me','empty'=> 'Select...','multiple'=>true]);?>
													 
												</div>
											</div>
										</div>-->
										
										
										
										<div class="form-actions ">
										<label class="control-label col-md-4" style="padding-left:14px;">Items </label>
											</span>
										
											<div class="col-sm-8" style="margin-top:10px;" id="main">
												<table class="table table-bordered" id="main_table">	
													<thead class="bg_color">
														<tr align="center">
															<th  style="text-align:left;">Item</th>
															<th  style="text-align:left;">Quantity</th>
															<th  style="text-align:left;"></th>
														</tr>
														
													</thead>
													<tbody id="main_tbody"></tbody>
												</table>
											</div>
										</div>
										<div class="form-actions ">
											<div class="row">
												<div class="col-md-12" style=" text-align: center;">
													<hr></hr>
													<button type="submit" name="dineinSubmit" class="btn blue"value= "parcel">Book</button>
												</div>
											</div>
										</div>
										 
									<?= $this->Form->end() ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
	<!-- BEGIN PAGE LEVEL STYLES -->
<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery.min.js'); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END VALIDATEION --> 
<!-- END PAGE LEVEL SCRIPTS -->
<script>
$(document).ready(function() {
	
	$('.no_of_pax').die().live("keyup",function() {
		var no_of_pax=$(this).val(); 
		var no_of_adult=$('.no_of_adult').val();
		var no_of_child=$('.no_of_child').val(); 
		if(no_of_child >= no_of_pax){
			var rem=no_of_pax;
				$('.no_of_child').val(0);
				$('.no_of_adult').val(rem);
			
		}else if(no_of_child > 0){
			var rem=no_of_pax-no_of_child;
			if(rem <= 0){
				$('.no_of_adult').val(0);
			}else{
				$('.no_of_adult').val(rem);
			}
		}else{
			var rem=no_of_pax;
			$('.no_of_adult').val(rem);
		}
	});
	
	$('.no_of_child').die().live("keyup",function() {
		var no_of_child=$(this).val();
		var no_of_adult=$('.no_of_adult').val();
		var no_of_pax=$('.no_of_pax').val();
		if(no_of_child > 0){
			if(no_of_pax < no_of_child){
				var tot=parseInt(no_of_adult)+parseInt(no_of_child);
				$('.no_of_pax').val(tot);
			}else if(no_of_pax > no_of_child){
				var rem=no_of_pax-no_of_child;
				$('.no_of_adult').val(rem);
			}
			
			
		}else{
			var rem=no_of_pax;
			$('.no_of_adult').val(rem);
		}
	});
	$('.no_of_adult').die().live("keyup",function() {
		var no_of_adult=$(this).val();
		var no_of_child=$('.no_of_child').val();
		var no_of_pax=$('.no_of_pax').val();
		if(no_of_adult == no_of_pax){
			var rem=no_of_pax;
			$('.no_of_child').val(0);
		}else if(no_of_adult > no_of_pax){
			$('.no_of_pax').val(no_of_adult);
			$('.no_of_child').val(0);
		}else{
			var rem=no_of_pax-no_of_adult;
			if(rem <= 0){
				$('.no_of_child').val(0);
			}else{
				$('.no_of_child').val(rem);
			}
		}
	});
	$(document).on("click", ".add_row", function(e){
		add_row();
	});
	$(document).on("click", ".remove_row", function(e){ 
		var rowCount = $("#main_table tbody#main_tbody tr.main_tr").length; 
		if(rowCount>1)
		{
			$(this).closest("tr").remove();
			rename_rows();
			
		}
	});
	add_row();
	function add_row(){
			var tr=$('#sample tbody tr.main_tr').clone();
			$('#main_table tbody#main_tbody').append(tr);
			rename_rows();
		}
	function rename_rows(){
		var i=0;
		$("#main_table tbody#main_tbody tr.main_tr").each(function(){
			$(this).find("td:nth-child(1) select").select2().attr({name:"pending_kot_rows["+i+"][item_id]", id:"pending_kot_rows-"+i+"-item_id"
					}); 
			 $(this).find(".quantity").attr({name:"pending_kot_rows["+i+"][quantity]", id:"pending_kot_rows-"+i+"-quantity"
					}); 
			i++;
		});
		
	}
	

});
</script>				
	
<table id="sample" style="display:none;"  width="1500px">
	<tbody class="table_br">
		<tr class="main_tr">
			<td  align="left" class="vendor_wise_select">
				<?php echo $this->Form->input('raw_material_id',['options'=>$Items,'class'=>'form-control input-sm select2 raw_material ','empty' => '--Select Item--','label'=>false,'required'=>'required']); ?>
			</td>
			<td width="7%" align="center">
				<?php echo $this->Form->input('quantity', ['label' => false,'placeholder'=>'Qty','class'=>'form-control input-sm quantity rightAligntextClass','required'=>'required']); ?>
			</td>
			<td width="20%">
				<?php echo $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-plus']),['class'=>'btn btn-primary btn-xs add_row','type'=>'button']); ?>
				<?php echo $this->Form->button($this->Html->tag('i', '', ['class'=>'fa fa-times']),['class'=>'btn  btn-danger btn-xs remove_row','type'=>'button']); ?>
			</td>
			</tr>
	</tbody>
</table>	