<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="#" />
    <link type="text/css" rel="styleSheet"  href="{{asset('login/css/main.css')}}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <link rel="icon" href="{{asset('favicon.ico')}}" type="image/gif" >
<script type="text/javascript">
window.jQuery || document.write(unescape("%3Cscript src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js' type='text/javascript'%3E%3C/script%3E"))
</script>
    <title>Data Center</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }
        @font-face {
            font-family: 'neo';
            src: url("{{asset('login/font/NEOTERICc.ttf')}}");
        }
        input:focus{
            outline: none;
        }
        .form input{
            width: 300px;
            height: 30px;
            font-size: 18px;
            background: none;
            border: none;
            border-bottom: 1px solid #fff;
            color: #fff;
            margin-bottom: 20px;
        }
        .form input::placeholder{
            color: rgba(255,255,255,0.8);
            font-size: 18px;
            font-family: "neo";
        }
        .confirm{
            height: 0;
            overflow: hidden;
            transition: .25s;
        }
        .btn{
            width:140px;
            height: 40px;
            border: 1px solid #fff;
            background: none;
            font-size:20px;
            color: #fff;
            cursor: pointer;
            margin-top: 25px;
            font-family: "neo";
            transition: .25s;
        }
        .btn2{
            width:140px;
            height: 40px;
            border: 1px solid #fff;
            background: none;
            font-size:20px;
            color: #fff;
            cursor: pointer;
            margin-top: 25px;
            font-family: "neo";
            transition: .25s;
        }
        .btn:hover{
            background: rgba(255,255,255,.25);
        }
        #login_wrap{
            width: 980px;
            min-height: 500px;
            border-radius: 10px;
            font-family: "neo";
            overflow: hidden;
            box-shadow: 0px 0px 120px rgba(0, 0, 0, 0.25);
            position: fixed;
            top: 50%;
            right: 50%;
            margin-top: -250px;
            margin-right: -490px;
        }
        #login{
            width: 50%;
            height: 100%;
            min-height: 500px;
            background: linear-gradient(45deg, #9a444e, #e06267);
            position: relative;
            float: right;
        }
        #login #status{
            width: 90px;
            height: 35px;
            margin: 40px auto;
            color: #fff;
            font-size: 30px;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }
        #login #status i{
            font-style: normal;
            position: absolute;
            transition: .5s
        }
        #login span{
            text-align: center;
            position: absolute;
            left: 50%;
            margin-left: -150px;
            top: 52%;
            margin-top: -140px;
        }
        #login span a{
            text-decoration: none;
            color: #fff;
            display: block;
            margin-top: 80px;
            font-size: 18px;
        }
        #bg{
            background: linear-gradient(45deg, #211136, #bf5853);
            height: 100%;
        }
        /*绘图*/
        #login_img{
            width: 50%;
            min-height: 500px;
            background: linear-gradient(45deg, #221334, #6c3049);
            float: left;
            position: relative;
        }
        #login_img span{
            position: absolute;
            display: block;
        }
        #login_img .circle{
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: linear-gradient(45deg, #df5555, #ef907a);
            top: 70px;
            left: 50%;
            margin-left: -100px;
            overflow: hidden;
        }
        #login_img .circle span{
            width: 150px;
            height: 40px;
            border-radius: 50px;
            position: absolute;
        }
        #login_img .circle span:nth-child(1){
            top: 30px;
            left: -38px;
            background: #c55c59;
        }
        #login_img .circle span:nth-child(2){
            bottom: 20px;
            right: -35px;
            background: #934555;
        }
        #login_img .star span{
            background: radial-gradient(#fff 10%,#fff 20%,rgba(72, 34, 64, 0));
            border-radius: 50%;
            box-shadow: 0 0 7px #fff;
        }
        #login_img .star span:nth-child(1){
            width: 15px;
            height: 15px;
            top: 50px;
            left: 30px;
        }
        #login_img .star span:nth-child(2){
            width: 10px;
            height: 10px;
            left: 360px;
            top: 80px;
        }
        #login_img .star span:nth-child(3){
            width: 5px;
            height: 5px;
            top: 400px;
            left: 80px;
        }
        #login_img .star span:nth-child(4){
            width: 8px;
            height: 8px;
            top: 240px;
            left: 60px;
        }
        #login_img .star span:nth-child(5){
            width: 4px;
            height: 4px;
            top: 20px;
            left: 200px;
        }
        #login_img .star span:nth-child(6){
            width: 4px;
            height: 4px;
            top: 460px;
            left: 410px;
        }
        #login_img .star span:nth-child(7){
            width: 6px;
            height: 6px;
            top: 250px;
            left: 350px;
        }
        #login_img .fly_star span{
            width: 90px;
            height: 3px;
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 0.67), rgba(255,255,255,0));
            background: -o-linear-gradient(left, rgba(255, 255, 255, 0.67), rgba(255,255,255,0));
            background: linear-gradient(to right, rgba(255, 255, 255, 0.67), rgba(255,255,255,0));
            transform: rotate(-45deg);
        }
        #login_img .fly_star span:nth-child(1){
            top:60px;
            left: 80px;
        }
        #login_img .fly_star span:nth-child(2){
            top: 210px;
            left: 332px;
            opacity: 0.6;
        }
        #login_img p{
            text-align: center;
            color: #af4b55;
            font-weight: 600;
            margin-top: 365px;
            font-size: 25px;
        }
        #login_img p i{
            font-style: normal;
            margin-right: 25px;
        }
        #login_img p i:nth-last-child(1){
            margin-right: 0;
        }
        /*提示*/
        #hint{
            width: 100%;
            line-height: 70px;
            background: linear-gradient(-90deg, #9b494d, #bf5853);
            text-align: center;
            font-size: 25px;
            color: #fff;
            box-shadow: 0 0 20px #733544;
            display: none;
            opacity: 0;
            transition: .5s;
            position: absolute;
            top: 0;
            z-index: 999;
        }
        /* 响应式 */
        @media screen and (max-width:1000px ) {
            #login_img{
                display: none;
            }
            #login_wrap{
                width: 490px;
                margin-right: -245px;
            }
            #login{
                width: 100%;

            }
        }
        @media screen and (max-width:560px ) {
            #login_wrap{
                width: 330px;
                margin-right: -165px;
            }
            #login span{
                margin-left: -125px;
            }
            .form input{
                width: 250px;
            }
            .btn{
                width: 113px;
            }
        }
        @media screen and (max-width:345px ) {
            #login_wrap {
                width: 290px;
                margin-right: -145px;
            }
        }
    </style>
</head>


<body>
    <div id="bg">
        <div id="hint"><!-- 提示框 -->
            <p>登录失败</p>
        </div>
        <div id="login_wrap">
            <div id="login"><!-- 登录注册切换动画 -->
                <div id="status">
                    <i style="top: 0">Log</i>
                    <i style="top: 35px">Sign</i>
                    <i style="right: 5px">in</i>
                </div>
                <span>
                    <form action="post">
                        <p class="form"><input type="text" id="user" placeholder="username" autocomplete="off"></p>
                        <p class="form"><input type="password" id="passwd" placeholder="password" autocomplete="off"></p>
                        <input type="button" value="Log in" class="btn" onclick="login()" id="loginBtn" style="margin-right: 20px;">
                        <button class="btn2" id="loginBtn2" style="display: none;" disabled="disabled">Login......</button>
                    </form>
                    {{--<a href="#">Forget your password?</a>--}}
                </span>
            </div>

            <div id="login_img"><!-- 图片绘制框 -->
                <span class="circle">
                    <span></span>
                    <span></span>
                </span>
                <span class="star">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <span class="fly_star">
                    <span></span>
                    <span></span>
                </span>
                <p id="title">DATACENTER</p>
            </div>
        </div>
    </div>
</body>
<script>
    //自动居中title
    var name_c = document.getElementById("title")
    name = name_c.innerHTML.split("")
    name_c.innerHTML = ""
    for (i = 0; i < name.length; i++)
        if (name[i] != ",")
            name_c.innerHTML += "<i>" + name[i] + "</i>"


    //登录按钮
    function login() {
        var username = $('#user').val();
        var password = $('#passwd').val();
        if(typeof(username) == 'underfined' || username==''){
            alert('The user name cannot be empty');
            return;
        }
        if(typeof(password) == 'underfined' || password==''){
            alert('The Password cannot be empty');
            return;
        }
        $('#loginBtn').hide();
        $('#loginBtn2').show();
        $.post('/api/login',{'UserName':username,'Password':password},function(data){
            console.log(data);
            if(data.code == 200){
                localStorage.setItem("AuthToken", data.token);
                window.location.href = '/users?token='+data.token;
            }else{
                alert(data.msg);
                location.reload();
            }
        });
    }

</script>
</html>
