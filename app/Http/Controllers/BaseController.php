<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jwt\GuoJwt;
use \App\Model\UserRoles;

class BaseController extends Controller
{
    protected $webPayLoad;
    protected $jwtCode;
    public function __construct (Request $request)
    {
        $headerAuthToken = $request->header('Authorization');
        if($headerAuthToken){
            $this->jwtCode = $headerAuthToken;
            $jwt = new GuoJwt(env('APP_KEY'));
            $this->webPayLoad = $jwt->verifyToken($this->jwtCode);
        }
    }

    public static function webAuthTokenCheck()
    {
        $action = \Route::current()->getActionName();
        list($controller, $action) = explode('@', $action);
        $controller = substr(strrchr($controller,'\\'),1);
        $authToken = session('AuthToken');
        if(!$authToken){
            return redirect('/roles/list');
        }
        $currentAction = $controller . '-' . $action;
        $jwt = new GuoJwt(env('APP_KEY'));
        $payLoad = json_decode($jwt->verifyToken($authToken),TRUE);
        if($payLoad['code'] != 200){
            echo '<b style="color:red;font-weight: bold;">' . $payLoad['msg'] . '</b>';
            return;
        }
        $users = $payLoad['msg']['name'];
        $userRolesObj = UserRoles::where('username',$users)->first();
        $userRoles = '';
        if($userRolesObj){
            $userRoles = $userRolesObj->modules_actions;
        }
        $userRoles .= 'LoginController-show;';
        if(!strstr($userRoles,$currentAction)){
            echo '<b style="color:red;font-weight: bold;">The current user does not have the right to change the operation, please contact the administrator Will/Mungo/Eric</b>';
            return;
        }
        session()->put('userRolesList',$userRoles);
        session()->save();
        return true;
    }

}
