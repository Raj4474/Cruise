<section class="section section-lg text-center bg-gray-100">
    <div class="container">
        <h2 class="wow-outer font-weight-bold text-gray-800 title-indent"><span class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">Cruises</span></h2>
        <div class="row row-50">
        <?php
            $ret = "SELECT * FROM `cruises`";
            $data = mysqli_query($conn, $ret);
            $total = mysqli_num_rows($data);
            if ($total > 0) {
                while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <div class="col-sm-6 col-lg-4 wow-outer">
                <!-- Post Classic-->
                <article class="post-classic wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
                    <a class="post-classic-media" href="#">
                        <img src="admin/vendor/c_img/<?=$row['c_pic'];?>" alt="" width="370" height="264">
                    </a>
                    <ul class="post-classic-meta">
                        <li><a class="button-winona" href="#">
                                <div class="content-original">From $<?=$row['c_price'];?></div>
                                <div class="content-dubbed">From $<?=$row['c_price'];?></div>
                            </a></li>
                        <li>
                            <time datetime="2018"><?=$row['c_days'];?> days</time>
                        </li>
                        <li>
                            <a href="book_cruise.php?cid=<?= $row['c_id']?>">
                                <button class="btn btn-primary">Book</button>
                            </a>
                        </li>
                    </ul>
                    <h5 class="post-classic-title text-gray-800"><a href="#"><?=$row['c_name'];?></a></h5>
                </article>   
            </div>
            <?php
                } 
            } else {
                echo '<p class="empty">No Cruise Added Yet!</p>';
            }
            ?>           
        </div>
    </div>
</section>