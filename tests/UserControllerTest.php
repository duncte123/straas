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

class UserControllerTest extends TestCase
{
    public function testUserCanBeCreated()
    {
        $this->assertCount(0, User::all());

        $this->post('api/tokens');

        $this->assertArrayHasKey('token', $this->decodeResponseJson(true));
        $this->assertCount(1, User::all());
    }

    public function testUserTokenCanBeUpdated()
    {
        $user = factory(User::class)->create();

        $oldToken = $user->token;

        $this->patch('api/tokens', [], $this->getHeaders($user));

        $newToken = User::find($user->id)->token;

        $response = $this->decodeResponseJson(true);

        $this->assertNotSame($oldToken, $newToken);
        $this->assertArrayHasKey('token', $response);
        $this->assertSame($newToken, $response['token']);
    }

    public function testUserCanBeDeleted()
    {
        $user = factory(User::class)->create();

        $this->delete('api/tokens', [], $this->getHeaders($user));

        $response = $this->decodeResponseJson(true);

        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success']);
    }

    public function testUserStringsAreDeletedWhenUserIsDeleted()
    {
        $user = factory(User::class)->create();

        factory(StringValue::class, 10)->create(['user_id' => $user->id]);

        $this->delete('api/tokens', [], $this->getHeaders($user));

        $response = $this->decodeResponseJson(true);
        $strings = StringValue::withTrashed()->get();

        $this->assertArrayHasKey('success', $response);
        $this->assertTrue($response['success']);
        $this->assertCount(0, $strings);
    }

}
