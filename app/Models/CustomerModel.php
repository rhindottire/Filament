<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customers'; // class model should match with migration table
    protected $guarded = [];
}
