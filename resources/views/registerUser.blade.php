 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ url('otps') }}">
                        @csrf 

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                         <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control @error('password') is-invalid @enderror" name="mobile" >

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                @if ($errors->any())
                                {{ $errors->first() }}
                                    
                                @endif
                               
                            </div>
                        </div> 

                        <!-- <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->

                    
                        
             <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send OTP') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- <html>
    <head>
        <title>Laravel 8 Mobile Number (OTP) Authentication using Firebase - websolutionstuff.com</title>    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
<body>  
<div class="container">
    <h3 style="margin-top: 30px;">Laravel 8 Mobile Number (OTP) Authentication using Firebase - websolutionstuff.com</h3><br>  
    <div class="alert alert-danger" id="error" style="display: none;"></div>  
    <div class="card">
      <div class="card-header">
        Enter Phone Number
      </div>
      <div class="card-body">  
        <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
        <form>
            <label>Phone Number:</label>
            <input type="text" id="number" class="form-control" placeholder="+91 9876543210"><br>
            <div id="recaptcha-container"></div><br>
            <button type="button" class="btn btn-success" onclick="SendCode();">Send Code</button>
        </form>
      </div>
    </div>
      
    <div class="card" style="margin-top: 10px">
      <div class="card-header">
        Enter Verification code
      </div>
      <div class="card-body">
        <div class="alert alert-success" id="successRegsiter" style="display: none;"></div>
        <form>
            <input type="text" id="verificationCode" class="form-control" placeholder="Enter Verification Code"><br>
            <button type="button" class="btn btn-success" onclick="VerifyCode();">Verify Code</button>
        </form>
     </div>
    </div>
  
</div>
  
<script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
  
<script>
      
  var firebaseConfig = {
    apiKey: "XXXX",
    authDomain: "XXXX.firebaseapp.com",
    databaseURL: "XXXX.firebaseio.com",
    projectId: "XXXX",
    storageBucket: "XXXX.appspot.com",
    messagingSenderId: "XXXX",
    appId: "XXXX",
    measurementId: "XXXX"
  };
    
  firebase.initializeApp(firebaseConfig);
</script>
  
<script type="text/javascript">
  
    window.onload=function () {
      render();
    };
  
    function render() {
        window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
  
    function SendCode() {
           
        var number = $("#number").val();
          
        firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
              
            window.confirmationResult=confirmationResult;
            coderesult=confirmationResult;            
  
            $("#sentSuccess").text("Message Sent Successfully.");
            $("#sentSuccess").show();
              
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
  
    }
  
    function VerifyCode() {
  
        var code = $("#verificationCode").val();
  
        coderesult.confirm(code).then(function (result) {
            var user=result.user;            
  
            $("#successRegsiter").text("You Are Register Successfully.");
            $("#successRegsiter").show();
  
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    }
  
</script>
  
</body>
</html> -->
