<?php $this->set("title", 'Dashboard | '.$coreVariable['company_name']); ?>

<style type="text/css">
.top{
	margin-top: 5px;
}
</style>
<?php echo $this->Html->css('mystyle'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light" style="border-radius: 0;">
				<div class="caption top-caption">
					<span style="color:#67686B;float:left;font-size:19px;padding-left:30px;padding-top: 7px;">Today's Total Sales: </span>
					<h3 style="color:#ef5f3f;float:left;margin:0;padding-left:17px;font-weight: 400;font-size:19px;line-height:25px;padding-top:7px;">&#8377; <?php if($TotalSale>0){echo $TotalSale;} else {echo 0; }?></h3>
				</div>
			</div> 
		</div>
	</div>	
	<div class="row">
		<div class="col-md-3 top">
			<div class="light  smalldiv" style="border-radius: 5px">
				<table border="0" width="100%">
					<tr>
						<td width="20%">
							<div style="float:left; width:7%; background-image:url('<?php echo $this->Url->build(['controller' =>'/img/Dine.png']); ?>');background-size:100%;padding: 30px;"></div>
							 
						</td>
						<td width="40%" style="padding-left: 8px;">
							<div style="float:left;color: #858789; padding:18px 0px;">
								<h6 style="font-size: 15px;font-weight: 200;color: #7E8082;"><?php echo $TotalOrdeDinner; ?></h6>
								<h6 style="font-size: 15px;font-weight: 200;color: #7E8082;">Dine In</h6>
								<div class="w3-light-grey">
									<div class="w3-orange" style="height:2px;width:50%"></div>
								</div>
							</div>
						</td>
						<td width="40%">
							<div style="float:left; padding:0px;">
								<h5 style="font-size:18px;font-weight: 500;line-height: 56px;"> &#8377; <?php echo $TotalSaleDinner; ?></h5>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-3 top">
			<div class="light  smalldiv" style="border-radius: 5px">
				<table border="0" width="100%">
					<tr>
						<td width="20%">
							<div style="float:left; width:7%; background-image:url('<?php echo $this->Url->build(['controller' =>'/img/Take.png']); ?>');background-size:100%;padding: 30px;"></div>
						</td>
						<td width="40%" style="padding-left: 8px;">
							<div style="float:left;color: #858789; padding:18px 0px;">
								<h6 style="font-size: 15px;font-weight: 200;color: #7E8082;"><?php echo $TotalOrdeTakeAway;?></h6>
								<h6 style="font-size: 15px;font-weight: 200;color: #7E8082;">Parcel</h6>
								<div class="w3-light-grey">
									<div class="w3-orange" style="height:2px;width:50%"></div>
								</div>
							</div>
						</td>
						<td width="40%">
							<div style="float:left; padding:0px;">
								<h5 style="font-size:18px;font-weight: 500;line-height: 56px;"> &#8377; <?php echo $TotalSaleTakeAway;?></h5>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="col-md-3 top">
			<div class="light  smalldiv" style="border-radius: 5px">
				<table border="0" width="100%">
					<tr>
						<td width="20%">
							<div style="float:left; width:7%; background-image:url('<?php echo $this->Url->build(['controller' =>'/img/Delivery.png']); ?>');background-size:100%;padding: 30px;"></div>
						</td>
						<td width="40%" style="padding-left: 8px;">
							<div style="float:left;color: #858789; padding:18px 0px;">
								<h6 style="font-size: 15px;font-weight: 200;color: #7E8082;"><?php echo $TotalOrdeODelevery; ?></h6>
								<h6 style="font-size: 15px;font-weight: 200;color: #7E8082;">Delivery </h6>
								<div class="w3-light-grey">
									<div class="w3-orange" style="height:2px;width:50%"></div>
								</div>
							</div>
						</td>
						<td width="40%">
							<div style="float:left; padding:0px;">
								<h5 style="font-size:18px;font-weight: 500;line-height: 56px;"> &#8377; <?php echo $TotalSaleDelevery; ?></h5>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</div>


		<div class="col-md-3 top">
			<div class="dashboard-stat goToBrithday" style="height: 120px;; background-image: linear-gradient(to right, #ed693f, #f05c3f, #f24e41, #f43d45, #f52549);cursor: pointer;">
				<div class="visual">
					<i class="fa fa-birthday-cake" style=" color: #ffffff57; font-size: 80px; padding-top: 29px;color: #f2744e;"></i>
				</div>
				<!--<div class="details" style="right: 50px;padding-right: 0px;">
					<div style="text-align:center;color:#FFF;font-size:14px;margin: 20px 0px;">
						<span style="font-size: 16px;"><?= h($upcommingBirthdayAnniversary) ?></span><br/>
						<span >Upcoming </span><br/>
						<span >Brithday & Anniversary</span>
					</div>
				</div>-->
			</div>
		</div>
	</div>

<div style="background: #EBEEF3;">
	
	<div class="row TableView" style="padding:10px;">
		<div class="col-md-12"  align="center">
			<div class="portlet box green-meadow">
				<div class="portlet-title" align="center">
					<div class="caption" style="text-align:center">
						<i class="fa fa-table" ></i>Pending Order
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse" data-original-title="" title="">
						</a>
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					 <table class="table table-str " cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Sr.N0.</th>
                            <th scope="col">Order.N0.</th>
                            <th scope="col">KOT.N0.</th>
                            <th scope="col">Captain Name</th>
                            <th scope="col">Table No</th>
                            <th scope="col">Type</th>
                            <th scope="col">No of Pax</th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($PendingKots as $bill):?>
                        <tr>
                            <td><?= h(++$i) ?></td>
                            <td></td>
                            <td></td>
                            <td><?= h(@$bill->employee->name) ?></td>
                            <td>
							<?php if($bill->table->capacity <= @$bill->no_of_pax){ ?>
							<?= h(@$bill->table->name) ?>
							<?php }else{ ?>
							<?php echo(@$bill->table->name.$bill->table_no) ?>
							<?php } ?>
							</td>
                            <td><?= h(@$bill->order_type) ?></td>
                            <td><?= h(@$bill->no_of_pax) ?></td>
							<td>
							 <?php
                                    echo $this->Html->link('Approve/Genrate KOT ', '/PendingKots/generateKot/'.$bill->id, ['class' => 'btn btn-xs blue']);
                                 ?>
								<a href="#" class="btn btn-xs red Cancel" bill_id="<?php echo $bill->id; ?>">Cancel </a>
							</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
				</div>
		</div>
	</div>
	</div>
	
	<div class="row TableView" style="padding:10px;">
		<div class="col-md-12"  align="center">
			<div class="portlet box green-meadow">
				<div class="portlet-title" align="center">
					<div class="caption" style="text-align:center">
						<i class="fa fa-table" ></i>Pending Bills
					</div>
					<div class="tools">
					<a href="#" class="btn btn-xs red MergeBill" style="padding-right:20px;display:none">Merge Bill</a>
					
						
						
					</div>
				</div>
				<div class="portlet-body form" style="display: block;">
					 <table class="table table-str " cellpadding="0" cellspacing="0" id="mainTb">
                    <thead>
                        <tr>
                            <th scope="col">Sr.No.</th>
                            <th scope="col">KOT/BILL.No.</th>
                            <th scope="col">Captain Name</th>
                            <th scope="col">Table No</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($PendingBillAmt as $bill): ?>
                        <tr class="mainTr">
                           
						   <td><?= h(++$i) ?></td>
                           <td>
						   <?php echo
						   $this->Html->link($bill->voucher_no,['controller'=>'Bills','action' => 'view2', $bill->id],['target'=>'_blank']); 
						   ?>
						  </td>
                           <td><?= h(@$bill->employee->name) ?></td>
						   <td>
                            
							<?php echo(@$bill->table->name.$bill->pending_kot->table_no) ?>
							
							</td>
                            <td><?= h(@$bill->order_type) ?></td>
                            <td>
								<?php
										echo "Payment Pending";
									 
								?>
							</td>
                            <td>
							<a href="#" class="btn btn-xs purple paymentRecive" bill_id="<?php echo $bill->id; ?>">Recive Payment </a>
							</td>
                        </tr>
                        <?php endforeach; ?>
						
						<?php $i=$i; foreach ($PendingBills as $bill): ?>
                        <tr class="mainTr">
                            <td><?= h(++$i) ?>
							<?php if(@$bill->bill_pending=="Yes" && @$bill->order_type=='DineIn'){ ?>
										<input type="checkbox" class="liChild selectChek" value="<?php echo $bill->id; ?>" name="mergeKot[]">
								<?php } ?>
							
							</td>
                             <td><?= h(@$bill->voucher_no) ?></td>
                           <td><?= h(@$bill->employee->name) ?></td>
						   <td>
                            <?php if($bill->table->capacity <= @$bill->pending_kot->no_of_pax){ ?>
							<?= h(@$bill->table->name) ?>
							<?php }else{ ?>
							<?php echo(@$bill->table->name.$bill->pending_kot->table_no) ?>
							<?php } ?>
							</td>
                            <td><?= h(@$bill->order_type) ?></td>
                            <td>
								<?php 	if(@$bill->bill_pending=="Yes"){ 
										echo "Bill Pending";
										}else if(@$bill->bill_pending=="No"){ 
										echo "Payment Pending";
									} 
								?>
							</td>
                            <td>
							 <?php
								 if(@$bill->bill_pending=="Yes"){ 
                                    echo $this->Html->link('Genrate Bill ', '/Kots/generate/'.$bill->pending_kot_id.'/'.$bill->order_type, ['class' => 'btn btn-xs blue']);
                                    
									echo $this->Html->link('Express Bill ', '/Bills/view2?bill-id='.$bill->id, ['class' => 'btn btn-xs green','target'=>'_blank']); 
								  } ?>
								
							</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
				</div>
		</div>
	</div>
	</div>
	
</div>
		<?php echo $this->Html->script('/assets/global/plugins/jquery.min.js'); ?>	

	<?php
	$js="
	$(document).ready(function() { 
		$('.goToBrithday').die().live('click',function(event){
			var url='".$this->Url->build(['controller'=>'Customers','action'=>'birthdayList'])."';
			var win = window.open(url, '_blank');
		});

		var url='".$this->Url->build(['controller'=>'Bills','action'=>'categoryWiseSales'])."';
		$.ajax({
			url: url,
		}).done(function(response) {
			$('#categoryWiseSales').html(response);
		});
		
		$('.selectChek').live('click', function(){
			var chkSize=0;
			 $('#mainTb tbody tr.mainTr').each(function(){
				if($(this).find('.selectChek').prop('checked') == true){
					chkSize++;
				} 
			});
            if(chkSize > 1){
               $('.MergeBill').css('display','block');
            }else{
				$('.MergeBill').css('display','none');
			}
            
			
         });
		 $('.MergeBill').live('click', function(){ 
			var postData=[];
			$('#mainTb tbody tr.mainTr').each(function(){
				if($(this).find('.selectChek').prop('checked') == true){  
					var kot_id=$(this).find('.selectChek').val(); 
					postData.push({kot_id : kot_id});
				} 
			});
			var myJSON = JSON.stringify(postData);
			var url='".$this->Url->build(['controller'=>'Kots','action'=>'addMergeKotBill'])."';
			url=url+'?myJSON='+myJSON;
			window.location.href = url;
			
		 });
		 
		
	});	
	
	
	
	$('.closeCommentBoxKOT').die().live('click',function(event){
			$('#new_one').hide();
	});
	
	
	$('.paymentRecive').die().live('click',function(event){
			var bill_id=$(this).attr('bill_id');
			$('.saveCommentKOT').attr('bill_id',bill_id);
			$('#new_one').show();
	});
	$('.saveCommentKOT').die().live('click',function(event){
			var comment=$('.commentContainorKOT').val();
			var bill_id=$(this).attr('bill_id');
			var chk=$('#checkbox_id:checked').val();
			
			var url='".$this->Url->build(['controller'=>'Bills','action'=>'updatePaymentStatus'])."';
			url=url+'?bill_id='+bill_id+'&payment_type='+chk+'&payment_comment='+comment;
			$.ajax({
				url: url,
				dataType: 'json'
			}).done(function(response) {
				$('#new_one').hide();
  				location.reload();
				
			});
			
	});
	
	
	$('.closeCanle').die().live('click',function(event){
			$('#cancle_kot').hide();
	});
	$('.Cancel').die().live('click',function(event){
			var bill_id=$(this).attr('bill_id');
			$('.cancelKOT').attr('Pending_kot_id',bill_id);
			$('#cancle_kot').show();
	});
	
	$('.cancelKOT').die().live('click',function(event){
			var comment=$('.commentCancleKOT').val();
			var Pending_kot_id=$(this).attr('Pending_kot_id');
			
			var url='".$this->Url->build(['controller'=>'PendingKots','action'=>'cancleKot'])."';
			url=url+'?Pending_kot_id='+Pending_kot_id+'&comment='+comment;
			
			$.ajax({
				url: url,
				dataType: 'json'
			}).done(function(response) {
				$('#cancle_kot').hide();
  				location.reload();
				
			});
			
	});
	
	
	
	
	";

	echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));
	?>
	
	<div id="new_one" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 22px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<input type="hidden" id="kot_id">
				<div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">PAYMENT TYPE</div>
				<br/>
				<div class="form-group">
					<textarea class="form-control commentContainorKOT" rows="3" style="background-color: #F5F5F5;" placeholder="Comment"></textarea>
				</div>
				<br/>
				<div>
				<div class="form-group">
					<div id="customerSection"></div>
						<table width="100%"> 
							<tr>
								<td>
									<label class="radio-inline"><input type="radio" name="payment_type" value="Cash" id="checkbox_id" checked> Cash  </label>
								</td>
								<td>
									<label class="radio-inline "><input type="radio" name="payment_type" value="Card" id="checkbox_id"> Card  </label>
								</td>
								<td>
									<label class="radio-inline "><input type="radio" name="payment_type" value="Paytm" id="checkbox_id"> Paytm </label>
								</td>
							</tr>
						</table>
				</div>	
				</div>
				<br/><br/>
				<div align="center">
					<a href="javascript:void(0)" class="closeCommentBoxKOT btn default">CLOSE</a>
					<a href="javascript:void(0)" table_id="" class="saveCommentKOT btn btn-danger">RECEIVE</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="cancle_kot" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 22px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<input type="hidden" id="kot_id">
				<div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">REASON</div>
				<br/>
				<div class="form-group">
					<textarea class="form-control commentCancleKOT" rows="3" style="background-color: #F5F5F5;" placeholder="Comment"></textarea>
				</div>
				<br/>
				<div>
					
				</div>
				<br/><br/>
				<div align="center">
					<a href="javascript:void(0)" class="closeCanle btn default">CLOSE</a>
					<a href="javascript:void(0)" Pending_kot_id="" class="cancelKOT btn btn-danger">OK</a>
				</div>
			</div>
		</div>
	</div>
</div>