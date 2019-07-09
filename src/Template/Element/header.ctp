
<style type="text/css">
.topBtnActive{
	color: #FFF; border-radius: 5px !important; background-color: #FA6775; padding: 7px 18px;margin-left: 8px;
}
.topBtn{
	color: #FFF !important; border-radius: 5px !important; background-color: #41526d !important; padding: 6px 18px;border:none !important;margin-left: 8px;
}
.topBtn2{
	color: #818182; border-radius: 5px !important; background-color: #F5F5F5; padding: 7px 18px;border:solid 1px #f0f0f0;margin-left: 8px;
}
.pointer{
    cursor: pointer;
}
@media only screen and (min-width: 468px) and (max-width: 1100px) {
    .topBtn{
        padding: 2px 4px !important;
    }
    .topBtn2{
        padding: 2px 4px !important; 
    }
    .topBtnActive{
        padding: 2px 4px !important;
    }
    .tablet-logo{
        display: block;
    }
    .desktop-logo{
        display: none;
    }
    .logoutBtn{
        display: none !important;
    }
    .hideInTablet{
         display: none;
    }
}
@media only screen and (min-width: 1024px) {
    .topBtn{
        padding: 6px 6px;
    }
    .tablet-logo{
        display: none;
    }
    .desktop-logo{
        display: block;
    }
    .hideInTablet{
         display: ;
    }
}
</style>
<?php //pr($this->request->params);exit;
$controller = strtolower($this->request->params['controller']); 
$pass = $this->request->params['pass'];
$action = $this->request->params['action'];
$dinneractive='topBtn';
$deleveryactive='topBtn';
$takeawayactive='topBtn';
$takeawayactive2='topBtn';
$swiftactive='topBtn';
if($controller=='tables'){ 
    if($action=='swifttable'){
        $swiftactive='topBtnActive';
    }
    else{
         $dinneractive="topBtnActive";
    }
}
if($controller=='kots'){ 
    if(!empty($pass)){
        if($pass[1]=='dinner'){
           $dinneractive="topBtnActive"; 
        }
            
    }
}
if($controller=='kots'){
    if(!empty($pass)){
        if($pass[1]=='delivery'){
           $deleveryactive="topBtnActive"; 
        }
            
    }
}
if($controller=='bills'){
    if($action=='delivery'){ 
        $deleveryactive="topBtnActive"; 
    }
}
if($controller=='kots'){ 
    if(!empty($pass)){
        if($pass[1]=='dinner'){
           $takeawayactive="topBtnActive"; 
        }
    }
}
if($controller=='kots'){ 
    if(!empty($pass)){
        if($pass[1]=='takeaway'){
           $takeawayactive2="topBtnActive"; 
        }
    }
}
if($controller=='bills'){ 
    if($action=='takeAway'){ 
        $takeawayactive="topBtnActive"; 
    }
}
?>
<div style="background: #2d4161;padding: 14px 0px 0px 0px;">
    <div>
    	
      
        <span class="dashboard topBtn pointer showLoader">Dashboard</span>
    </div>
</div>

<div id="WaitBox9" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="false" style="display: none; padding-right: 12px;">
	<div class="modal-backdrop fade in" ></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<input type="hidden" id="kot_id">
				<div style=" text-align: center; padding: 0px 0 15px 0px; font-size: 15px; font-weight: bold; color: #2D4161; ">Token No.</div>
				<br/>
				<div class="form-group">
					<?php echo $this->Form->input('token_no',['label' => false,'class'=>'form-control input-sm ', 'id'=>'token_no1' ,'placeholder' => 'Token No']);?>
				</div>
				
				<br/><br/>
				<div align="center">
					<a href="javascript:void(0)" class="closeCommentBoxKOT btn default">CLOSE</a>
					<a href="javascript:void(0)" class="saveToken1 btn btn-danger">SAVE</a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 

$js="
$(document).ready(function() {
    $('.dinnerNewTab').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'Tables','action'=>'index'])."'
        window.location.href = url; 
    });
    $('.deleveryNewTab').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'Bills','action'=>'delivery'])."'
        window.location.href = url; 
    });
    $('.takeAwayNewTab').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'kots','action'=>'generate','0','dinner'])."'
        window.location.href = url; 
    });
    $('.takeAwayNewTab2').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'kots','action'=>'generate','0','takeaway'])."'
        window.open(url);
    });
	$('.addToken').die().live('click',function(event){
        $('#WaitBox9').show();
		//var url='".$this->Url->build(['controller'=>'ready-orders','action'=>'index'])."'
        //window.open(url);
    });
	
	$('.token_no_new').die().live('keypress',function(event){
		    var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				var token_no=$('.token_no').val();
				var url='".$this->Url->build(['controller'=>'ready-orders','action'=>'ajaxAdd'])."';
				url=url+'?token_no='+token_no; 
				url=encodeURI(url);
				$.ajax({
					url: url,
				}).done(function(response) { 
					$('.temp').html(response);
					$('.token_no').val('');
					return false;
				});
			}
	});
	
	

    

    $('.dashboard').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'Users','action'=>'Dashboard'])."'
        $('#loading').show();
        window.location.href = url; 
    });
    $('.counter').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'Tables','action'=>'index'])."'
        //window.open(url);
        $('#loading').show();
        window.location.href = url; 
    });
    $('.Bookings').die().live('click',function(event){
        var url='".$this->Url->build(['controller'=>'Bookings','action'=>'add'])."'
        window.location.href = url; 
    });
});
";
echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));
?>