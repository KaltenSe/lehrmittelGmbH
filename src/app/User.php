<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 *
 * @property int Id
 * @property string Adresse
 * @property string Erstellt
 * @property float Gutschrift
 * @property string Loginname
 * @property string Nachname
 * @property string Passwort
 * @property string PLZ
 * @property int RollenId
 * @property string Vorname
 * @property string Email
 *
 * @since   2020-02-14
 * @package App
 *
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    #const CREATED_AT = 'Erstellt';
    #const UPDATED_AT = 'Aktualisiert';

    protected $table = 'benutzer';

    protected $primaryKey = 'Id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Adresse',
        'Erstellt',
        'Gutschrift',
        'Loginname',
        'Nachname',
        'Passwort',
        'PLZ',
        'RollenId',
        'Vorname',
        'Email'
    ];

    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Passwort',
        'token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */

    public function getAuthPassword()
    {
        return $this->Passwort;
    }

}
