            <form class="course-preview" action="admin.php" method="GET" enctype="multipart/form-data">
                <input type="hidden" name="course-id" id="course-id" value="<?php echo $corso["Codice"];?>">
                <input type="submit" name="action" id="action" value="Modifica">
                <input type="submit" name="action" id="action" value="Elimina">
            </form>