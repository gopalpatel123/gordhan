<?php $this->set("title", 'Tables | '.$coreVariable['company_name']); ?>
<style>
.saveCustomersearch{
	color: #FFF; background-color: #FA6775; padding: 9px 11px;font-size:12px;cursor: pointer;
}
.saveCustomer{
	color: #FFF; background-color: #FA6775; padding: 7px 14px;font-size:12px;cursor: pointer;margin-left: 2px;
}
.topBtnActive{
	color: #FFF; border-radius: 5px !important; background-color: #FA6775; padding: 7px 18px;margin-left: 8px;
}
.topBtn{
	color: #818182; border-radius: 5px !important; background-color: #FFF; padding: 7px 18px;border:solid 1px #f0f0f0;margin-left: 8px;
}
.topBtn2{
	color: #818182; border-radius: 5px !important; background-color: #F5F5F5; padding: 7px 18px;border:solid 1px #f0f0f0;margin-left: 8px;
} 
.paymentsubmit{
	color: #FFF; background-color: #4FC777; padding: 7px 14px;font-size:12px;cursor: pointer;margin-left: 2px; border-radius: 4px;
} 
.radio-inline{
	font-size: 10px !important;
	color:#96989A;
}
</style>
 


<div style="background: #EBEEF3;">
	<input type="hidden"  id="tableInput" />
	<div class="row TableView" style="padding:10px;">
		<div class="col-md-12"  align="center">
			<?php
			$i=0;
			foreach($FloorNos as $FloorNo){?>
			<div class="portlet box green-meadow">
				<div class="portlet-title" align="center">
					<div class="caption" style="text-align:center">
						<i class="fa fa-table" ></i><?php echo $FloorNo->name; ?>
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse" data-original-title="" title="">
						</a>
						
						<!--<a href="javascript:;" class="remove" data-original-title="" title="">
						</a>-->
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					<?php 
						foreach($Tables as $Table){
							/* $sum=0;
							$RatePerPax=0;
							if(array_key_exists($Table->id, $tableWiseAmount)){
								foreach($tableWiseAmount[$Table->id] as $item) {
									$sum += $item;
								}
							}
							if($sum>0){
								if($Table->no_of_pax){
									$RatePerPax=$sum/$Table->no_of_pax;
								}else{
									$RatePerPax=0;
								}
								
							} */
						?>
						<?php if($Table->floor_no_id==$FloorNo->id){; ?>
						<div class="tblBox <?php if($coreVariable['role']=='steward' && $Table->status=='occupied'){ echo 'goToKot'; } ?>" table_id="<?= h($Table->id) ?>" table_name="<?= h($Table->name) ?>"> 
				
					
						<div style="font-size:14px; border-radius: 7px !important;">
							<div class="CreateKot EmptyTbl" table_id='<?php echo $Table->id; ?>' table_name='<?php echo $Table->name; ?>' style="box-shadow: 2px 3px 10px -1px rgb(169, 161, 161);">
								<table width="100%" style="font-size:12px;line-height: 22px;text-align: center; white-space: nowrap; border:2px solid #DAD6F9" >
									<tr>
										<td height="30px" width="50%" style="background-color: #DAD6F9;">
 											<span style="color:#373435;"><?php echo $Table->no_of_pax; if($sum>0){  echo ' (&#8377; '; echo  round($RatePerPax,2);echo ')'; }?></span>
										</td>
										<td width="50%">
											<span id="timeLabel_<?php echo $Table->id; ?>" ></span>
										</td>
									</tr>
									<tr>
										<td height="30px" style="background-color: #DAD6F9;font-size:18px;">
 											<b> Table <?= h($Table->name) ?></b>
										</td>
										<td >
											<?php if($TotPaxTableWise[$Table->id] > 0){ ?>
											<b> <?php echo $TotPaxTableWise[$Table->id].'/'.$Table->capacity ?></b>
											<?php } else { ?>
											<b> <?php echo '0/'.$Table->capacity ?></b>
											<?php }  ?>
										</td>
									</tr>
									<tr>
										<td style="background-color: #DAD6F9;"> 
											<span style="color:#373435;"><?= h(@$Table->employee->name);?> </span>
										</td>
										<td height="30px" > 
											<span style="color:#373435;"><?php echo @ucwords($Table->customer->name); ?> </span>
										</td>
									</tr>
								</table>
							</div>
							
						</div>
				
			
			</div>
						<?php } }?>
				</div>
			</div>
			
			
			<?php } ?>
		</div>
	</div>
</div>


<style>
.goToKot:hover{
	cursor: pointer;
} 
.EmptyTbl{
	box-shadow: 2px 3px 10px -1px rgb(169, 161, 161);
}
.CreateKot:hover{
	cursor: pointer;
}
.EmptyTbl:hover{
	cursor: pointer;
}
#kotBox td{
	padding:12px 0px;
}
.tblBox{
	width: 230px; margin: 5px;
	background-color: #FFF;
	padding: 0px;
	border-radius: 7px !important;
	position: relative;
	margin-bottom: 3px;
	display: inline-block;
}
 
.registerCustomer{
	color: #FFF; background-color: #35aa47; padding: 7px 14px;font-size:12px;cursor: pointer;margin-left: 2px;
}
.closeCustomerBox{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px; 
}
.closeCustomerBox2{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px; 
}
.steward:hover{
	cursor: pointer;color: #FA6775 !important;
}
.CloseSteward{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px; 
}
.ClosePayment{
	color: #000; background-color: #E6E7E8; padding: 4px 10px 5px 10px;font-size:13px;cursor: pointer;margin-right: 2px; 
}
</style>

<!-- BEGIN PAGE LEVEL STYLES -->
<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN VALIDATEION -->
	<?php echo $this->Html->script('/assets/global/plugins/jquery-validation/js/jquery.validate.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END VALIDATEION --> 
<!-- END PAGE LEVEL SCRIPTS -->

