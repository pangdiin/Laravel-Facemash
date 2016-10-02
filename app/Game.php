<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    protected $fillable = [
    	'winner',
    	'loser'
    ];

    //calculate the expected score or outcome
    public static function expected($Rb, $Ra)
    {
    	return 1 / (1 + pow(10, ($Rb - $Ra) / 400));
    }

    //calculate the new winner score
    public static function win($score,$expected, $k = 32)
    {
    	return $score + $k * (1 - $expected);
    }

    //calculate the new loser score
    public static function loss($score, $expected, $k = 32)
    {
    	return $score + $k * (0 - $expected);
    }

    //calculate the new rank
    public static function rank($score, $losses, $wins)
    {
    	if (($score == 0) || ($losses == 0) || ($wins == 0)) {
    		return 0;
    	}

    	return ROUND($score / (1 + ($losses / $wins)));
    }
}
