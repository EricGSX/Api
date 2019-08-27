<?php

namespace App\Http\Controllers\Erp;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use \App\Model\Modules;
use \App\Model\Actions;
use \App\Model\Configs;
use \App\Model\UserRoles;

class RolesController extends BaseController
{
    /**
     * 用户授权页面
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        BaseController::webAuthTokenCheck();
        $users = $request->user;
        $userRoles = [];
        if(!$users){
            $allActions = [];
        }else{
            $configsCache = Configs::where('type','RolesList')->firstOrFail();
            $allActions = json_decode($configsCache->content,true);
            $userRolesObj = UserRoles::where('username',$users)->first();
            if($userRolesObj){
                $userRoles = explode(';',$userRolesObj->modules_actions);
            }
        }
        $allModules = Modules::all();
        $allUsers = DB::connection('sqlsrv')->select("SELECT id FROM [OceaniaERP].[dbo].[OC_User_Info] where status <> '-1'");
        return view('roles.index',compact('users','allActions','allUsers','allModules','userRoles'));
    }

    /**
     * 新增权限页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        BaseController::webAuthTokenCheck();
        $modules = Modules::all();

        return view('roles.create',compact('modules'));
    }

    /**
     * 新增模块
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function store(Request $request)
    {
        BaseController::webAuthTokenCheck();
        $request->validate([
            'modules_type' => 'required'
                          ],
                           [
             'modules_type.required' => 'Modules Type 不能为空，illegal request'
         ]);
        if($request->modules_type == 'modules'){
            $request->validate([
                                   'display_name' => 'required|string|max:100|min:2',
                                   'modules_name'=> 'required|string|min:11',
                               ]);
            $params = request(['display_name','modules_name']);
            Modules::create($params);
            return redirect('/roles/list');
        }elseif($request->modules_type == 'actions'){
            $request->validate([
                                   'display_names' => 'required|string|max:100|min:2',
                                   'actions_names'=> 'required|string|min:3',
                                   'modules_id'=> 'required|integer',
                               ]);
            $modulesId = $request->modules_id;
            $displayArr = explode(';',$request->display_names);
            $actionsarr = explode(';',$request->actions_names);
            $actions = [];
            $nowDate = date('Y-m-d H:i:s',time());
            foreach($displayArr as $key=>$value){
                $actions[] = [
                    'modules_id'    => $modulesId,
                    'display_name'  => $value,
                    'actions_name'  => $actionsarr[$key],
                    'created_at'    => $nowDate,
                    'updated_at'    => $nowDate,
                ];
            }
            DB::table('actions')->insert($actions);
            return redirect('/roles/list');
        }else{
            echo '<b style="color:red;">illegal request</b>';
        }

    }

    /**
     * 用户授权
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|void
     */
    public function assignRoles(Request $request)
    {
        BaseController::webAuthTokenCheck();
        $request->validate([
            'rolesUser' => 'required|string',
            'checkedRoles' => 'required|array'
                           ]);
        $rolesContent = implode(';',$request->checkedRoles);
        $rolesUser = $request->rolesUser;
        UserRoles::updateOrCreate(['username'=>$rolesUser],['modules_actions'=>$rolesContent]);
        return redirect("/roles?user=$rolesUser");
    }

    /**
     * 权限列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function roleLists()
    {
        BaseController::webAuthTokenCheck();
        $configsCache = Configs::where('type','RolesList')->first();
        $allModules = Modules::all();
        if($configsCache){
            $allActions = json_decode($configsCache->content,true);
        }else{
            $allActions = DB::table('modules')
                ->leftJoin('actions','modules.id','=','actions.modules_id')
                ->select('modules.display_name as module_display_name','modules.modules_name as modules_name','actions.display_name as action_display_name','actions.actions_name as action_name')
                ->get()->toarray();
        }
        return view('roles.list',compact('allModules','allActions'));
    }



}
