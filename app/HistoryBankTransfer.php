<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryBankTransfer extends Model
{
    protected $fillable = [
        'id_acc', 'amount', 'num_acc_to', 'description',
    ];
}
