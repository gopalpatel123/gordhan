<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenuCategories Controller
 *
 * @property \App\Model\Table\MenuCategoriesTable $MenuCategories
 *
 * @method \App\Model\Entity\MenuCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $menuCategories = $this->paginate($this->MenuCategories);

        $this->set(compact('menuCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuCategory = $this->MenuCategories->get($id, [
            'contain' => ['MenuSubCategories']
        ]);

        $this->set('menuCategory', $menuCategory);
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
			$menuCategory = $this->MenuCategories->newEntity();
		}
		else
		{
			$menuCategory = $this->MenuCategories->get($id, [
				'contain' => []
			]);
		} 
        
        if ($this->request->is(['patch','post','put'])) {
            $menuCategory = $this->MenuCategories->patchEntity($menuCategory, $this->request->getData());
            if ($this->MenuCategories->save($menuCategory)) {
                $this->Flash->success(__('The menu category has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The menu category could not be saved. Please, try again.'));
        }
		$menuCategories = ($this->MenuCategories->find());
        $this->set(compact('menuCategory','menuCategories','id'));
    }
  public function delete($id = null)
    {
        $menuCategory = $this->MenuCategories->get($id, [
            'contain' => []
        ]);
		$menuCategory = $this->MenuCategories->patchEntity($menuCategory, $this->request->getData());
		$menuCategory->is_deleted=1;
		if ($this->MenuCategories->save($menuCategory)) {
            $this->Flash->success(__('The item category has been deleted.'));
        }else {
            $this->Flash->error(__('The item category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'add']);
    }
    public function undelete($id = null)
    {
        $menuCategory = $this->MenuCategories->get($id, [
            'contain' => []
        ]);
        $menuCategory = $this->MenuCategories->patchEntity($menuCategory, $this->request->getData());
        $menuCategory->is_deleted=0;
        if ($this->MenuCategories->save($menuCategory)) {
            $this->Flash->success(__('The item category has been deleted.'));
        }else {
            $this->Flash->error(__('The item category could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'add']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuCategory = $this->MenuCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuCategory = $this->MenuCategories->patchEntity($menuCategory, $this->request->getData());
            if ($this->MenuCategories->save($menuCategory)) {
                $this->Flash->success(__('The menu category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu category could not be saved. Please, try again.'));
        }
        $this->set(compact('menuCategory'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuCategory = $this->MenuCategories->get($id);
        if ($this->MenuCategories->delete($menuCategory)) {
            $this->Flash->success(__('The menu category has been deleted.'));
        } else {
            $this->Flash->error(__('The menu category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/
}
