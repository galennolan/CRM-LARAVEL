<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';
    protected $primaryKey = 'idu';
    public $incrementing = false;
    public $timestamps = false;
    
    public function todo_desc()
    {
        return $this->belongsTo('App\todo_desc', 'Todo_Desc_ID');
    }

    public function todo_type()
    {
        return $this->belongsTo('App\todo_type', 'Todo_Type_ID');
    }

    public function contact()
    {
        return $this->belongsTo('App\Contact', 'Contact');
    }
    
}
