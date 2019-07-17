<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TodayMenusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TodayMenusTable Test Case
 */
class TodayMenusTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TodayMenusTable
     */
    public $TodayMenus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.today_menus',
        'app.today_menu_rows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('TodayMenus') ? [] : ['className' => TodayMenusTable::class];
        $this->TodayMenus = TableRegistry::getTableLocator()->get('TodayMenus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TodayMenus);

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
