<?php

// require_once 'PHPUnit/Autoload.php';

class LogoutTest extends PHPUnit\Framework\TestCase
{
    private $http;

    public function setUp(): void 
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8001/']);
    }

    public function testLogout()
{
    $response = $this->http->request('logout', 'GET', '');

    $this->assertEquals(200, $response->getStatusCode());

    $contentType = $response->getHeaders()["Content-type"][0];

    $this->assertEquals("text/html; charset=UTF-8", $contentType);

}

    public function tearDown(): void {
        $this->http = null;
    }
}