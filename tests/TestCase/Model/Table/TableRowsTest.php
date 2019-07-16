<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TableRows;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TableRows Test Case
 */
class TableRowsTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TableRows
     */
    public $TableRows;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Rows') ? [] : ['className' => TableRows::class];
        $this->TableRows = TableRegistry::getTableLocator()->get('Rows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TableRows);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
