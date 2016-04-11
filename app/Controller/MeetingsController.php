<?php
App::uses('AppController', 'Controller');
/**
 * Meetings Controller
 *
 * @property Meeting $Meeting
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class MeetingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Meeting->recursive = 0;
		$this->set('meetings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Meeting->exists($id)) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		$options = array('conditions' => array('Meeting.' . $this->Meeting->primaryKey => $id));
		$this->set('meeting', $this->Meeting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Meeting->create();
			if ($this->Meeting->save($this->request->data)) {
				$this->Flash->success(__('The meeting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The meeting could not be saved. Please, try again.'));
			}
		}
		$conferences = $this->Meeting->Conference->find('list');
		$this->set(compact('conferences'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Meeting->exists($id)) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Meeting->save($this->request->data)) {
				$this->Flash->success(__('The meeting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The meeting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Meeting.' . $this->Meeting->primaryKey => $id));
			$this->request->data = $this->Meeting->find('first', $options);
		}
		$conferences = $this->Meeting->Conference->find('list');
		$this->set(compact('conferences'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Meeting->id = $id;
		if (!$this->Meeting->exists()) {
			throw new NotFoundException(__('Invalid meeting'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Meeting->delete()) {
			$this->Flash->success(__('The meeting has been deleted.'));
		} else {
			$this->Flash->error(__('The meeting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
