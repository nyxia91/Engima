window.addEventListener("load", (events) => {
    generate_schedules(request_data['movie'], request_data['schedule']);
    generate_reviews(request_data['review']);
});

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

function generate_schedules(movie, schedule) {
    let movie_count = schedule.length;

    curr_time = Date.now();
    let output = [];

    for (let i = 0; i < movie_count; i++) {
        schedule_time = new Date(schedule[i].time);

        output.push("<tr><td>", months[schedule_time.getMonth()], " ", schedule_time.getDate(), ", ", schedule_time.getFullYear(), "</td > ");
        output.push("<td>", schedule_time.getHours(), ":", schedule_time.getMinutes(), "</td>");
        output.push("<td class='row-seat'>", schedule[i].available_seats, "</td>");
        output.push("<td>");

        if (schedule[i].available_seats > 0 && schedule_time >= curr_time) {
            output.push("<a href='../booking/", movie.id, "/", schedule[i].schedule_id, "'>");
            output.push("<div class='row-available'></div>");
            output.push("</a>");
        } else {
            output.push("<div class='row-not-available'></div>");
        }


        output.push("</td></tr>");
    }

    document.getElementById("schedule-content").innerHTML = output.join("");
}

function generate_reviews(review) {
    let review_count = review.length;
    let output = [];

    console.log(review);

    for (let i = 0; i < review_count; i++) {
        output.push("<tr>");
        output.push("<td>");
        output.push("<div class='review-component'>");
        output.push("<div class='reviewer-pic'>");
        let str = review[i].prof_pic;
        // output.push("<img src='", str.substring(str.indexOf("/tubes2wbd/Engima/"), str.length), "'/>");
        output.push("</div>");
        output.push("<div class='reviewer-name'>");
        // output.push(review[i].username);
        output.push(review[i].author);
        output.push("</div>");
        output.push("<div class='review-rating'>");
        output.push(review[i].rate);
        output.push("</div>");
        output.push("<div class='review-content'>");
        // output.push(review[i].review);
        output.push(review[i].content);
        output.push("</div>");
        output.push("</div>");
        output.push("</td>");
        output.push("</tr>");
    }

    document.getElementById("review-content").innerHTML = output.join("");
}