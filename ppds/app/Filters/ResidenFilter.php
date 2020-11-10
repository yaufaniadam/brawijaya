<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ResidenFilter implements FilterInterface
{
    public function before(RequestInterface $request)
    {
        if (session('role') != 4) {
            return redirect()->to(base_url('/'))->with('warning', "you don't have permission to access this feature");
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response)
    {
        // Do something here
    }
}
