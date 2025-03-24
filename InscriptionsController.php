<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Inscriptions Controller
 *
 * @property \App\Model\Table\InscriptionsTable $Inscriptions
 */
class InscriptionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Inscriptions->find()
            ->contain(['Forfait', 'Machine', 'Users']);
        $inscriptions = $this->paginate($query);

        $this->set(compact('inscriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Inscription id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inscription = $this->Inscriptions->get($id, contain: ['Forfait', 'Machine', 'Users']);
        $this->set(compact('inscription'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $inscription = $this->Inscriptions->newEmptyEntity();
        if ($this->request->is('post')) {
            $inscription = $this->Inscriptions->patchEntity($inscription, $this->request->getData());
            if ($this->Inscriptions->save($inscription)) {
                $this->Flash->success(__('The inscription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscription could not be saved. Please, try again.'));
        }
        $forfait = $this->Inscriptions->Forfait->find('list', limit: 200)->all();
        $machine = $this->Inscriptions->Machine->find('list', limit: 200)->all();
        $users = $this->Inscriptions->Users->find('list', limit: 200)->all();
        $this->set(compact('inscription', 'forfait', 'machine', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Inscription id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inscription = $this->Inscriptions->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inscription = $this->Inscriptions->patchEntity($inscription, $this->request->getData());
            if ($this->Inscriptions->save($inscription)) {
                $this->Flash->success(__('The inscription has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The inscription could not be saved. Please, try again.'));
        }
        $forfait = $this->Inscriptions->Forfait->find('list', limit: 200)->all();
        $machine = $this->Inscriptions->Machine->find('list', limit: 200)->all();
        $users = $this->Inscriptions->Users->find('list', limit: 200)->all();
        $this->set(compact('inscription', 'forfait', 'machine', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Inscription id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inscription = $this->Inscriptions->get($id);
        if ($this->Inscriptions->delete($inscription)) {
            $this->Flash->success(__('The inscription has been deleted.'));
        } else {
            $this->Flash->error(__('The inscription could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
