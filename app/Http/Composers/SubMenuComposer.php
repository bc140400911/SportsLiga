<?php
/**
 * Created by PhpStorm.
 * User: aliiq
 * Date: 6/3/2018
 * Time: 12:28 AM
 */

namespace App\Http\Composers;


use App\Models\Tournament;
use Illuminate\Contracts\View\View;

class SubMenuComposer
{

    public function compose(View $view){
        //$view->with('tournament', Tournament::find(1));
    }
}