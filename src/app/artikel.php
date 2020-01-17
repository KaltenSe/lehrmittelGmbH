<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'Id';

    /**
     * @var array
     */
    protected $fillable = [
        'Aktiv',
        'Beschreibung',
        'Bestand',
        'Lieferzeit',
        'Bild',
        'Name',
        'Preis'
    ];

    public $timestamps = false;

    protected $table='artikel';

    protected $connection = 'mysql';
}
