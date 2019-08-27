<?php

namespace App\Http\Controllers\Erp;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use \App\Model\Modules;
use \App\Model\Actions;
use \App\Model\Configs;

class ConfigsController extends BaseController
{
    public function rolesTree()
    {
        try{
            BaseController::webAuthTokenCheck();
            $allModules = Modules::all();
            $allActions = DB::table('modules')
                ->leftJoin('actions','modules.id','=','actions.modules_id')
                ->select('modules.modules_name as m_code_name','actions.display_name as a_display_name','actions.actions_name as a_code_name')
                ->get();
            $roles = [];
            foreach ($allModules as $value){
                $modulesName = $value->display_name;
                $modulesCodeName = $value->modules_name;
                foreach ($allActions as $v){
                    if($v->m_code_name == $modulesCodeName){
                        $roles[$modulesName][] = [
                            'module_display_name' => $modulesName,
                            'modules_name'        => $modulesCodeName,
                            'action_display_name' => $v->a_display_name,
                            'action_name'         => $v->a_code_name
                        ];
                    }
                }
            }
            Configs::updateOrCreate(['type'=>'RolesList'],['content'=>json_encode($roles)]);
            return response()->json(['code' => 200, 'msg'=> 'Success']);
        }catch (\Throwable $e){
            return response()->json(['code' => 500, 'msg'=> $e->getMessage()]);
        }
    }

    /**
     * 缓存列表页面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        BaseController::webAuthTokenCheck();
        return view('configs.index');
    }
}
