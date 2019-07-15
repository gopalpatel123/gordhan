<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FloorNosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FloorNosTable Test Case
 */
class FloorNosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FloorNosTable
     */
    public $FloorNos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.floor_nos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('FloorNos') ? [] : ['className' => FloorNosTable::class];
        $this->FloorNos = TableRegistry::getTableLocator()->get('FloorNos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->FloorNos);

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
