<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NationalFestivalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NationalFestivalsTable Test Case
 */
class NationalFestivalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NationalFestivalsTable
     */
    public $NationalFestivals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.national_festivals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NationalFestivals') ? [] : ['className' => NationalFestivalsTable::class];
        $this->NationalFestivals = TableRegistry::getTableLocator()->get('NationalFestivals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NationalFestivals);

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
