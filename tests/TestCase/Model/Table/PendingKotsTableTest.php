<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PendingKotsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PendingKotsTable Test Case
 */
class PendingKotsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PendingKotsTable
     */
    public $PendingKots;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pending_kots',
        'app.tables',
        'app.employees',
        'app.financial_years',
        'app.pending_kot_rows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PendingKots') ? [] : ['className' => PendingKotsTable::class];
        $this->PendingKots = TableRegistry::getTableLocator()->get('PendingKots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PendingKots);

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
