<h1 class="title_page history_page">Transaction History</h1>
<table style="width:100%" id="table-collapse">
    <col width="10%">
    <col width="60%">
    <col width="30%">
    <?php foreach ($data['trans_history'] as $history):?>
        <tr>
            <td>
                <div><img class="poster_history" src='<?="https://image.tmdb.org/t/p/w500" . $history['movie_pic']?>' alt='<?=$history['movie_title']?>'><div>    
            </td>
            <td>
                <div class="title_history"><?=$history['judulfilm']?></div>
            </td>
            <td class="buttons">
                <div class="schedule"><span class="name">Status:</span>  <?=$history['status']?></div>
                <div class="schedule"><span class="name">No VA Tujuan:</span>  <?=$history['no_VAtujuan']?></div>
            <!-- <?php 
                // if(time() < strtotime($history['finished_time'])){
                //     echo "<div></div>";
                // }
                // else{
                //     if($history['reviewed'] == 0){
                //         echo '<a href="'. BASEURL .'review/add/'. $history['movie_id']. '"><button class="button submit">Add Review</button></a>';
                //     }
                //     else{
                //         echo '<a href="'. BASEURL .'review/delete/'. $history['movie_id']. '"><button class="button delete">Delete Review</button></a>';
                //         echo '<a href="'. BASEURL .'review/edit/'. $history['movie_id']. '"><button class="button">Edit Review</button></a>';
                //     }
                // }

            ?> -->
            </td>
            
        </tr>
    <?php endforeach;?>
       
</table>