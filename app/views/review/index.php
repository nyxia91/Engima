<table style="width:100%" id="table-collapse">
<col width="10%">
<col width="90%">
    <tr>
        <td class="buttons back">
            <button onclick="previousPage()" class="back"><img src="<?=ICONS?>back_arrow.png"></button>
        </td>
        <td>
            <h1 class="title_page movie_title"><?=$data['movie_data']["movie_title"]?></h1>
        </td>
    </tr>
</table>
<table style="width:80%" id="table-collapse" class="review">
    <col width="20%">
    <col width="80%">
    
        <tr class="split">
            <td class="add add_rating">
                <div>Add Rating<div>    
            </td>
            <td class="right">
                <?php
                    for($i = 1; $i<11; $i++)
                    echo "<img id='$i' class='star' onmouseover='overAndYellow(this)' onmouseout='outAndGrey(this)' onclick='clickAndRate(this)' src='" . ICONS . "/rate_star_gray.png'>"
                ?>
                
            </td>
            
        </tr>
        <tr>
            <td class="add">
                <div>Add Review<div>    
            </td>
            <td class="right">
                <textarea id="review_content" rows="6" placeholder="Insert your review here.." class="review_text"><?php
                if(isset($data['movie_data']['review'])){
                    echo $data['movie_data']['review'];
                }?></textarea>
            </td>
            
        </tr>
        
        <tr>
            <td>
                &nbsp;
            </td>
            <td class="buttons right">
                <button class="button cancel" onclick="previousPage()">Cancel</button>
                <button class="button submit" onclick="submit()">Submit</button>
            </td>
            
        </tr>
</table>

<script>
    let requestData =  <?=return_json($data['movie_data'])?>;

</script>
