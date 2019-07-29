<script src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
<script type="text/javascript">
window.jQuery || document.write(unescape("%3Cscript src='https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js' type='text/javascript'%3E%3C/script%3E"))
</script>
<p>

</p>
<script>
    $.ajaxSetup({
        headers : {
            'Authorization' : localStorage.getItem('AuthToken'),
        }
    });
    $.get('/api/user',{},function(data){
        console.log(data);
    })
</script>