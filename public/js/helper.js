let POST = (url, body, callback) => {
    let request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState === XMLHttpRequest.DONE) {
            callback(JSON.parse(request.responseText));
        }
    };
    request.open('POST', url, false);
    request.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
    request.send(JSON.stringify(body));
}

function redirect_to_home() {
    window.location.href = 'http://3.0.90.7:80/tubes2wbd/Engima/';
}

function removeCookies() {
    window.location.href = 'http://3.0.90.7:80/tubes2wbd/Engima/login/logout';
}

function searchMovie() {
    var action_src = "http://3.0.90.7:80/tubes2wbd/Engima/movies/search/" + document.getElementsByName("search")[0].value;
    var search_form = document.getElementById('search-form');
    search_form.action = action_src;
}