<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'balance'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    // Method to update user balance
    public function updateBalance($amount)
    {
        $this->balance += $amount;
        $this->save();
    }
}
