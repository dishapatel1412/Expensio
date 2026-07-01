<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Expense extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'expense_name',
        'amount',
        'expense_date',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
