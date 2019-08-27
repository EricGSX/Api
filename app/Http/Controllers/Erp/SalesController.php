<?php

namespace App\Http\Controllers\Erp;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Libs\Api;
use Illuminate\Support\Facades\DB;

class SalesController extends BaseController
{
    public function index()
    {
        BaseController::webAuthTokenCheck();
        //session::set
        //$test = DB::connection('sqlsrv')->table('oc_user_info')->where('id','eric.guo')->get();
        //$test = DB::connection('sqlsrv')->select('select top 1 * from oc_user_info');
        //dd($test);
        return view('sales.index');
    }

    public function test()
    {
        $data = [
            ['id' => 1,'sku'=>'XXX-XXX-XXX','itemId'=>'123,123,123','type'=>'One'],
            ['id' => 2,'sku'=>'XXX-XXX-XXX','itemId'=>'123,123,123','type'=>'Two'],
            ['id' => 3,'sku'=>'XXX-XXX-XXX','itemId'=>'123,123,123','type'=>'Three'],
            ['id' => 4,'sku'=>'XXX-XXX-XXX','itemId'=>'123,123,123','type'=>'Four'],
            ['id' => 5,'sku'=>'XXX-XXX-XXX','itemId'=>'123,123,123','type'=>'Five'],
            ['id' => 6,'sku'=>'XXX-XXX-XXX','itemId'=>'123,123,123','type'=>'Six'],
        ];
        return response()->json(['code'=>200,'msg'=>$data]);
    }

    public function show(Request $request)
    {
       return view('sales.detail',$request->all());
    }
}
