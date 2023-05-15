<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>焼き鳥予約</title>
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <script src="{{asset('js/calendar.js')}}"></script>
</head>
<body>
  <form action="/your-server-endpoint/{{$date}}" method="post">
  <input type="hidden" name="date" value="{{$date}}">
<table>
    <select id="timeSelect" name="timeSelect"></select>
<tr>
  <th>名前</th>
  <td> <input type="text" name="name" /></td>
</tr>
<tr>
  <th>電話</th>
  <td> <input type="text" name="tel" /></td>
</tr>
</table>
  @if ($errors->any())
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
@csrf
<h1>商品を選択してください</h1>

  <div class="product">
      <label for="mix">ミックス:</label>
      <select id="mix" name="mix" class="product-quantity" data-product="ミックス"></select>
  </div>
  <div class="product">
      <label for="breast">上むね:</label>
      <select id="breast" name="breast" class="product-quantity" data-product="上むね"></select>
  </div>
  <div class="product">
      <label for="skin">かわ:</label>
      <select id="skin" name="skin" class="product-quantity" data-product="かわ"></select>
  </div>
  <div class="product">
      <label for="tsukune">つくね:</label>
      <select id="tsukune" name="tsukune" class="product-quantity" data-product="つくね"></select>
  </div>
  <div class="product">
      <label for="bonjiri">ぼんじり:</label>
      <select id="bonjiri" name="bonjiri" class="product-quantity" data-product="ぼんじり"></select>
  </div>
  <div class="product">
      <label for="others">その他:</label>
      <select id="others" name="others" class="product-quantity" data-product="その他"></select>
  </div>
  <div class="product">
  <label for="karaage">唐揚げ:</label>
  <select id="karaage" name="karaage" class="product-quantity" data-product="唐揚げ"></select>
</div>
<input type="submit" value="登録">
</form>
</body>
</html>