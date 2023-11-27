<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPerson extends Model
{
    use HasFactory;
    protected $primaryKey = ['eid', 'pid'];
    protected $table = 'base_person';
    
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'typedoc',
        'numdoc',
        'last_name0',
        'last_name1',
        'first_name',
        'birthday',
        'sex',
        'civil',
        'mail_person',
        'mail_work',
        'phone',
        'cellular',
        'location',
        'address',
        'register',
        'created',
        'updated',
        'modified',
        'photografy',
        'religion',
        'sports',
        'datos',
        'phone_emergency'
        
    ];







}
