<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FloorNos Controller
 *
 * @property \App\Model\Table\FloorNosTable $FloorNos
 *
 * @method \App\Model\Entity\FloorNo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FloorNosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $floorNos = $this->paginate($this->FloorNos);

        $this->set(compact('floorNos'));
    }

    /**
     * View method
     *
     * @param string|null $id Floor No id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $floorNo = $this->FloorNos->get($id, [
            'contain' => []
        ]);

        $this->set('floorNo', $floorNo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
		$this->viewBuilder()->layout('admin');
		if(!$id)
		{				
			$floorNo = $this->FloorNos->newEntity();
		}
		else
		{
			$floorNo = $this->FloorNos->get($id, [ 
				'contain' => []
			]);
		} 
       if ($this->request->is(['patch', 'post', 'put'])) {
            $floorNo = $this->FloorNos->patchEntity($floorNo, $this->request->getData());
			$floorNo->status="Active";
            if ($this->FloorNos->save($floorNo)) {
                $this->Flash->success(__('The floor no has been saved.'));

                return $this->redirect(['action' => 'Add']);
            } pr($floorNo); exit;
            $this->Flash->error(__('The floor no could not be saved. Please, try again.'));
        }
		$Floors = $this->paginate($this->FloorNos->find());
        $this->set(compact('floorNo','Floors','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor No id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $floorNo = $this->FloorNos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $floorNo = $this->FloorNos->patchEntity($floorNo, $this->request->getData());
            if ($this->FloorNos->save($floorNo)) {
                $this->Flash->success(__('The floor no has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The floor no could not be saved. Please, try again.'));
        }
        $this->set(compact('floorNo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor No id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $floorNo = $this->FloorNos->get($id);
        if ($this->FloorNos->delete($floorNo)) {
            $this->Flash->success(__('The floor no has been deleted.'));
        } else {
            $this->Flash->error(__('The floor no could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
