<!DOCTYPE html>
<html>
<head>
	<title>Doküman | {{parse_url(config('app.url'))['host']}}</title>
	@include('layouts.head')
</head>
<body>
<div class="container">
	@include('layouts.navbar')
	<div class="row orta">
		<div class="col-md-6 col-md-offset-3">
			<h1>API Doküman</h1>
			<hr>
		</div>
	</div>
	<div class="row structureRow">
		<div class="col-md-6 col-md-offset-3">
			<h2>Structure</h2>
			<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
			<h4><span class="colorLightBlue">username</span> :  username değeriniz</h4>
			<h4><span class="colorLightBlue">collectionname</span> : oynayacağınız collection ismi</h4>
			<h4><span class="colorLightBlue">X-API-KEY</span> : API Key değeriniz</h4>
			<p class="curlScope">
				<code style="background:transparent;color:white">
					<span class="colorPink">curl</span> -X POST|PUT '<span class="colorLightGreen">{{url('/')}}/{username}/{collectionname}</span>' \ <br>
			    	-H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
			    	-H '<span class="colorLightGreen">X-API-KEY: {YOUR_API_KEY}</span>' \ <br>
					-d '<span class="colorLightGreen">{"key": "value", "key": "value"}</span>' <br>
				</code>
			</p>
		</div>	
	</div>
	<div class="row structureAPI">
		<div class="col-md-6">
			<h2>Create</h2>
			<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
			<p class="curlScope">
				<code style="background:transparent;color:white">
					<span class="colorPink">curl</span> -X POST '<span class="colorLightGreen">{{url('/')}}/@auth{{Auth::user()->username.''.'/users' }} @else{{'mehmet/users'}} @endauth</span>' \ <br>
			    	-H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
			    	-H '<span class="colorLightGreen">X-API-KEY: BLABLA</span>' \ <br>
					-d '<span class="colorLightGreen">{"isim": "Mehmet", "soyisim": "Kaya"}</span>' <br>
				</code>
			</p>
		</div>
		<div class="col-md-6">
			<h2>Multi Create</h2>
			<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
			<p class="curlScope">
				<code style="background:transparent;color:white">
					<span class="colorPink">curl</span> -X POST '<span class="colorLightGreen">{{url('/')}}/@auth{{Auth::user()->username.''.'/users' }} @else{{'mehmet/users'}} @endauth</span>' \ <br>
					-H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
					-H '<span class="colorLightGreen">X-API-KEY: BLABLA</span>' \ <br>
					-d <span class="colorLightGreen">'[{"": "Ahmet", "soyisim": "Yıldırım"}, {"isim": "Hüseyin", "soyisim": "Kılıç"}]'</span> <br>
				</code>
			</p>
		</div>		
	</div>
	<div class="row structureAPI">
		<div class="col-md-6">
			<h2>SINGLE READ</h2>
			<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
			<p class="curlScope">
				<code style="background:transparent;color:white">
					<span class="colorPink">curl</span> -X GET '<span class="colorLightGreen">{{url('/')}}/@auth{{Auth::user()->username.''.'/users' }} @else{{'mehmet/users'}} @endauth</span>' \ <br>
					-H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
					-H '<span class="colorLightGreen">X-API-KEY: BLABLA</span>' <br>
				</code>
			</p>
			<h3>Response</h3>
			<p class="response">
				<code style="background:transparent;color:white">
					{"id": "18357fd4c58e68e2","isim": "Halil","soyisim": "Akay","created_at": "2019-09-21 07:37:04","updated_at": "2019-09-21 07:37:04"}
				</code>
		</p>
		</div>	
		<div class="col-md-6">
			<h2>READ ALL</h2>
			<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
			<p class="curlScope">
				<code style="background:transparent;color:white">
					<span class="colorPink">curl</span> -X GET '<span class="colorLightGreen">{{url('/')}}/@auth{{Auth::user()->username.''.'/users' }} @else{{'mehmet/users'}} @endauth</span>' \ <br>
					-H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
					-H '<span class="colorLightGreen">X-API-KEY: BLABLA</span>'<br>
				</code>
			</p>
			<h3>Response</h3>
			<p class="response">
				<code style="background:transparent;color:white">
					[
						<br>
						{
							"id": "18357fd4c58e68e2",
							"isim": "Halil",
							"soyisim": "Akay",
							"created_at": "2019-09-21 07:37:04",
							"updated_at": "2019-09-21 07:37:04"
						},<br><br>
						{
							"id": "152dc7400f85932a",
							"isim": "Mücahit",
							"soyisim": "Ağca",
							"created_at": "2019-09-21 07:37:04",
							"updated_at": "2019-09-21 07:37:04"
						}<br>	
					]
				</code>	
			</p>
		</div>
	</div>
	<div class="row structureAPI">
		<div class="col-md-6 col-md-offset-3">
			<h2>Update</h2>
			<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
			<p style="font-size:17px">{id} = 18357fd4c58e68e2 for example</p>
			<p style="font-size:17px">Parametre bazlı değişim bulunmamaktadır. İçerik tamamen değiştirilir.</p>
			<p class="curlScope">
				<code style="background:transparent;color:white">
					<span class="colorPink">curl</span> -X PUT '<span class="colorLightGreen">{{url('/')}}/@auth{{Auth::user()->username.''.'/users/{id}' }} @else mehmet/users/{id} @endauth</span>' \ <br>
			    	-H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
			    	-H '<span class="colorLightGreen">X-API-KEY: BLABLA</span>' \ <br>
					-d '<span class="colorLightGreen">{"isim": "Hasan", "soyisim": "Yılmaz"}</span>' <br>
				</code>
			</p>
		</div>	
	</div>
	<div class="row structureAPI">
			<div class="col-md-6">
				<h2>SINGLE DELETE</h2>
				<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
				<p style="font-size:17px">{id} = 18357fd4c58e68e2 for example</p>
				<code style="background:transparent;color:white">
					<p class="curlScope">
					<span class="colorPink">curl</span> -X DELETE '<span class="colorLightGreen">{{url('/')}}/@auth{{Auth::user()->username.''.'/users/{id}' }} @else mehmet/users/{id} @endauth</span>' \ <br>
					-H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
					-H '<span class="colorLightGreen">X-API-KEY: BLABLA</span>' \ <br>
				</code>
				</p>
			</div>	
		<div class="col-md-6">
			<h2>DELETE ALL</h2>
			<hr style="width:20%;border-top: 1px dotted gray;border-radius: 5px">
			<p style="font-size:17px">All Collection</p>
			<p class="curlScope">
				<code style="background:transparent;color:white"><span class="colorPink">curl</span> -X DELETE '<span class="colorLightGreen">{{url('/')}}/@auth{{Auth::user()->username.''.'/users' }} @else mehmet/users @endauth</span>' \ <br>
			    -H '<span class="colorLightGreen">content-type: application/json</span>' \ <br>
			    -H '<span class="colorLightGreen">X-API-KEY: BLABLA</span>' \ <br></code>
			</p>
		</div>	
	</div>
</div>
</body>
</html>