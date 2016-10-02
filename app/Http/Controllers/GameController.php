<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Image;
use App\Game;

class GameController extends Controller
{
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function index()
	{
		$limit = 2;
		$images = Image::orderBy(DB::raw('RAND()'))->take($limit)->get();

		if (count($images)) {
			return view('pages.game',compact('images'));
		}
		return redirect('images');
	}

	public function update(Request $request)
	{
		$winner = Image::where('id', '=', $request->winner)->first();
		$loser = Image::where('id', '=', $request->loser)->first();

		$wins = $winner->wins + 1;

		$winner_expected_score = Game::expected($loser->score, $winner->score);
		$winner_new_score = Game::win($winner->score, $winner_expected_score);

		$winner_rank = Game::rank($winner_new_score, $wins, $winner->wins);

		$winner->update([
				'score'=>$winner_new_score,
				'wins'=>$wins,
				'rank'=>$winner_rank
			]);		

		$losses = $loser->losses + 1;

		$loser_expected_score = Game::expected($winner->score, $loser->score);
		$loser_new_score = Game::win($loser->score, $loser_expected_score);

		$loser_rank = Game::rank($loser_new_score, $losses, $loser->wins);

		$loser->update([
				'score'=>$loser_new_score,
				'losses'=>$losses,
				'rank'=>$loser_rank
			]);

		Game::create([
				'winner' => $request->winner,
				'loser' => $request->loser,
			]);

		return redirect()->back()->with('success','Scores update! Continue playing');
	}
}