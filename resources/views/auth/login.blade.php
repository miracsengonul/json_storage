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
    <form method="POST" action="{{ route('login') }}">
        @csrf
		<div class="col-md-6 col-md-offset-3">

			<div class="form-group row">
                <input id="username" type="text" class="form-control inputArea @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="username" autofocus>
				@error('username')
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
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                           Beni Hatırla
                        </label>
                    </div>
                </div>
            </div>	
			<div class="form-group row" style="text-align: margin-left:auto;margin-right: auto;display: block;text-align: center;">
				<input type="submit" value="Giriş" style="background-color: darkred;border-color: darkred;border-radius: 15%;height: 45px;width:85px;font-size:19px">
			</div>
        </div>	
    </form>    
	</div>
</div>

</body>
</html>