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

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\StringValue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Validation\UnauthorizedException;

class StringController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function fromUser(Request $request): array
    {
        return [
            'strings' => $request->user()->strings,
        ];
    }

    public function createString(Request $request): Model
    {
        $validated = $this->validate($request, [
            'value' => 'required|string|max:50',
        ]);

        return StringValue::create(array_merge($validated, [
            'user_id' => $request->user()->id,
        ]));
    }

    public function updateString(Request $request, $id): Model
    {
        $validated = $this->validate($request, [
            'value' => 'required|string|max:50',
        ]);

        /** @var StringValue $string */
        $string = StringValue::findOrFail($id);

        if ($string->user->id !== $request->user()->id) {
            throw new UnauthorizedException();
        }

        $string->update($validated);

        return $string;
    }

    public function deleteString(Request $request, $id): array
    {
        /** @var StringValue $string */
        $string = StringValue::findOrFail($id);

        if ($string->user->id !== $request->user()->id) {
            throw new UnauthorizedException();
        }

        return [
            'success' => $string->delete(),
        ];
    }
}
