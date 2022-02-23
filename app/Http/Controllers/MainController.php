<?php

namespace App\Http\Controllers;

use App\Models\ContactModel;
use App\Models\GameModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home() {

        return view('home', [
            "users" => User::all()
        ]);
    }

    public function about() {
        return view('about');
    }

    public function reviews() {
        $reviews = new ContactModel();
        return view('reviews', ["reviews" => $reviews->all()]);
    }

    public function reviews_check(Request $request) {
        $valid = $request->validate([
            "email" => 'required|min:4|max:100',
            "subject" => 'required|min:4|max:100',
            "message" => 'required|min:15|max:500'
        ]);

        $review = new ContactModel();
        $review->email = $request->input("email");
        $review->subject = $request->input("subject");
        $review->message = $request->input("message");

        $review->save();

        return redirect()->route("reviews");
    }

    public function profile()
    {
        if (auth()->user())
            return view('profile');
        else
            return back();
    }

    public function games()
    {
        // Обновление инфы в БД
//        for ($id = 1; $id <= 9; ++$id) {
//            $url = asset("game_images/". $id .".jpg");
//
//            DB::table('game_models')
//                ->where('id', '=', $id)
//                ->update(["image_path" => $url]);
//            }

        $allGames = GameModel::all();
        return view("games", [
            "games" => $allGames
        ]);
    }

    public function game($gameTitle)
    {
        $mines = 30; // количество мин на поле
        $fx    = 9;  // ширина поля (в клетках)
        $fy    = 9;  // высота поля (в клетках)

        for ($y = 0; $y <= $fy; $y++) {
            for ($x = 0; $x <= $fx; $x++) {
                $minefield[$x][$y] = '0';
            }
        }

        for ($i = 0; $i < $mines; $i++) {
            $randx = rand(0, $fx);  // генерируем случайные координаты
            $randy = rand(0, $fy);  //

            if ($minefield[$randx][$randy] == 'X') { // координаты совпали и мина уже есть
                $i--; // тогда не ставим мину, а скажем попробовать лишний раз
            } else {
                $minefield[$randx][$randy] = 'X'; // ставим мину
            }
        }

        return view('game', [
            "mines" => $mines,
            "fx" => $fx,
            "fy" => $fy,
            "minefield" => $minefield
        ]);
        $gameInfo = GameModel::all()->where("name", $gameTitle)[0];
        return view("game", [
            "gameInfo" => $gameInfo
        ]);
    }

}
