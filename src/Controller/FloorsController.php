<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Floors Controller
 *
 * @property \App\Model\Table\FloorsTable $Floors
 *
 * @method \App\Model\Entity\Floor[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FloorsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $floors = $this->paginate($this->Floors);

        $this->set(compact('floors'));
    }

    /**
     * View method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $floor = $this->Floors->get($id, [
            'contain' => []
        ]);

        $this->set('floor', $floor);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
		$this->viewBuilder()->layout('admin');
		if(!$id)
		{				
			$floor = $this->Floors->newEntity();
		}
		else
		{
			$floor = $this->Floors->get($id, [ 
				'contain' => []
			]);
		} 
        
        if ($this->request->is(['patch','post','put'])) {
            $floor = $this->Floors->patchEntity($floor, $this->request->getData());
			$floor->status="Active";
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('The floor has been saved.'));

                return $this->redirect(['action' => 'Add']);
            }
            $this->Flash->error(__('The floor could not be saved. Please, try again.'));
        }
		$Floors = $this->paginate($this->Floors->find());
        $this->set(compact('floor','Floors','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $floor = $this->Floors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $floor = $this->Floors->patchEntity($floor, $this->request->getData());
            if ($this->Floors->save($floor)) {
                $this->Flash->success(__('The floor has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The floor could not be saved. Please, try again.'));
        }
        $this->set(compact('floor'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Floor id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $floor = $this->Floors->get($id);
        if ($this->Floors->delete($floor)) {
            $this->Flash->success(__('The floor has been deleted.'));
        } else {
            $this->Flash->error(__('The floor could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
