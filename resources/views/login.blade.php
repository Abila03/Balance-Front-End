<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body style="background-image: url('images/bg.jpg'); background-size: cover;">
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card border-0  "style="background-color: transparent;">
          <div class="card-body p-4 p-sm-5">
            <img class="" src="images/logo.png" alt="..." style="width: 350px"/>
            <p class=" text-center mb-3 fw-light fs-5 text-black">Log In</p>
            <form class="login-form" id="loginForm">
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" required>
                <label for="email" class="text-black">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password" class="text-black">Password</label>
                <i class="fas fa-eye toggle-password" id="togglePasswordIcon"></i>
              </div>
              <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                <label class="form-check-label text-black" for="rememberPasswordCheck">
                  Remember for 30 days
                </label>
              </div>
              <div class="d-grid mb-3">
                <button class="btn btn-info btn-login text-uppercase text-white fw-bold" type="submit" style="background-color:#295bac;">Log in</button>
              </div>
            </form>
            <p class="auth-link text-center text-black"><a>Don't have an account?</a> <a href="register" style="color: blue;">Sign Up</a></p>
            <p class="auth-link text-center text-black"><a href="forgot_password" style="color: blue;">Forgot your Password?</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    document.getElementById('loginForm').addEventListener('submit', async function(event) {
      event.preventDefault();
      
      const email = document.getElementById('email').value;
      const password = document.getElementById('password').value;

      try {
        const response = await fetch('https://balance-back-end-production.up.railway.app/api/auth/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            email: email,
            password: password
          })
        });

        if (!response.ok) {
          const errorMessage = await response.text();
          throw new Error(errorMessage);
        }

        const responseData = await response.json();

        // Simpan informasi dari respons login ke dalam localStorage
        localStorage.setItem('access_token', responseData.access_token);
        localStorage.setItem('user_id', responseData.user.id_pengguna);
        localStorage.setItem('user_name', responseData.user.nama);
        localStorage.setItem('user_email', responseData.user.email);

        // Redirect ke halaman home setelah login berhasil
        window.location.href = '/home';

      } catch (error) {
        console.error('Terjadi kesalahan saat login:', error.message);
        // Tampilkan pesan kesalahan kepada pengguna jika login gagal
      }
    });
  </script>
</body>
</html>
