<!DOCTYPE html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<body>

<h1>Welcome to login page</h1>

<form action="" method="" target="_blank" id="gg" class="dd">
  @csrf
  <div class="error" style= "color:red"> </div>
  <label for="email">Email:</label>
  <input type="text" id="email" name="email"><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password"><br><br>
  <input type="checkbox" id="remember" name="remember" value="remember">
  <label for="remember"> Remember Me</label><br>
  <input type="submit" value="Login">
</form>

<!-- <p>Click on the submit button, and the form will be submittied using the POST method.</p> -->

</body>
<script src="{{asset('js/form.js')}}"></script>
</html>
