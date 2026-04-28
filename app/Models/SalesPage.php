<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesPage extends Model
{
  protected $fillable = [
    'user_id',
    'product_name',
    'input_data',
    'generated_content'
  ];
}
