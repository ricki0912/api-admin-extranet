<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class BUser extends Model
{
    use HasFactory;
    protected $primaryKey = ['eid', 'oid' , 'pid', 'uid', 'escid', 'subid'];
    protected $table = 'base_users';
    public $incrementing = false;
    protected $keyType = 'string';



    protected $fillable = [
        'state', 
        'comments'
    ];

    public function person(): BelongsTo
    {
        //return $this->belongsTo(BPerson::class, ['eid', 'pid'], ['eid', 'pid']);
        return $this->belongsTo(BPerson::class, 'eid', 'eid')->where('pid', $this->pid);
    
    }
}
