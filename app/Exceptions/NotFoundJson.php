<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Inertia\Inertia;
use Illuminate\Http\Request;

class NotFoundJson extends Exception
{
    public function render($request)
    {
        return Inertia::render('Errors', [
            'errors' => [
                'status' => 404,
                'message' => 'khong co trang nay'
            ]
        ]);
    }
}
