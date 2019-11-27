let object_selected = false;
let yellow_star = "http://3.0.90.7:80/tubes2wbd/Engima/public/assets/images/icons/rate_star.png";
let gray_star = "http://3.0.90.7:80/tubes2wbd/Engima/public/assets/images/icons/rate_star_gray.png";
let star_counted = "";
let SUBMIT_URL = null;
if (!requestData.review) {
    SUBMIT_URL = "http://3.0.90.7:80/tubes2wbd/Engima/review/submitadd/" + requestData.movie_id;
} else {
    SUBMIT_URL = "http://3.0.90.7:80/tubes2wbd/Engima/review/submitedit/" + requestData.movie_id;
}

function reset_choice() {
    for (i = 1; i < 11; i++) {
        document.getElementById(i).src = gray_star;
    }
    object_selected = false;

}

function overAndYellow(x) {
    reset_choice();
    for (i = x.id; i > 0; i--) {
        document.getElementById(i).src = yellow_star;
    }

}

function outAndGrey(x) {
    if (!object_selected) {
        for (i = x.id; i > 0; i--) {
            document.getElementById(i).src = gray_star;
        }
    }
}

function clickAndRate(x) {
    overAndYellow(x);
    object_selected = true;
}

function submit() {
    let rated = 0;
    review_content = document.getElementById("review_content").value;
    for (i = 1; i < 11; i++) {
        if (document.getElementById(i).src == "http://3.0.90.7:80/tubes2wbd/Engima/public/assets/images/icons/rate_star.png") {
            rated++;
        }
    }
    let form_data = new FormData();
    form_data.append('review', review_content);
    form_data.append('rate', rated);
    form_data.append('schedule_id', requestData.schedule_id);
    form_data.append('movie_id', requestData.movie_id);
    form_data.append('user_id', requestData.user_id);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', SUBMIT_URL, false);

    xhr.onload = function() {
        if (this.status == 200 && this.readyState == 4) {
            alert("Review submitted");
            url = "http://3.0.90.7:80/tubes2wbd/Engima/history";
            window.location.href = url;
        };
    };

    xhr.send(form_data);


}

function previousPage() {
    url = "http://3.0.90.7:80/tubes2wbd/Engima/history";
    window.location.href = url;
}