<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    // Table Name
    protected $table = 'entries';

    // Primary Key
    public $primaryKey = 'id';

    // Timestamps
    public $timestamps = true;
}
