<?php
/**
 * Created by PhpStorm.
 * User: Guilherme Cunha
 * Date: 13/08/2018
 * Time: 20:24.
 */

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class offersTest extends TestCase
{
    use DatabaseMigrations;


    /** @test */
    public function a_user_can_create_offers()
    {

        $callback = [];

        $mockOfferService = $this->getMockBuilder('App\Services\OfferService')
            ->setMethods(['create'])
            ->disableOriginalConstructor()
            ->getMock();

        $offer = [
            'name' => "Offer 1",
            'description' => "Description 1",
            'discount' => "3000",
            'special_code' => "TRQW",
            'expiration' => "123",
        ];


        $mockOfferService->expects($this->once())
            ->method('create')
            ->with($offer)
            ->will($this->returnValue($callback));

        $mockOfferService->create($offer);

    }

    public function test_function_testSample()
    {

        $callback = 0;

        $mockOfferService = $this->getMockBuilder('App\Services\OfferService')
            ->setMethods(['testSample'])
            ->disableOriginalConstructor()
            ->getMock();

        $mockOfferService->expects($this->once())
            ->method('testSample')
            ->with(1)
            ->will($this->returnValue($callback));

        $mockOfferService->testSample(1);

    }
}