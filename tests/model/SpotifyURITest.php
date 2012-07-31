<?php

require_once '../../cecilia/cecilia.bootstrap.php';
require_once 'PHPUnit/Framework/TestCase.php';

/**
 * SpotifyURI test case.
 */
class SpotifyURITest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var SpotifyURI
	 */
	private $SpotifyURI;
	
	private $_uri='spotify:track:6QvAiqUccAUaTR5EkYa2qi';
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		$this->SpotifyURI = new \cecilia\model\SpotifyURI($this->_uri);
	
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated SpotifyURITest::tearDown()
		
		$this->SpotifyURI = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Tests SpotifyURI->__construct()
	 */
	public function test__construct() {
		
		$this->assertEquals('spotify',$this->SpotifyURI->ns);
		$this->assertEquals('track', $this->SpotifyURI->type);
		$this->assertEquals('6QvAiqUccAUaTR5EkYa2qi',$this->SpotifyURI->id);
		$this->assertEquals('http://open.spotify.com/track/6QvAiqUccAUaTR5EkYa2qi',$this->SpotifyURI->open_uri);
		
	}
	
}

