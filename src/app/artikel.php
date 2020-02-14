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
        'Name',
        'Beschreibung',
        'Lagerplatz',
        'Preis',
        'Lieferzeit',
        'Bestand',
        'Bild',
        'StatusId'
    ];

    public $timestamps = false;

    protected $table='artikel';

    protected $connection = 'mysql';
}
