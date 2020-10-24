<?php
namespace App\Controllers;
use CodeIgniter\Controller;
/**
 * 
 */
class Demo extends Controller
{
	
	public function demo1(){
		return $this->response->setStatusCode(200)
						->setContentType('text/plain')
					   ->setBody('demo1');
	}


	public function demo2(){
	return	$this->response->setStatusCode(200)
						->setContentType('text/plain')
					   ->setBody('demo2');
	}
}