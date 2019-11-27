const SEARCH_MOVIES_BY_PAGE = 'https://api.themoviedb.org/3/search/movie?api_key=8faf32e28798f5b0ee471b8c1341344b&language=en-US&query=';

const search_container = document.getElementById('movies-container');

console.log(request_data);
display_movies(request_data.keyword, 1);

function display_movies(keyword, page) {
    let xhr = new XMLHttpRequest();
    let complete_url = `${SEARCH_MOVIES_BY_PAGE}${keyword}`;

    request_data['page'] = page;

    xhr.open('GET', complete_url, true);

    xhr.onload = () => {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText);
            movies = JSON.parse(xhr.responseText).results;

            remove_all_child_from_component(search_container);
            movies.forEach((movie) => {
                create_movie_card(movie);
                console.log(movie);
            });
            adapt_pagination_control(request_data);
        }

    };
    xhr.send();
}

function create_movie_card(data) {
    let card_container = document.createElement('div');
    card_container.className = 'card-container;'

    let star = document.createElement('img');
    star.style.width = '28px';
    star.style.height = '28px';
    star.src = 'http://3.0.90.7:80/tubes2wbd/Engima/public/assets/images/icons/rate_star.png';

    let movie_container = document.createElement('div');
    movie_container.className = 'movie-card';

    let poster_desc_container = document.createElement('div')
    poster_desc_container.className = 'poster-desc';

    let movie_profile_container = document.createElement('div')
    movie_profile_container.className = 'movie-profile';

    let movie_ratings_container = document.createElement('div')
    movie_ratings_container.className = 'movie-ratings-container';

    let poster_img_container = document.createElement('div');
    poster_img_container.className = 'poster-img-container';
    //

    let view_detail_container = document.createElement('div');
    view_detail_container.className = 'view-detail-container';

    let view_link = document.createElement('a');
    view_link.className = 'view-details'
    view_link.innerText = 'View details'
    view_link.href = `http://3.0.90.7:80/tubes2wbd/Engima/movies/detail/${data.id}`;

    let right_button = document.createElement('img');
    right_button.src = 'http://3.0.90.7:80/tubes2wbd/Engima/public/assets/images/icons/right-button.png';
    right_button.style.height = '30px';
    right_button.style.width = '30px';

    view_detail_container.appendChild(view_link);
    view_detail_container.appendChild(right_button);

    let movie_title = document.createElement('p');
    movie_title.className = 'movie-title';
    movie_title.textContent = data.title;

    let movie_rating = document.createElement('p');
    movie_rating.className = 'movie-rating';
    movie_rating.textContent = data.vote_average;

    let movie_description = document.createElement('p');
    movie_description.className = 'movie-description';
    movie_description.textContent = data.overview.substring(0, 200) + '...';



    let poster_img = document.createElement('img');
    poster_img.className = 'poster-img';
    poster_img.src = "https://image.tmdb.org/t/p/w500" + data.poster_path;

    let line_container = document.createElement('div')
    line_container.className = 'line-container';

    let line = document.createElement('hr');
    line.className = 'line';

    movie_ratings_container.appendChild(star);
    movie_ratings_container.appendChild(movie_rating);

    movie_profile_container.appendChild(movie_title);
    movie_profile_container.appendChild(movie_ratings_container);
    movie_profile_container.appendChild(movie_description);

    poster_img_container.appendChild(poster_img);
    poster_desc_container.appendChild(poster_img_container);
    poster_desc_container.appendChild(movie_profile_container);

    line_container.appendChild(line);

    movie_container.appendChild(poster_desc_container);
    movie_container.appendChild(view_detail_container);

    card_container.appendChild(movie_container);
    card_container.appendChild(line_container);

    search_container.appendChild(card_container);
}

function remove_all_child_from_component(component) {
    while (component.lastChild) {
        component.removeChild(component.lastChild);
    }
}

function adapt_pagination_control(req_data, max_button = 5) {
    let current_page = req_data.page;

    let before_anchor = document.getElementById('before-controller');
    before_anchor.href = `javascript:display_movies('${req_data.keyword}', ${current_page-1})`;
    if (current_page === 1) {
        before_anchor.classList.add("disabled");
        before_anchor.style.pointerEvents = 'none';
    } else {
        before_anchor.classList.remove("disabled");
        before_anchor.style.pointerEvents = 'all';
    }


    let after_anchor = document.getElementById('after-controller');
    after_anchor.href = `javascript:display_movies('${req_data.keyword}', ${current_page+1})`;
    after_anchor.enabled = current_page !== req_data.max_page;
    if (current_page === req_data.max_page) {
        after_anchor.classList.add("disabled");
        after_anchor.style.pointerEvents = 'none';
    } else {
        after_anchor.classList.remove("disabled");
        after_anchor.style.pointerEvents = 'all';
    }

    let left_of_focus = Math.floor((max_button - 1) / 2)
    let right_of_focus = Math.ceil((max_button - 1) / 2)
    let left_most_page = Math.max(current_page - left_of_focus, 1);
    let right_most_page = Math.min(current_page + right_of_focus, req_data.max_page);

    let buttons_container = document.getElementById('button-container');

    remove_all_child_from_component(buttons_container);

    for (let i = left_most_page; i <= right_most_page; i++) {
        let button = document.createElement('button')
        button.className = 'controller-button';
        button.innerText = i;
        if (i !== current_page) {
            button.onclick = () => {
                console.log(request_data, i)
                display_movies(request_data.keyword, i)
            };
            button.classList.add("clickable-page");
        } else {
            button.classList.add("unclickable-page");
        }
        buttons_container.appendChild(button);
    }
}

function set_visibility(element, visilibity) {
    element.visibility = visilibity;
}