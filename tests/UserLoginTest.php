<?php

namespace Tests;

use Laravel\Passport\Passport;
use App\User;
use Faker\Factory;

class UserLoginTest extends \TestCase {
    
    /**
     * @group user
     */
    public function testLogin() {
        $faker = Factory::create();
        $email = $faker->email;
        Passport::actingAs(
                factory(User::class)->create([
                    'email' => $email,
                    'name' => $faker->name
                ])
        );
        $response = $this->call('POST', '/api/profile');
        $response->assertStatus(200)
                ->assertJsonPath('email', $email);
    }
    
    /**
     * @group user
     * @depends Tests\RegistrationTest::testRegularUserRegistration
     */
    public function testUserProfile() {
        Passport::actingAs(
                factory(User::class)->create([
                    'email' => config('testing.regular_user.email'),
                ]) );
        $response = $this->call('POST', '/api/profile');
        $response->assertStatus(200)
                ->assertJsonPath('email', config('testing.regular_user.email'));
    }

}
