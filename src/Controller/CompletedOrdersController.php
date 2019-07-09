<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CompletedOrders Controller
 *
 * @property \App\Model\Table\CompletedOrdersTable $CompletedOrders
 *
 * @method \App\Model\Entity\CompletedOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompletedOrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->viewBuilder()->layout('');
        $completedOrders = $this->CompletedOrders->find()->order(['id'=>'DESC'])->limit(4);

        $this->set(compact('completedOrders'));
    }

    /**
     * View method
     *
     * @param string|null $id Completed Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $completedOrder = $this->CompletedOrders->get($id, [
            'contain' => []
        ]);

        $this->set('completedOrder', $completedOrder);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->viewBuilder()->layout('admin');
        $completedOrder = $this->CompletedOrders->newEntity();
        if ($this->request->is('post')) {
             $kot_no=$this->request->data()['kot_no'];
           // $kot=$this->CompletedOrders->Kots->find()->where(['voucher_no'=>$kot_no])->first();
            /* if($kot){
                $bill=$this->CompletedOrders->Bills->get($kot->bill_id);
                $completedOrder->bill_no=$bill->voucher_no;
            }else{
                $this->Flash->error(__('The Kot No is not found. Please, try again.'));
                return $this->redirect(['action' => 'add']);
            } */
            $completedOrder = $this->CompletedOrders->patchEntity($completedOrder, $this->request->getData());
			$completedOrder->bill_no=$kot_no;
			$completedOrder->kot_no=$kot_no;
            if ($this->CompletedOrders->save($completedOrder)) {
                $this->Flash->success(__('The Order No is displaing on the screen..'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('Something went wrong.'));
        }

        $completedOrders = $this->CompletedOrders->find()->order(['id'=>'DESC'])->limit(4);
        $this->set(compact('completedOrder', 'completedOrders'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Completed Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $completedOrder = $this->CompletedOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $completedOrder = $this->CompletedOrders->patchEntity($completedOrder, $this->request->getData());
            if ($this->CompletedOrders->save($completedOrder)) {
                $this->Flash->success(__('The completed order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The completed order could not be saved. Please, try again.'));
        }
        $this->set(compact('completedOrder'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Completed Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $completedOrder = $this->CompletedOrders->get($id);
        if ($this->CompletedOrders->delete($completedOrder)) {
            $this->Flash->success(__('The completed order has been deleted.'));
        } else {
            $this->Flash->error(__('The completed order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
