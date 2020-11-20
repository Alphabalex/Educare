     <!-- free courses start -->
     <?php  if (@$_GET['q']=='free'): ?>
      <h3 style="color:white; background-color:midnightblue;" class="mb-3 p-2">FREE COURSES</h3>
       <div class="row">
      <?php 
      $sql = "SELECT * FROM quiz WHERE price ='free' ORDER BY title";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();          
      while($course = $stmt->fetch(PDO::FETCH_ASSOC)){
      $eid=$course['eid'];
      $course_title=$course['title'];
      $course_date=$course['date'];
      $course_des=$course['intro'];
      $total=$course['total'];
      $course_time=$course['time'];
      $course_price=$course['price'];
      ?>
    <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
      <div class="card p-2 rounded hover-shadow">
        <div class="card-body">
          <a href="#">
            <h4 class="card-title course-title"><?php echo $course_title; ?></h4>
          </a>
          
          <h6 class="card-text mb-3"> <?php echo $course_des; ?></h6>
          <p class="card-text mb-2"><i class="ti-list mr-1"></i> <?php echo $total;?> questions</p>
          <p class="card-text mb-2"><i class="ti-time mr-1"></i> <?php echo $course_time?> mins</p>
          <p class="card-text mb-2"><i class="ti-credit-card"></i> <?php echo $course_price?></p>
          <a href='<?php echo "user_dashboard.php?q=quiz&step=2&eid=$eid&n=1&t=$total&action=start" ?>' class="btn btn-primary btn-sm rounded"><i class="ti-desktop" style="color: white;"></i> Attempt Quiz</a>
        </div>
      </div>
    </div>
         <?php } ?>
  </div>
<?php endif; ?>
<!-- free courses end -->
<!-- purchased courses start -->
<?php  if (@$_GET['q']=='purchased'): ?>
<h3 style="color:white; background-color:midnightblue;" class="mt-2 p-2" id="purchased">PURCHASED COURSES</h3>
     <div class="row">
    <?php 
    $sql2 = "SELECT * FROM purchased_courses WHERE user_id='$email' AND trials > 0";
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();          
    while($pcs = $stmt2->fetch(PDO::FETCH_ASSOC)){
      $course=$pcs['course_id'];
      $trials=$pcs['trials'];
      $sql3 = "SELECT * FROM quiz WHERE eid ='$course' ORDER BY title";
      $stmt3 = $pdo->prepare($sql3);
      $stmt3->execute();          
      while($course = $stmt3->fetch(PDO::FETCH_ASSOC)){
    $eid=$course['eid'];
    $course_title=$course['title'];
    $course_date=$course['date'];
    $course_des=$course['intro'];
    $total=$course['total'];
    $course_time=$course['time'];
    ?>
  <div class="col-lg-3 col-sm-6 col-md-4 col-xs-6">
    <div class="card p-2 rounded hover-shadow">
      <div class="card-body">
        <a href="#">
          <h4 class="card-title course-title"><?php echo $course_title; ?></h4>
        </a>
        
        <h6 class="card-text mb-3"> <?php echo $course_des; ?></h6>
        <p class="card-text mb-2"><i class="ti-list mr-1"></i> <?php echo $total;?> questions</p>
        <p class="card-text mb-2"><i class="ti-time mr-1"></i> <?php echo $course_time?> mins</p>
        <p class="card-text mb-2"><i class="ti-credit-card"></i> <?php echo $trials?> Attempts left</p>
        <a href='<?php echo "user_dashboard.php?q=quiz&step=2&eid=$eid&n=1&t=$total&action=start" ?>' class="btn btn-primary btn-sm rounded"><i class="ti-desktop" style="color: white;"></i> Attempt Quiz</a>
      </div>
    </div>
  </div>
       <?php } 
     }
     ?>
</div>
<!-- purchased courses end -->
<?php endif; ?>