<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Migrations\Test\Fixture;

use Cake\Database\Driver\Mysql;
use Cake\Datasource\ConnectionManager;
use Cake\TestSuite\Fixture\TestFixture;

/**
 * Class ProductsFixture
 */
class ProductsFixture extends TestFixture
{
    /**
     * @inheritDoc
     */
    public function init(): void
    {
        $connection = ConnectionManager::get($this->connection());
        $driver = $connection->getDriver();

        if ($driver instanceof Mysql) {
            $dbv = getenv('DBV');
            if ($dbv === '56') {
                $this->fields['_indexes']['title_idx_ft']['type'] = 'fulltext';
            }
        }

        parent::init();
    }
}
