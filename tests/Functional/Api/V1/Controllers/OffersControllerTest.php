<?php
/**
 * Created by PhpStorm.
 * User: hussein
 * Date: 10/8/18
 * Time: 2:07 PM
 */

namespace App\Functional\Api\V1\Controllers;

use App\User;
use App\Api\V1\Controllers\BooksController;
use App\Book;
use App\Offer;
use App\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class OffersControllerTest extends TestCase
{
    use DatabaseMigrations;
    const BASE_URI = "api/offers";

    public function setUp()
    {
        parent::setUp();
        $user = new User([
            'name' => 'Test',
            'email' => 'test@email.com',
            'password' => '123456'
        ]);

        $user->save();

        $book = new Book();
        $book->name = "testBook";
        $book->type = "testType";
        $book->category = "testCategory";
        $book->owner_id = $user->id;
        $book->save();

        $offer = new Offer();
        $offer->type = "sell";
        $this->be($user);
    }


    public function testIndex()
    {
        $this->get($this::BASE_URI)->assertStatus(200);
    }

    public function testShow()
    {
        $this->get($this::BASE_URI . '/1')->assertStatus(200);
    }

    public function testStore()
    {
        $this->post($this::BASE_URI, ['type' => 'testType',
            'book_id' => 1])
            ->assertStatus(201);
    }

    public function testUpdate()
    {
        $this->patch($this::BASE_URI . '/1', ['type' => 'testType'])
            ->assertStatus(201);
    }


    public function testDestroy()
    {
        $this->delete($this::BASE_URI . '/1')->assertStatus(201);
    }
}