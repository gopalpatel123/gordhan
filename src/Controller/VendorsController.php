<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vendors Controller
 *
 * @property \App\Model\Table\VendorsTable $Vendors
 *
 * @method \App\Model\Entity\Vendor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VendorsController extends AppController
{
    public function index()
    {
		$this->viewBuilder()->layout('admin');
		$this->paginate = [
            'contain' => ['VendorItems'=>['RawMaterials']]
        ];
        $vendors = $this->paginate($this->Vendors->find());
		
		$this->set(compact('vendors','Items'));
    }
 
    public function add($id = null)
    {
		$this->viewBuilder()->layout('admin');
		if(!$id)
		{
			$vendor = $this->Vendors->newEntity();
		}
		else{
			$vendor = $this->Vendors->get($id, [
				'contain' => ['VendorItems']
			]);
		}
       if ($this->request->is(['patch', 'post', 'put'])) {
            $vendor = $this->Vendors->patchEntity($vendor, $this->request->getData());
			$vendor = $this->Vendors->patchEntity($vendor, $this->request->getData(),[ 'associated' => ['VendorItems']]);
			$item_lists=$this->request->getData('item_lists');
			$x=0;
			$vendor->vendor_items = [];  
			if($item_lists){
				foreach($item_lists as $data)
				{
					$Items = $this->Vendors->VendorItems->newEntity();
					$Items->raw_material_id = $data;
					$vendor->vendor_items[$x]=$Items;
	 				$x++;	
				}
			}
			
			//transaction date for receipt code close here-- 
			$filedata =$this->request->data['files_upload'];
			$file = $this->request->data['files_upload']['name']; //pr($file);exit;
			$ext = substr(strtolower(strrchr($file, '.')), 1); //get the extension
			//pr($setNewFileName);exit;
			$arr_ext = array('jpg', 'jpeg', 'png','pdf','docx','doc','xlsx','xls','csv','txt'); //set allowed extensions
			$setNewFileName = uniqid();
			
			$vendor->files_upload = $setNewFileName . '.' . $ext;
			if (in_array($ext, $arr_ext)) {
			move_uploaded_file($filedata['tmp_name'], WWW_ROOT . '/vendorDocument/' . $setNewFileName . '.' . $ext);
			}
			//pr($setNewFileName);exit;
            if ($this->Vendors->save($vendor)) { //pr($vendor);exit;
                $this->Flash->success(__('The vendor has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vendor could not be saved. Please, try again.'));
        }
        if($id)
		{
	        $itemslist=array();
	        foreach($vendor->vendor_items as $raw_materials){
	        	$itemslist[]=$raw_materials->raw_material_id;
	        }
	        if(!empty($itemslist)){
	        	$Items = $this->Vendors->RawMaterials->find()->where(['is_deleted'=>0])->orWhere(['RawMaterials.id IN' => $itemslist]);
	        }
	        else{
	        	$Items = $this->Vendors->RawMaterials->find()->where(['is_deleted'=>0]);
	        }
	        
	    }
	    else{
	    	$Items = $this->Vendors->RawMaterials->find()->where(['is_deleted'=>0]);
	    }
		
		
        $this->set(compact('vendor','Items','id'));
    }
 
    public function supplierWiseItem($id = null){
		$vendor_id=$this->request->query('employee_id'); 
		
		$VendorItems = $this->Vendors->VendorItems->find()
                            ->contain(['RawMaterials'=>['Taxes', 'PrimaryUnits', 'SecondaryUnits']])->where(['vendor_id'=>$vendor_id]);
		$option=[];
		foreach($VendorItems as $VendorItem)
		{
			 $unit_name = $VendorItem->raw_material->primary_unit->name;
           
			$option[] =  [
                            'value'=>$VendorItem->raw_material->id,
                            'text'=>$VendorItem->raw_material->name,
                            'tax'=>$VendorItem->raw_material->tax->tax_per,
                            'unit_name'=>$unit_name,
                        ];
		}
		$this->set(compact('option'));
		
	}
    public function delete($id = null)
    {
        $vendor = $this->Vendors->get($id, [
            'contain' => []
        ]);
		$vendor = $this->Vendors->patchEntity($vendor, $this->request->getData());
		$vendor->is_deleted=1;
		if ($this->Vendors->save($vendor)) {
            $this->Flash->success(__('The vendor has been unfreeze.'));
        } else {
            $this->Flash->error(__('The vendor could not be unfreeze. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function undelete($id = null)
    {
        $vendor = $this->Vendors->get($id, [
            'contain' => []
        ]);
		$vendor = $this->Vendors->patchEntity($vendor, $this->request->getData());
		$vendor->is_deleted=0;
		if ($this->Vendors->save($vendor)) {
            $this->Flash->success(__('The vendor has been unfreezed.'));
        } else {
            $this->Flash->error(__('The vendor could not be unfreezed. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
