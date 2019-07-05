<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $fillable = [
        'email', 'id_acc', 'money', 'num_acc_bank',
    ];
}
