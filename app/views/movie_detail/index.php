<div class="movie-detail-container">
    <div class="overview">
        <div class="poster">
            <img src="<?= 'https://image.tmdb.org/t/p/w500' . $data['movie']['poster_path'];?>"/>
        </div>
        <div class="detail">
            <div class="title">
                <?= $data['movie']['title'];?>
            </div>
            <div class="genre">
                <?= $data['movie']['genres'];?>
            </div>
            <div class="duration">
                <?= $data['movie']['runtime'];?>
            </div>
            <div class="release_date">
                <?= $data['movie']['release_date'];?>
            </div>
            <div class="rating">
                <?= $data['movie']['vote_average'];?>
            </div>
            <div class="description">
                <?= $data['movie']['overview'];?>
            </div>
        </div>
    </div>
    <div class="schedule">
        <div class="schedule_title">
            Schedule
        </div>
        <div class="schedule_table">
            <table cellspacing="0" cellpadding="0">
                <thead>
                    <th class="row-1 row-date">Date</th>
                    <th class="row-2 row-time">Time</th>
                    <th class="row-3 row-seat">Available</th>
                    <th class="row-4 row-info"></th>
                </thead>
                <tbody id="schedule-content"></tbody>
            </table>
        </div>
    </div>
    <div class="review">
        <div class="review_title">
            Review
        </div>
        <div class="review_table">
            <table id="review-content"></table>
        </div>
    </div>
    <script>
        let request_data = (<?=return_json($data)?>);
    </script>
</div>