<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Cunha
 * Date: 13/08/2018
 * Time: 20:24
 */

namespace Tests\Feature;


use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class offersTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_user_can_create_offers()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

}