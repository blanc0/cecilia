<?php

require_once 'cecilia/cecilia/model/Artist.php';

require_once 'PHPUnit/Framework/TestCase.php';

/**
 * Artist test case.
 */
class ArtistTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var Artist
	 */
	private $Artist;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated ArtistTest::setUp()
		
		$this->Artist = new Artist(/* parameters */);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated ArtistTest::tearDown()
		
		$this->Artist = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests Artist->__construct()
	 */
	public function test__construct() {
		// TODO Auto-generated ArtistTest->test__construct()
		$this->markTestIncomplete ( "__construct test not implemented" );
		
		$this->Artist->__construct(/* parameters */);
	
	}

}

