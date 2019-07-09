<?php echo $this->Html->css('mystyle'); ?>

<?php $this->set("title", 'Bills | DOSA PLAZA'); ?>

<div style="height: 15px;" >.</div>
<div class="row">
    <div class="col-md-12 main-div">
        <!-- BEGIN ALERTS PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    Bills
                </div>
                <div class="tools">
                </div>
                <div class="actions"></div>
                <div class="row">   
                        <div class="col-md-12 horizontal "></div>
                </div>
            </div>
            <div class="portlet-body">
                <form method="GET">
                    <div align="center">
                        <table>
                            <tr>
                                
                                <td valign="bottom">
                                    <?php 
                                    if(@$from_date=="1970-01-01" or $from_date==""){
                                        $PrintDate1 = "";
                                    }else{
                                        $PrintDate1 = date('d-m-Y', strtotime($from_date));
                                    } ?>
                                    <label>From Date</label>
                                    <input class="form-control date-picker" placeholder="From Date" name="from_date" value="<?php echo @$PrintDate1; ?>" data-date-format="dd-mm-yyyy" placeholder="Date" autocomplete="off">
                                </td>
                                <td valign="bottom">
                                    <?php 
                                    if(@$to_date=="1970-01-01" or $to_date==""){
                                        $PrintDate2 = "";
                                    }else{
                                        $PrintDate2 = date('d-m-Y', strtotime($to_date));
                                    } ?>
                                    <label>To Date</label>
                                    <input class="form-control date-picker" placeholder="To Date" name="to_date" value="<?php echo @$PrintDate2; ?>" data-date-format="dd-mm-yyyy" placeholder="Date" autocomplete="off">
                                </td>
                              
                                <td valign="bottom">
                                    <input type="text" class="form-control" placeholder="Name" name="customer_name" value="<?php echo @$customer_name; ?>">
                                </td>
                                <td valign="bottom">
                                    <input type="text" class="form-control" placeholder="Mobile" name="mobile_no" value="<?php echo @$mobile_no; ?>">
                                </td>
                                <td valign="bottom">
                                    <input type="text" class="form-control" placeholder="Code" name="customer_code" value="<?php echo @$customer_code; ?>">
                                </td>
                                <td valign="bottom">
                                    <button type="submit" class="btn" style="background-color: #FA6775;color: #FFF;">Filter</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
                <br>
              
                 <?php $page_no=$this->Paginator->current('Bills'); $page_no=($page_no-1)*20; ?>
                <table class="table table-str " cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">Sr.N.</th>
                            
                            <th scope="col"><?= $this->Paginator->sort('transaction_date', 'Transaction Date') ?></th>
							<th scope="col"><?= $this->Paginator->sort('voucher_no', 'Kot No') ?></th>
							<th scope="col"><?= $this->Paginator->sort('voucher_no', 'Bill No') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('order_type') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Customers.name', 'Customer') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Customers.customer_code', 'Customer Code') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('Customers.mobile_no', 'Mobile') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kots as $kot): //pr($kot); exit; ?>
                        <tr>
                            <td><?= h(++$page_no) ?></td>
							<td><?= h($kot->created_on->format('d-m-Y')) ?></td>
                            <td><?= h($kot->voucher_no) ?></td>
                            <td><?= h($kot->bill->voucher_no) ?></td>
                           <td><?= h(ucfirst($kot->order_type)) ?></td>
                            <td><?= h(@$kot->customer->name) ?></td>
                            <td><?= h(@$kot->customer->customer_code) ?></td>
                            <td><?= h(@$kot->customer->mobile_no) ?></td>
                            <td class="actions">
								<a href="javascript:void(0)" class=" btn btn-xs blue" data-toggle="modal" data-target="#WaitBox<?php echo @$kot->id; ?>" >Reprint</a>
								<form action="reprintKot" method="POST">
									<div id="WaitBox<?php echo @$kot->id; ?>" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
										<div class="modal-backdrop fade in" ></div>
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-body">
													<input type="hidden" name="kot_id" value="<?php echo @$kot->id; ?>">
													<div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">Reason for Re-Print</div>
													<br/>
													<div class="form-group">
														<textarea name="cmt" class="form-control commentContainor" rows="3" style="background-color: #F5F5F5;"></textarea>
													</div>
													<br/>
													<div align="center">
														<a href="javascript:void(0)" qwe="<?php echo @$kot->id; ?>" class="closeCommentBoxKOT btn default">CLOSE</a>
														<button type="submit" class="btn btn-danger btn-sm" id="SaveNewCustomer">Save</button>
													</div>
												</div>
											</div>
										</div>
									</div>
								</form>
                                <?php if($coreVariable['current_software']=='Actual'){ ?>
                                <?php
								//echo $this->Form->input('kot_id',['type'=>'hidden','id'=>'KotId','value'=>@$kot->id]);
									
                                   
                                   /*  if (in_array("50", $userPages)){
								   echo $this->Html->link('Re-Print ', '/Kots/reprintKot/'.$kot->id, ['class' => 'btn btn-xs blue KOTComments ','target'=>'_blank']); } */ ?>
										
							    	<?php  
										
                                    
                                   ?>
                                    
                                <?php } ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->first('<< ' . __('first')) ?>
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                        <?= $this->Paginator->last(__('last') . ' >>') ?>
                    </ul>
                    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                </div>
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

    $('.billView').die().live('click',function(event){
        var ths=$(this);
        var bill_id=$(this).attr('bill_id');
        if($('tr.details[bill_id='+bill_id+']').length){
            $('tr.details[bill_id='+bill_id+']').remove();
        }else{
            var url='".$this->Url->build(['controller'=>'Bills','action'=>'billrows'])."';
            url=url+'?bill_id='+bill_id;
            $.ajax({
                url: url,
            }).done(function(response) {
                ths.closest('tr').after( response );
            });
        }
    });
	
	/* $('.KOTComment').die().live('click',function(event){ 
		$('#WaitBox5').show();
	});
	*/
	$('.closeCommentBoxKOT').die().live('click',function(event){
		var x=$(this).attr('qwe');
		$('#WaitBox'+x+'').hide();
	}); 

	
    ComponentsPickers.init();
});
";
echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom')); 
?>

