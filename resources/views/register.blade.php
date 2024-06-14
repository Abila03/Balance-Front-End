<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0  "style="background-color: transparent;">
          <div class="card-body p-4 p-sm-5">
            <img class="" src="images/logo.png" alt="..." style="width: 430px"/>
            <p class=" text-center mb-3 fw-light fs-5 text-black">Sign up</p>
            <form class="login-form" id="register-form">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="nama" name="nama" required>
                <label for="nama" class="text-black">Username</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" required>
                <label for="email" class="text-black">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password" class="text-black">Password</label>
                <i class="fas fa-eye toggle-password" id="togglePasswordIcon"></i>
              </div>
              <div class="d-grid mb-3">
                <input class="btn btn-info btn-login text-uppercase text-white fw-bold" type="submit" style="background-color:#295bac;" name="submit" value="Sign Up">
              </div>
            </form>
            <p class="auth-link text-center text-black"><a>Already have an account?</a> <a href="/" style="color: blue;">Log in</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
            $(document).ready(function() {
                $('#register-form').submit(function(e) {
                    e.preventDefault(); 
                    var nama = $('#nama').val();
                    var email = $('#email').val();
                    var password = $('#password').val();

                    fetch('https://balance-back-end-production.up.railway.app/api/auth/register', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            nama: nama,
                            foto_profil: '123', 
                            email: email,
                            password: password
                        })
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to register account');
                        }
                        return response.json();
                    })
                    .then(data => {
                        alert('Account Register successfully');
                        window.location.href = '/';
                    })
                    
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to register account. Please try again later.');
                    });
                });
            });
        </script>
</body>
</html>
