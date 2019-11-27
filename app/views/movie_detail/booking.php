<div class="booking-container">
    <div class="movie-info">
        <div class="return-container">
            <a href=<?="../../detail/" . $data['movie_id']?>>
                <img id="return-icon"/>
            </a>
        </div>
        <h2><?= $data['schedule']['movie_title'];?></h2>
        <p id="scheduled_time"></p>
    </div>

    <div class="ticketing-container">
        <div class="seats-container">
            <div id="seats"></div>
            <p id="screen">Screen</p>
        </div>
        <div id="booking-summary">
            <h3>Booking Summary</h3>
            <p id="status-msg">
                You haven't selected any seat yet. 
                Please click on one of the seat provided.
            </p>
            <div id="movie-title"></div>
            <div id="movie-date"></div>
            <div id="seat-number"></div>
            <div class="price-info">
                <p id="total-price"></p>
                <div id="no-rekening"></div>
                <input name="No-rekening" id="input-no-rek" type="hidden">
                <div id="buy-btn-container"></div>
            </div>
        </div>
    </div>
    
    <div id="success-modal" class="modal">
        <div class="modal-content">
            <div id="modal-header">Payment Success!</div>
            <div id="modal-text">Thank you for purchasing! You can view your purchase now.</div>
            <button id="modal-btn" onclick="go_to_transactions()">Go to transactions history</button>
        </div>
    </div>
    <script>
        let request_data = (<?=return_json($data)?>);
    </script>
</div>

