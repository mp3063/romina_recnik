<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RecniciControllerTest extends TestCase
{
    
    public function testIndex()
    {
        $this->visit('/')->see('submit');
    }
}
