<?php $this->set("title", 'Bill | '.$coreVariable['company_name']);

$pass = $this->request->params['pass'];
$order=$pass[1]; 
?>
<style>
.minus{
	color: #FFF; background-color: #FA6775;padding: 0px 5px;font-size:15px;cursor: pointer; font-weight: bold;
} 
.plus{
	color: #FFF; background-color: #2d4161de;padding: 0px 5px;font-size:15px;cursor: pointer;font-weight: bold;
}
.minusOld{
	color: #FFF; background-color: #FA6775;padding: 0px 5px;font-size:15px;cursor: pointer; font-weight: bold;
} 
.plusOld{
	color: #FFF; background-color: #2d4161de;padding: 0px 5px;font-size:15px;cursor: pointer;font-weight: bold;
}


.closeCustomerBox2{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px; 
}
.commentString{
    background-color: #2d4161;
    padding:  5px;
    border-radius:  5px;
    color:  #FFF;
    margin-right:  5px;
    cursor:  pointer;
}
.commentStringOld{
    background-color: #2d4161;
    padding:  5px;
    border-radius:  5px;
    color:  #FFF;
    margin-right:  5px;
    cursor:  pointer;
}
.commentStringKOT{
    background-color: #2d4161;
    padding:  5px;
    border-radius:  5px;
    color:  #FFF;
    margin-right:  5px;
    cursor:  pointer;
}
.closeCommentBox{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px; 
}
.saveComment{
	color: #FFF; background-color: #FA6775; padding: 7px 14px;font-size:12px;cursor: pointer;margin-left: 2px;
}
.closePopup{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px; 
}
.closeViewKot{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px;position: absolute; right: -12px; bottom: 2px;
}
.CancelBill{
	color: #000; background-color: #E6E7E8; padding: 7px 14px;font-size:12px;cursor: pointer;margin-right: 2px;
}
.SubmitBill{
	color: #FFF; background-color: #FA6775; padding: 7px 14px;font-size:12px;cursor: pointer;margin-left: 2px;
}

.AddItemBtn{
	color: #FFF; background-color: #FA6775; padding: 9px 18px;font-size:12px;cursor: pointer;
}
.CreateKOT{
	color: #FFF; background-color: #FA6775; cursor: pointer;font-size:12px;
}
.ViewAllKOT{
	color: #FFF; background-color: #FA6775; padding: 7px 14px;cursor: pointer;font-size:12px;
}
.KOTComment{
	color: #000; background-color: #F5F5F5; cursor: pointer;margin-right: 8px;font-size:10px;
}
.CreateBill{
	color: #FFF; background-color: #2D4161; font-size:15px;background-color: #2d4161 !important;
}
.Taxbutn{
	color: #FFF; background-color: #2D4161; padding: 7px 14px;cursor: pointer;margin-right: 8px;font-size:12px;
}
.disPer{
	width: 25px;height: 20px;
	text-align: center;margin: 0;
}
.disAmt{
	width: 25px;height: 20px;
	text-align: center;margin: 0;
}
</style>
<!-- <?= $this->element('header'); ?> -->
<div style="background: #EBEEF3;">
	<input type="hidden"  id="tableInput" value="<?php echo $table_id; ?>" />
	
	<div class="row KOTView" style="padding:1px 0px;">
		<div class="col-md-12">
			<table width="100%">
				<tr>
					<td valign="top" width="40%"  style=" padding: 0px 2px; ">
						<div style=" background-color: #FFF; border-radius: 8px !important;">

							<table width="100%">
								<tr>
									<td style="padding-bottom: 5px; border-bottom: solid 1px #CCC;height: 420px;" valign="top">
										<table width="100%">
											<tr>
												<!--<td>
													<button type="button" style=" width: 15px; height: 100px; " id="slideLeft" currentpage="0">  <i class="fa fa-chevron-left" style="color: #2d4161;margin: -3px;font-size: 10px;"></i> </button>
												</td>-->
												<td>
													<div style="max-height:375px; height:375px;" id="ItemArea" >
														
													</div>	
												</td>
												<!--<td>
													<button type="button" style=" width: 15px; height: 100px; " id="slideRight" currentpage="1">  <i class="fa fa-chevron-right" style="color: #2d4161;margin: -3px;font-size: 10px;"></i> </button>
												</td>-->
											</tr>
										</table>
									
									</td>
								</tr>
								<tr style="display:none">
									<td style="padding-top: 5px;padding-bottom: 5px; border-bottom: solid 1px #CCC;" valign="top">
										<span style="color:#373435;font-weight: bold;margin: 3px;">CHOOSE SUB CATEGORY</span><br/>
										<div id="SubCategoryArea" >
										</div>
									</td>
								</tr>
								<tr>
									<td style="padding-top: 5px;border-bottom: solid 1px #CCC; " valign="top">
										<span style="color:#373435;font-weight: bold;margin: 3px;">CHOOSE CATEGORY</span><br/>
										<div>
											<div id="CategoryArea" >
											</div>
										</div>
									</td>
								</tr>
								<!--<tr>
									<td style="padding:10px;padding-top: 5px; text-align: center;" valign="top">
										<br/>
										<a href="javascript:void(0)" class="fvtr" style="margin: 3px; padding: 5px 10px; background-color: #f0b11b; border-radius: 5px; color: #FFF; font-weight: 400;text-decoration: none;">FAVORITES</a>
									</td>
								</tr>-->
							</table>
							<div style="display: none;">
								<?php 
								$fz=1; $fzx=0;

								
								foreach($ItemCategories as $ItemCategory){ ?>
									<div class="ItemCategoryBox" category_id="<?= h($ItemCategory->id) ?>" >
										<?= h($ItemCategory->name) ?>
									</div>
									
									<div  category_id="<?= h($ItemCategory->id) ?>">
									<?php foreach($ItemCategory->item_sub_categories as $item_sub_category){ ?>
										<div class="ItemSubCategoryBox" category_id="<?= h($ItemCategory->id) ?>" sub_category_id="<?= h($item_sub_category->id) ?>" >
											<?= h($item_sub_category->name) ?>
										</div>
										
										<div  sub_category_id="<?= h($item_sub_category->id) ?>">
										<?php 
										$z=1; $zx=0; 
										foreach($item_sub_category->items as $item){ 
											$zx++;
											if($zx==25){ $zx=1; $z++; }

											if($item->is_favorite==1){
												$fzx++;
												if($fzx==25){ $fzx=1; $fz++; }
												$fav_attr='fav_display_no='.$fz;
											}else{
												$fav_attr='';
											}
											
										?>
											<span class="ItemBox" item_main_category="<?= h($ItemCategory->id) ?>" sub_category_id="<?= h($item_sub_category->id) ?>" item_id="<?= h($item->id) ?>" item_name="<?= h($item->name) ?>" rate="<?= h($item->rate) ?>" is_favorite="<?php echo (int)$item->is_favorite; ?>" display_no="<?php echo $z; ?>" <?php echo $fav_attr; ?>  style="background-color: <?php echo $item->color ?>" gst_per="<?= h($item->tax->tax_per) ?>" >
												<?= h($item->name) ?>
												[<?= h($item->rate) ?>]<br/>
												<p style="font-size:9px;line-height: 10px">
													<?php if($item->description){ echo '('; } ?>
													<?= h($item->description) ?>
													<?php if($item->description){ echo ')'; } ?>
												</p>
											</span>
											
											
											
										<?php } ?>
										</div>
									<?php } ?>
									</div>
									
								<?php } ?>
							</div>
						</div>
					</td>
					<?php echo $this->Form->input('dasds',['value' =>$order_type,'label' => false,'type'=> 'hidden','id'=>'order_type']);?>
					<td valign="top" width="40%" style=" padding: 0px 15px 0px 0px;">
						<div style=" background-color: #FFF; border-radius: 8px !important; padding: 0px 5px;">
							<!--<div style="padding-top:12px">
								<table width="100%">
									<tr>
										<td width="70%" style="padding:0 10px 0 0;">
											<?php
											$options=array(); 
											foreach($Items as $Item){
												$options[]=['text' =>$Item->name, 'value' => $Item->id, 'rate' => $Item->rate, 'gst_per' => $Item->tax->tax_per];
											}
											
											echo $this->Form->input('item_sub_category_id',['options' =>$options,'label' => false,'class'=>'form-control select2me ItemDropDown','empty'=> ' ','autofocus','data-placeholder'=>'Search Item']);?>
										</td>
										<td width="20%" style="padding:0 10px 0 0;">
											<input type="text" class="form-control QtyCatcher" placeholder="Quantity" value="1">
										</td>
										<td width="10%" >
											<span class="AddItemBtn">ADD</span>
										</td>
									</tr>
								</table>
							</div>-->
							<div style="max-height:250px; height:300px; overflow-y:scroll;">
								<div style="padding-top:12px" >
									<table class="table table-striped table-bordered" id="kotBox" style="margin: 0;font-size: 12px;">
										<thead>
											<tr>
												<td style="text-align:center;width: 4%;">S.N.</td>
												<td style="">Name</td>
												<td style="text-align:center;width:70px;">Quantity</td>
												<td style="text-align:center;">Rate</td>
												<td style="text-align:center;">Amt</td>
												<td style="text-align:center;">Dis%</td>
												<td style="text-align:center;">Dis₹</td>
												
											</tr>
										</thead>
										<tbody>
											<?php $i=1; foreach ($itemsList as $key=>$value) {
															$item_id=$value['item_id'];
															$name=$value['name'];
															$rate=$value['rate'];
															$quantity=$value['quantity'];
															$tax_name=$value['tax_name'];
															$tax_per=$value['tax_per'];
															$dis_applicable=$value['dis_applicable'];
															$kot_row_id=$value['kot_row_id'];
															$totamt=$rate*$quantity;
															$total_amount_without_tax+=$totamt;
															$taxamt=round(($totamt*$tax_per)/100,2);
															$total_tax_amount+=$taxamt;
															$showAmt=round($totamt+$taxamt,2);
															$total_amount_with_tax+=$showAmt;
															echo '
															<tr class="mainKotTr" gst_per="'.$tax_per.'" dis_applicable="'.$dis_applicable.'" kot_row_id="'.$kot_row_id.'">
																<td style="text-align:center;">'.$i++.'</td>
																<td item_id="'.$item_id.'">'.$name.'</td>
																<td style="text-align:center;"><span class="minus">-</span><span class="qty"> '.$quantity.' </span><span class="plus">+</span></td>
																<td style="text-align:center;">'.$rate.'</td>
																<td style="text-align:center;">'.$showAmt.'</td>
																<td style="text-align:center;padding:2px;"><input type=text class=disPer readonly /></td><td style="text-align:center;padding:2px;" ><input type=text class=disAmt readonly /></td>
																
															</tr>';
											} ?>
										</tbody>
										<tfoot>
											<tr style=" border-top: solid 1px #CCC; border-bottom: solid 1px #CCC; ">
												<td colspan="2" style="padding:0;">
													<table>
														<tr>
															<td>
																<input type="text" name="offer_code" placeholder="OFFER CODE" style="text-transform:uppercase">
															</td>
															<td>
																<button type="button" class="apply">APPLY</button style="margin: 0">
															</td>
														</tr>
													</table>
													<div id="offerShow"></div>
												</td>
												<td style="text-align:right;" colspan="3"> Overall Discount</td>
												<td align="center"> 
													<input type="text" style="width:25px; height:20px; text-align:center;" id="overalldis" maxlength="100">
												</td>
												<td align="center"> 
												<input type="text" style="width:25px; height:20px; text-align:center;" id="overalldisAmt" maxlength="100">
												</td>
												
												
											</tr>
										</tfoot>
									</table>
	
								</div>
								
							</div>
							
							
							<hr style="margin-bottom: 2px; "></hr> 
						</div>
						<div style="background-color: #FFF; border-radius: 8px !important; padding: 0px 5px; margin-top:3px">
							<div style="padding-top:4px">
								<table width="100%" border="0">
								<tr>
									<td width="70%" style="border-right:5px solid #f5f5f5;" valign="top">
											<table width="100%" id="newCustomerTable" style="display:block;">
												<tr>
													<td style="padding-right: 5px;width: 40%;" width="40%">
														<?php echo $this->Form->input('customer_name',['label' => false,'class'=>'form-control  input-sm customer_name', 'placeholder' => 'Name/Company Name']);?>
													</td>
													<td style="padding-right: 5px;width: 30%;" width="30%">
														<?php echo $this->Form->input('customer_mobile',['label' => false,'class'=>'form-control input-sm allowMobileOnly customer_mobile', 'placeholder' => 'Mobile', 'autocomplete' => 'off', 'maxlength' => '10']);?>
													</td>
													<td style="padding-right: 5px;width: 30%;" width="30%">
														<?php echo $this->Form->input('customer_gst',['label' => false,'class'=>'form-control input-sm customer_gst', 'placeholder' => 'GST No', 'autocomplete' => 'off', 'maxlength' => '20']);?>
													</td>
													
												</tr>
												<tr>
													<?php 
														$BillFor=[];
														if($order_type=="DineIn"){
														$BillFor[]=['text'=>'Regular Bill','value'=>'Regular'];
														$BillFor[]=['text'=>'Complimentry','value'=>'Complimentry'];
														$BillFor[]=['text'=>'Staff','value'=>'Staff'];
														}else{
															$BillFor[]=['text'=>'Regular Bill','value'=>'Regular'];
														}
														
													?>
													<td style="padding-right: 5px;padding-top: 15px;width: 40%;" width="40%">
														<?php echo $this->Form->input('bill_for',['options'=>$BillFor,'class'=>'form-control input-sm select2 bill_for','label'=>false,'required'=>'required']); ?>
													</td>
													
													<td style="padding-right: 5px;padding-top: 15px;width: 30%;display:none" width="30%" class="StaffBill" >
														<?php echo $this->Form->input('staff_employee_id',['options'=>$Employees,'class'=>'form-control input-sm select2 staff_employee_id','label'=>false,'required'=>'required']); ?>
													</td>
													<!--<td style="padding-right: 5px;padding-top: 15px;width: 30%;display:none" width="30%" class="ComplimentryBill" >
														<?php echo $this->Form->input('guest_name',['label' => false,'class'=>'form-control  input-sm guest_name', 'placeholder' => 'Guest Name']);?>
													</td>-->
													<td style="padding-right: 5px;padding-top: 15px;width: 30%;display:none" width="30%" class="ComplimentryBill" >
														<?php echo $this->Form->input('refrence_name',['label' => false,'class'=>'form-control  input-sm refrence_name ', 'placeholder' => 'Refrence Name']);?>
													</td>
													
													
												</tr>
												
											</table>
									</td>
									<td width="30%" valign="top">
										<table width="95%" style="margin-left:2%"  border="0">
											<tr>
												<td height="25px" ><b>Total :</b></td>
												<td width="35%">
													<b>&#8377;</b><b id="taxableValBox">   </b>
												</td>
											</tr>
											<tr>
												<td height="25px" ><b>Tax :</b></td>
												<td width="35%">
													<span data-target="#deletemodal" data-toggle='modal' class="Taxbutn">
														<b> &#8377;</b>
														<b id="gstAmtBox">  </b>
													</span>
												</td>
											</tr>
											<tr>
												<td height="25px" ><b>Round off :</b></td>
												<td width="35%">
													<b> &#8377;</b>
													<b id="rounfOffBox">  </b>
												</td>
											</tr>
											<tr style="background:#eee">
												<td height="25px" ><b>Net :</b></td>
												<td width="35%">
													<b> &#8377;</b>
													<b id="netBox">  </b>
												</td>
											</tr>
											<tr>
												<td colspan="2" height="35px">
													<?php
													echo $this->Form->input('employee_id',['class'=>'form-control input-sm  employee_id','label'=>false,'type'=>'hidden','value'=>@$employee_id,'id'=>'employee_id']);
													?>
												</td>
											</tr>
											<tr>
												<td colspan="2">
													<div style="padding-top:20px;width:100%"  align="center">
														<a href="javascript:void()" class="CreateBill btn blue-hoki " align="center"><i class="fa fa-rupee "></i>: GENERATE BILL (F2) </a>
														</br></br> 
													</div>
												</td>
											</tr>
										</table>
									</td>
								</tr>			
		   
							</div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>
<style> 
#kotBox td{
	padding:2px 0px;
}
.tblBox{
	width: 240px; margin: 10px;
	background-color: #FFF;
    padding: 7px;
    border-radius: 7px !important;
	position: relative;
	margin-bottom:25px;
	display: inline-block;
}
.tblLabel{
	position: absolute;
    top: -15px;
    left: 15px;
    padding: 7px 6px;
    background-color: #FA6E58;
    color: #FEFEFE;
    border-radius: 5px !important;
    font-weight: bold;
}
.tblBox:hover{
	cursor: pointer;
}
.ItemCategoryBox{
    text-align: center;
    border: solid 1px;
    float: left;
    font-size: 12px;
    padding: 8px 16px;
	margin: 3px;
	cursor: pointer;
	background-color:#2D4161;
	color:#FFF;
	border-radius: 5px !important;
	text-align: center;
}

.activeMain{
	background-color: #FA6775;
    color: #FFF;
}

.ItemSubCategoryBox{
    border: solid 1px;
    float: left;
    font-size: 12px;
    padding: 8px 16px;
	margin: 3px;
	cursor: pointer;
	background-color:#848688;
	color:#FFF;
	border-radius: 5px !important;
	text-align: center;
}

.activeSub{
	background-color: #6FB98F;
    color: #FFF;
}


.ItemBox{
    width: 100px;
    height: 90px;
    float: left;
    font-size: 12px;
    padding: 2px 2px;
    margin: 3px;
    cursor: pointer;
    border: solid 1px #d6d6d6;
    background-color: #F5F5F5;
    color: #474445;
    border-radius: 5px !important;
    text-align: center;
}

#BackToTables{
	color: #504358;
	font-size: 14px;
	cursor: pointer
}
#TablesHeading, #KOTHeading{
	color: #f16969;
	font-size: 16px;
}
#billTable{
	tr td{
		padding:2px;
	}
}
.qty{
	width: 50px;
    height: 20px;
    text-align: center; 
}
</style>

<!-- BEGIN PAGE LEVEL STYLES -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->css('/assets/global/plugins/clockface/css/clockface.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datepicker/css/datepicker3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->css('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/select2/select2.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<?php echo $this->Html->css('/assets/global/plugins/jquery-multi-select/css/multi-select.css', ['block' => 'PAGE_LEVEL_CSS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL STYLES -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/clockface/js/clockface.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/select2/select2.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<?php echo $this->Html->script('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<!-- BEGIN COMPONENTS PICKERS -->
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-pickers.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<!-- END COMPONENTS PICKERS -->

	<!-- BEGIN COMPONENTS DROPDOWNS -->
	<?php echo $this->Html->script('/assets/global/scripts/metronic.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/layout.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/quick-sidebar.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/layout/scripts/demo.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>
	<?php echo $this->Html->script('/assets/admin/pages/scripts/components-dropdowns.js', ['block' => 'PAGE_LEVEL_SCRIPTS_JS']); ?>

	<?php echo $this->Html->script('/js/mobile1.4.5.min.js', ['block' => 'MOBILE_JS']); ?>
	<?php echo $this->Html->script('/js/shortcut.js', ['block' => 'MOBILE_JS']); ?>
	<!-- END COMPONENTS DROPDOWNS -->
<!-- END PAGE LEVEL SCRIPTS -->
<?php echo $this->Html->css('/assets/animate.css', ['block' => 'PAGE_LEVEL_CSS']); ?>




<?php
	$waitingMessage='<div align=center><br/><i class="fa fa-gear fa-spin" style="font-size:50px"></i><br/><span style="font-size: 18px; font-weight: bold;">Submitting...</span></div>';
	$waitingMessage2='<div align=center><br/><i class="fa fa-gear fa-spin" style="font-size:50px"></i><br/><span style="font-size: 18px; font-weight: bold;">Loading...</span></div>';
	$successMessage='<div align=center><br/><span aria-hidden=true class=icon-check style="font-size:50px;color: #1AB696; font-weight: bold;"></span><br/><br/><span style="font-size: 18px; color: #727376; font-weight: bold;">KOT Created Successfully.</span><br/></div><div style="text-align:  center;margin-top: 20px;"><span class="closePopup">Close</span></div>';
	$BillSuccessMessage='<div align=center><br/><span aria-hidden=true class=icon-check style="font-size:50px;color: #096609; font-weight: bold;"></span><br/><span style="font-size: 18px; color: #096609; font-weight: bold;">Bill Created</span><div><button type="button" class="btn btn-primary closePopup">Close</button></div></div>';
	$errorMessage='<div align=center><br/><span aria-hidden=true class=icon-close style="font-size:50px;color: #ae0808; font-weight: bold;"></span><br/><span style="font-size: 18px; color: #ae0808; font-weight: bold;">Something went wrong.</span><div><button type="button" class="btn btn-primary closePopup">Close</button></div></div>';
	
	
	$js="
	$(document).ready(function() {
		var order_type=$('#order_type').val();
		var q=$('.ItemCategoryBox').clone();
		$('.ItemCategoryBox').remove();
		$('#CategoryArea').append(q);
		var q=$('.ItemSubCategoryBox').clone();
		$('.ItemSubCategoryBox').remove();
		$('#SubCategoryArea').append(q);
		var q=$('.ItemBox').clone();
		$('.ItemBox').remove();
		$('#ItemArea').html(q);
		
		$('.ItemSubCategoryBox').hide();
		$('.ItemBox').hide();
		
		$('#CategoryArea .ItemCategoryBox').first().show().addClass('activeMain');
		var category_id=$('#CategoryArea .ItemCategoryBox').first().attr('category_id');
		$('.ItemSubCategoryBox[category_id='+category_id+']').show();
		var sub_category_id=$('#SubCategoryArea .ItemSubCategoryBox[category_id='+category_id+']').first().attr('sub_category_id');
		$('#SubCategoryArea .ItemSubCategoryBox[category_id='+category_id+']').first().addClass('activeSub');
		$('.ItemBox[sub_category_id='+sub_category_id+']').show();
		
		$('.fvtr').die().live('click',function(event){
			$('#favStatus').val(1);
			$('.ItemBox[is_favorite=0]').hide();
			$('.ItemBox[is_favorite=1]').show();

			$('.ItemBox').hide();
			$('.ItemBox[is_favorite=1][fav_display_no=1]').show();
		});



		var currentPage=1;
		
		/* var sub_category_id=$('#SubCategoryArea .activeSub').attr('sub_category_id');
		$('.ItemBox').hide();
		$('.ItemBox[sub_category_id='+sub_category_id+'][display_no='+currentPage+']').show();  */
		
		$('.ItemSubCategoryBox[category_id='+category_id+']').removeClass('activeSub');
		 $('.ItemSubCategoryBox[category_id='+category_id+']').addClass('activeSub');
		
		$('.ItemSubCategoryBox[category_id='+category_id+']').show();
		$('.ItemBox').hide();
		$('.ItemBox[item_main_category='+category_id+'][display_no=1]').show();
		
		
		
		$(document).on('change','.bill_for', function(e){
			var temp=$(this);
			var bill_for=$('.bill_for option:selected').val();
			if(bill_for=='Complimentry'){
				$('.ComplimentryBill').css('display','');
				$('.StaffBill').css('display','none');
			}else if(bill_for=='Staff'){
				$('.StaffBill').css('display','');
				$('.ComplimentryBill').css('display','none');
			}else{
				$('.ComplimentryBill').css('display','none');
				$('.StaffBill').css('display','none');
			}
			calculateBill();
		});
		
		


		$('.ItemCategoryBox').die().live('click',function(event){ 
			$('.ItemCategoryBox').removeClass('activeMain');
			$(this).addClass('activeMain');
			var category_id=$(this).attr('category_id');
			$('.ItemSubCategoryBox').hide();
			
			$('.ItemSubCategoryBox[category_id='+category_id+']').removeClass('activeSub');
			$('.ItemSubCategoryBox[category_id='+category_id+']').addClass('activeSub');
			
			$('.ItemSubCategoryBox[category_id='+category_id+']').show();
			$('.ItemBox').hide();
			$('.ItemBox[item_main_category='+category_id+'][display_no=1]').show();
			
			
			
		});

		$('.ItemSubCategoryBox').die().live('click',function(event){
			$('#favStatus').val(0);
			$('.ItemSubCategoryBox').removeClass('activeSub');
			$(this).addClass('activeSub');
			var sub_category_id=$(this).attr('sub_category_id');
			$('.ItemBox').hide();
			$('.ItemBox[sub_category_id='+sub_category_id+'][display_no=1]').show();
			
		});

		//--
		$('.plus').die().live('click',function(event){
			var qty = parseInt($(this).closest('td').find('span.qty').html());
			var news = qty+parseInt(1);
			$(this).closest('td').find('span.qty').html(' '+news+' ');
			amountcals();
		});
		$('.minus').die().live('click',function(event){
			var qty = parseInt($(this).closest('td').find('span.qty').html());
			if(qty !=1 ){
				var news = qty-parseInt(1);
				$(this).closest('td').find('span.qty').html(' '+news+' ');
				amountcals();
			}
		});


		$('.ItemBox').die().live('click',function(event){
			var item_id=$(this).attr('item_id');

			var c = $('table#kotBox tbody tr td[item_id='+item_id+']').length;
			if(c>0){
				var qt= $('table#kotBox tbody tr td[item_id='+item_id+']').closest('tr').find('td:nth-child(3) span.qty').text();

				$('table#kotBox tbody tr td[item_id='+item_id+']').closest('tr').find('td:nth-child(3) span.qty').text(' '+(++qt)+' ');
				amountcals();
				return;
			}

			var item_name=$(this).attr('item_name');
			var rate=$(this).attr('rate');
			var gst_per=$(this).attr('gst_per');
			var c=$('#kotBox tbody tr.mainKotTr').length;
			c=c+1;
			$('#kotBox').append('<tr row_no='+c+' gst_per='+gst_per+' class=mainKotTr><td style=text-align:center;>'+c+'</td><td item_id='+item_id+'>'+item_name+'</td><td style=text-align:center;><span class=\"minus\">-</span><span class=\"qty\"> 1 </span><span class=\"plus\">+</span></td><td style=\"text-align:center;padding: 5px;\">'+rate+'</td><td style=text-align:center;>'+rate+'</td><td style=\"padding:2px;\"><input type=text class=disPer /></td><td style=\"padding:2px;\"><input type=text class=disAmt /></td><td style=text-align:center;><i class=\"fa fa-trash-o removeRow\" style=\"color: #ff0000; font-size: 18px; cursor: pointer;\"></i></td></tr>');
			amountcals();
		});

		

		
		var openDropdawn=1;

		$('.ItemDropDown').keydown(function(event){
			if(openDropdawn > 1)
			{
				$('.select2-container').addClass('select2-container-active  select2-dropdown-open');
				$('.select2-focusser').prop('disabled',true);
			}
			
			$('.select2-drop-active').css('display','block');
			$('.select2-search').find('input').focus();

		});
		
		
		$('.removeRow').die().live('click',function(event){
			$(this).closest('tr').remove();
			var c=0;
			$('#kotBox tbody tr.mainKotTr').each(function(){
				var item_id=$(this).attr('row_no',++c);
				var item_id=$(this).find('td:nth-child(1)').text(c);
			});
			calculateBill();
		});
		
		


		
		$('.CreateBill').die().live('click',function(event){
			
			event.preventDefault();
			
			var postData=[];

			var l= $('#kotBox tbody tr.mainKotTr').length;
			if(!l){
				alert('Select atleast one item.');
				return;
			}

			
			$('#loading').show();
			$(this).text('Saving...');

			$('#kotBox tbody tr.mainKotTr').each(function(){
				var item_id=$(this).find('td:nth-child(2)').attr('item_id');
				var quantity=$(this).find('td:nth-child(3) span.qty').text();
				var rate=$(this).find('td:nth-child(4)').text();
				var amount=$(this).find('td:nth-child(5)').text();
				var comment=$(this).find('textarea.comment').val();
				var discount_per=$(this).find('td:nth-child(6) input').val();
				if(!discount_per){ discount_per=0;}
				var discount_amt=$(this).find('td:nth-child(7) input').val();
				if(!discount_amt){ discount_amt=0;}
				var percen=parseFloat($(this).attr('gst_per'));
				var kot_row_id=parseFloat($(this).attr('kot_row_id'));
				var net_amount=round( ((amount-discount_amt)*(100+percen))/100, 2 );
				postData.push({item_id : item_id, quantity : quantity, rate : rate, amount : amount, comment : comment, discount_per : discount_per, net_amount : net_amount, percen : percen, discount_amt : discount_amt, kot_row_id : kot_row_id}); 
			});
			var order_type=$('#order_type').val();
			var c_name=$('#customer-name').val();
			var c_mobile_no=$('#customer-mobile').val();
			var c_address=$('#customer-address').val();
			var employee_id=$('#employee_id option:selected').val();
			var offer_id=$('span.offer_id').text();
			var taxableVal = parseFloat( $('#taxableValBox').text() );
			var gstAmt = parseFloat( $('#gstAmtBox').text() );
			var total = taxableVal + gstAmt;
			var roundOff = parseFloat( $('#rounfOffBox').text() );
			var net = parseFloat( $('#netBox').text() );
			var oneComment = $('#oneComment').val();
			var payment_type = $('input[name=payment_type]:checked').val();
			
			//Other Information
			var customer_name = $('.customer_name').val();
			var customer_mobile = $('.customer_mobile').val();
			var customer_gst = $('.customer_gst').val();
			
			var bill_for=$('.bill_for option:selected').val();
			var staff_employee_id=$('.staff_employee_id option:selected').val();
			//var guest_name = $('.guest_name').val();
			var refrence_name = $('.refrence_name').val();
			
			
			

			var myJSON = JSON.stringify(postData);
			//alert(myJSON);
			var url='".$this->Url->build(['controller'=>'Bills','action'=>'addMergeKotBill'])."';
			
			kotId= '".$kotId."';
			 url=url+'?myJSON='+myJSON+'&total='+total+'&roundOff='+roundOff+'&net='+net+'&c_name='+c_name+'&c_mobile_no='+c_mobile_no+'&c_address='+c_address+'&order_type='+order_type+'&employee_id='+employee_id+'&offer_id='+offer_id+'&oneComment='+oneComment+'&payment_type='+payment_type+'&c_address='+c_address+'&kot_id='+kotId+'&customer_name='+customer_name+'&customer_mobile='+customer_mobile+'&customer_gst='+customer_gst+'&bill_for='+bill_for+'&staff_employee_id='+staff_employee_id+'&refrence_name='+refrence_name
			
			url=encodeURI(url);
			
			console.log(url);
			$.ajax({
				url: url,
				dataType: 'json'
			}).done(function(response) {
				var url='".$this->Url->build(['controller'=>'Bills','action'=>'view'])."';
				url=url+'?bill-id='+response.bill_id;
				var win = window.open(url, '_blank', 'shilpijain', 'modal=no');
				var url2='".$this->Url->build(['controller'=>'Users','action'=>'Dashboard'])."';
  				window.location.href = url2;
				
			});
		});
		
		$('.disBox').die().live('keyup',function(event){
			var qty           = parseFloat($(this).closest('tr').find('td:nth-child(3)').text());
		    if(isNaN(qty)){ qty=0; }
			var rate          = parseFloat($(this).closest('tr').find('td:nth-child(4)').text());
			if(isNaN(rate)){ rate=0; }
			var discount_per  = parseFloat($(this).closest('tr').find('td:nth-child(6) input').val());
			if(isNaN(discount_per)){ discount_per=0; }
			var amount   = qty*rate;						
			if(discount_per)
			{   
				var disAmt    = (amount*discount_per)/100;
				disAmt  = round(disAmt,2);
			}
			$(this).closest('tr').find('td:nth-child(7) input').val(disAmt);
			calculateBill();
		});
		
		$(document).on('keyup','.disBoxamt',function(e){
			var qty           = parseFloat($(this).closest('tr').find('td:nth-child(3)').text());
		    if(isNaN(qty)){ qty=0; }

			var rate          = parseFloat($(this).closest('tr').find('td:nth-child(4)').text());
			if(isNaN(rate)){ rate=0; }

			var discount_amt  = parseFloat($(this).closest('tr').find('td:nth-child(7) input').val());
			if(isNaN(discount_amt)){ discount_amt=0; }
			
			var amount   = qty*rate;

			if(discount_amt && amount>0)
			{   
				var dis_per   = (discount_amt*100)/amount;
				dis_per = round(dis_per,2);
				
			}
			$(this).closest('tr').find('td:nth-child(6) input').val(dis_per);
			calculateBill();
		});
		
		$('#overalldis').die().live('keyup',function(event){
			var dic = $(this).val();
			$('.disPer').val(dic);
			if(dic <= 100){
			$('#kotBox tbody tr.mainKotTr').each(function(){
				var dis_applicable=parseFloat($(this).attr('dis_applicable'));
					if(dis_applicable==1){
						var per = parseFloat($(this).closest('tr').find('td:nth-child(6) input').val());
						var amount = parseFloat($(this).closest('tr').find('td:nth-child(5)').text());

						var disAmt= round(amount*per/100, 2);
						if(disAmt){
							$(this).closest('tr').find('td:nth-child(7) input').val(disAmt);
						}else{
							$(this).find('.disPer').val(0);
							$(this).closest('tr').find('td:nth-child(7) input').val(0);
						}
					}else{
						$(this).find('.disPer').val(0);
						$(this).closest('tr').find('td:nth-child(7) input').val(0);
					}
				});
			}else{
				$('.disPer').val(100);
				$('#overalldis').val(100);
			}
			
			if(dic==0){
				$('#overalldisAmt').removeAttr('readonly', 'readonly');
			
			}else{
				$('#overalldisAmt').attr('readonly', 'readonly');
			}
			
			calculateBill();
		});	
		
		$('#overalldisAmt').die().live('keyup',function(event){
			var TotdisAmt = parseFloat($(this).val());
			var maxDis=0;
			$('#kotBox tbody tr.mainKotTr').each(function(){
				var dis_applicable=parseFloat($(this).attr('dis_applicable'));
					if(dis_applicable==1){
						var amount = parseFloat($(this).closest('tr').find('td:nth-child(5)').text());
						maxDis=maxDis+amount;
					}
			});
			
			if(maxDis >= TotdisAmt){
				$('#kotBox tbody tr.mainKotTr').each(function(){
					var dis_applicable=parseFloat($(this).closest('tr').attr('dis_applicable'));
					
					if(dis_applicable==1){ 
						var disAmt = parseFloat($(this).val());
						var amount = parseFloat($(this).closest('tr').find('td:nth-child(5)').text());
						
						var disammt = (amount*TotdisAmt)/maxDis;
						var disPer = (TotdisAmt*100)/maxDis;
						var disPer= round(disPer, 2);
						
						if(disammt){
							$(this).closest('tr').find('td:nth-child(6) input').val(disPer);
							$(this).closest('tr').find('td:nth-child(7) input').val(disammt);
						}else{
							$(this).closest('tr').find('td:nth-child(6) input').val(0);
							$(this).closest('tr').find('td:nth-child(7) input').val(0);
						}
					}
				});
			}else{
				$(this).val(0)
			}
			
			if(TotdisAmt==0){
				$('#overalldis').removeAttr('readonly', 'readonly');
			
			}else{
				$('#overalldis').attr('readonly', 'readonly');
			}
			calculateBill();
		});
		
		


		$('.closeCommentBoxKOT').die().live('click',function(event){
			$('#WaitBox9').hide();
		});

		$('.closeCommentBox').die().live('click',function(event){
			$('#WaitBox5').hide();
		});


		$('.commentStringKOT').die().live('click',function(event){
			var s=$(this).text();
			old_s=$('.commentContainorKOT').val();
			if(old_s!=''){
				s=old_s+', '+s;
			}
			
			$('.commentContainorKOT').val(s);
		});

		$('.commentString').die().live('click',function(event){
			var s=$(this).text();
			old_s=$('.commentContainor').val();
			if(old_s!=''){
				s=old_s+', '+s;
			}
			
			$('.commentContainor').val(s);
		});

		$('.saveComment').die().live('click',function(event){
			var c=$('.commentContainor').val();
			var sr_no=$('#rowSR').val();
			if(sr_no=='0'){
				if(c){
					$('#overallComnt').html('<span class=comnt style=\"font-size: 12px;color: #a5a5a5;\">['+c+']</span>');
				}else{
					$('#overallComnt').html('<span class=comnt style=\"font-size: 12px;color: #a5a5a5;\"></span>');
				}
				
				$('#oneComment').val(c);
				$('#WaitBox5').hide();
			}else{
				$('tr[row_no='+sr_no+']').find('.comment').val(c);
				$('tr[row_no='+sr_no+']').find('td:nth-child(2) span.comnt').remove();
				if(c){
					$('tr[row_no='+sr_no+']').find('td:nth-child(2)').append('<span class=comnt style=\"font-size: 11px;color: #a5a5a5;\"><br/>['+c+']</span>');
				}else{
					$('tr[row_no='+sr_no+']').find('td:nth-child(2)').append('<span class=comnt style=\"font-size: 11px;color: #a5a5a5;\"><br/></span>');
				}
				$('#WaitBox5').hide();
			}
			
		});

		$('.saveCommentKOT ').die().live('click',function(event){
			var c=$('.commentContainorKOT').val();
			var kot_id=$('#kot_id').val();
		
			$('.oneCommentOld_'+kot_id).html(c);
			if(c){
				$('span.comntOld_'+kot_id).text('['+c+']');
			}else{
				$('span.comntOld_'+kot_id).text('');
			}
			
			$('#WaitBox9').hide();
		});


		$('.disPer').die().live('keyup',function(event){
			
			
			var dis_applicable=parseFloat($(this).closest('tr').attr('dis_applicable'));
			if(dis_applicable==1){
				var per = parseFloat($(this).val());
				var amount = parseFloat($(this).closest('tr').find('td:nth-child(5)').text());

				var disAmt= round(amount*per/100, 2);
				if(disAmt){
					$(this).closest('tr').find('td:nth-child(7) input').val(disAmt);
				}else{
					$(this).closest('tr').find('td:nth-child(7) input').val('');
				}
				calculateBill();
			}else{
				$(this).val(0);
				$(this).closest('tr').find('td:nth-child(7) input').val(0);
			}
		});

		$('.disAmt').die().live('keyup',function(event){

			var dis_applicable=parseFloat($(this).closest('tr').attr('dis_applicable'));
			if(dis_applicable==1){
				var disAmt = parseFloat($(this).val());
				var amount = parseFloat($(this).closest('tr').find('td:nth-child(5)').text());
				var disPer = (disAmt*100)/amount;
				var disPer = round(disPer, 2);
				if(disPer){
					$(this).closest('tr').find('td:nth-child(6) input').val(disPer);
				}else{
					$(this).closest('tr').find('td:nth-child(6) input').val('');
				}
			}else{
				$(this).val(0);
				$(this).closest('tr').find('td:nth-child(6) input').val(0);
			}
			
			calculateBill();
		});

		$('.KOTComment').die().live('click',function(event){
			var c=$('#oneComment').val();
			$('.commentContainor').val(c);
			var sr_no=0;
			$('#rowSR').val(sr_no);
			$('#WaitBox5').show();
		});

		
		$('#removeoffer').die().live('click',function(event){
			event.preventDefault();
			$('#offerShow').html('');
			
			$('#overalldis').removeAttr('readonly', 'readonly');
			$('.disPer').removeAttr('readonly', 'readonly');
			$('.disAmt').removeAttr('readonly', 'readonly');

			var dic = '';
			$('.disPer').val(dic);
			$('#overalldis').val(dic);
			$('#kotBox tbody tr.mainKotTr').each(function(){
				var per = parseFloat($(this).closest('tr').find('td:nth-child(6) input').val());
				var amount = parseFloat($(this).closest('tr').find('td:nth-child(5)').text());

				var disAmt= round(amount*per/100, 2);
				if(disAmt){
					$(this).closest('tr').find('td:nth-child(7) input').val(disAmt);
				}else{
					$(this).closest('tr').find('td:nth-child(7) input').val('');
				}
			});
			calculateBill();
		});

		$('.apply').die().live('click',function(event){
			var offer_code=$('input[name=offer_code]').val();
			if(!offer_code){
				alert('Enter a offer code');
				return;
			}
			$(this).text('Appling');
			var th=$(this);

			var url='".$this->Url->build(['controller'=>'OfferCodes','action'=>'checkOffer'])."';
			url=url+'?offer_code='+offer_code;
			 
			$.ajax({
				url: url,
				dataType: 'json',
			}).done(function(response) {
				if(response.valid=='yes'){
					$('#overalldis').attr('readonly', 'readonly');
					$('.disPer').attr('readonly', 'readonly');
					$('.disAmt').attr('readonly', 'readonly');

					var dic = response.per;
					$('.disPer').val(dic);
					$('#overalldis').val(dic);
					$('#kotBox tbody tr.mainKotTr').each(function(){
						var dis_applicable=parseFloat($(this).attr('dis_applicable'));
						if(dis_applicable==1){
							var per = parseFloat($(this).closest('tr').find('td:nth-child(6) input').val());
							var amount = parseFloat($(this).closest('tr').find('td:nth-child(5)').text());

							var disAmt= round(amount*per/100, 2);
							if(disAmt){
								$(this).closest('tr').find('td:nth-child(7) input').val(disAmt);
							}else{
								$(this).closest('tr').find('td:nth-child(7) input').val('');
							}
						}else{
							$(this).closest('tr').find('.disPer').val(0);
							$(this).closest('tr').find('td:nth-child(7) input').val(0);
						}
						
					});
					calculateBill();

					$('#offerShow').html('Offer code applied: '+offer_code+'@'+response.per+'% <span class=offer_id style=\"display:none;\">'+response.offer_id+'</span> <a href=# id=removeoffer >Remove</a> ');

				}else{
					alert('The offer code is not valid.');
				}
				th.text('APPLY');
				$('input[name=offer_code]').val('');
			});


		});


		$('#closeWaitBox6').die().live('click',function(event){
			$('#WaitBox6').hide();
		});

		$('#AddCustomer').die().live('click',function(event){
			$('#WaitBox6').show();
		});


		$('#closeWaitBox7').die().live('click',function(event){
			$('#WaitBox7').hide();
		});

		$('#UpdateCustomer').die().live('click',function(event){
			 	var customer_name = $('#c_name').val();
			 	if(!customer_name){
					alert('Provide name.');
					return;
				}
		        var customer_mobile = $('#c_mobile_no').val();
		        var customer_email = $('#c_email').val();
		        var customer_dob = $('#dob').val();
		        var customer_anniversary = $('#doa').val();
		        var customer_address = $('#c_address').val();

		        var url='".$this->Url->build(['controller'=>'Customers','action'=>'saveCommentInfo'])."';
		        url=url+'?customer_name='+customer_name+'&customer_mobile='+customer_mobile+'&customer_email='+customer_email+'&customer_dob='+customer_dob+'&customer_anniversary='+customer_anniversary+'&customer_address='+customer_address;
		        url=encodeURI(url);
		        $.ajax({
		            url: url,
		        }).done(function(response) {

		            $('#WaitBox7').hide();

		            var customer_id = $('#EditCustomer').attr('customer_id');
		            var url='".$this->Url->build(['controller'=>'Customers','action'=>'customerSection'])."';
					url=url+'?customer_id='+customer_id;
					$.ajax({
						url: url,
					}).done(function(htm) {
						$('#customerSection').html(htm);
					})

		        });
		});

		$('#EditCustomer').die().live('click',function(event){
			$('#WaitBox7').show();
			var customer_id = $(this).attr('customer_id');
			var url='".$this->Url->build(['controller'=>'Customers','action'=>'fetchCustomerInfo'])."';
			url=url+'?customer_id='+customer_id;
			$.ajax({
				url: url,
			}).done(function(response) {
				$('#WaitBox7 div.modal-body').html(response);
				$('.date-picker').datepicker();
			});
		});
		
		$('#FetchCusInfo').die().live('click',function(event){
			var customer_name = $('#customer-name').val();
			var customer_mobile = $('#customer-mobile').val();
			if(!customer_name){
				alert('Provide name.');
				return;
			}
			var url='".$this->Url->build(['controller'=>'Customers','action'=>'saveNewCustomer'])."';
			url=url+'?customer_name='+customer_name+'&customer_mobile='+customer_mobile;
			$.ajax({
				url: url,
			}).done(function(response) {

				var url='".$this->Url->build(['controller'=>'Customers','action'=>'customerSection'])."';
				url=url+'?customer_id='+response;
				$.ajax({
					url: url,
				}).done(function(htm) {
					$('#customerSection').html(htm);
				})

			});
		});

		$('#closeWaitBox7').die().live('click',function(event){
			$('#WaitBox7').hide();
		});

	


		shortcut.add('F2', function() {
		    $('.CreateBill').trigger('click');
		});


		$('.closepopup10').die().live('click',function(event){
			$('table#taxDetails tbody').html('');
			$('#popup10').hide();
		});


		ComponentsPickers.init();


	});

	
	function UpdateCustmber(){
		var table_id=$('#tableInput').val();
		var url='".$this->Url->build(['controller'=>'Kots','action'=>'customer'])."';
		url=url+'?table_id='+table_id;
		 
		$.ajax({
			url: url,
		}).done(function(response) { 
			$('#customer_info').html(response);
		});
	}
	amountcals();
	function amountcals(){
		$('#kotBox tbody tr.mainKotTr').each(function(){
			var quantity=parseInt($(this).find('td span.qty').html());
			var rate=parseInt($(this).find('td:nth-child(4)').text());
			var tot_amount=quantity*rate;
			$(this).find('td:nth-child(5)').text(tot_amount);

			var per = parseFloat($(this).find('td:nth-child(6) input').val());
			var amount = parseFloat($(this).find('td:nth-child(5)').text());

			if(per){
				var disAmt = round(amount*per/100, 2);
			}else{
				var disAmt = 0;
			}

			if(disAmt==0){
				disAmt = '';
			}
			
			$(this).find('td:nth-child(7) input').val(disAmt);

		});
		calculateBill();
	}

	function calculateBill(){
			var total=0; var total_taxable_value=0; var total_gst=0;
			$('#kotBox tbody tr.mainKotTr').each(function(){ 
				var quantity=parseFloat($(this).find('td:nth-child(3) span.qty').text());
				var rate=parseFloat($(this).find('td:nth-child(4)').text());
				var amount=quantity*rate;
				var discount_amount=parseFloat($(this).find('td:nth-child(7) input').val());
				
				if(discount_amount){ 
				 	taxable_value=round(amount-discount_amount,2);
 				}else{
 					taxable_value=amount;
 					discount_amount=0;
 				}
				
				var percen=parseFloat($(this).attr('gst_per'));
				var tmp=percen+100;
				var taxamount=round((taxable_value*percen)/tmp,2);
				total_gst=total_gst+taxamount;
				
				var taxable_value=taxable_value-taxamount;
 				total_taxable_value=total_taxable_value+taxable_value;

				
			});
			total_taxable_value = round(total_taxable_value, 2);
			$('#taxableValBox').html(total_taxable_value);
			total_gst = round(total_gst, 2);
			$('#gstAmtBox').html(total_gst);

			var net=total_taxable_value+total_gst;
			var netAfterRound = round(net);
			var roundOff = round(netAfterRound-net, 2);

			$('#rounfOffBox').html(roundOff);
			
			var bill_for=$('.bill_for option:selected').val();
			if(bill_for=='Complimentry'){
				$('#netBox').html(0);
			}else{
				$('#netBox').html(netAfterRound);
			}
			
			


		}	
	";



$js.="
	$(document).keydown(function(e) {
	    switch(e.which) {
	        case 37: // left
	       	var focused = $(':focus');
			var row_no=focused.attr('row_no');
			var column_no=focused.attr('column_no');
			column_no--;
			$('input[row_no='+row_no+'][column_no='+column_no+']').focus();
			break;

			case 39: // right
	       	var focused = $(':focus');
			var row_no=focused.attr('row_no');
			var column_no=focused.attr('column_no');
			column_no++;
			$('input[row_no='+row_no+'][column_no='+column_no+']').focus();
			break;

			case 40: // down
			var focused = $(':focus');
			var row_no=focused.attr('row_no');
			var column_no=focused.attr('column_no');
			row_no++;
			$('input[row_no='+row_no+'][column_no='+column_no+']').focus();
			break;

			case 38: // up
			var focused = $(':focus');
			var row_no=focused.attr('row_no');
			var column_no=focused.attr('column_no');
			row_no--;
			$('input[row_no='+row_no+'][column_no='+column_no+']').focus();
			break;
	       

	        default: return; // exit this handler for other keys
	    }
	    e.preventDefault(); // prevent the default action (scroll / move caret)

	    
	});
";




echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));
?>




<div data-role="page" id="pageone" style="display: ;">
  

	<div data-role="main" class="ui-content">
		
	</div>

	
</div> 

<div id="WaitBox" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>

<div id="WaitBox2" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>

<div id="WaitBox3" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop " ></div>
	<div class="modal-dialog modal-full">
		<div class="modal-content">
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>

<div id="WaitBox4" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
			</div>
		</div>
	</div>
</div>

<div id="WaitBox5" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<input type="hidden" id="rowSR">
				<div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">COMMENT BOX</div>
				<br/>
				<div class="form-group">
					<textarea class="form-control commentContainor" rows="3" style="background-color: #F5F5F5;"></textarea>
				</div>
				<br/>
				<div>
					<label style=" color: #2D4161; font-weight: bold; font-size: 14px; ">Predefined Comments</label>
					<div>
						<?php foreach ($Comments as $Comment) { ?>
							<span class="commentString"><?php echo $Comment; ?></span>
						<?php } ?>
					</div>
				</div>
				<br/><br/>
				<div align="center">
					<span class="closeCommentBox">CLOSE</span>
					<span class="saveComment">SAVE COMMENT</span>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- <div id="WaitBox6" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<form method="post" id="customerForm">
					<input type="hidden" name="table_id" value="<?php echo $table_id; ?> ">
					<div align="center"><span style=" color: #2D4161; font-weight: bold; font-size: 14px; ">CUSTOMER INFORMATION</span></div>
					<div>
						<div style="padding: 5px 25px; ">
							<br>
							<table width="100%">
								<tr>
									<td style="padding-right: 5px;">
										<div class="input-icon">
											<i class="fa fa-user"></i>
											<input type="text" class="form-control" placeholder="Name" style="background-color: #f5f5f5 !important" name="c_name" id="c_name" value="" required="required">
										</div><br>
									</td>
									<td style="padding-right: 5px;">
										<div class="input-icon">
											<i class="fa fa-mobile" style="font-size: 20px;"></i>
											<input type="text" class="form-control" placeholder="Mobile" style="background-color: #f5f5f5 !important" name="c_mobile_no" id="c_mobile_no" value="" maxlength="10" minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" required="required" minlength="10">
										</div><br>
									</td>
								</tr>
								<tr>
									<td style="padding-right: 5px;">
										<div class="input-icon">
											Date of Birth<i class="fa fa-child"></i>
											<input type="date" class="form-control" placeholder="Date of Birth" style="background-color: #f5f5f5 !important" name="dob" id="dob" value="">
										</div>
									</td>
									<td style="padding-left: 5px;">
										<div class="input-icon">
											Date of Anniversary<i class="fa fa-empire"></i>
											<input type="date" class="form-control" placeholder="Date of Anniversary" style="background-color: #f5f5f5 !important" name="doa" id="doa" value="">
										</div>
									</td>
								</tr>
							</table>
							<br>
							<div class="input-icon">
								<i class="fa fa-envelope-square" style="font-size: 20px;"></i>
								<input type="text" class="form-control" placeholder="Email" style="background-color: #f5f5f5 !important" name="c_email" id="c_email" value="">
							</div>
							<br>
							<textarea rows="4" cols="50" placeholder="Address..." name="c_address" id="c_address" style="line-height: 20px; background: whitesmoke;resize: none;" class="form-control"></textarea>
						</div>
						<br/>
						<div align="center">
							<button type="button" class="btn " id="closeWaitBox6">CLOSE</button>
							<button type="button" class="btn btn-danger" id="SaveNewCustomer">SAVE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div> -->


<div id="WaitBox7" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<div align="center">Loading...</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" id="favStatus" value="0">

<div id="WaitBox8" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<input type="hidden" id="rowSRold">
				<div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">COMMENT BOX</div>
				<br/>
				<div class="form-group">
					<textarea class="form-control commentContainorOld" rows="3" style="background-color: #F5F5F5;"></textarea>
				</div>
				<br/>
				<div>
					<label style=" color: #2D4161; font-weight: bold; font-size: 14px; ">Predefined Comments</label>
					<div>
						<?php foreach ($Comments as $Comment) { ?>
							<span class="commentStringOld"><?php echo $Comment; ?></span>
						<?php } ?>
					</div>
				</div>
				<br/><br/>
				<div align="center">
					<a href="javascript:void(0)" class="closeCommentBoxOld btn default">CLOSE</a>
					<a href="javascript:void(0)" class="saveCommentOld btn btn-danger">SAVE COMMENT</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="WaitBox9" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<input type="hidden" id="kot_id">
				<div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">COMMENT BOX</div>
				<br/>
				<div class="form-group">
					<textarea class="form-control commentContainorKOT" rows="3" style="background-color: #F5F5F5;"></textarea>
				</div>
				<br/>
				<div>
					<label style=" color: #2D4161; font-weight: bold; font-size: 14px; ">Predefined Comments</label>
					<div>
						<?php foreach ($Comments as $Comment) { ?>
							<span class="commentStringKOT"><?php echo $Comment; ?></span>
						<?php } ?>
					</div>
				</div>
				<br/><br/>
				<div align="center">
					<a href="javascript:void(0)" class="closeCommentBoxKOT btn default">CLOSE</a>
					<a href="javascript:void(0)" class="saveCommentKOT btn btn-danger">SAVE COMMENT</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="popup10" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<table id="taxDetails" class="table table-bordered">
					<thead>
						<th>Item</th>
						<th>Qty</th>
						<th>Rate</th>
						<th>Amount</th>
						<th>Dis Amt</th>
						<th>GST %</th>
						<th>GST Rs</th>
						<th>Net</th>
					</thead>
					<tbody>
						
					</tbody>
					<tfoot>
						<tr>
							<td style="text-align: right;" colspan="6"><b>Total Discount</b></td>
							<td style="text-align: right;"></td>
						</tr>
						<tr>
							<td style="text-align: right;" colspan="6"><b>Total CGST</b></td>
							<td style="text-align: right;"></td>
						</tr>
						<tr>
							<td style="text-align: right;" colspan="6"><b>Total SGST</b></td>
							<td style="text-align: right;"></td>
						</tr>
					</tfoot>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default closepopup10">Close</button>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.ui-loader{
		display: none;
	}
	#pageone{
		display: none;
	}
</style>