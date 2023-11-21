<!DOCTYPE html>
<html lang="en">
<head>
@vite(['resources/sass/app.scss','resources/js/app.js'])
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <label class="form-label" for="typeEmailX-2">Username</label><br>
              <input type="text" id="typeEmailX-2" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="typePasswordX-2">Password</label><br> 
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" />
            </div>

            <!-- <div class="form-outline mb-4">
              <label class="form-label" for="typeRoleX-2">Role</label><br> 
              <input type="text" id="typePasswordX-2" class="form-control form-control-lg" />
            </div> -->

            <div class="form-check d-flex justify-content-start mb-4">
            <input class="form-check-input" type="radio" value="cust" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Customer </label>
              <input class="form-check-input" type="radio" value="admin" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Admin </label>
              <input class="form-check-input" type="radio" value="s_admin" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Super Admin </label>
            </div>
            </div>

            <!-- Checkbox -->
            <!-- <div class="form-check d-flex justify-content-start mb-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div> -->

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

            <!-- <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;"
              type="submit"><i class="fab fa-google me-2"></i> Sign in with google</button>
            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;"
              type="submit"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button> -->

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>