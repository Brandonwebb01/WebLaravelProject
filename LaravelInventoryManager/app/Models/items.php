<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class items extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'items';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function category()
    {
        return $this->HasOne('App\Models\categories', 'id', 'categories_id');
    }
}
