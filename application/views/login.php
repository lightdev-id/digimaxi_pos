
               <?php if($this->session->flashdata('login_gagal')): ?>
             <script type="text/javascript">
               let timerInterval
Swal.fire({
  title: 'Gagal!',
  html: 'Username atau password salah!',
  icon: 'danger',
  timer: 1500,
  
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
  },
  willClose: () => {
    clearInterval(timerInterval)
  }

})
            </script>
                  
           
        <?php endif ?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-8 col-lg-8 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
    
                         
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="<?php echo base_url('login/aksi_login'); ?>" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                name="username" aria-describedby="emailHelp"
                                                placeholder="Masukan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" placeholder="Masukan Password">
                                        </div>
                                      
                                        <input type="submit" class="btn btn-primary btn-user btn-block">
                                          
                                   
                                        <hr>
                                      
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Lupa Password?</a>
                                    </div>
                                   
                                
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

