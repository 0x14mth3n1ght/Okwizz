<form class="container" action="../public/difficulteQuizz.php" method="post">
    <input type="hidden" name="name" value="<?php echo $data["name"]; ?>">
    <?php
    for ($i = 0; $i < 25; $i++) { ?>
        <button type="submit" class="box" name="category" value=<?php echo $data["category"][$i]["CategoryId"]?>>
            <div class="content">
                <img src="../images/<?php echo $data["category"][$i]["CategoryImg"]; ?>" alt="<?php echo $data["category"][$i]["CategoryName"]; ?>">
                <p><?php echo $data["category"][$i]["CategoryName"]; ?></p>
            </div>
        </button>
    <?php
    } ?>
</form>