<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMail extends Model
{
    protected $table = 'contact_mails';
    protected $fillable= [
        'first_name',
        'last_name',
        'phone',
        'email',
        'message'
    ];
}
