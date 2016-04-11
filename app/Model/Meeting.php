<?php
App::uses('AppModel', 'Model');
/**
 * Meeting Model
 *
 * @property Conference $Conference
 * @property Receipt $Receipt
 */
class Meeting extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Conference' => array(
			'className' => 'Conference',
			'foreignKey' => 'conference_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Receipt' => array(
			'className' => 'Receipt',
			'foreignKey' => 'meeting_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
