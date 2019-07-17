<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuSubCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuSubCategoriesTable Test Case
 */
class MenuSubCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuSubCategoriesTable
     */
    public $MenuSubCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.menu_sub_categories',
        'app.menu_categories',
        'app.menu_items'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MenuSubCategories') ? [] : ['className' => MenuSubCategoriesTable::class];
        $this->MenuSubCategories = TableRegistry::getTableLocator()->get('MenuSubCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MenuSubCategories);

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
