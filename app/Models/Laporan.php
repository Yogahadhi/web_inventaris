<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'created_by');
    }
}
