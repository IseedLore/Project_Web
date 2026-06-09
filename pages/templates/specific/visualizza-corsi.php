    <main class="courses-main">
        <form action="corsi.php" method="GET" class="search-bar-form">
            <img src="<?php echo UPLOAD_DIR.$templateParams["searchicon"]; ?>" alt="Icona ricerca">
            <?php if(isset($_GET["search-course"])):?>
                <input type="text" id="search-course" name="search-course" placeholder=<?php echo $_GET["search-course"];?>>
            <?php else:?>
                <input type="text" id="search-course" name="search-course" placeholder="Cerca corso..." >
            <?php endif;?>  
            <button type="submit">Avvia ricerca</button>
        </form>
        <section class="courses-container">
            <?php 
            $templateParams["form-courses-type"] = 'form-visualizza-corso.php';
            require ('template-corsi.php');?>
        </section>
    </main>