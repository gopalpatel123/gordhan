<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PendingKotRows Controller
 *
 * @property \App\Model\Table\PendingKotRowsTable $PendingKotRows
 *
 * @method \App\Model\Entity\PendingKotRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PendingKotRowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['PendingKots', 'Items']
        ];
        $pendingKotRows = $this->paginate($this->PendingKotRows);

        $this->set(compact('pendingKotRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Pending Kot Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pendingKotRow = $this->PendingKotRows->get($id, [
            'contain' => ['PendingKots', 'Items']
        ]);

        $this->set('pendingKotRow', $pendingKotRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pendingKotRow = $this->PendingKotRows->newEntity();
        if ($this->request->is('post')) {
            $pendingKotRow = $this->PendingKotRows->patchEntity($pendingKotRow, $this->request->getData());
            if ($this->PendingKotRows->save($pendingKotRow)) {
                $this->Flash->success(__('The pending kot row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending kot row could not be saved. Please, try again.'));
        }
        $pendingKots = $this->PendingKotRows->PendingKots->find('list', ['limit' => 200]);
        $items = $this->PendingKotRows->Items->find('list', ['limit' => 200]);
        $this->set(compact('pendingKotRow', 'pendingKots', 'items'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pending Kot Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pendingKotRow = $this->PendingKotRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pendingKotRow = $this->PendingKotRows->patchEntity($pendingKotRow, $this->request->getData());
            if ($this->PendingKotRows->save($pendingKotRow)) {
                $this->Flash->success(__('The pending kot row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pending kot row could not be saved. Please, try again.'));
        }
        $pendingKots = $this->PendingKotRows->PendingKots->find('list', ['limit' => 200]);
        $items = $this->PendingKotRows->Items->find('list', ['limit' => 200]);
        $this->set(compact('pendingKotRow', 'pendingKots', 'items'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pending Kot Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pendingKotRow = $this->PendingKotRows->get($id);
        if ($this->PendingKotRows->delete($pendingKotRow)) {
            $this->Flash->success(__('The pending kot row has been deleted.'));
        } else {
            $this->Flash->error(__('The pending kot row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
