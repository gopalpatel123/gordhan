<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenuItems Controller
 *
 * @property \App\Model\Table\MenuItemsTable $MenuItems
 *
 * @method \App\Model\Entity\MenuItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenuItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['MenuSubCategories']
        ];
        $menuItems = $this->paginate($this->MenuItems);

        $this->set(compact('menuItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => ['MenuSubCategories']
        ]);

        $this->set('menuItem', $menuItem);
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
			 $menuItem = $this->MenuItems->newEntity();
		}
		else
		{
			$menuItem = $this->MenuItems->get($id, [
				'contain' => []
			]);
		} 
       
		
       
        if ($this->request->is(['patch','post','put'])) {
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
			
            if ($this->MenuItems->save($menuItem)) {
				//pr($menuItem);die;
                $this->Flash->success(__('The menu item has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
        }
		$this->paginate = [
            'contain' => ['MenuItems']
        ];
				if($id){
					 $menuSubCategories = $this->MenuItems->MenuSubCategories->find('list', ['limit' => 200])->where(['MenuSubCategories.is_deleted'=>0,'menu_category_id'=>$menuItem->menu_category_id]); 
				}else{
              $menuSubCategories = $this->MenuItems->MenuSubCategories->find('list', ['limit' => 200])->where(['MenuSubCategories.is_deleted'=>0]);
				}			  
			  $menuCategories = $this->MenuItems->MenuCategories->find('list', ['limit' => 200])->where(['MenuCategories.is_deleted'=>0]);
			 // pr($menuSubCategories->toarray());die;
        	$menuItems = $this->MenuItems->find()->contain(['MenuSubCategories'])->order(['MenuItems.id'=>'ASC']);
      
        $this->set(compact('menuItem', 'menuSubCategories','id','menuItems','menuCategories'));
    }
  public function delete($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => []
        ]);
       
		$menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
		
		$menuItem->is_deleted=1;
		if ($this->MenuItems->save($menuItem)) {
            $this->Flash->success(__('The Menu item  has been Freezed.'));
        } else {
            $this->Flash->error(__('The Menu item  could not be Freezed. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }
    public function undelete($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => []
        ]);
        
        $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
        $menuItem->is_deleted=0;
        if ($this->MenuItems->save($menuItem)) {
            $this->Flash->success(__('The Menu item  has been unfreezed.'));
        } else {
            $this->Flash->error(__('The Menu item sub category could not be unfreezed. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }

	 
    /**
     * Edit method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->getData());
            if ($this->MenuItems->save($menuItem)) {
                $this->Flash->success(__('The menu item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
        }
        $menuSubCategories = $this->MenuItems->MenuSubCategories->find('list', ['limit' => 200]);
        $this->set(compact('menuItem', 'menuSubCategories'));
    }
 public function supplierWiseItem($id)
 {
	$this->viewBuilder()->layout('');
	 $menuSubCategories = $this->MenuItems->MenuSubCategories->find('list', ['limit' => 200])->where(['MenuSubCategories.is_deleted'=>0,'menu_category_id'=>$id]); 
	 $this->set(compact('menuSubCategories'));
	
 }
    /**
     * Delete method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
   /*  public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuItem = $this->MenuItems->get($id);
        if ($this->MenuItems->delete($menuItem)) {
            $this->Flash->success(__('The menu item has been deleted.'));
        } else {
            $this->Flash->error(__('The menu item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */
}
