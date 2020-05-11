<footer>
    <div class="container">
        <p>
            Developed By Boiko
        </p>
        <a href="">hnupsant@gmail.com</a>
    </div>
</footer>

    <?php
    foreach ($this->js as $link) {
        ?>
            <script type="text/javascript" src="<?=$link?>"></script>
        <?php
    }
    ?>
</html>