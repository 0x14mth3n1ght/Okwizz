

<div class="info_box">
    <p> Bonjour, <?php echo htmlspecialchars($_SESSION["name"]); ?>: <?php echo $_SESSION["score"]; ?>pts. </p>
    <form action="../public/index.php" method="post">
        <div class="buttons">
            <button type="submit"> Main Menu </button>
        </div>
    </form>
</div>