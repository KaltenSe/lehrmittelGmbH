<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bestellposition extends Model
{

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = [
        'ArtikelID',
        'BestellID',
        'BestellMenge',
        'BestellPreis',
        'BestellStatus',
        'Bestellid',
    ];

    public $timestamps = false;

    protected $table='article';

}
