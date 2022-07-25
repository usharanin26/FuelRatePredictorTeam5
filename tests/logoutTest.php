<?php

/**
 * @runTestsInSeparateProcesses
 */

class logoutTest extends \PHPUnit\Framework\TestCase
{

    public function testLogOut()
    {

        session_start();
        $_SESSION['uname'] = 'test7';

        $logout = new App\Logout;
        $returnvalue = $logout->log_out();

        $this->assertEquals(1, $returnvalue, 'expected value equals actual value');
    }

    
}
