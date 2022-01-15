<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PedigreeController extends Controller
{

    public static function getGrandchildren($root_id, $depth, $gender_lineage = null)
    {

        $pedigree_array = array();
        $direct_children_id = MainRelativesController::getChildren($root_id);

        if ($depth == 1) {
            if (empty($direct_children_id)) {
                return null;
            }
            $direct_children_model = array();
            foreach ($direct_children_id as $direct_child_id) {
                $direct_children_model[] = User::find($direct_child_id);
            }
            return $direct_children_model;
        } else {
            $depth--;
            if ($direct_children_id == null) {
                return null;
            }
            foreach ($direct_children_id as $child_id) {
                $child = User::find($child_id);
                $pedigree_array[] = array(
                    'user' => $child,
                    'children' => self::getGrandchildren($child_id, $depth, $gender_lineage)
                );
            }
        }
        return ['user' => User::find($root_id),
            'children' => $pedigree_array
        ];
    }

    public static function getNthGrandFather($n, $user_id)
    {
        $user = User::find($user_id);
        if ($n == 1) {
            return User::find($user->father_id);
        } else {
            $user = User::find($user->father_id);
            $nth_grandfather = self::getNthGrandFather($n - 1, $user->id);
        }
        return $nth_grandfather;
    }

    public static function getNthGrandMother($n, $user_id)
    {
        $user = User::find($user_id);
        if ($n == 1) {
            return User::find($user->mother_id);
        } else {
            $user = User::find($user->mother_id);
            $nth_grandmother = self::getNthGrandFather($n - 1, $user->id);
        }
        if($nth_grandmother == null){
            //return kon ta in sath chizi sabt nashode
            //va begu ta sathe folan az ajdade madary shoma etelaat darim
        }
        return $nth_grandmother;
    }

    public static function getNthGrandFathersList($n, $user_id)
    {
        $list = array();
        $list[] = $user_id;
        while ($n > 0) {
            $father_id = User::find($user_id)->father_id;
            if($father_id == null){
                return $list;
                //va bgu ta in sath etelaati sabt nashode faghat ta in sath etelaat sabt shode
            }
            $list[] = $father_id;
            $user_id = $father_id;
            $n--;
        }
        return $list;
    }

    public function renderPedigreeView($user_id, $gender_lineage = null)//TODO: gender haro emal nakardam
    {

    }
}
