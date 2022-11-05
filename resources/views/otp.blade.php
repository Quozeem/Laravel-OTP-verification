Otp sent to {{ session()->get('firstmobile') }}******{{ session()->get('secondmobile') }}
<br>
  <a href="{{url('resendOTP')}}">
    Resend otp</a>
    <br><br>
<form method="post" action="{{url('loginotp')}}">
   @csrf
    <label>
        OTP</label>
        <input type="text" name="otp_code" placeholder="OTP"
        required/>
        @if ($errors->any())
          <br> {{ $errors->first() }} <br>
        @endif
        <input type="submit" value="Enter OTP"/>
</form>

