<?php

/**
 * @runTestsInSeparateProcesses
 */

class registrationTest extends \PHPUnit\Framework\TestCase
{

    public function testEmptyUsername()
    {
        $_POST['register'] = true;
        $_POST['username'] = '';
        $_POST['password'] = 'admin';
        $_POST['re_enter_password'] = 'admin';
        $register = new App\Register;
        $returnvalue = $register->process_register();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }

    public function testEmptyPassword()
    {

        $_POST['register'] = true;
        $_POST['username'] = 'admin';
        $_POST['password'] = '';
        $_POST['re_enter_password'] = 'admin';
        $register = new App\Register;
        $returnvalue = $register->process_register();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }

    public function testEmptyConfirmPassword()
    {

        $_POST['register'] = true;
        $_POST['username'] = 'admin';
        $_POST['password'] = 'admin';
        $_POST['re_enter_password'] = '';
        $register = new App\Register;
        $returnvalue = $register->process_register();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }

    public function testRegistrationSuccess()
    {

        $_POST['register'] = true;
        $_POST['username'] = 'test8';
        $_POST['password'] = 'test8';
        $_POST['re_enter_password'] = 'test8';
        $register = new App\Register;
        $returnvalue = $register->process_register();

        $this->assertEquals(1, $returnvalue, 'expected value equals actual value');
    }
}
