<?php

/**
 * @runTestsInSeparateProcesses
 */

class profileTest extends \PHPUnit\Framework\TestCase
{

    public function testEmptyFullName()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = '';
        $_POST['address1'] = 'address 1';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = 'dallas';
        $_POST['state'] = 'texas';
        $_POST['zipcode'] = '77056';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }
    public function testEmptyAddress()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = 'usha';
        $_POST['address1'] = '';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = 'dallas';
        $_POST['state'] = 'texas';
        $_POST['zipcode'] = '77056';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }
    public function testEmptyCity()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = 'usha';
        $_POST['address1'] = 'address 1';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = '';
        $_POST['state'] = 'texas';
        $_POST['zipcode'] = '77056';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }
    public function testEmptyState()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = 'usha';
        $_POST['address1'] = 'address 1';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = 'dallas';
        $_POST['state'] = 'state';
        $_POST['zipcode'] = '77056';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }
    public function testEmptyZipCode()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = 'usha';
        $_POST['address1'] = 'address 1';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = 'dallas';
        $_POST['state'] = 'texas';
        $_POST['zipcode'] = '';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }

    public function testIncorrectZipCode()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = 'usha';
        $_POST['address1'] = 'address 1';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = 'dallas';
        $_POST['state'] = 'texas';
        $_POST['zipcode'] = '123';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }

    public function testProfileInsertSuccess()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = 'usha';
        $_POST['address1'] = 'address 1';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = 'dallas';
        $_POST['state'] = 'TX';
        $_POST['zipcode'] = '77056';

        session_start();
        $_SESSION['uname'] = 'test7';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(1, $returnvalue, 'expected value equals actual value');
    }
    
    public function testProfileUpdateSuccess()
    {
        $_POST['profile_submit'] = true;
        $_POST['fullname'] = 'usha';
        $_POST['address1'] = 'Houston';
        $_POST['address2'] = 'address 2';
        $_POST['city'] = 'dallas';
        $_POST['state'] = 'TX';
        $_POST['zipcode'] = '77056';

        session_start();
        $_SESSION['uname'] = 'test7';

        $profile = new App\ProfileManagement;
        $returnvalue = $profile->processProfile();

        $this->assertEquals(1, $returnvalue, 'expected value equals actual value');
    }

    
}
