<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class benutzer extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'BenutzerID';

    /**
     * @var array
     */
    protected $fillable = [
        'Adresse',
        'Erstellt',
        'Gutschrift',
        'LoginName',
        'Nachname',
        'PasswortHash',
        'PLZ',
        'Rolle',
        'Vorname',
    ];
        public $timestamps = false;

        protected $table = 'benutzer';

}
