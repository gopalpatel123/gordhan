<style>
.note-editor.note-frame .note-editing-area .note-editable {

    padding: 10px;
    overflow: auto;
    color: #000;
    word-wrap: break-word;
    background-color: #fff;
    height: 243.15px;

}
</style>
<div class="container">
<form method="post">
    <div>
        <div class="row">
            <div class="col-sm-5">
                <div align="center" style="font-size: 16px;">Bill Header</div>
                <textarea rows="10" id="summernote" name="header"><?php echo $BillSetting->header; ?></textarea>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-5">
                <div align="center" style="font-size: 16px;">Bill Footer</div>
                <textarea rows="10"  id="summernote2" name="footer"><?php echo $BillSetting->footer; ?></textarea>
            </div>
        </div>
    </div>
	 <div class="row">
            <div class="col-sm-5"></div>
    <div  class="col-sm-1">
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </div>
	<div class="col-sm-5">
	</div></div>
</form>
 </div>

<?php echo $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS1']); ?> 
<?php echo $this->Html->script('http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS1']); ?> 
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src=""></script>
<?php echo $this->Html->script('http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js', ['block' => 'PAGE_LEVEL_PLUGINS_JS']); ?> 

<?php 
$js="
$(document).ready(function() {
    $('#summernote').summernote();
    $('#summernote2').summernote();
});
";
?>
<?php echo $this->Html->scriptBlock($js, array('block' => 'scriptBottom'));  ?>