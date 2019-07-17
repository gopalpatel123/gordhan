<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenuSubCategories Controller
 *
 * @property \App\Model\Table\MenuSubCategoriesTable $MenuSubCategories
 *
 * @method \App\Model\Entity\MenuSubCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuSubCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MenuCategories']
        ];
        $menuSubCategories = $this->paginate($this->MenuSubCategories);

        $this->set(compact('menuSubCategories'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu Sub Category id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuSubCategory = $this->MenuSubCategories->get($id, [
            'contain' => ['MenuCategories', 'MenuItems']
        ]);

        $this->set('menuSubCategory', $menuSubCategory);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id=null)
    {
		$this->viewBuilder()->layout('admin');
			if(!$id)
		{				
			$menuSubCategory = $this->MenuSubCategories->newEntity();
		}
		else
		{
			$menuSubCategory = $this->MenuSubCategories->get($id, [
				'contain' => []
			]);
		} 
       
        if ($this->request->is(['patch','post','put'])) {
            $menuSubCategory = $this->MenuSubCategories->patchEntity($menuSubCategory, $this->request->getData());
            if ($this->MenuSubCategories->save($menuSubCategory)) {
                $this->Flash->success(__('The menu sub category has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The menu sub category could not be saved. Please, try again.'));
        }
		$this->paginate = [
            'contain' => ['MenuCategories']
        ];
		if($id)
        {
             $menuCategories = $this->MenuSubCategories->MenuCategories->find('list', ['limit' => 200])
                ->where(['MenuCategories.is_deleted'=>0]);
        }
        else{
            $menuCategories = $this->MenuSubCategories->MenuCategories->find('list', ['limit' => 200])
                ->where(['MenuCategories.is_deleted'=>0]);
        }
		$menuSubCategories = $this->paginate($this->MenuSubCategories->find()->contain(['MenuCategories'])->order(['MenuSubCategories.id'=>'ASC']));

		
		
       
        $this->set(compact('menuSubCategory', 'menuCategories','menuSubCategories','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Sub Category id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	  public function delete($id = null)
    {
        $menuSubCategory = $this->MenuSubCategories->get($id, [
            'contain' => []
        ]);
       
		$menuSubCategory = $this->MenuSubCategories->patchEntity($menuSubCategory, $this->request->getData());
		
		$menuSubCategory->is_deleted=1;
		if ($this->MenuSubCategories->save($menuSubCategory)) {
            $this->Flash->success(__('The item sub category has been Freezed.'));
        } else {
            $this->Flash->error(__('The item sub category could not be Freezed. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }
    public function undelete($id = null)
    {
        $menuSubCategory = $this->MenuSubCategories->get($id, [
            'contain' => []
        ]);
        
        $menuSubCategory = $this->MenuSubCategories->patchEntity($menuSubCategory, $this->request->getData());
        $menuSubCategory->is_deleted=0;
        if ($this->MenuSubCategories->save($menuSubCategory)) {
            $this->Flash->success(__('The item sub category has been unfreezed.'));
        } else {
            $this->Flash->error(__('The item sub category could not be unfreezed. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }

	 
    public function edit($id = null)
    {
        $menuSubCategory = $this->MenuSubCategories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuSubCategory = $this->MenuSubCategories->patchEntity($menuSubCategory, $this->request->getData());
            if ($this->MenuSubCategories->save($menuSubCategory)) {
                $this->Flash->success(__('The menu sub category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu sub category could not be saved. Please, try again.'));
        }
        $menuCategories = $this->MenuSubCategories->MenuCategories->find('list', ['limit' => 200]);
        $this->set(compact('menuSubCategory', 'menuCategories'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Sub Category id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  /*   public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuSubCategory = $this->MenuSubCategories->get($id);
        if ($this->MenuSubCategories->delete($menuSubCategory)) {
            $this->Flash->success(__('The menu sub category has been deleted.'));
        } else {
            $this->Flash->error(__('The menu sub category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */
}
