@extends('layout.main')
@section('main-content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales Index
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        {{--<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>--}}
        {{--<li class="active">销量下降</li>--}}
        {{--<li class="active">Sales Index</li>--}}
      </ol>
    </section>
    <section class="content">
      <div class="row" id="app">
          <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                        <iframe src="https://app.powerbi.com/view?r=eyJrIjoiNTlmYjFkNmUtYjNkZS00ZjU2LTg5MGEtNmM5OTEwMDM1MjAzIiwidCI6IjdlNGFiZmYxLWU3MjEtNGZhZC04MTdlLTZjZDI0NmIyNzgxNSIsImMiOjZ9" width="100%" height="400">
                            <p>您的浏览器不支持  iframe 标签,清选择其他浏览器访问。</p>
                        </iframe>
              <p style="height:1px;position:relative;bottom: 45px;"><b><img src="{{asset('img/shade.jpeg')}}"></b></p>
          </div>
        </section>
       <section class="col-lg-6 connectedSortable">
          <div class="nav-tabs-custom">
                    <iframe src="https://app.powerbi.com/view?r=eyJrIjoiMWZkOGMzNjEtMmE3OS00NGI4LWIyYTMtMDc3ZjA1N2Y2NGIxIiwidCI6IjdlNGFiZmYxLWU3MjEtNGZhZC04MTdlLTZjZDI0NmIyNzgxNSIsImMiOjZ9"  width="100%" height="400">
                    <p>您的浏览器不支持  iframe 标签,清选择其他浏览器访问。</p>
                    </iframe>
              <p style="height:1px;position:relative;bottom: 45px;"><b><img src="{{asset('img/shade.jpeg')}}"></b></p>
          </div>
        </section>
        <section class="col-lg-12">
          <div class="nav-tabs-custom">
              <p>销量下滑数据</p>
              <table class="table table-hover">
                  <thead>
                    <tr>
                      {{--<th>#</th>--}}
                      <th>SKU</th>
                      <th>ItemId</th>
                      <th>Platform</th>
                      <th>Type</th>
                      <th>OP</th>
                      <th>Handle</th>
                    </tr>
                  </thead>
                  <tbody id="loadTbody">
                  @foreach ($tasksData as $tasks)
                    <tr>
                      {{--<th>{{$tasks->ID}}</th>--}}
                      <td>{{$tasks->Sku}}</td>
                      <td>{{$tasks->ItemId}}</td>
                      <td>{{$tasks->Platform}}</td>
                      <td>{{$tasks->Type}}</td>
                      <td>{{$tasks->OP}}</td>
                      <td>
                          <button typt="button"  class="btn btn-sm btn-warning" onclick="report('{{$tasks->ID}}')">报表</button>
                          <button typt="button" class="btn btn-sm btn-primary" onclick="myFT()">操作</button>
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
          </div>
        </section>
          {{--模态框--}}
          <div class="modal fade" tabindex="-1" id="skuHandle" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">操作</h4>
              </div>
              <div class="modal-body">

                  {{--正式操作信息Start--}}
                  <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        优化产品页面
                    </div>
                    <div class="col-md-9">
                        <select class="form-control" v-model="youhua">
                            <option>标题</option>
                            <option>图片</option>
                            <option>五点</option>
                            <option>关键词</option>
                            <option>EBC页面</option>
                            <option>评价</option>
                        </select>
                    </div>
                </div>
               <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        调整广告
                    </div>
                    <div class="col-md-9">
                        <select class="form-control"  v-model="tiaozheng">
                            <option>添加关键词</option>
                            <option>调高出价</option>
                            <option>降低出价</option>
                            <option>提高预算</option>
                            <option>降低预算</option>
                            <option>添加否定关键词</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        调整产品价格
                    </div>
                    <div class="col-md-9">
                        <select class="form-control">
                            <option>调高价格</option>
                            <option>调低价格</option>
                        </select>
                    </div>
                </div>
               <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        站内促销
                    </div>
                    <div class="col-md-9">
                        <select class="form-control">
                            <option>Coupon</option>
                            <option>页面Code</option>
                            <option>捆绑销售</option>
                            <option>秒杀</option>
                            <option>Best Deals</option>
                        </select>
                    </div>
                </div>
               <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        站外促销
                    </div>
                    <div class="col-md-9">
                        <select class="form-control">
                            <option>Facebook</option>
                            <option>Dealnews</option>
                            <option>Kinja</option>
                            <option>Slickdeals</option>
                            <option>网红</option>
                            <option>折扣商店</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="col-md-3">
                        其他操作
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                </div>
                  {{--正式操作信息End--}}

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" @click="skuUp()">Save changes</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
          {{--模态框--}}
      </div>
    </section>
    <!-- /.content -->
  </div>
<script>
    function report(id){
    console.log(123123);
    console.log(id);
        window.location.href="/sales/declineDetail?id="+id;
    }

    function myFT(){
        $('#skuHandle').modal('show')
    }

</script>
@endsection