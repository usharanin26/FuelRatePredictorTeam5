<?php

// require_once 'PHPUnit/Autoload.php';

class FuelQuoteTest extends PHPUnit\Framework\TestCase
{
    private $http;

    public function setUp(): void 
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8001/']);
    }

    public function testFuelQuote()
{
    $response = $this->http->request('fuel_submit', 'POST', '[{"gallons": "10", "delivery_address": "test", "delivery_date": "11/07/2022", "price_per_gallon": "10", "amount_due": "100"}]');

    $this->assertEquals(200, $response->getStatusCode());

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Fuel Quote Submitted Successfully!", $message);

    $response = $this->http->request('fuel_submit', 'POST', '[{"gallons": "", "delivery_address": "test", "delivery_date": "11/07/2022", "price_per_gallon": "10", "amount_due": "100"}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the number of gallons", $message);

    $response = $this->http->request('fuel_submit', 'POST', '[{"gallons": "10", "delivery_address": "test", "delivery_date": "", "price_per_gallon": "10", "amount_due": "100"}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please select the delivery date", $message);

}

    public function tearDown(): void {
        $this->http = null;
    }
}