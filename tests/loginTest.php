<?php

/**
 * @runTestsInSeparateProcesses
 */

class loginTest extends \PHPUnit\Framework\TestCase
{

    public function testEmptyUsername()
    {
        $_POST['login'] = true;
        $_POST['username'] = '';
        $_POST['password'] = 'admin';
        $login = new App\ProcessLogin;
        $returnvalue = $login->processLogin();

        $this->assertEquals(2, $returnvalue, 'expected value equals actual value');
    }

    public function testEmptyPassword()
    {

        $_POST['login'] = true;
        $_POST['username'] = 'admin';
        $_POST['password'] = '';
        $login = new App\ProcessLogin;
        $returnvalue = $login->processLogin();

        $this->assertEquals(3, $returnvalue, 'expected value equals actual value');
    }

    public function testAdminLoginInCorrect()
    {

        $_POST['login'] = true;
        $_POST['username'] = 'admin';
        $_POST['password'] = 'dfdifodi';
        $login = new App\ProcessLogin;
        $returnvalue = $login->processLogin();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }

    public function testAdminLoginCorrect()
    {

        $_POST['login'] = true;
        $_POST['username'] = 'test7';
        $_POST['password'] = 'test7';
        $login = new App\ProcessLogin;
        $returnvalue = $login->processLogin();

        $this->assertEquals($_SESSION['uname'], $_POST['username'], 'expected value equals actual value');
    }

    
}
