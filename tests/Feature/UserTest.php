<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * Login page test
     *
     * @return void
     */
    public function testLoginPage()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }
    
    /**
     * Signup page test
     *
     * @return void
     */
    public function testSignupPage()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
    
    /**
     * Signup submit test
     *
     * @return void
     */
    public function testSignupSubmit()
    {
        
        $this->post('/register', ['name' => 'Milton', 
                                  'email' => 'giovangonzalez@gmail.com', 
                                  'password' => '123456',
                                  'height' => '168',
                                  'weight' => '70',
                                  ])
             ->assertLocation('/home');
             
        
    }
    
    /**
     * Login submit test
     *
     * @return void
     */
    public function testLoginSubmit()
    {
        $this->post('/login', ['email' => 'giovangonzalez@gmail.com', 'password' => '123456'])
             ->assertLocation('/home');
        
    }
    
}
