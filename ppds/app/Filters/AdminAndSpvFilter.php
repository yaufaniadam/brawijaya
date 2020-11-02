<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AdminAndSpvFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if (session('role') != 3) {
            return redirect()->to('/')->with('warning', "you don't have <strong>permission</strong> to access this feature");
        }
    }

    //--------------------------------------------------------------------
    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
