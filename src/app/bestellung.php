<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bestellung extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'BenutzerId',
        'BestellungsZeitpunkt',
        'Status',
    ];

    public $timestamps = false;

    protected $table = 'bestellung';
}
