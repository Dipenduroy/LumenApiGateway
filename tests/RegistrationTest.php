<?php

namespace Tests;

class RegistrationTest extends \TestCase {

    private function registerCall($defaultParams = null) {
        $params = $defaultParams ?? [
            'name' => config('testing.regular_user.name'),
            'email' => config('testing.regular_user.email'),
            'password' => config('testing.regular_user.password')];
        return $this->call('POST', '/register', $params);
    }

    /**
     * @author Dipendu Roy
     * @group API
     * @group user
     * Test Regular User Registration
     */
    public function testRegularUserRegistration() {
        $register_response = $this->registerCall();
        $this->assertEquals(201, $register_response->status());
        $this->seeInDatabase('users', ['email' => config('testing.regular_user.email')]);
        $duplicate_register_response = $this->registerCall();
        $this->assertEquals(422, $duplicate_register_response->status());
    }

}
