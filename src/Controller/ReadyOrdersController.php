<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\View\Helper\HtmlHelper;

/**
 * ReadyOrders Controller
 *
 * @property \App\Model\Table\ReadyOrdersTable $ReadyOrders
 *
 * @method \App\Model\Entity\ReadyOrder[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ReadyOrdersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
		$this->viewBuilder()->layout('admin');
        $readyOrders = $this->ReadyOrders->newEntity();
		 if ($this->request->is('post')) {
            $readyOrder = $this->ReadyOrders->patchEntity($readyOrders, $this->request->getData());
			$readyOrder->created_date=date('Y-m-d H:i:s');
            if ($this->ReadyOrders->save($readyOrder)) {
                $this->Flash->success(__('The ready order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ready order could not be saved. Please, try again.'));
        }
		$this->paginate = [
            'contain' => [],
			'limit' => 4
        ];
		
		$readyOrderList = $this->paginate($this->ReadyOrders->find()->order(['id'=>'DESC']));
		//pr($readyOrderList); exit;
        $this->set(compact('readyOrders','readyOrderList'));
    }

    /**
     * View method
     *
     * @param string|null $id Ready Order id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view()
    {
		$this->viewBuilder()->layout('');
       $this->paginate = [
            'contain' => [],
			'limit' => 4
        ];
		$readyOrderList = $this->paginate($this->ReadyOrders->find()->order(['id'=>'DESC']));
//pr($readyOrderList); exit;
         $this->set(compact('readyOrderList'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $readyOrder = $this->ReadyOrders->newEntity();
        if ($this->request->is('post')) {
            $readyOrder = $this->ReadyOrders->patchEntity($readyOrder, $this->request->getData());
            if ($this->ReadyOrders->save($readyOrder)) {
                $this->Flash->success(__('The ready order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ready order could not be saved. Please, try again.'));
        }
        $this->set(compact('readyOrder'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Ready Order id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $readyOrder = $this->ReadyOrders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $readyOrder = $this->ReadyOrders->patchEntity($readyOrder, $this->request->getData());
            if ($this->ReadyOrders->save($readyOrder)) {
                $this->Flash->success(__('The ready order has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The ready order could not be saved. Please, try again.'));
        }
        $this->set(compact('readyOrder'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Ready Order id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $readyOrder = $this->ReadyOrders->get($id);
        if ($this->ReadyOrders->delete($readyOrder)) {
            $this->Flash->success(__('The ready order has been deleted.'));
        } else {
            $this->Flash->error(__('The ready order could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function ajaxAdd()
    {
        $this->viewBuilder()->layout('');
        $token_no=$this->request->query('token_no');
        
		if($token_no > 0){
			$readyOrder = $this->ReadyOrders->newEntity();
			$readyOrder->table_no=$token_no;
			$readyOrder->created_date=date('Y-m-d H:i:s');
			if($this->ReadyOrders->save($readyOrder)){
				 $ReadyOrders = $this->ReadyOrders->find()->order(['id'=>'DESC'])->limit(4);
				$Html = new HtmlHelper(new \Cake\View\View());
				 foreach($ReadyOrders as $data){ 
				
						$html.='<span class="" width="10px;"  style=" padding-top:8px;padding-bottom:6px;padding-right:15px;padding-left:15px;background-color: #51e26c !important;color:white;font-size:18px">'.$data->table_no;
						$html.='</span>';
				  } 
				echo $html;
			}else{
				echo '0';
			}
		}else{
			echo '1';
		}
        exit;
    }
}
