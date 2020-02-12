<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rabatt extends Model
{
    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'Artikelid',
        'Bis',
        'RabattPreis',
        'Von'
    ];

    public $timestamps = false;

    protected $table = 'rabatt';

    protected $connection = 'mysql';
}
