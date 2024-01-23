<section class="section section-lg text-center bg-gray-100">
    <div class="container">
        <h2 class="wow-outer font-weight-bold text-gray-800 title-indent">
            <span class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">Ships</span>
        </h2>
        <div class="row row-50">
            <?php
            $ret = "SELECT * FROM `ships`";
            $data = mysqli_query($conn, $ret);
            $total = mysqli_num_rows($data);
            if ($total > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
            ?>
                    <div class="container col-sm-6 col-lg-4 wow-outer" style="margin-top: auto;">
                        <!-- Post Classic-->
                        <article class="container post-classic wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
                            <a class="post-classic-media" href="#">
                                <img src="admin/vendor/img/<?= $row['s_img']; ?>" alt="" width="370" height="264">
                                <div class="centered">
                                    <p style="font-weight: 500; font-size: 2.625rem; color:white; font-family:Arial,sans-serif; text-transform: uppercase; line-height: 0.95;"><?= $row['s_name'] ?></p>
                                    <p style="color: white;">of the Seas</p>
                                </div>
                            </a>
                        </article>
                    </div>
            <?php
                } 
            } else {
                echo '<p class="empty">no students added yet!</p>';
            }
            ?>
        </div>
    </div>
</section>