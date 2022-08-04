<?php

/**
 * @runTestsInSeparateProcesses
 */

class pricingModuleTest extends \PHPUnit\Framework\TestCase
{

    public function testPricingModule()
    {
        $_POST['gallons'] = 1300;        

        session_start();
        $_SESSION['uname'] = 'ccc';

        $pm_obj = new App\PricingModule;
        $returnvalue = $pm_obj->calculate_suggested_price();

        $this->assertEquals(1.695, $returnvalue, 'expected value equals actual value');
    }

    public function testPricingModule2()
    {
        $_POST['gallons'] = 130;        

        session_start();
        $_SESSION['uname'] = 'test6';

        $pm_obj = new App\PricingModule;
        $returnvalue = $pm_obj->calculate_suggested_price();

        $this->assertEquals(1.755, $returnvalue, 'expected value equals actual value');
    }
        
}
