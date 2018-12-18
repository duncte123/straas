<?php
/**
 * MIT License
 *
 * Copyright (c) 2018 Duncan Sterken
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 */

use App\Models\StringValue;
use App\Models\User;

class StringControllerTest extends TestCase
{
    /**
     * @var User
     */
    private $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory(User::class)->create();
    }

    public function testUserCanRetrieveStrings()
    {
        /**
         * @var \Illuminate\Database\Eloquent\Collection $stringsCollection
         */
        $stringsCollection = factory(StringValue::class, 5)->create(['user_id' => $this->user->id]);

        // Other users also have strings
        factory(StringValue::class, 3)->create();

        $strings = $stringsCollection->map(function (StringValue $s) {
            return $s->toArray();
        })->toArray();

        $this->get('api/strings', $this->getHeaders($this->user));

        $response = $this->decodeResponseJson()->strings;

        $userStrings = collect($response)->map(function ($s) {
            // Map the values to match the faker return
            return [
                'value' => $s->value,
                'updated_at' => $s->updated_at,
                'created_at' => $s->created_at,
                'id' => $s->id,
            ];
        })->toArray();

        $this->assertCount(5, $strings);
        $this->assertSameSize($strings, $userStrings);
        $this->assertSame($strings, $userStrings);
    }

    public function testUserCanNotRetrieveStringsWhenNotLoggedIn()
    {
        $this->get('api/strings', $this->getHeaders());

        $this->assertResponseStatus(403);
    }

    public function testStringCreationWithValidParameters()
    {
        $data = [
            'value' => str_random(),
        ];

        $currentStrings = $this->user->strings()->get();

        $this->post('api/strings', $data, $this->getHeaders($this->user));

        $newStrings = $this->user->strings()->get();

        $this->assertResponseStatus(200);
        $this->assertCount(0, $currentStrings);
        $this->assertCount(1, $newStrings);
    }

    public function testCannotCreateStringWhenNotLoggedIn()
    {
        $data = [
            'value' => str_random(),
        ];

        $this->post('api/strings', $data, $this->getHeaders());

        $this->assertResponseStatus(403);
    }

    public function testStringCreationFailsWhenStringIsTooLarge()
    {
        $data = [
            'value' => str_random(51),
        ];

        $this->post('api/strings', $data, $this->getHeaders($this->user));

        $this->assertResponseStatus(422);
    }

    public function testUserCanDeleteOwnString()
    {
        $string = factory(StringValue::class)->create(['user_id' => $this->user->id]);

        $this->delete("api/strings/{$string->id}", [], $this->getHeaders($this->user));

        $this->assertResponseOk();
    }

    public function testUserCanNotDeleteOtherStrings()
    {
        $string = factory(StringValue::class)->create();

        $this->delete("api/strings/{$string->id}", [], $this->getHeaders($this->user));

        $this->assertResponseStatus(403);
    }

    public function testUserCanUpdateOwnedString()
    {
        $string = factory(StringValue::class)->create(['user_id' => $this->user->id]);

        $oldVal = $string->value;

        $data = [
            'value' => str_random(),
        ];

        $this->patch("api/strings/{$string->id}", $data, $this->getHeaders($this->user));

        $newVal = $this->decodeResponseJson()->value;

        $this->assertNotSame($oldVal, $newVal);
    }

    public function testUserCanNotUpdateOtherString()
    {
        $string = factory(StringValue::class)->create();

        $data = [
            'value' => str_random(),
        ];

        $this->patch("api/strings/{$string->id}", $data, $this->getHeaders($this->user));

        $this->assertResponseStatus(403);
    }
}
