<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'api/upload/add',
        'api/upload/saveimage',
        'api/upload/saveimage',
        'api/upload/addjquery',
        'api/upload/saveimageajax',
        '/api/upload/arrange',
    ];
}
