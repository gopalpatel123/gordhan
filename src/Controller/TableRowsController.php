<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TableRows Controller
 *
 * @property \App\Model\Table\TableRowsTable $TableRows
 *
 * @method \App\Model\Entity\TableRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TableRowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tables']
        ];
        $tableRows = $this->paginate($this->TableRows);

        $this->set(compact('tableRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Table Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tableRow = $this->TableRows->get($id, [
            'contain' => ['Tables']
        ]);

        $this->set('tableRow', $tableRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tableRow = $this->TableRows->newEntity();
        if ($this->request->is('post')) {
            $tableRow = $this->TableRows->patchEntity($tableRow, $this->request->getData());
            if ($this->TableRows->save($tableRow)) {
                $this->Flash->success(__('The table row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table row could not be saved. Please, try again.'));
        }
        $tables = $this->TableRows->Tables->find('list', ['limit' => 200]);
        $this->set(compact('tableRow', 'tables'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Table Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tableRow = $this->TableRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tableRow = $this->TableRows->patchEntity($tableRow, $this->request->getData());
            if ($this->TableRows->save($tableRow)) {
                $this->Flash->success(__('The table row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The table row could not be saved. Please, try again.'));
        }
        $tables = $this->TableRows->Tables->find('list', ['limit' => 200]);
        $this->set(compact('tableRow', 'tables'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Table Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tableRow = $this->TableRows->get($id);
        if ($this->TableRows->delete($tableRow)) {
            $this->Flash->success(__('The table row has been deleted.'));
        } else {
            $this->Flash->error(__('The table row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
