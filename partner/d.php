<?php

                $imgid = intval($_GET['imgid']);
                $sql = "SELECT cover_img1 from tbl_home where home_id=:imgid";
                $query = $DB_con->prepare($sql);
                $query->bindParam(':imgid', $imgid, PDO::PARAM_STR);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {    ?>
                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label"> Package Image </label>
                            <div class="col-sm-8">
                                <img src="includes/uploads/<?php echo htmlentities($result->cover_img1); ?>" width="300">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                            <div class="col-sm-8">
                                <input type="file" name="cover_img1" id="cover_img1" required>
                            </div>
                        </div>
                <?php }
                } ?>

                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <button type="submit" name="submit" class="btn-primary btn">Update</button>

                    </div>
                </div>