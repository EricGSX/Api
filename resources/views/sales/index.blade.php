@extends('layout.main')
@section('main-content')
    <style>
        [v-cloak]{
            display: none;
        }
    </style>
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
          {{--<section class="col-lg-6">--}}
              {{--<div class="nav-tabs-custom">--}}
                {{--<div id="dashboard1" style="width: 100%;height:400px;"></div>--}}
              {{--</div>--}}
          {{--</section>--}}
          {{--<section class="col-lg-6">--}}
              {{--<div class="nav-tabs-custom">--}}
                  {{--<div id="dashboard2" style="width: 100%;height:400px;"></div>--}}
              {{--</div>--}}
          {{--</section>--}}
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
              <p>Amazon 销量下滑数据</p>
              <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>SKU</th>
                      <th>ItemId</th>
                      <th>Type</th>
                      <th>Handle</th>
                    </tr>
                  </thead>
                  <tbody id="loadTbody">
                    <tr v-for="site in dataLists" v-cloak>
                      <th scope="row">@{{site.id}}</th>
                      <td>@{{ site.sku }}</td>
                      <td>@{{ site.itemId }}</td>
                      <td>@{{ site.type }}</td>
                      <td>
                          <button typt="button"  class="btn btn-sm btn-warning" @click="report(site.id)">报表</button>
                          <button typt="button" class="btn btn-sm btn-primary" @click="myFT()">操作</button>
                      </td>
                    </tr>
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
                {{--<div class="col-md-12">--}}
                    {{--<div class="col-md-3">--}}
                        {{--Lable1--}}
                    {{--</div>--}}
                    {{--<div class="col-md-9">--}}
                        {{--<input type="text" class="form-control" v-model="label1">--}}
                    {{--</div>--}}
                {{--</div>--}}

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
window.onload=function(){
    var option = {
        title : {
            text: 'Amazon销量下降报表',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: ['直接访问','邮件营销','联盟广告','视频广告','搜索引擎']
        },
        series : [
            {
                name: '访问来源',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    {value:335, name:'直接访问'},
                    {value:310, name:'邮件营销'},
                    {value:234, name:'联盟广告'},
                    {value:135, name:'视频广告'},
                    {value:1548, name:'搜索引擎'}
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    var option2 = {
        title: {
            text: 'Amazon销量下降来源',
        },
        tooltip: {
            trigger: 'axis'
        },
        legend: {
            data:['邮件营销','联盟广告','视频广告','直接访问','搜索引擎']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'category',
            boundaryGap: false,
            data: ['周一','周二','周三','周四','周五','周六','周日']
        },
        yAxis: {
            type: 'value'
        },
        series: [
            {
                name:'邮件营销',
                type:'line',
                stack: '总量',
                data:[120, 132, 101, 134, 90, 230, 210]
            },
            {
                name:'联盟广告',
                type:'line',
                stack: '总量',
                data:[220, 182, 191, 234, 290, 330, 310]
            },
            {
                name:'视频广告',
                type:'line',
                stack: '总量',
                data:[150, 232, 201, 154, 190, 330, 410]
            },
            {
                name:'直接访问',
                type:'line',
                stack: '总量',
                data:[320, 332, 301, 334, 390, 330, 320]
            },
            {
                name:'搜索引擎',
                type:'line',
                stack: '总量',
                data:[820, 932, 901, 934, 1290, 1330, 1320]
            }
        ]
    };

    $.get('/api/test',{},function(msg){
      var vm =   new Vue({
            el: '#app',
            data: {
                dataLists: msg.msg,
                chart: null,
                chart2: null,
                EricTest: null,
                label1:'',
                youhua:'',
                tiaozheng:'',
            },
            mounted:function(){
                this.drawLine();
            },
            methods:{
                drawLine:function(){
                        this.chart = echarts.init(document.getElementById('dashboard1'));
                        this.chart.setOption(option);
                        this.chart2 = echarts.init(document.getElementById('dashboard2'));
                        this.chart2.setOption(option2);
                    },
                myFT:function(){
                    this.EricTest = 'Hello World';
                    $('#skuHandle').modal('show')
//                    var test = [
//                        { id: 'Runoob' },
//                        { id: 'Google' },
//                        { id: 'Taobao' }
//                    ];
//                    this.dataLists = test;
                },
                report:function(id){
//                    console.log(id);
//                    $.get('/sales/declineDetail',{'id':id},function(re){
//                        console.log(re)
//                    })
                    window.location.href="/sales/declineDetail?id=1";
                },
                skuUp:function(){
                    alert(this.youhua);
                }
            }
        })
    });



}


</script>
@endsection