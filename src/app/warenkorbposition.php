<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class warenkorbposition extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = [
        'Anzahl',
        'ArtikelId',
        'BenutzerId',
    ];

    public $timestamps = false;

    protected $table = 'warenkorbposition';
}
