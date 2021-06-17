<?php

//    $apiKey = get_field('apikey');
//    $random = get_field('random');
//    $chrono = get_field('chrono');
//    $number = get_field('nombre');


//ça prend les 12 derniers pas trop le choix
$json = json_decode(file_get_contents('https://www.instagram.com/tomfrager/?__a=1'), true, 512, JSON_THROW_ON_ERROR);

$medias = $json['graphql']['user']['edge_owner_to_timeline_media']['edges'];
$medias = array_slice($medias,0,4);
$i = 0;

?>
<div class="instagram-container">
    <?php
    foreach ($medias as $media) {
        if ($i % 2 === 0 && $i !== 0) {?>
            </div>
            <div class="instagram-images">
            <?php
        }
        if ($i === 0){?>
            <div class="instagram-images">
        <?php
        }
        ?>
        <img src="<?= 'data:image/jpg;base64,' . base64_encode(file_get_contents($media['node']['thumbnail_resources'][0]['src'])) ?>"
             alt="">
        <?php
        $i++;
    }
    ?>

</div>
