<!DOCTYPE html>
<html lang="en">

<!-- title should be on top  -->
<?php $title = 'ConsoLegal | Login'; ?>
<?php include './incl/head.php'; ?>

<body>
   <!---------- navbar  ---------->
   <a href="index.php" class="btn border-bottom">Home</a>

   <section class="signup-login d-flex justify-content-center align-items-center mx-auto " style="height: 100vh;">

      <div class="main-div container row mx-auto ">
         <div class="col-md-6 lt">
            <div class="btn-toggle row border-bottom">
               <a href="login.php" class="btn login-btn col-4">Login</a>
               <a href="signup.php" class="btn signup-btn col-4 active">Sign Up</a>
            </div>

            <form class="">
               <div class="form-floating ">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Name</label>
               </div>
               <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Email Address</label>
               </div>
               <div class="form-floating ">
                  <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Company Name</label>
               </div>
               <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Phone</label>
               </div>
               <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Create Password</label>
               </div>

               <div class="mt-3 d-flex justify-content-between align-items-center">
                  <a href="login.php" class="btn theme-blue">Login to existing account ?</a>
                  <button type="submit" class="btn an-btn px-5">Sign Up</button>
               </div>

            </form>
         </div>
         <div class="col-md-6 rt">
            <div class="img-container">
               <img src="image/about-us.svg" alt="" class="img-fluid">
            </div>
         </div>
      </div>

   </section>




</body>

</html>