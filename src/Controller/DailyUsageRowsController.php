<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DailyUsageRows Controller
 *
 * @property \App\Model\Table\DailyUsageRowsTable $DailyUsageRows
 *
 * @method \App\Model\Entity\DailyUsageRow[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DailyUsageRowsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DailyUsages', 'RawMaterials']
        ];
        $dailyUsageRows = $this->paginate($this->DailyUsageRows);

        $this->set(compact('dailyUsageRows'));
    }

    /**
     * View method
     *
     * @param string|null $id Daily Usage Row id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dailyUsageRow = $this->DailyUsageRows->get($id, [
            'contain' => ['DailyUsages', 'RawMaterials']
        ]);

        $this->set('dailyUsageRow', $dailyUsageRow);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dailyUsageRow = $this->DailyUsageRows->newEntity();
        if ($this->request->is('post')) {
            $dailyUsageRow = $this->DailyUsageRows->patchEntity($dailyUsageRow, $this->request->getData());
            if ($this->DailyUsageRows->save($dailyUsageRow)) {
                $this->Flash->success(__('The daily usage row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The daily usage row could not be saved. Please, try again.'));
        }
        $dailyUsages = $this->DailyUsageRows->DailyUsages->find('list', ['limit' => 200]);
        $rawMaterials = $this->DailyUsageRows->RawMaterials->find('list', ['limit' => 200]);
        $this->set(compact('dailyUsageRow', 'dailyUsages', 'rawMaterials'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Daily Usage Row id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dailyUsageRow = $this->DailyUsageRows->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dailyUsageRow = $this->DailyUsageRows->patchEntity($dailyUsageRow, $this->request->getData());
            if ($this->DailyUsageRows->save($dailyUsageRow)) {
                $this->Flash->success(__('The daily usage row has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The daily usage row could not be saved. Please, try again.'));
        }
        $dailyUsages = $this->DailyUsageRows->DailyUsages->find('list', ['limit' => 200]);
        $rawMaterials = $this->DailyUsageRows->RawMaterials->find('list', ['limit' => 200]);
        $this->set(compact('dailyUsageRow', 'dailyUsages', 'rawMaterials'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Daily Usage Row id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dailyUsageRow = $this->DailyUsageRows->get($id);
        if ($this->DailyUsageRows->delete($dailyUsageRow)) {
            $this->Flash->success(__('The daily usage row has been deleted.'));
        } else {
            $this->Flash->error(__('The daily usage row could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
