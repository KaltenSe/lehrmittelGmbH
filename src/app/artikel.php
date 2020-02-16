<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class artikel
 *
 * @since   2020-02-14
 * @property int Id
 * @property string Name
 * @property string Beschreibung
 * @property int Lagerplatz
 * @property float Preis
 * @property int Lieferzeit
 * @property int Bestand
 * @property string Bild
 * @property int StatusId
 *
 * @package App
 *
 */
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
        'StatusId',
    ];

    public $timestamps = false;

    protected $table = 'artikel';

    protected $connection = 'mysql';
}
