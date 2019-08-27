<?php

namespace App\Http\Controllers\Erp;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\DB;
use \App\Model\Modules;
use \App\Model\Actions;

class RolesController extends BaseController
{
    public function index(Request $request)
    {
        $users = $request->user;
        if(!$users){
            $roles = [];
        }else{
            $roles = [
                [
                    'name' => '销量下降',
                    'content' => [['name' => '列表1', 'content' => 'addrole'],['name' => '列表2', 'content' => 'update']],
                ],
                [
                    'name' => 'aaa',
                    'content' => [['name' => '列表3', 'content' => 'addrole2'],['name' => '列表4', 'content' => 'update2']],
                ],
            ];
        }
        $allUsers = DB::connection('sqlsrv')->select("SELECT id FROM [OceaniaERP].[dbo].[OC_User_Info] where status <> '-1'");
        return view('roles.index',compact('users','roles','allUsers'));
    }

    public function create()
    {
        $modules = Modules::all();

        return view('roles.create',compact('modules'));
    }

    public function store(Request $request)
    {
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
            foreach($displayArr as $key=>$value){
                $actions[] = [
                    'modules_id'    => $modulesId,
                    'display_name'  => $value,
                    'actions_name'  => $actionsarr[$key],
                ];
            }
            DB::table('actions')->insert($actions);
            return redirect('/roles/list');
        }else{
            echo '<b style="color:red;">illegal request</b>';
        }

    }

    public function test2()
    {
        return view('demo2');
    }

    public function assignRoles()
    {

    }

    public function rolelists()
    {
        $allModules = Modules::all();
        $allActions = DB::table('modules')
            ->leftJoin('actions','modules.id','=','actions.modules_id')
            ->select('modules.display_name as m_display_name','modules.modules_name as m_code_name','actions.display_name as a_display_name','actions.actions_name as a_code_name')
            ->get();
        return view('roles.list',compact('allModules','allActions'));
    }

    public function tree()
    {

    }

}
