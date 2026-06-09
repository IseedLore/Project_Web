            <form action="gruppi.php" method="GET">
                <input type="hidden" name="filter-course" id="filter-course" value="<?php echo $corso["Nome"];?>">
                <input type="hidden" name="filter-group-type" id="filter-group-type" value="Tutti"/>
                <input type="submit" value="Vai ai gruppi">
            </form>