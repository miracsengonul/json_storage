<!DOCTYPE html>
<html>
<head>
	<title>{{parse_url(config('app.url'))['host']}} | API Based JSON Storage</title>
	@include('layouts.head')
</head>
<body>
<div class="container">
	@include('layouts.navbar')
	<div class="row orta">
		<div class="col-md-6 col-md-offset-3">
			<img src="img/api.png" width="125">
			<br>
			<h2>API based JSON Storage</h2>
			<span class="font300" style="font-size:17px">
				{{parse_url(config('app.url'))['host']}}, Authentication desteği ile JSON verilerinizi HTTP API'leri üzerinden depolamanızı, okumanızı ve 	değiştirmenizi sağlar. 
				Size özel tanımlanan URL ile veri deponuzu incelemek için HTTP istekleri göndermeye başlayabilirsiniz. 
				Daha fazla bilgi için lütfen dokümana gözatın.
			</span>
		</div>
	</div>
	<div class="row inputRow">
		<div class="col-md-6 col-md-offset-3">
			@auth
				<input type="text" class="form-control inputArea" value="{{url('/')}}/{{Auth::user()->username}}/collection_name">
			@else
				<input type="text" class="form-control inputArea" value="{{url('/')}}/username/collection_name">
			@endauth
		</div>	
	</div>
	<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
	<div class="row textCenter">
		<h3 class="colorLightGreen">sadece müslümanlara !</h3>
		<h4>Siz ey Müslümanlar! Suskun ve aciz helâk olmuş ölüler!</h4>
		<h4>#filistinli vurulan anamızın</h4>
		<h4>#suriye zindanlarındaki işkence göre bacılarımızın</h4>
		<h4>#doğutürkistanda dinleri ellerinden alınan kardeşlerimizin</h4>
		<h4 style="text-decoration:underline">hesap günü inandığınız Allah tarafından hesabı sorulacak.</h4>
		
	</div>
	@auth
	<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
	<div class="row structureRow textCenter">
		<h2>#	BİLGİLERİNİZ#	</h2>
		<p style="font-size:23px" class="marginTop50"><span class="colorLightGreen">Username :</span> <span class="colorPink">{{Auth::user()->username}}</span></p>
		<p style="font-size:23px" class="marginTop50"><span class="colorLightGreen">API KEY :</span> <span class="colorPink">{{Auth::user()->api_key}}</span></p>
	</div>
	@endauth
</div>
<script>
window.scrollTo(@auth 0 @endauth ,document.body.scrollHeight);
</script>
</body>
</html>