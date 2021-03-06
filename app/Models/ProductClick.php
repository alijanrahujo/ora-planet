<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductClick extends Model
{
	protected $table = 'product_cliks';
	protected $fillable = ['product_id'];
	public $timestamps = false;
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
