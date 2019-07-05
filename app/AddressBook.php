<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    protected $fillable = [
        'id_acc', 'own_name', 'name', 'surname', 'num_acc_bank_another',
    ];
}
