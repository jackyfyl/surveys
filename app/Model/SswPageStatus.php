<?php
App::uses('AppModel', 'Model');
/**
 * SswPageStatus Model
 *
 * @property Suishiwen $Suishiwen
 */
class SswPageStatus extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'ssw_page_status';

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'page_id';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'page_id';

}
