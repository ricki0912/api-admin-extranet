<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BUserAuth extends Model
{
    use HasFactory;
    
    protected $primaryKey = ['uaid', 'eid', 'oid' , 'pid', 'uid', 'escid', 'subid'];
    protected $table = 'base_users_auth';
    public $incrementing = false;
    protected $keyType = 'string';



    protected $fillable = [
        'eid',
        'oid', 
        'pid', 
        'uid', 
        'escid', 
        'subid', 

        'token'
    ];

    public function user(): BelongsTo
    {
        //return $this->belongsTo(BPerson::class, ['eid', 'pid'], ['eid', 'pid']);
        return $this->belongsTo(User::class, 'eid', 'eid')
            ->where('oid', $this->oid)
            ->where('uid', $this->uid)
            ->where('pid', $this->pid)
            ->where('escid', $this->escid)
            ->where('subid', $this->subid);
    }

}
