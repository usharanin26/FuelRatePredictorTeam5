<?php

// require_once 'PHPUnit/Autoload.php';

class ProfileTest extends PHPUnit\Framework\TestCase
{
    private $http;

    public function setUp(): void 
    {
        $this->http = new GuzzleHttp\Client(['base_uri' => 'http://localhost:8001/']);
    }

    public function testRegister()
{
    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", "address1": "test", "address2": "test", 
        "city": "test", "state": "test", "zipcode": "201310"}]');

    $this->assertEquals(200, $response->getStatusCode());

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Profile is Successfully Updated!", $message);

    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "", "address1": "test", "address2": "test", 
        "city": "test", "state": "test", "zipcode": "201310"}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the Full Name", $message);

    $response = $this->http->request('profile_submit', 'POST', '[{
        "fullname": "gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg", "address1": "test", "address2": "test", 
        "city": "test", "state": "test", "zipcode": "test"}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Name can't exceed 50 characters", $message);

    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", "address1": "", "address2": "test", 
        "city": "test", "state": "test", "zipcode": "test"}]');

    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the Address", $message);

    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", 
        "address1": "abcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghij", "address2": "test", 
        "city": "test", "state": "test", "zipcode": "test"}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Address1 can't exceed 100 characters", $message);

    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", 
        "address1": "test", "address2": "test", 
        "city": "", "state": "test", "zipcode": "test"}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the City", $message);

    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", 
        "address1": "test", "address2": "test", 
        "city": "abcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghijabcdefghij", 
        "state": "test", "zipcode": "test"}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("City name can't exceed 100 characters", $message);


    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", 
        "address1": "test", "address2": "test", 
        "city": "test", "state": "", "zipcode": "test"}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please select the State", $message);


    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", 
        "address1": "test", "address2": "test", 
        "city": "test", "state": "test", "zipcode": ""}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Please enter the ZipCode", $message);


    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", 
        "address1": "test", "address2": "test", 
        "city": "test", "state": "test", "zipcode": "12"}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Zip Code should range between 5 to 9 characters", $message);


    $response = $this->http->request('profile_submit', 'POST', '[{"fullname": "test", 
        "address1": "test", "address2": "test", 
        "city": "test", "state": "test", "zipcode": "12345676577"}]');
    $message = $response->getHeaders()["message"][0];

    $this->assertEquals("Zip Code should range between 5 to 9 characters", $message);







}

    public function tearDown(): void {
        $this->http = null;
    }
}