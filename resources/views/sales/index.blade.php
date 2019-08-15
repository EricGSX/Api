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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Sales Index</li>
      </ol>
    </section>
    <section class="content">
      <div class="row" id="app">
          <section class="col-lg-6">
              <div class="nav-tabs-custom">
                <div id="dashboard1" style="width: 100%;height:400px;"></div>
              </div>
          </section>
          <section class="col-lg-6">
              <div class="nav-tabs-custom">
                  <div id="dashboard2" style="width: 100%;height:400px;"></div>
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
                          <button typt="button" class="btn btn-sm btn-warning" @click="report(site.id)">报表</button>
                          <button typt="button" class="btn btn-sm btn-primary" @click="myFT()">操作</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
          </div>
        </section>
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
                    var test = [
                        { id: 'Runoob' },
                        { id: 'Google' },
                        { id: 'Taobao' }
                    ];
                    this.dataLists = test;
                },
                report:function(id){
                    console.log(id);
//                    console.log($('#app').html());
//                    var id = $(ele).parent().parent().children('th').text()
//                    var sku = $(ele).parent().parent().children('td').eq(0).html()
//                    var itemId = $(ele).parent().parent().children('td').eq(1).html()
//                    console.log(itemId)
                }
            }
        })
    });



}


</script>
@endsection