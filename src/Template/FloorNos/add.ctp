<?php echo $this->Html->css('mystyle'); ?>
<?php $this->set("title", 'Floors | '.$coreVariable['company_name']); ?>
<!-- BEGIN PAGE CONTENT-->
<div class="row" style="margin-top:15px;">
	<div class="col-md-6">
		<!-- BEGIN ALERTS PORTLET-->
		<div class="portlet box blue-hoki">
			<div class="portlet-title">
				<div class="caption">
					<?php if(!empty($id)){ ?>
						Edit Floor
					<?php }else{ ?>
						Add Floor
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
					<?= $this->Form->create($floorNo,['id'=>'CountryForm']) ?>
						<div class="form-group">
							<label class="control-label col-md-4" style="padding-left:14px;">Floors Name <span class="required"> * </span></label>
							</span>
							</label>
							<div class="col-md-8">
								<div class="input-icon right">
									<i class="fa"></i>
									<input type="text" <?php if(!empty($id)){ echo "value='".$floor->name."'"; } ?> name="name" class="form-control" Placeholder="Enter Floor Name">
									 
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
					Floors List
				</div>
				<div class="tools">
					<input id="search3"  class="form-control" type="text" placeholder="Search" >
 				</div>
				<div class="row">	
						<div class="col-md-12 horizontal "></div>
				</div>
			</div>
			<div class="portlet-body">
				<table class="table table-str table-hover " cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<th scope="col"><?= ('S.No') ?></th> 
							<th scope="col"><?= ('Name') ?></th>
							<th scope="col" class="actions"><?= __('Actions') ?></th>
						</tr>
					</thead>
					<tbody id="main_tbody">
						<?php $x=0; foreach ($Floors as $table): ?>
						<tr>
							<td><?= ++$x; ?></td> 
							<td><?= h($table->name) ?></td>
							<td class="actions">
								<?php 
								echo $this->Html->link('Edit',['controller'=>'Floors','action'=>'add',$table->id], ['escape' => false, 'class' => 'btn btn-xs blue showLoader']);
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
            error2.hide();
			$("#loading").show();
            form[0].submit(); // submit the form
        }
    });

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