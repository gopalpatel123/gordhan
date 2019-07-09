<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LogHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LogHistoriesTable Test Case
 */
class LogHistoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LogHistoriesTable
     */
    public $LogHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.log_histories',
        'app.employees',
        'app.kots',
        'app.bills'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('LogHistories') ? [] : ['className' => LogHistoriesTable::class];
        $this->LogHistories = TableRegistry::getTableLocator()->get('LogHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->LogHistories);

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
