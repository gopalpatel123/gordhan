 
<style>
{
   margin: 0;
   padding: 0;
}

.seat {
   float: left;
   display: block;
   margin: 5px;
   background: #1BBC9B;
   width: 50px;
   height: 35px;
}

.seat-select {
   display: none;
}

.seat-select:checked+.seat {
   background: #FA6775;
}

</style> 
 <table id="main_table">
 <?php $sizee=sizeof($TableRows->toArray());  
 $splitAr=round($sizee/2);  ?>
 <tbody id='main_tbody' >
 <?php $i=0; foreach($TableRows as $data){ $i++; ?>
 <?php if($i==1){ ?>
	<tr class="main_tr">
	<?php } ?>
	<td class="main_td">
		<input style="text-align:center;v-align:center;padding-left:15px;" id="seat-<?php echo $data->id;?>" class="seat-select" type="checkbox" value="<?php echo $data->id;?>" name="table_rows[]" />
		<label for="seat-<?php echo $data->id;?>" class="seat" style="text-align:center;padding-top:5px;margin-left:45px;font-size:20px"><?php echo $Table->name.'-'.$data->name ?></label>
	</td>
	  <?php if($i==$splitAr){ ?>
	  </br>
	  </tr>
	  <tr>
	  <?php } ?>
	 <?php } ?>
  </tbody>
  </table>
<?php echo $this->Html->script('/assets/global/plugins/jquery.min.js'); ?>
<script>
$(document).ready(function() { 
	
});
</script>