<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PendingKots Controller
 *
 * @property \App\Model\Table\PendingKotsTable $PendingKots
 *
 * @method \App\Model\Entity\PendingKot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PendingKotsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tables', 'Employees', 'FinancialYears']
        ];
        $pendingKots = $this->paginate($this->PendingKots);

        $this->set(compact('pendingKots'));
    }

    /**
     * View method
     *
     * @param string|null $id Pending Kot id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function generateKot($id = null){
		
		$financial_year_id=$this->coreVariable['financial_year_id'];
		$pendingKot = $this->PendingKots->get($id);
		
		if($pendingKot->order_type=="Parcel"){
			$last_voucher_no=$this->PendingKots->Kots->find()
							->select(['voucher_no'])->order(['voucher_no' => 'DESC'])->where(['financial_year_id' => $financial_year_id])->first();
			if($last_voucher_no){
				$voucher_no=$last_voucher_no->voucher_no+1;
			}else{
				$voucher_no=1;
			}
			
			$kot = $this->PendingKots->Kots->newEntity();
			$kot->voucher_no=$voucher_no;
			$kot->financial_year_id=$pendingKot->financial_year_id;
			$kot->table_id=$pendingKot->table_id;
			$kot->bill_pending="Yes";
			$kot->payment_pending="Yes";
			$kot->created_on=date('Y-m-d');
			$kot->pending_kot_id=$id;
			$kot->one_comment=$pendingKot->comment;
			$kot->order_type=$pendingKot->order_type;
			$kot->employee_id=$pendingKot->employee_id;
			if($this->PendingKots->Kots->save($kot)){
			//if($kot){
				
				$PendingKotRowDatas=$this->PendingKots->PendingKotRows->find()->where(['pending_kot_id'=>$id]);
				
				foreach($PendingKotRowDatas as $PendingKotRowsData){
					$Item=$this->PendingKots->Kots->KotRows->Items->find()
							->select(['id','item_for','rate'])->where(['id' => $PendingKotRowsData->item_id])->first(); 
					$KotRow = $this->PendingKots->Kots->KotRows->newEntity();
					$KotRow->kot_id=$kot->id;
					$KotRow->item_id=$Item->id;
					$KotRow->quantity=$PendingKotRowsData->quantity;
					$KotRow->rate=$Item->rate;
					$KotRow->amount=$Item->rate*$PendingKotRowsData->quantity;
					$this->PendingKots->Kots->KotRows->save($KotRow);
				
				}
			}
			$query = $this->PendingKots->query();
			$query->update()
				->set(['kot_pending' => 'no'])
				->where(['PendingKots.id' => $id])
				->execute();
			
		}else{
		
			$last_voucher_no=$this->PendingKots->Kots->find()
							->select(['voucher_no'])->order(['voucher_no' => 'DESC'])->where(['financial_year_id' => $financial_year_id])->first();
			if($last_voucher_no){
				$voucher_no=$last_voucher_no->voucher_no+1;
			}else{
				$voucher_no=1;
			}
			$kot = $this->PendingKots->Kots->newEntity();
			$kot->voucher_no=$voucher_no;
			$kot->financial_year_id=$pendingKot->financial_year_id;
			$kot->table_id=$pendingKot->table_id;
			$kot->bill_pending="Yes";
			$kot->payment_pending="Yes";
			$kot->created_on=date('Y-m-d');
			$kot->pending_kot_id=$id;
			$kot->one_comment=$pendingKot->comment;
			$kot->order_type=$pendingKot->order_type;
			$kot->employee_id=$pendingKot->employee_id; 
			if($this->PendingKots->Kots->save($kot)){
			//if($kot){
				if($pendingKot->no_of_adult > 0){
					$Item=$this->PendingKots->Kots->KotRows->Items->find()
							->select(['id','item_for','rate'])->where(['item_for' => 'Adult'])->first();
					$KotRow = $this->PendingKots->Kots->KotRows->newEntity();
					$KotRow->kot_id=$kot->id;
					$KotRow->item_id=$Item->id;
					$KotRow->quantity=$pendingKot->no_of_adult;
					$KotRow->rate=$Item->rate;
					$KotRow->amount=$Item->rate*$pendingKot->no_of_adult;
					$this->PendingKots->Kots->KotRows->save($KotRow);
				}
				if($pendingKot->no_of_child > 0){
					$Item=$this->PendingKots->Kots->KotRows->Items->find()
							->select(['id','item_for','rate'])->where(['item_for' => 'Child'])->first();
					$KotRow = $this->PendingKots->Kots->KotRows->newEntity();
					$KotRow->kot_id=$kot->id;
					$KotRow->item_id=$Item->id;
					$KotRow->quantity=$pendingKot->no_of_child;
					$KotRow->rate=$Item->rate;
					$KotRow->amount=$Item->rate*$pendingKot->no_of_child;
					$this->PendingKots->Kots->KotRows->save($KotRow);
				}
			}
			
			//Table Assign
			$query = $this->PendingKots->Tables->TableRows->query();
					$query->update()
						->set(['status' => 'occupied','booking_time'=>date("Y-m-d H:i:s" )])
						->where(['Tables.pending_kot_id' => $id])
						->execute();
			//Order accept
			$query = $this->PendingKots->query();
					$query->update()
						->set(['kot_pending' => 'no'])
						->where(['PendingKots.id' => $id])
						->execute();
		}
		$this->Flash->success(__('The kot has been saved.'));
        return $this->redirect(['controller'=>'Users','action' => 'dashboard']);
		
	}
	
	 public function cancleKot(){
        $this->viewBuilder()->layout('');
		$Pending_kot_id = $this->request->query('Pending_kot_id');
		$comment = $this->request->query('comment');
		$pendingKot = $this->PendingKots->get($Pending_kot_id);
		$pendingKot->cancle="Yes";
		$pendingKot->cancle_time=date('Y-m-d h:i:s');
		$pendingKot->cancle_reason=$comment;
		$this->PendingKots->save($pendingKot);
		
		$query = $this->PendingKots->Tables->TableRows->query();
					$query->update()
						->set(['Pending_kot_id' => '','booking_time'=>''])
						->where(['Tables.pending_kot_id' => $Pending_kot_id])
						->execute();
		
		echo "1";
		exit;
	 }
    public function view($id = null)
    {
        $pendingKot = $this->PendingKots->get($id, [
            'contain' => ['Tables', 'Employees', 'FinancialYears', 'PendingKotRows']
        ]);

        $this->set('pendingKot', $pendingKot);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pendingKot = $this->PendingKots->newEntity();
        if ($this->request->is('post')) {
            $pendingKot = $this->PendingKots->patchEntity($pendingKot, $this->request->getData());
            if ($this->PendingKots->save($pendingKot)) {
                $this->Flash->success(__('The pending kot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending kot could not be saved. Please, try again.'));
        }
        $tables = $this->PendingKots->Tables->find('list', ['limit' => 200]);
        $employees = $this->PendingKots->Employees->find('list', ['limit' => 200]);
        $financialYears = $this->PendingKots->FinancialYears->find('list', ['limit' => 200]);
        $this->set(compact('pendingKot', 'tables', 'employees', 'financialYears'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pending Kot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pendingKot = $this->PendingKots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pendingKot = $this->PendingKots->patchEntity($pendingKot, $this->request->getData());
            if ($this->PendingKots->save($pendingKot)) {
                $this->Flash->success(__('The pending kot has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending kot could not be saved. Please, try again.'));
        }
        $tables = $this->PendingKots->Tables->find('list', ['limit' => 200]);
        $employees = $this->PendingKots->Employees->find('list', ['limit' => 200]);
        $financialYears = $this->PendingKots->FinancialYears->find('list', ['limit' => 200]);
        $this->set(compact('pendingKot', 'tables', 'employees', 'financialYears'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pending Kot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pendingKot = $this->PendingKots->get($id);
        if ($this->PendingKots->delete($pendingKot)) {
            $this->Flash->success(__('The pending kot has been deleted.'));
        } else {
            $this->Flash->error(__('The pending kot could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
