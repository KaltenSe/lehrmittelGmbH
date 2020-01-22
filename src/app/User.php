<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const CREATED_AT = 'Erstellt';
    const UPDATED_AT = 'Aktualisiert';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Adresse',
        'Erstellt',
        'Aktualisiert',
        'Gutschrift',
        'LoginName',
        'Nachname',
        'PasswortHash',
        'PLZ',
        'Rolle',
        'Vorname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     *
     * @TODO RemeberToken in datenbank hinzufügen
     */
    protected $hidden = [
        'PasswortHash', 'remember_token',
    ];

}
