







<?php 
if (in_array("1", $userPages)){
	echo '<li>'.$this->Html->link('<i class="icon-home"></i><span class="title " style="margin-left: 15px;">Dashboard</span>', '/Users/Dashboard',['escape' => false, 'class' => 'showLoader']).'</li>';
}
?>

<?php 
$target=array("6","7","8","43");
if(!empty(count(array_intersect($userPages, $target)))){
?>
	<li class="start">
		<a href="javascript:;">
		<i class="icon-settings"></i>
		<span class="title" style="margin-left: 15px;">Configuration</span>
		<span class="arrow "></span>
		</a>
		<ul class="sub-menu">
			<?php
			
			echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Company</span>', '/Companies/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			
			if (in_array("6", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Item Category</span>', '/ItemCategories/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("7", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Item Sub-Category</span>', '/ItemSubCategories/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("8", $userPages)){
				echo '<li>'.$this->Html->link('<span class="title" style="margin-left: 15px;">Item Master</span>', '/Items/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("43", $userPages)){
				echo '<li>'.$this->Html->link('<span class="title" style="margin-left: 15px;">Bill Setting</span>', '/Bill-settings',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			?>
	 	</ul>
	</li>
<?php } ?>

<?php 
$target=array("21","22","24","25");
if(!empty(count(array_intersect($userPages, $target)))){
?>
	<li class="start">
		<a href="javascript:;">
		<i class="icon-present"></i>
		<span class="title" style="margin-left: 15px;">Setup</span>
		<span class="arrow "></span>
		</a>
		<ul class="sub-menu">
			<?php
/* 			if (in_array("21", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Comments</span>', '/Comments/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("22", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Tables</span>', '/Tables/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			} */
			if (in_array("24", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Tax</span>', '/Taxes/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("25", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Units</span>', '/Units/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			?>
	 	</ul>
	</li>
<?php } ?>
<?php
if (in_array("14", $userPages)){
	
	echo '<li>'.$this->Html->link('<i class="icon-wallet"></i><span class="title " style="margin-left: 15px;">Offer Codes</span>', '/OfferCodes/index',['escape' => false, 'class' => 'showLoader']).'</li>';
	
	
}
?>

<?php 
$target=array("18","10","11","12");
if(!empty(count(array_intersect($userPages, $target)))){
?>
	<li class="start">
		<a href="javascript:;">
		<i class="fa fa-shopping-cart"></i>
		<span class="title" style="margin-left: 15px;">Raw Meterial Master</span>
		<span class="arrow "></span>
		</a>
		<ul class="sub-menu">
			<?php
			/* if (in_array("29", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Store</span>', '/RawMaterials/store',['escape' => false, 'class' => 'showLoader']).'</li>';
			} */
			
			if (in_array("10", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Add RM Category</span>', '/RawMaterialCategories/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("11", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Add RM Sub-Category</span>', '/RawMaterialSubCategories/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("12", $userPages)){
				echo '<li>'.$this->Html->link('<span class="title" style="margin-left: 15px;">Add Raw Meterial</span>', '/RawMaterials/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}if (in_array("29", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">RM Stock</span>', '/RawMaterials/store',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			
			?>
	 	</ul>
	</li>
<?php } ?>
<?php 
$target=array("18","10","11","12");
if(!empty(count(array_intersect($userPages, $target)))){
?>
	<li class="start">
		<a href="javascript:;">
		<i class="fa fa-truck"></i>
		<span class="title" style="margin-left: 15px;">Purchase</span>
		<span class="arrow "></span>
		</a>
		<ul class="sub-menu">
			<?php
			
			if (in_array("18", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Add Suplier</span>', '/Vendors/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("18", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Supplier Input / GRN</span>', '/PurchaseVouchers/add',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			?>
	 	</ul>
	</li>
<?php } ?>
<?php 
$target=array("18","10","11","12");
if(!empty(count(array_intersect($userPages, $target)))){
?>
	<li class="start">
		<a href="javascript:;">
		<i class="fa fa-glass"></i>
		<span class="title" style="margin-left: 15px;">Daily Usage</span>
		<span class="arrow "></span>
		</a>
		<ul class="sub-menu">
			<?php
			
			if (in_array("18", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">Add</span>', '/DailyUsages/',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			if (in_array("18", $userPages)){
				echo '<li>'.$this->Html->link('<span style="margin-left: 15px;">List</span>', '/DailyUsages/listData',['escape' => false, 'class' => 'showLoader']).'</li>';
			}
			?>
	 	</ul>
	</li>
<?php } ?>

