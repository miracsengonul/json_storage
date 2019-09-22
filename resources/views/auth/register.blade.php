<!DOCTYPE html>
<html>
<head>
	<title>jsonn.me | API Based JSON Storage</title>
	@include('layouts.head')
</head>
<body>

<div class="container">
	@include('layouts.navbar')
	<div class="row orta">
		<div class="col-md-6 col-md-offset-3">
			<h1>Kayıt Ol</h1>
		</div>
	</div>
	<div class="row inputRow">
    <form method="POST" action="{{ route('register') }}">
        @csrf
		<div class="col-md-6 col-md-offset-3">
			<div class="form-group row">
				<input type="text" class="form-control inputArea @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"placeholder="username">
				@error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group row">
				<input type="email" class="form-control inputArea @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" name="email" placeholder="email">
				@error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group row">
				<input type="password" class="form-control inputArea @error('password') is-invalid @enderror" name="password" placeholder="parola">
				@error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			</div>
			<div class="form-group row">
				<input type="password" class="form-control inputArea" name="password_confirmation" placeholder="tekrar parola" required>
			</div>
			<div class="form-group row" style="text-align: margin-left:auto;margin-right: auto;display: block;text-align: center;">
				<input type="submit" value="Kayıt" style="background-color: darkred;border-color: darkred;border-radius: 15%;height: 45px;width:85px;font-size:19px">
			</div>
        </div>	
    </form>    
	</div>
</div>

</body>
</html>