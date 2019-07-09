<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DailyUsages Controller
 *
 * @property \App\Model\Table\DailyUsagesTable $DailyUsages
 *
 * @method \App\Model\Entity\DailyUsage[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DailyUsagesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$current_date = $this->request->query('current_date');
        
        $this->viewBuilder()->layout('admin');
        $dailyUsage = $this->DailyUsages->newEntity();
		if($current_date){
			$current_date_new=date('Y-m-d',strtotime($current_date));
			
			$dailyUsageOld = $this->DailyUsages->find()->where(['transaction_date'=>$current_date_new])->first();
			//pr($dailyUsageOld); exit;
			if($dailyUsageOld){
				 return $this->redirect(['action' => 'edit',$dailyUsageOld->id]);
			}
		}
		
		 if ($this->request->is(['patch', 'post', 'put'])) {
			$dailyUsage = $this->DailyUsages->patchEntity($dailyUsage, $this->request->getData()); 
			$total_raw_material_id=($this->request->getData()['raw_material_id']); 
			$total_quantity=($this->request->getData()['quantity']);
			$last_voucher_no=$this->DailyUsages->find()->select(['voucher_no'])->order(['voucher_no' => 'DESC'])->first();
            if($last_voucher_no){
                $dailyUsage->voucher_no=$last_voucher_no->voucher_no+1;
            }else{
                $dailyUsage->voucher_no=1;
            }
			$dailyUsage->transaction_date=date('Y-m-d',strtotime($current_date));
			if ($this->DailyUsages->save($dailyUsage)) {
				foreach($total_quantity as $key=>$data){
					if($data > 0){
						$DailyUsageRow = $this->DailyUsages->DailyUsageRows->newEntity();
						$DailyUsageRow->daily_usage_id=$dailyUsage->id;
						$DailyUsageRow->quantity=$data;
						$DailyUsageRow->raw_material_id=$total_raw_material_id[$key];
						$this->DailyUsages->DailyUsageRows->save($DailyUsageRow);
						
						//Stock ledger Entry
						$stockLedger = $this->DailyUsages->DailyUsageRows->StockLedgers->newEntity();
						$stockLedger->transaction_date = $dailyUsage->transaction_date;
						$stockLedger->raw_material_id = $total_raw_material_id[$key];
						$stockLedger->quantity = $data;
						$stockLedger->rate = 0;
						$stockLedger->status = 'out';
						$stockLedger->effected_on = date( "Y-m-d H:i:s" );
						$stockLedger->voucher_name = 'Daily Usage';
						$stockLedger->adjustment_commant = '';
						$stockLedger->wastage_commant = '';
						$stockLedger->daily_usage_id = $dailyUsage->id;
						$stockLedger->daily_usage_row_id = $DailyUsageRow->id;
						$this->DailyUsages->DailyUsageRows->StockLedgers->save($stockLedger);
					}
				}
				$this->Flash->success(__('The daily usage has been saved.'));
                return $this->redirect(['action' => 'index']);
			}else{
				$this->Flash->error(__('The daily usage could not be saved. Please, try again.'));
			}
			
		 }
		
		
		$rawMaterials = $this->DailyUsages->DailyUsageRows->RawMaterials->find();
        $this->set(compact('dailyUsage','rawMaterials','current_date'));
    }

	 public function listData()
    {
		$this->viewBuilder()->layout('admin');
         $this->paginate = [
            'contain' => []
        ];

		$DailyUsages = $this->paginate($this->DailyUsages);
		//pr($DailyUsages->toArray()); exit;
		$this->set(compact('DailyUsages'));
	}
    /**
     * View method
     *
     * @param string|null $id Daily Usage id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dailyUsage = $this->DailyUsages->get($id, [
            'contain' => ['DailyUsageRows']
        ]);

        $this->set('dailyUsage', $dailyUsage);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dailyUsage = $this->DailyUsages->newEntity();
        if ($this->request->is('post')) {
            $dailyUsage = $this->DailyUsages->patchEntity($dailyUsage, $this->request->getData());
            if ($this->DailyUsages->save($dailyUsage)) {
                $this->Flash->success(__('The daily usage has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The daily usage could not be saved. Please, try again.'));
        }
        $this->set(compact('dailyUsage'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Daily Usage id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
		$this->viewBuilder()->layout('admin');
        $dailyUsage = $this->DailyUsages->get($id, [
            'contain' => ['DailyUsageRows'=>['RawMaterials']]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dailyUsage = $this->DailyUsages->patchEntity($dailyUsage, $this->request->getData()); 
			$total_raw_material_id=($this->request->getData()['raw_material_id']); 
			$total_quantity=($this->request->getData()['quantity']);
			
			$this->DailyUsages->DailyUsageRows->StockLedgers->deleteAll(['daily_usage_id' => $dailyUsage->id]);
			$this->DailyUsages->DailyUsageRows->deleteAll(['daily_usage_id' => $dailyUsage->id]);
			//pr($dailyUsage); exit;
			if ($this->DailyUsages->save($dailyUsage)) {
				foreach($total_quantity as $key=>$data){
					if($data > 0){
						$DailyUsageRow = $this->DailyUsages->DailyUsageRows->newEntity();
						$DailyUsageRow->daily_usage_id=$dailyUsage->id;
						$DailyUsageRow->quantity=$data;
						$DailyUsageRow->raw_material_id=$total_raw_material_id[$key];
						$this->DailyUsages->DailyUsageRows->save($DailyUsageRow);
						
						//Stock ledger Entry
						$stockLedger = $this->DailyUsages->DailyUsageRows->StockLedgers->newEntity();
						$stockLedger->transaction_date = $dailyUsage->transaction_date;
						$stockLedger->raw_material_id = $total_raw_material_id[$key];
						$stockLedger->quantity = $data;
						$stockLedger->rate = 0;
						$stockLedger->status = 'out';
						$stockLedger->effected_on = date( "Y-m-d H:i:s" );
						$stockLedger->voucher_name = 'Daily Usage';
						$stockLedger->adjustment_commant = '';
						$stockLedger->wastage_commant = '';
						$stockLedger->daily_usage_id = $dailyUsage->id;
						$stockLedger->daily_usage_row_id = $DailyUsageRow->id;
						$this->DailyUsages->DailyUsageRows->StockLedgers->save($stockLedger);
					}
				}
				$this->Flash->success(__('The daily usage has been Updated.'));
                return $this->redirect(['action' => 'index']);
			}else{
				$this->Flash->error(__('The daily usage could not be saved. Please, try again.'));
			}
        }
		$rowMeterialQty=[];
		
		foreach($dailyUsage->daily_usage_rows as $daily_usage_row){
			//pr($daily_usage_row->quantity); exit;
			$rowMeterialQty[$daily_usage_row->raw_material_id]=$daily_usage_row->quantity;
		}//exit;
		$rawMaterials = $this->DailyUsages->DailyUsageRows->RawMaterials->find();
        $this->set(compact('dailyUsage','rawMaterials','rowMeterialQty'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Daily Usage id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dailyUsage = $this->DailyUsages->get($id);
        if ($this->DailyUsages->delete($dailyUsage)) {
            $this->Flash->success(__('The daily usage has been deleted.'));
        } else {
            $this->Flash->error(__('The daily usage could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
