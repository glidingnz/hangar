<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Org extends Model
{
	protected $fillable = ['name', 'website', 'slug', 'gnz_code','type'];
}
