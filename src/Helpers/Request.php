<?php

namespace Speedo\helpers;

use Symfony\Component\HttpFoundation\Request as symfonyRequest;

/**
 * [Description BaseController]
 * This controller will load the base fuction required to run this mini framework
 */
class Request
{
    public function __construct()
    {
        $this->request = symfonyRequest::createFromGlobals();
    }

    public function all()
    {
        return [
            'post'       => $this->request->request,
            'get'        => $this->request->query,
            'cookies'    => $this->request->cookies,
            'attributes' => $this->request->attributes,
            'files'      => $this->request->files,
            'server'     => $this->request->server,
            'headers'    => $this->request->headers,
        ];
    }
}
