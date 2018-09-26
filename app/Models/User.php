<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Laravel\Socialite\Contracts\User as SocialUser;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    private $_social_user;

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $guarded = ['id'];



//    public function create(array $data){
//        $user= self::create([
//            'first_name' => $data['first_name'],
//            'last_name' => $data['last_name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//            'verify_token' => str_random('25'),
//        ]);
//        return $user;
//    }

    public function toatalUserCount(){
        $totalUsers = User::count();
        return $totalUsers;
    }


    public function createOrGetFacebookUser(SocialUser $user,$provider)
    {
        $this->_social_user = self::where('provider',$provider)->where('email',$user->getEmail())->first();

        if ($this->_social_user){
            return $this->_social_user;
        }else{
          $name_array = explode(' ',$user->getName());
          $this->_social_user = self::create([
             'first_name'       => $name_array[0],
             'last_name'        => $name_array[1],
             'email'            => $user->getEmail(),
             'provider_user_id' => $user->getId(),
             'provider'         => $provider

          ]);
          return $this->_social_user;
        }
    }


    public function show($id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }

    public function findRecord($email){
        $userRecord = self::where('email',$email)->first();
        return $userRecord;
    }

    public function fetchAll()
    {
        $users = self::all();
        return $users;
    }
    public function updateProfile($updatedData,$id)
    {
        User::where('id',$id)->update(['first_name'=>$updatedData['firstName'],'last_name'=>$updatedData['lastName']]);
        $result = self::where('id',$id)->first();
        return $result;

    }


    public function remove($id)
    {
        $user_id = self::find($id);
        $result = $user_id->delete();
        return $result;
    }



    // Eloquent relation methods
    public function favorite()
    {
        return $this->hasMany(Favorite::Class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::Class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::Class);
    }

    public function image()
    {
        return $this->hasOne(Image::Class);
    }
}
