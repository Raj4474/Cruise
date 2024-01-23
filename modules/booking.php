<?php
if(isset($_SESSION["u_id"])){
  $uid = $_SESSION['u_id'];
  $r1 = "SELECT * FROM `users` WHERE u_id=$uid";
  $d1 = mysqli_query($conn, $r1);
  $row1 = mysqli_fetch_assoc($d1);
}

if (isset($_POST['bookbtn'])) {
  $check_in = $_POST['checkin'];
  $check_out = $_POST['checkout'];
  $guest = $_POST['g_name'];
  // $uid = $_SESSION['u_id'];
  $cnm = $_POST["c_name"];

  $ret = "insert into book (b_in,b_out,b_guests,u_id,c_name) values ('$check_in','$check_out','$guest',$uid,'$cnm')";
  $booked = mysqli_query($conn,$ret);
  if($booked){
    $succ = "Successfully Booked!!";
    header("location:cruises.php");
  }else{
    $err = "Please Try Again !!";
  }
}

if (isset($_GET["cid"])) {
  $cid = $_GET["cid"];
  $sql = "SELECT * FROM `cruises` WHERE c_id=$cid";
  $data = mysqli_query($conn, $sql);
  $total = mysqli_num_rows($data);
  if ($total > 0) {
    while ($row = mysqli_fetch_assoc($data)) {
?>
      <section class="book_sec">
        <form method="post">
          <div class="elem-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="visitor_name" value="<?=$row1["u_fname"].' '.$row1["u_lname"]?>" readonly>
          </div>
          <div class="elem-group">
            <label for="email">Your E-mail</label>
            <input type="email" id="email" name="visitor_email" value="<?=$row1["u_email"]?>" readonly>
          </div>
          <div class="elem-group">
            <label for="phone">Your Phone</label>
            <input type="tel" id="phone" name="visitor_phone" value="<?=$row1["u_phone"]?>" readonly>
          </div>
          <hr>
          <div class="elem-group">
            <label for="name">Cruise Name</label>
            <input type="text" id="name" name="c_name" value="<?=$row["c_name"]?>" readonly>
          </div>
          <div class="elem-group">
            <label for="g_name">Guest Name</label>
            <input type="text" id="g_name" name="g_name" required>
          </div>
          <div class="elem-group inlined">
            <label for="checkin-date">Check-in Date</label>
            <input type="date" id="checkin-date" name="checkin" required>
          </div>
          <div class="elem-group inlined">
            <label for="checkout-date">Check-out Date</label>
            <input type="date" id="checkout-date" name="checkout" required>
          </div>
          <div class="elem-group inlined">
            <label for="cruise-days">Cruise Days</label>
            <input type="number" id="cruise-days" name="days" value="<?=$row["c_days"]?>" readonly>
          </div>
          <div class="elem-group inlined">
            <label for="cruise-price">Cruise Price</label>
            <input type="text" id="cruise-price" name="price" value="<?=$row["c_price"]?>" readonly>
          </div>
          <button class="book_btn" type="submit" name="bookbtn">Book The Rooms</button>
        </form>
      </section>
<?php
    }
  } else {
    echo '<p class="empty">No Cruise Added Yet!</p>';
  }
}
?>