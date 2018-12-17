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

namespace App\Helpers;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;
use ReflectionObject;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResponseException
{
    /**
     * @var Exception|HttpException
     */
    public $exception;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    public function toResponse(): JsonResponse
    {
        return response()->json($this->getResponseData(), $this->getStatusCode(), $this->getHeaders());
    }

    private function getResponseData(): array
    {
        return [
            'error' => [
                'type' => (new ReflectionObject($this->exception))->getShortName(),
                'message' => $this->getMessage(),
            ],
        ];
    }

    private function getMessage(): string
    {
        $message = $this->exception->getMessage();

        if (!empty($message)) {
            return $message;
        }

        switch (get_class($this->exception)) {
            case NotFoundHttpException::class:
                return 'Page not found.';
            case ModelNotFoundException::class:
                return 'No result for model query.';
            case MethodNotAllowedHttpException::class:
                return 'Method not allowed.';
            case UnauthorizedException::class:
                return 'Unauthorized';
            default:
                return 'Internal Server Error';
        }
    }

    private function getStatusCode(): int
    {
        if (method_exists($this->exception, 'getStatusCode')) {
            return $this->exception->getStatusCode();
        }


        switch (get_class($this->exception)) {
            case AuthenticationException::class:
                return 401;
            case AuthorizationException::class:
            case UnauthorizedException::class:
                return 403;
            case ModelNotFoundException::class:
            case NotFoundHttpException::class:
                return 404;
            case ValidationException::class:
                return 422;
            default:
                return 500;
        }
    }

    private function getHeaders(): array
    {
        if (method_exists($this->exception, 'getHeaders')) {
            return $this->exception->getHeaders();
        }

        return [];
    }

}
