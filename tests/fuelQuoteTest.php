<?php

/**
 * @runTestsInSeparateProcesses
 */

class fuelQuoteTest extends \PHPUnit\Framework\TestCase
{

    public function testEmptyGallons()
    {
        $_POST['fuel_submit'] = true;
        $_POST['gallons'] = '';
        $_POST['delivery_address'] = 'address 1';
        $_POST['delivery_date'] = '2022/4/5';
        $_POST['price_per_gallon'] = 3;
        $_POST['amount_due'] = 90;

        $profile = new App\FuelQuoteForm;
        $returnvalue = $profile->process_fuel_quote_form();

        $this->assertEquals(0, $returnvalue, 'expected value equals actual value');
    }

    public function testEmptyDeliveryDate()
    {
        $_POST['fuel_submit'] = true;
        $_POST['gallons'] = 40;
        $_POST['delivery_address'] = 'address 1';
        $_POST['delivery_date'] = '';
        $_POST['price_per_gallon'] = 3;
        $_POST['amount_due'] = 120;

        $profile = new App\FuelQuoteForm;
        $returnvalue = $profile->process_fuel_quote_form();

        $this->assertEquals(-1, $returnvalue, 'expected value equals actual value');
    }

    public function testFuelQuoteSuccess()
    {
        $_POST['fuel_submit'] = true;
        $_POST['gallons'] = 40;
        $_POST['delivery_address'] = 'address 1';
        $_POST['delivery_date'] = '2022/4/5';
        $_POST['price_per_gallon'] = 3;
        $_POST['amount_due'] = 120;

        session_start();
        $_SESSION['uname'] = 'test7';

        $profile = new App\FuelQuoteForm;
        $returnvalue = $profile->process_fuel_quote_form();

        $this->assertEquals(1, $returnvalue, 'expected value equals actual value');
    }
        
}
