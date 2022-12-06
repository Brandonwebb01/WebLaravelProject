<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class categories extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'categories';
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function items()
    {
        return $this->HasMany('App\Models\items', 'items_id');
    }
}
