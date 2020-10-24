<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class BasicAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (empty($_SERVER['PHP_AUTH_USER'])) {
        	die('anda tidak ada akses');
        }else{
        	$username=$_SERVER['PHP_AUTH_USER'];
        	$password=$_SERVER['PHP_AUTH_PW'];
        	
        	if ( $username !='admin' || $password != 'admin') {
        		die('anda tidak ada akses, password user tidak cocok');
        	}
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}