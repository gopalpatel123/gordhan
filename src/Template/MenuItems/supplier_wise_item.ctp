<?php echo $this->Form->input('menu_sub_category_id',['options' =>$menuSubCategories,'label' => false,'class'=>'form-control select2 selectState menu_category_id','empty'=> 'Select...' ,'value'=>$menuItem->menu_category_id]);?>