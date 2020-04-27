<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vales extends Model
{
    use SoftDeletes;
    
    protected $table = 'vales';
    protected $primaryKey ='ID_DEPT';
    protected $fillable=['ID_DEPT','Nombre','ID_EMP'];

    protected $data = ['delete_at'];
}
