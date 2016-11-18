<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_home_screen_not_authenticated()
    {
        $this->visit('/')->see('Login');
    }
    
    
    
    public function test_home_screen_authenticated()
    {
        Auth::loginUsingId(1);
        $this->visit('/')->see('New Dictionary');
    }
}
