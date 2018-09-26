<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User as User;
use App\Models\Favorite as Favorite;
class UserController extends Controller
{
    private $_user;
    private $_favorite;
    public function __construct(User $user, Favorite $favorite)
    {
        $this->_user = $user;
        $this->_favorite = $favorite;
    }

    public function show($id){
        $user = $this->_user->show($id); //user info
        $info['first_name'] = $user->first_name;
        $info['last_name'] = $user->last_name;
        $info['id'] = $user->id;
        $info['email'] = $user->email;
        $info['favorite'] = count($this->_favorite->find($id));
        return json_encode($info);
    }
}
