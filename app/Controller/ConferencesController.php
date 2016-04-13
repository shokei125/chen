<?php
App::uses('AppController', 'Controller');
/**
 * Conferences Controller
 *
 * @property Conference $Conference
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class ConferencesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index','view');
		if($this->Auth->user('is_admin') != 1){
			if(in_array($this->action, array('add','edit','delete'))){
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
		$this->Conference->recursive = 0;
		$this->set('conferences', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Conference->exists($id)) {
			throw new NotFoundException(__('Invalid conference'));
		}
		$options = array('conditions' => array('Conference.' . $this->Conference->primaryKey => $id));
		$this->set('conference', $this->Conference->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Conference->create();
			if ($this->Conference->save($this->request->data)) {
				$this->Flash->success(__('The conference has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The conference could not be saved. Please, try again.'));
			}
		}
		$events = $this->Conference->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Conference->exists($id)) {
			throw new NotFoundException(__('Invalid conference'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Conference->save($this->request->data)) {
				$this->Flash->success(__('The conference has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The conference could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Conference.' . $this->Conference->primaryKey => $id));
			$this->request->data = $this->Conference->find('first', $options);
		}
		$events = $this->Conference->Event->find('list');
		$this->set(compact('events'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Conference->id = $id;
		if (!$this->Conference->exists()) {
			throw new NotFoundException(__('Invalid conference'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Conference->delete()) {
			$this->Flash->success(__('The conference has been deleted.'));
		} else {
			$this->Flash->error(__('The conference could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
