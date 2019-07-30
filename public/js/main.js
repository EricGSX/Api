$.ajaxSetup({
    headers : {
        'Authorization' : localStorage.getItem('AuthToken'),
    }
});