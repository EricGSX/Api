<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Jwt\GuoJwt;
use \App\Model\UserRoles;
use \App\Model\RolesPermission;

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

    /**
     * 验证非接口传递的数据流合法性
     *
     * @return bool|void
     */
    public static function webAuthTokenCheck()
    {
        $action = \Route::current()->getActionName();
        list($controller, $action) = explode('@', $action);
        $controller = substr(strrchr($controller,'\\'),1);
        $authToken = session('AuthToken');
        if(!$authToken){
            redirect('/erp')->send();
            return;
        }
        $currentAction = $controller . '-' . $action;
        $jwt = new GuoJwt(env('APP_KEY'));
        $payLoad = json_decode($jwt->verifyToken($authToken),TRUE);
        if($payLoad['code'] != 200){
            echo '<b style="color:red;font-weight: bold;">' . $payLoad['msg'] . '</b>';
            echo '<p style="color:red;font-weight: bold;"><a href="/erp">Login</a></p>';
            die;
        }
        $users = $payLoad['msg']['accountName'];
        $userPermissionObj = UserRoles::where('username',$users)->first();
        $userPermission = '';

        if($userPermissionObj){
            $userPermission = $userPermissionObj->modules_actions;
        }
        $userPermission .= ';LoginController-show;';

        $roles = $payLoad['msg']['role'];
        $rolesPermission = RolesPermission::wherein('roles_name',explode(',',$roles))->get();
        if($rolesPermission){
            foreach ($rolesPermission as $value){
                $userPermission .= $value->modules_actions;
            }
        }
        if(!strstr($userPermission,$currentAction)){
            echo '<b style="color:red;font-weight: bold;">The current user does not have the right to change the operation, please contact the administrator Will/Mungo/Eric</b>';
            die;
        }
        session()->put('payLoad',$payLoad['msg']);
        session()->put('userRolesList',$userPermission);
        session()->save();
        return true;
    }

}
