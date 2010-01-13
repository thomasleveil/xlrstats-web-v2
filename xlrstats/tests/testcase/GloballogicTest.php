<?php
require_once 'PHPUnit/Framework.php';

// load the php file you want to test 
require_once dirname(__FILE__).'/../../xlrstats/func-globallogic.php';
 
class GloballogicTest extends PHPUnit_Framework_TestCase
{
    public function testArray_find()
    {
    	
        $this->assertFalse(array_find('whatever', array()));
        $this->assertFalse(array_find(0, array()));
        $this->assertFalse(array_find(false, array()));
        $this->assertFalse(array_find('', array()));
        
        $this->assertFalse(array_find(null, array(0,4,7,65,null,'mlkj')));
        $this->assertFalse(array_find('whatever', array(0,4,7,65,null,'mlkj')));
        $this->assertFalse(array_find(0, array(0,4,7,65,null,'mlkj')));
        $this->assertFalse(array_find(false, array(0,4,7,65,null,'mlkj')));
        
        $this->assertTrue(array_find('key', array('key')));
        $this->assertFalse(array_find('key', array('KEY')));
        $this->assertTrue(array_find('key', array('xxxkey')));
        $this->assertTrue(array_find('key', array('keyxxxxx')));
        $this->assertTrue(array_find('key', array('xxxxkeyxxxxx')));
        
        $this->assertTrue(array_find('key', array('oiuou', 'key')));
        $this->assertFalse(array_find('key', array('oiuou', 'KEY')));
        $this->assertTrue(array_find('key', array('oiuou', 'xxxkey')));
        $this->assertTrue(array_find('key', array('oiuou', 'keyxxxxx')));
        $this->assertTrue(array_find('key', array('oiuou', 'xxxxkeyxxxxx')));
        
        $this->assertTrue(array_find('key', array('key', 'mlkj')));
        $this->assertFalse(array_find('key', array('KEY', 'mlkj')));
        $this->assertTrue(array_find('key', array('xxxkey', 'mlkj')));
        $this->assertTrue(array_find('key', array('keyxxxxx', 'mlkj')));
        $this->assertTrue(array_find('key', array('xxxxkeyxxxxx', 'mlkj')));
        
        $this->assertTrue(array_find('key', array('oiuou', 'key', 'mlkj')));
        $this->assertFalse(array_find('key', array('oiuou', 'KEY', 'mlkj')));
        $this->assertTrue(array_find('key', array('oiuou', 'xxxkey', 'mlkj')));
        $this->assertTrue(array_find('key', array('oiuou', 'keyxxxxx', 'mlkj')));
        $this->assertTrue(array_find('key', array('oiuou', 'xxxxkeyxxxxx', 'mlkj')));
        
    }
    
    public function testArray_find_bug_empty_string()
    {
        $this->assertFalse(array_find('', array(0,4,7,65,null,'mlkj')));
    }
        
}
?>