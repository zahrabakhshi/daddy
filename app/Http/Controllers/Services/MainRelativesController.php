<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use function PHPUnit\Framework\isEmpty;

class MainRelativesController extends Controller
{

    public static function getFather($user_id)
    {
        $user = User::find($user_id);
        return User::find($user->father_id)->toArray();
    }

    public static function getMother($user_id)
    {
        $user = User::find($user_id);
        $mother = User::find($user->mother_id)->toArray();
        return $mother;
    }

    public static function getChildren($user_id)
    {
        $user = User::find($user_id);
        if ($user->gender === 'female') {
            $children = User::where('mother_id', $user->id)->get();
            if ($children->isEmpty()) {
                return null;
            }
            return $children->pluck('id')->toArray();
        } elseif ($user->gender === 'male') {
            $children = User::where('father_id', $user->id)->get();
            if($children->isEmpty()){
                return null;
            }
            return $children->pluck('id')->toArray();
        }
    }

    public static function getSisters($user_id)
    {
        $user = User::find($user_id);
        if($user->father_id == null){
            return null;
        }
        return User::where('father_id', $user->father_id)->where('gender', 'female')->where('id', '!=' , $user_id)->get()->toArray();
    }

    public static function getBrothers($user_id)
    {
        $user = User::find($user_id);
        if($user->father_id == null){
            return null;
        }
        return User::where('father_id', $user->father_id)->where('gender', 'male')->where('id', '!=' , $user_id)->get()->toArray();
    }

    public static function getSpouse($user_id)
    {
        $user = User::find($user_id);
        return User::find($user->spouse_id)->toArray();
    }
}
