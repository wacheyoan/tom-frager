<?php if (have_rows('case')): ?>
    <?php while (have_rows('case')): the_row();

        $image = get_sub_field('bgImg');
        $case = get_sub_field('case');
        $images = get_sub_field('images');
        $title = get_sub_field('title');
        $subtitle = get_sub_field('subtitle');

        ?>
    <div class="case-container">
        <div class="title-container">
            <h2 class="title" style="font-size: 28px"><?= $title ?></h2>
            <h3 class="subtitle"><?= $subtitle ?></h3>
        </div>
        <div class="case">
            <div class="case-bg">
                <div class="case-products">
                    <?php
                    foreach ($images as $img){
                        ?>
                        <img class="case-product" src="<?=$img['img']?>" alt="">
                        <?php
                    }
                    ?>
                    <img class="main-img" src="<?=$case?>" alt="">
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
<?php endif;?>


<style>
    h2,h3{
        margin: 0;
    }
    .title-container{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .case-bg{
        background-image: url("<?=$image?>");
        background-repeat: no-repeat;
        background-size: cover;
        width: 100%;
        height: 174px;
        bottom: 20px;
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    .case-bg img{
        position: absolute;
    }

    .main-img{
        z-index: 2;
        position: absolute;
        bottom: -20px;
        left: 50%;
        transform: translateX(-50%);
    }

    .case-products{
        width: 320px;
        height: 100%;
        position: relative;
    }

    .case-products img:first-child{
        right: 15%;
        top: -50%;
        transform: rotate(
                20deg
        );
    }

    .case-products img:nth-child(2){
        left: 15%;
        top: -50%;
        transform: rotate(
                5deg
        );
    }

    .case-products img:nth-child(3){
        left: 0;
        top: -45%;
    }

    .case-products img:nth-child(4){
        right: 0;
        transform: rotate(
                25deg
        );
    }


    .case-product{
        position: absolute;
        z-index: 1;
    }

    .case-container{
        height: 329px;
        position: relative;
    }

</style>