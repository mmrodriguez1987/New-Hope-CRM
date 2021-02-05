<?php

namespace newhopecrm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $fillable = ['name'];


    // public function scopeSearch($query, $target)
    // {
    //     if ($target != '') {
    //         return $query->
    //             where('name', 'like', "%$target%")
    //             ->orWhere('id', $target);
    //     }
    // }
}
