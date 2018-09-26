<?php
/**
 * Created by PhpStorm.
 * User: aliiq
 * Date: 5/27/2018
 * Time: 3:25 PM
 */

namespace App\Http\Composers;


use App\Models\Sport;
use Illuminate\Contracts\View\View;

class MenuBar
{
    public function compose(View $view){
        $view->with('sports', Sport::all());
    }
}