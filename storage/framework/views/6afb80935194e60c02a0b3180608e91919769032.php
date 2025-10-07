
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>SMK IT IHYA SUNNAH</title>
    <!-- CSS files -->
    <link href="<?php echo e(asset('tabler/dist/css/tabler.min.css?1692870487')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('tabler/dist/css/tabler-flags.min.css?1692870487')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('tabler/dist/css/tabler-payments.min.css?1692870487')); ?>" rel="stylesheet"/>
    <link href="<?php echo e(asset('tabler/dist/css/tabler-vendors.min.css?1692870487')); ?>" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column" style="background: white">
    <div class="page page-center">
      <div class="container container-normal py-2">
        <div class="row align-items-center g-2">
          <div class="col-lg">
            <div class="container-tight">
             
                <img src="<?php echo e(asset('assets/img/login/logo_smk.png')); ?>" height="200" class="d-block mx-auto" alt="">

                  <h2 class="h2 text-center mb-1">E-Presensi</h2>
                  <h4 class="h4 text-center">Silahkan login terlebih dahulu</h4>

                  <?php if(Session::get('warning')): ?>
                  <div class="alert alert-warning">
                    <p><?php echo e(Session::get('warning')); ?></p>
                  </div>
                  <?php endif; ?>
                  <br>
                  <form action="/proseslogin" method="post" autocomplete="off" novalidate>
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                      <input type="number" name="nik" class="form-control" placeholder="NIK" autocomplete="off">
                    </div>
                    <div class="mb-2">
                      <div class="input-group input-group-flat">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" id="togglePassword">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                              <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                              <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                          </a>
                        </span>
                      </div>
                    </div>
                    <p>Hubungi admin sistem, apabila lupa password</p>
                    <div class="form-footer">
                      <button type="submit" class="btn btn-success w-100">Log in</button>
                    </div>
                </form>
            </div>
          </div>
         
        </div>
      </div>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
    
        togglePassword.addEventListener('click', function (e) {
          // Mencegah tautan mengikuti href
          e.preventDefault();
          // toggle the type attribute
          const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
          password.setAttribute('type', type);
        });
      </script>

  </body>
</html><?php /**PATH D:\Proyek Penelitian\presensigps\resources\views/auth/login.blade.php ENDPATH**/ ?>