<?php

// require_once 'PHPUnit/Autoload.php';

class LoginTest extends PHPUnit\Framework\TestCase
{
    private $http;

    public function setUp(): void 
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8001/']);
    }

    public function testGetLogin()
{
    $response = $this->http->request('GET', '');

    $this->assertEquals(200, $response->getStatusCode());

    $contentType = $response->getHeaders()["Content-type"][0];

    $this->assertEquals("text/html; charset=UTF-8", $contentType);

    // $userAgent = json_decode($response->getBody())->{"user-agent"};
    // $this->assertRegexp('/Guzzle/', $userAgent);
}

public function testPostLogin() {

    $response = $this->http->request('POST', '[{"username": "admin", "password": "admin"}]');

    $this->assertEquals(200, $response->getStatusCode());

    $contentType = $response->getHeaders()["Content-type"][0];

    $this->assertEquals("text/html; charset=UTF-8", $contentType);

    $response = $this->http->request('POST', '[{"username": "test", "password": "test"}]');

    $this->assertEquals(200, $response->getStatusCode());

    $contentType = $response->getHeaders()["Content-type"][0];

    $this->assertEquals("text/html; charset=UTF-8", $contentType);


    $response = $this->http->request('POST', '[{"username": "admin", "password": ""}]');

    $this->assertEquals(500, $response->getStatusCode());
    $this->assertEquals("text/html; charset=UTF-8", $contentType);

    
}

    public function tearDown(): void {
        $this->http = null;
    }
}