<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite as Favorite;

class FavoriteController extends Controller
{
    private $favorite;
    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }

    public function store(Request $request)
    {
        //dd($request);
        $favorite = $this->favorite->insert($request);
        return $favorite;

    }

    public function destroy($id){
        $favorite = $this->favorite->remove($id);
        return $favorite;
    }
}
