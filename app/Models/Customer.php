<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'customer';
    protected $fillable = [
        'username', 'password', 'email'
    ];
    protected $primaryKey = 'id';

    // const CREATED_AT = 'created_at'
    // const UPDATED_AT = 'updated_at';


}
