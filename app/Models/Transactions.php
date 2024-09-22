<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class transactions extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'transaction_name',
        'transaction_date',
        'transaction_category',
        'transaction_amount',
        'transaction_type'
    ];

    public function userRelation(){
        return $this->belongsTo(User::class, 'user_id');
    }

}
