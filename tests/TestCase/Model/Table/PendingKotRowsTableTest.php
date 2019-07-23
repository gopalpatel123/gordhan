<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PendingKotRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PendingKotRowsTable Test Case
 */
class PendingKotRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PendingKotRowsTable
     */
    public $PendingKotRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pending_kot_rows',
        'app.pending_kots',
        'app.items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PendingKotRows') ? [] : ['className' => PendingKotRowsTable::class];
        $this->PendingKotRows = TableRegistry::getTableLocator()->get('PendingKotRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PendingKotRows);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
