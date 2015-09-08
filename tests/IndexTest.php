<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class IndexTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testIndexPage()
    {
        $this->visit('/')
             ->see('Index');
    }

    public function testLoginButton()
    {
        $this->visit('/')
             ->click('Log in')
             ->seePageIs('user/login');
    }

    public function testRegisterButton()
    {
        $this->visit('/')
             ->click('Register')
             ->seePageIs('user/register');
    }

    public function testChangePasswordButton()
    {
        $this->visit('/')
             ->click('Change password')
             ->seePageIs('user/change-password');
    }

    public function testLogoutButton()
    {
        $this->visit('/')
             ->click('Logout')
             ->seePageIs('/');
    }

    public function testListButton()
    {
        $this->visit('/')
             ->click('List of instructors')
             ->seePageIs('/instructor');
    }

    public function testAddImageButton()
    {
        $this->visit('/')
             ->click('Add Image(Login as instructor first)')
             ->seePageIs('instructor/add-image');
    }
}
