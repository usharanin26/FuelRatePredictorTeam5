<?php

// require_once 'PHPUnit/Autoload.php';

class FuelQuoteTest extends PHPUnit\Framework\TestCase
{
    private $http;

    public function setUp(): void 
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8001/']);
    }

    public function testRegister()
{
    $response = $this->http->request('register', 'POST', '[{"username": "test", "password": "test", "re_enter_password": "test"}]');

    $this->assertEquals(200, $response->getStatusCode());

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Registration is Successful", $message);

    $response = $this->http->request('fuel_submit', 'POST', '[{"username": "", "password": "test", "re_enter_password": "test"}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the Username", $message);

    $response = $this->http->request('fuel_submit', 'POST', '[{"username": "test", "password": "", "re_enter_password": "test"}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the Password", $message);

    $response = $this->http->request('fuel_submit', 'POST', '[{"username": "test", "password": "test", "re_enter_password": ""}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the confirm password", $message);

    $response = $this->http->request('fuel_submit', 'POST', '[{"username": "test", "password": "test", "re_enter_password": "t"}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please re-enter the correct password", $message);

}

    public function tearDown(): void {
        $this->http = null;
    }
}