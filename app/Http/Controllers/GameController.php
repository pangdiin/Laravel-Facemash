<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GameController extends Controller
{
    protected $table = 'games';

    protected $fillable = [
    	'winner',
    	'loser'
    ];

    public static function expected($)
    {

    }

    public static function win($)
    {

    }

    public static function loss($)
    {

    }

    public static function rank($)
    {

    }
}
