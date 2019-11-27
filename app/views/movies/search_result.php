<div class="search-container">
    <h3>Showing search result for keyword "<?=$data['keyword']?>"</h3>
    <p><?=$data['length']?> result(s) available</p>

    <div id = "movies-container">
    </div>

    <div id = "control-container">
        <a id="before-controller" disabled>Before</a>
        <div id="button-container">
        </div>
        <a id="after-controller">After</a>
    </div>
    <script>
        let request_data = (<?=return_json($data)?>);
    </script>
</div>
