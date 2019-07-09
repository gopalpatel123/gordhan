<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DailyUsagesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DailyUsagesTable Test Case
 */
class DailyUsagesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DailyUsagesTable
     */
    public $DailyUsages;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.daily_usages',
        'app.daily_usage_rows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('DailyUsages') ? [] : ['className' => DailyUsagesTable::class];
        $this->DailyUsages = TableRegistry::getTableLocator()->get('DailyUsages', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->DailyUsages);

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
