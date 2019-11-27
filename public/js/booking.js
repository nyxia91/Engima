"use strict";

const BOOKING_URL = 'http://3.0.90.7:80/tubes2wbd/Engima/movies/doBooking';

let num_of_seats = 30;

let seatsDisplayDoc = document.getElementById("seats");
let movieTitleDoc = document.getElementById("movie-title");
let movieDateDoc = document.getElementById("movie-date");
let seatsNumberDoc = document.getElementById("seat-number");
let totalPriceDoc = document.getElementById("total-price");
let noRek = document.getElementById("no-rekening");
let noRekForm = document.getElementById("input-no-rek");
let buyButtonDoc = document.getElementById("buy-btn-container");
let statusMsgDoc = document.getElementById("status-msg");
let modal = document.getElementById("success-modal");
let modalHeader = document.getElementById("modal-header");
let modalText = document.getElementById("modal-text");
let modalButton = document.getElementById("modal-btn");
let scheduled_time = document.getElementById("scheduled_time");

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

let schedule_time = new Date(request_data['schedule'].time);
let seatToBuy = "0";
let totalPrice = request_data['seats'][0]['price'];
let movieTitle = request_data['schedule']['movie_title'];
let movieDate = months[schedule_time.getMonth()] + " " +
    schedule_time.getDate() + ", " + schedule_time.getFullYear() + " - " +
    schedule_time.getHours() + ":" + schedule_time.getMinutes();
let statusMsg = "You haven\'t selected any seat yet. Please click on one of the seat provided";
let taken_seats = [];
let ticketBought = false;

window.addEventListener("load", (events) => {
    let schedule_time = new Date(request_data['schedule'].time);
    let output = [];
    output.push("<p>", months[schedule_time.getMonth()], " ", schedule_time.getDate(), ", ", schedule_time.getFullYear());
    output.push(" - ", schedule_time.getHours(), ":", schedule_time.getMinutes(), "</p>");
    scheduled_time.innerHTML = output.join("");

    update_seats(request_data['seats']);
});

window.onclick = function(event) {
    this.closeModal(event);
}

function update_seats(seats) {
    generate_seats(seats);
}

function generate_seats(seats_detail) {
    let seats = [];
    let output = [];

    for (let i = 1; i <= num_of_seats; i++) {
        seats.push(i);
    }

    var i = 0;
    output.push('<ul>');
    seats.forEach((seat) => {
        if (seats_detail[i].status == 0) {
            output.push('<li>');
            output.push('<button class="seat-taken" outline="none" id="', seat, '" value=', false, 'disabled >');
            output.push(seat);
            output.push('</button>');
            output.push('</li>');
        } else {
            output.push('<li>');
            output.push('<button class="seat" outline="none" id="', seat, '" onclick="seat_click(this)" value=', false, '>');
            output.push(seat);
            output.push('</button>');
            output.push('</li>');
        }
        i = i + 1;
    });
    output.push('</ul>');

    seatsDisplayDoc.innerHTML = output.join("");
}

function set_seat_chosen() {
    let seat = (document.getElementById(seatToBuy));
    seat.style.color = "white";
    seat.style.backgroundColor = "rgb(6, 202, 202)";
    seat.style.borderColor = "rgb(6, 202, 202)";
}

function seat_click(seat) {
    if (check_seat_exist()) {
        if (seat.value === "false") {
            set_seat_not_chosen(document.getElementById(seatToBuy));
        } else if (seat.value === "true") {
            set_seat_not_chosen(seat);
            show_seats();
            update_booking_summary();
            return;
        }
    }

    seatToBuy = seat.id;
    seat.value = true;
    set_seat_chosen();
    update_booking_summary();
    show_seats();
}

function set_seat_not_chosen(seat) {
    seat.value = false;
    seat.style.color = "rgb(6, 202, 202)";
    seat.style.backgroundColor = "white";
    seat.style.borderColor = "rgb(6, 202, 202)";
    seatToBuy = "0";
}

function show_seats() {
    if (!check_seat_exist()) {
        seatsNumberDoc.innerHTML = "";
    } else {
        let seat = "Seat #" + seatToBuy;
        seatsNumberDoc.innerHTML = seat;
    }
}

function update_booking_summary() {
    if (check_seat_exist()) {
        statusMsgDoc.innerHTML = "";
        movieTitleDoc.innerHTML = movieTitle;
        movieDateDoc.innerHTML = movieDate;
        totalPriceDoc.innerHTML = "Rp " + totalPrice;
        seatsNumberDoc.innerHTML = "Seat #" + seatToBuy;
        noRek.innerHTML = "No. Rekening";
        noRekForm.type = "text";
        buyButtonDoc.innerHTML = "<button id='buy-btn' onclick='buy_ticket()'>Buy Ticket</button>";
    } else {
        statusMsgDoc.innerHTML = statusMsg;
        movieTitleDoc.innerHTML = "";
        movieDateDoc.innerHTML = "";
        totalPriceDoc.innerHTML = "";
        seatsNumberDoc.innerHTML = "";
        noRek.innerHTML = "";
        noRekForm.type = "hidden";
        buyButtonDoc.innerHTML = "";
    }
}

function check_seat_exist() {
    return seatToBuy !== "0";
}

function buy_ticket() {
    let booking_data = {
        'schedule_id': request_data['schedule'].schedule_id,
        'seat_no': seatToBuy,
        'no_rek': document.getElementById("input-no-rek").value,
        'value': 0
    };

    POST(BOOKING_URL, booking_data, (resp) => {
        if (resp.status !== 0) {
            modalHeader.innerHTML = "Payment Failed!";
            modalText.innerHTML = resp.message;
            ticketBought = false;
        } else {
            modalHeader.innerHTML = "Payment Success!";
            modalText.innerHTML = resp.message;
            ticketBought = true;
        }
        openModal();
    });
}

function openModal() {
    modal.style.display = "block";
    if (ticketBought)
        modalButton.style.display = "block";
    else
        modalButton.style.display = "none";
}

function closeModal(event) {
    if (event.target == modal) {
        modal.style.display = "none";
        if (ticketBought)
            window.location.href = '/tubes2wbd/Engima/home';
    }
}

function go_to_transactions() {
    window.location.href = '/tubes2wbd/Engima/history';
}