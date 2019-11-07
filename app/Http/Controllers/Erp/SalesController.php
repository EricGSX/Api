<?php

namespace App\Http\Controllers\Erp;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Libs\Api;
use Illuminate\Support\Facades\DB;

class SalesController extends BaseController
{
    /**
     * 销量下降列表首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        BaseController::webAuthTokenCheck();
        $api = new Api();
        $dataCenterApi = env('DATACENTER_GetTasks');
        $user = session('payLoad')['accountName'];
        $data = [
            'SearchKey'=>$user,
            'SearchColumn'=>'OP',
        ];
        $tasksData = json_decode($api->httpRequest($dataCenterApi,$data));
        if(!$tasksData){
            $data = [
                'SearchKey'=>'kikki.gu',
                'SearchColumn'=>'OP',
            ];
            $tasksData = json_decode($api->httpRequest($dataCenterApi,$data));
        }
        return view('sales.index',compact('tasksData'));
    }



    public function show(Request $request)
    {
       //return view('sales.detail',$request->all());
       return view('sales.reportDetail',$request->all());
    }
}
