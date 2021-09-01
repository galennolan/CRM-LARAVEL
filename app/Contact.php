<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'Contact_First', 'Email','Phone',
    ];
    protected $table = 'contact';
    public $timestamps = false;

    

    public function contact_status()
    {
        return $this->belongsTo('App\Contact_status', 'Status');
    }
    


}
