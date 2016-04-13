<?php
App::uses('AppController', 'Controller');
/**
 * Receipts Controller
 *
 * @property Receipt $Receipt
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ReceiptsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();
		if($this->Auth->user('is_admin') != 1){
			if(in_array($this->action, array('index','edit','delete'))){
				$this->redirect('/conferences/index');#if not admin redirect to event`s index
			}
		}
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Receipt->recursive = 0;
		$this->set('receipts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Receipt->exists($id)) {
			throw new NotFoundException(__('Invalid receipt'));
		}
		$options = array('conditions' => array('Receipt.' . $this->Receipt->primaryKey => $id));
		$this->set('receipt', $this->Receipt->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($meeting_id = null) {
		if ($this->request->is('post')) {
			$this->Receipt->create();
			if ($this->Receipt->save($this->request->data)) {
				$this->Flash->success(__('The receipt has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The receipt could not be saved. Please, try again.'));
			}
		}
		$meetings = $this->Receipt->Meeting->find('list');
		$users = $this->Receipt->User->find('list');
		$this->set(compact('meetings', 'users','meeting_id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Receipt->exists($id)) {
			throw new NotFoundException(__('Invalid receipt'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Receipt->save($this->request->data)) {
				$this->Flash->success(__('The receipt has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The receipt could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Receipt.' . $this->Receipt->primaryKey => $id));
			$this->request->data = $this->Receipt->find('first', $options);
		}
		$meetings = $this->Receipt->Meeting->find('list');
		$users = $this->Receipt->User->find('list');
		$this->set(compact('meetings', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Receipt->id = $id;
		if (!$this->Receipt->exists()) {
			throw new NotFoundException(__('Invalid receipt'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Receipt->delete()) {
			$this->Flash->success(__('The receipt has been deleted.'));
		} else {
			$this->Flash->error(__('The receipt could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
