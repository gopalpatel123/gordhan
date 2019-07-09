<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DailyUsageRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DailyUsageRowsTable Test Case
 */
class DailyUsageRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DailyUsageRowsTable
     */
    public $DailyUsageRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.daily_usage_rows',
        'app.daily_usages',
        'app.raw_materials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DailyUsageRows') ? [] : ['className' => DailyUsageRowsTable::class];
        $this->DailyUsageRows = TableRegistry::getTableLocator()->get('DailyUsageRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DailyUsageRows);

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
