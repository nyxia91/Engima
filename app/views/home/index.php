<h1 class="hello">Hello, <span class="name"><?=$data['username']?></span>!</h1>
<div class="title_page">Now Playing</div>
<br>
<table>       
    <tr>
        <?php 
            $count = 0;
            foreach($data['movie_db'] as $movie):
                $date1 = date("Y-m-d", strtotime('-7 days'));
                $date2 = $movie["release_date"];
                
                if ($date2 > $date1)
                {  
                    if($count == 6)
                    {
                        $count = 0;
                        echo "</tr>";
                        echo "<tr>";
                    }

                    $count += 1;
        ?>

                    <td>
                        <div><a href="<?=BASEURL ."movies/detail/".$movie['id']?>"?>><img class="poster" src='<?="https://image.tmdb.org/t/p/w500" . $movie['poster_path']?>' alt='<?=$movie['title']?>'></a><div>    
                        <div class="swap"><a class="movie_title" href="<?=BASEURL ."movies/detail/".$movie['id']?>"><?=$movie['title']?></a></div>

                        <div class="rating"><img class="rate_star" src="<?= ICONS ?>rate_star.png"><?=$movie['vote_average']?></div>
                    </td>
        <?php }
            endforeach; ?>
    </tr>
    
</table>
