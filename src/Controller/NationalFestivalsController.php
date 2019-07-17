<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * NationalFestivals Controller
 *
 * @property \App\Model\Table\NationalFestivalsTable $NationalFestivals
 *
 * @method \App\Model\Entity\NationalFestival[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class NationalFestivalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $nationalFestivals = $this->paginate($this->NationalFestivals);

        $this->set(compact('nationalFestivals'));
    }

    /**
     * View method
     *
     * @param string|null $id National Festival id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nationalFestival = $this->NationalFestivals->get($id, [
            'contain' => []
        ]);

        $this->set('nationalFestival', $nationalFestival);
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
			 $nationalFestival = $this->NationalFestivals->newEntity();
		}
		else
		{
			$nationalFestival = $this->NationalFestivals->get($id, [
				'contain' => []
			]);
		} 
       
      
        if ($this->request->is(['patch','post','put'])) {
            $nationalFestival = $this->NationalFestivals->patchEntity($nationalFestival, $this->request->getData());
			$effected_date=($this->request->getData()['effected_date']);
			$nationalFestival->effected_date=date('Y-m-d',strtotime($effected_date));
            if ($this->NationalFestivals->save($nationalFestival)) {
                $this->Flash->success(__('The national festival has been saved.'));

                return $this->redirect(['action' => 'add']);
            }
            $this->Flash->error(__('The national festival could not be saved. Please, try again.'));
        }
		$nationalFestivals = $this->paginate($this->NationalFestivals);
        $this->set(compact('nationalFestival','nationalFestivals','id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id National Festival id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
	  public function delete($id = null)
    {
        $menuItem = $this->NationalFestivals->get($id, [
            'contain' => []
        ]);
       
		$menuItem = $this->NationalFestivals->patchEntity($menuItem, $this->request->getData());
		
		$menuItem->is_deleted=1;
		if ($this->NationalFestivals->save($menuItem)) {
            $this->Flash->success(__('The National Festivals  has been Freezed.'));
        } else {
            $this->Flash->error(__('The National Festivals could not be Freezed. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }
    public function undelete($id = null)
    {
        $menuItem = $this->NationalFestivals->get($id, [
            'contain' => []
        ]);
        
        $menuItem = $this->NationalFestivals->patchEntity($menuItem, $this->request->getData());
        $menuItem->is_deleted=0;
        if ($this->NationalFestivals->save($menuItem)) {
            $this->Flash->success(__('The National Festivals  has been unfreezed.'));
        } else {
            $this->Flash->error(__('The National Festivals sub category could not be unfreezed. Please, try again.'));
        }

        return $this->redirect(['action' => 'add']);
    }

	 
    public function edit($id = null)
    {
        $nationalFestival = $this->NationalFestivals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nationalFestival = $this->NationalFestivals->patchEntity($nationalFestival, $this->request->getData());
            if ($this->NationalFestivals->save($nationalFestival)) {
                $this->Flash->success(__('The national festival has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The national festival could not be saved. Please, try again.'));
        }
        $this->set(compact('nationalFestival'));
    }

    /**
     * Delete method
     *
     * @param string|null $id National Festival id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
  /*   public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nationalFestival = $this->NationalFestivals->get($id);
        if ($this->NationalFestivals->delete($nationalFestival)) {
            $this->Flash->success(__('The national festival has been deleted.'));
        } else {
            $this->Flash->error(__('The national festival could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    } */
}
