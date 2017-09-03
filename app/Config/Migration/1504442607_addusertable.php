<?php
class Addusertable extends CakeMigration {

/**
 * Migration description
 *
 * @var string
 * @access public
 */
	public $description = '';

/**
 * Actions to be performed
 *
 * @var array $migration
 * @access public
 */
	public $migration = array(
		'up' => array(
		    'create_table' => array(
		        'users' => array(
		            'id' => array(
		                'type' => 'integer',
                        'null' => false,
                        'default' => null,
                        'length' => 10,
                        'unsigned' => true,
                        'key' => 'primary'
                    ),
                    'email' => array(
                        'type' => 'string',
                        'null' => true,
                        'default' => null,
                        'unsigned' => false
                    ),
                ),
            ),
		),
		'down' => array(
		    'drop_table' => array(
		        'users'
            ),
		),
	);

/**
 * Before migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function before($direction) {
		return true;
	}

/**
 * After migration callback
 *
 * @param string $direction, up or down direction of migration process
 * @return boolean Should process continue
 * @access public
 */
	public function after($direction) {
		return true;
	}
}
