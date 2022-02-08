<?php
/* TODO: Courses on EMI, 
Insightful student reports - monthly, 
Gamifying Content,
Chatbot for general queries, 
Chat support with the Instructor  */



include('./dbConnection.php');
// Header Include from mainInclude 
include('./mainInclude/header.php');
?>
<style>
  /* width */
  ::-webkit-scrollbar {
    width: 10px;
  }

  /* Track */
  ::-webkit-scrollbar-track {
    background: #ffff;
  }

  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #17a2b8;
  }

  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: black;
  }
</style>
<!-- Start Video Background-->
<div class="container-fluid remove-vid-marg">
  <div class="vid-parent">
    <video playsinline autoplay muted loop>
      <source src="video/vrvid.mp4" />
    </video>
    <div class="vid-overlay"></div>
  </div>
  <div class="vid-content">
    <h1 class="my-content">Welcome to SkillUp!</h1>
    <h6 class="my-content">Skills for the METAVERSE!</h6><br />
    <?php

    if (!isset($_SESSION['is_login'])) {
      echo '<a class="btn btn-info mt-3" href="#" data-toggle="modal" data-target="#stuRegModalCenter">Get Started <i class="bi bi-box-arrow-up-right"></i></a> ';
    } else {
      echo '<a class="btn btn-info mt-3" href="student/studentProfile.php">My Profile</a>';
    }
    ?>

  </div>
</div> <!-- End Video Background -->

<div class="container-fluid bg-dark txt-banner">
  <!-- Start Text Banner -->
  <div class="row bottom-banner">
    <div class="col-sm">
      <h5> <i class="fas fa-book-open mr-3"></i> 100% Online Courses</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-users mr-3"></i> Expert Instructors</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-keyboard mr-3"></i> Lifetime Access</h5>
    </div>
    <div class="col-sm">
      <h5><i class="fas fa-rupee-sign mr-3"></i> Worthy Investment*</h5>
    </div>
  </div>
</div> <!-- End Text Banner -->

<div class="container mt-5">
  <!-- Start Most Popular Course -->
  <h1 class="text-center">Popular Courses</h1>
  <div class="card-deck mt-4">
    <!-- Start Most Popular Course 1st Card Deck -->
    <?php
    $sql = "SELECT * FROM course LIMIT 3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
            <a href="coursedetails.php?course_id=' . $course_id . '" class="btn" style="text-align: left; padding:0px; margin:0px;">
              <div class="card">
                <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="Guitar" />
                <div class="card-body">
                  <h5 class="card-title">' . $row['course_name'] . '</h5>
                  <p class="card-text">' . $row['course_desc'] . '</p>
                </div>
                <div class="card-footer">
                  <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_original_price'] . '</del></small> <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '<span></p> <a class="btn btn-info text-white font-weight-bolder float-right" href="coursedetails.php?course_id=' . $course_id . '">Enroll</a>
                </div>
              </div>
            </a>  ';
      }
    }
    ?>
  </div> <!-- End Most Popular Course 1st Card Deck -->
  <div class="card-deck mt-4">
    <!-- Start Most Popular Course 2nd Card Deck -->
    <?php
    $sql = "SELECT * FROM course LIMIT 3,3";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        echo '
                <a href="coursedetails.php?course_id=' . $course_id . '"  class="btn" style="text-align: left; padding:0px;">
                  <div class="card">
                    <img src="' . str_replace('..', '.', $row['course_img']) . '" class="card-img-top" alt="img" />
                    <div class="card-body">
                      <h5 class="card-title">' . $row['course_name'] . '</h5>
                      <p class="card-text">' . $row['course_desc'] . '</p>
                    </div>
                    <div class="card-footer">
                      <p class="card-text d-inline">Price: <small><del>&#8377 ' . $row['course_original_price'] . '</del></small> <span class="font-weight-bolder">&#8377 ' . $row['course_price'] . '<span></p> <a class="btn btn-info text-white font-weight-bolder float-right" href="#">Enroll</a>
                    </div>
                  </div>
                </a>  ';
      }
    }
    ?>
  </div> <!-- End Most Popular Course 2nd Card Deck -->
  <div class="text-center mt-2">
    <a class="btn btn-info btn-sm" href="courses.php">View All Courses > </a>
  </div>
</div> <!-- End Most Popular Course -->

<!-- Start Students Testimonial -->
<div class="container-fluid mt-5" style="background-color: #000000" id="Feedback">
  <h1 class="text-center testyheading p-4"> Student's Feedback </h1>
  <div class="row">
    <div class="col-md-12">
      <div id="testimonial-slider" class="owl-carousel">
        <?php
        $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $s_img = $row['stu_img'];
            $n_img = str_replace('../', '', $s_img)
        ?>
            <div class="testimonial">
              <p class="description">
                <?php echo $row['f_content']; ?>
              </p>
              <div class="pic">
                <img src="<?php echo $n_img; ?>" alt="" />
              </div>
              <div class="testimonial-prof">
                <h4><?php echo $row['stu_name']; ?></h4>
                <small><?php echo $row['stu_occ']; ?></small>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </div>
</div> <!-- End Students Testimonial -->


<div class="container-fluid bg-info">
  <!-- Start Social Follow -->
  <div class="row text-white text-center p-1">
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-facebook-f"></i> Facebook</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-twitter"></i> Twitter</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-whatsapp"></i> WhatsApp</a>
    </div>
    <div class="col-sm">
      <a class="text-white social-hover" href="#"><i class="fab fa-instagram"></i> Instagram</a>
    </div>
  </div>
</div> <!-- End Social Follow -->


<?php
// Contact Us
include('./contact.php');
?>



<!-- Start About Section -->
<div class="container-fluid p-4" style="background-color:#E9ECEF">
  <div class="container" style="background-color:#E9ECEF">
    <div class="row text-center">
      <div class="col-sm">
        <h5>About Us</h5>
        <p>SkillUp provides universal access to the world’s best education, partnering with top universities and organizations to offer courses online.</p>
      </div>
      <div class="col-sm">
        <h5>Category</h5>
        <a class="text-dark" href="#">Augmented Reality</a><br />
        <a class="text-dark" href="#">Virtual Reality</a><br />
        <a class="text-dark" href="#">NFTs</a><br />
        <a class="text-dark" href="#">Blockchain </a><br />
        <a class="text-dark" href="#">Artificial Intelligence</a><br />
      </div>
      <div class="col-sm">
        <h5>Contact Us</h5>
        <p>SkillUp Educore<br> Nr. KH-5 Circle <br> Gandhinagar, Gujarat <br> Ph. 999896969 </p>
      </div>
    </div>
  </div>
</div> <!-- End About Section -->

<?php
// Footer Include from mainInclude 
include('./mainInclude/footer.php');

?>