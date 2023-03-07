<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 
        'description', 
        'quantity',
        'unitPrice',
        'amountSold',
        'userId'
    ];


    public function owner():BelongsTo
    {
            return $this->belongsTo(Users::class, 'userId', 'id');
    }


}
