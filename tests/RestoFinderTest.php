<?php

use Illuminate\Http\Response;

class RestoFinderTest extends TestCase {

    /**
     * Test HomePage
     * @return void
     */
    public function testApplication() {
        $response = $this->call('GET', '/');
        $this->assertEquals(200, $response->status());
    }

    /**
     * Test Api with sort parameter
     * @return void
     */
    public function testApiWithSort() {
        $response = $this->call('POST', '/get-restaurants', ['sortKey' => 'bestMatch']);
        $this->assertEquals(200, $response->status());
    }

    /**
     * Test Api with search parameter 
     * @return void
     */
    public function testApiWithSearch() {
        $response = $this->call('POST', '/get-restaurants', ['search' => 'sushi']);
        $this->assertEquals(200, $response->status());
    }

    /**
     * Test Api with full parameters 
     * @return void
     */
    public function testApiFullParams() {
        $response = $this->call('POST', '/get-restaurants', ['sortKey' => 'bestMatch', 'search' => 'sushi', 'favorites' => array('Fes Patisserie', 'Zenzai Sushi')]);
        $this->assertEquals(200, $response->status());
    }

}
