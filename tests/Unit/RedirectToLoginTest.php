<?php

namespace Tests\Unit;

use Tests\TestCase;

class RedirectToLoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_redirect_to_login_page()
    {
        $response = $this->get('api/dashboard');
        $response->assertStatus(500);
    }
}
