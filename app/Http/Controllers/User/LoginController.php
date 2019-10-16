<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jwt\GuoJwt;
use App\Libs\Api;

/**
"iss": "Eric",　　　                 #该JWT的签发者
"iat": 1441593502,　　　　           #在什么时候签发的
"exp": 1441594722,　　　             #什么时候过期，这里是一个Unix时间戳
"aud": "www.example.com",　　        #接收该JWT的一方
"sub": "eric.guo@oceania-inc.com",　 #该JWT所面向的用户
"username": "A"　　　　               #私有字段
 */
class LoginController extends Controller
{

    /**
     * 用户登录及生成对应Token
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        try{
            $key = env('APP_KEY');
            $jwt = new GuoJwt($key);
            $api = new Api();
            $dataCenterApi = env('DATACENTER_LOGIN');
            $userDataJson = $api->httpRequest($dataCenterApi,$request->all());
            $userData = json_decode($userDataJson,TRUE);
            if($userData){
                $allRoles = array_column($userData['Roles'],'ID');
                $payLoad = [
                    'accountName' => $userData['AccountName'],
                    'displayName' => $userData['DisplayName'],
                    'email'       => $userData['DisplayName'],
                    'legalName'   => $userData['LegalName'],
                    'department'  => $userData['Department'],
                    'role'        => implode(',',$allRoles),
                    'iat'         => time(),
                    'exp'         => time() + 36000
                ];
                $token=$jwt->getToken($payLoad);
                return response()->json(['code' => 200, 'token'=> $token]);
            }else{
                return response()->json(['code' => 403, 'msg'  => '账号密码错误']);
            }
        }catch (\Exception $e){
            return response()->json([
                'code' => 403, 'msg'  => $e->getMessage(),]);
        }
    }

    /**
     * 登录页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('users.login');
    }

    /**
     * 后台首页
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|void
     */
    public function show(Request $request)
    {
        if(!$request->token){
            return redirect('/roles/list');
        }
        $authToken = $request->token;
        session()->put('AuthToken',$authToken);
        session()->save();
        \App\Http\Controllers\BaseController::webAuthTokenCheck();
        return view('users.userdetail');
    }

    /**
     * 用户登出
     */
    public function logout()
    {
        session()->flush();
        echo 'success';
    }
}
