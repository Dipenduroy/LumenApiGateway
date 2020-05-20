<?php

class CheckMicroServiceStatusTest extends TestCase {
    
    public function testUserSubjectsApi() {
        $this->get(env('USER_SUBJECTS_SERVICE'));
        $this->assertStringStartsWith('Lumen',$this->response->getContent(),'Service is not working');
    }
    
    public function testUserPreferencesApi() {
        $this->get(env('USER_PREFERENCES_SERVICE'));
        $this->assertStringStartsWith('Lumen',$this->response->getContent(),'Service is not working');
    }
    
    /**
     * @depends testUserSubjectsApi
     * @depends testUserPreferencesApi
     */
    public function testIsSystemStable() {
        $this->assertTrue(true);
    }
    
}