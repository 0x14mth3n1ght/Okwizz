<form class="container" action="../public/questionController.php" method="post">
    <input type="hidden" name="name" value="<?php echo $data["name"]; ?>">
    <input type="hidden" name="category" value="<?php echo $data["category"]; ?>">
    <?php
    for ($i = 0; $i < count($data["difficulte"]); $i++) { ?>
        <button type="submit" class="box" name="difficulte" value=<?php echo $data["difficulte"][$i]["DifficulteName"]?>>
            <div class="content">
                <img src="../images/<?php echo $data["difficulte"][$i]["DifficulteImg"]; ?>" alt="<?php echo $data["difficulte"][$i]["DifficulteName"]; ?>">
                <p><?php echo $data["difficulte"][$i]["DifficulteName"]; ?></p>
            </div>
        </button>
    <?php
    } ?>
</form>