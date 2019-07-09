<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ReadyOrdersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ReadyOrdersTable Test Case
 */
class ReadyOrdersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ReadyOrdersTable
     */
    public $ReadyOrders;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ready_orders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ReadyOrders') ? [] : ['className' => ReadyOrdersTable::class];
        $this->ReadyOrders = TableRegistry::getTableLocator()->get('ReadyOrders', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ReadyOrders);

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
}
