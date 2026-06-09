    <main class="courses-main">
        <form action="corsi.php" method="GET" class="search-bar-form">
            <label for="search-course"><img src="<?php echo UPLOAD_DIR.$templateParams["searchicon"]; ?>" alt="Icona ricerca"></label>
            <?php if(isset($_GET["search-course"])):?>
                <input type="text" id="search-course" name="search-course" placeholder=<?php echo $_GET["search-course"];?> autocomplete="off">
            <?php else:?>
                <input type="text" id="search-course" name="search-course" placeholder="Cerca corso..." autocomplete="off">
            <?php endif;?>  
            <button type="submit">Avvia ricerca</button>
        </form>
        <section class="courses-container">
            <?php 
            $templateParams["form-courses-type"] = 'form-visualizza-corso.php';
            require ('template-corsi.php');?>
        </section>
    </main>