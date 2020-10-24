<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Blog as BlogModel;
class Blog extends BaseController
{
	use \CodeIgniter\API\ResponseTrait;
	public function index()
    {
		$blogs = new BlogModel;
		$blog=$blogs->findAll();
		
		if(! $blog)
		{
			return $this->fail('user not found',404);
		}
		return $this->respond($blog);
    }
	//--------------------------------------------------------------------
	public function show($id = null)
	{
		$blogs = new BlogModel;
		$blog=$blogs->find($id);
		
		if(! $blog)
		{
			return $this->fail('user not found',404);
		}
		return $this->respond($blog);
	}
	public function create()
	
	{	
		$data = $this->request->getPost();
		$blog = new BlogModel;
		$id = $blog->insert($data);
		if($blog->errors()){
			return $this->fail($blog->errors());
		}
		if($id === false){
			return $this->failServerError();
		}
		$blogs = $blog->getWhere(['id' => $id])->getResult();
		$blogs['url']=site_url('/blog/'.$id);
		$this->response->setHeader('location',$blogs['url']);
		return $this->respondCreated($blogs);
	}
	
	public function update($id)
	{
		$data = $this->request->getRawInput();
		$blog = new BlogModel;
		$updated = $blog->update($id,$data);
		if($blog->errors()){
			return $this->fail($blog->errors());
		}
		if($updated===false){
			return $this->failServerError();
		}
		$blogs = $blog->getWhere(['id' => $id])->getResult();
		$blogs['url']=site_url('/blog/'.$id);
		$this->response->setHeader('location',$blogs['url']);
		return $this->respond($blogs);
	}
	public function delete($id)
	{
		$blog = new BlogModel;
		$deleted=$blog->delete($id);
		
		return $this->respondDeleted([$deleted]);
	}

}
