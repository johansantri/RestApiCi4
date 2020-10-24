<?php namespace App\Models;
use CodeIgniter\Model;

class Blog extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'blog';    
    protected $primaryKey = 'id';
    protected $returnType = 'array';
   
    protected $allowedFields = [
                                'title',
                                'description',
                            ];
    protected $useTimestamps = true;
    
    protected $validationRules    = [
                                    'title'=>'required|min_length[10]',
                                    'description'=>'required|min_length[10]',
                                    ];
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $validationMessages = [];
    protected $skipValidation     = false;
    protected $useSoftDeletes = true;
}