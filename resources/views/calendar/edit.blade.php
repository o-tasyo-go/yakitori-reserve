<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/edit.css')}}">
    {{-- <script src="{{asset('js/edit.js')}}"></script> --}}
    <title>Document</title>
</head>
<title>laravel演習</title>
</head>
    <body>
        <div style="text-align: center;">
            <form action="/edit/{{$ymd}}" method="post">
            @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <label for="mix">受け取り時間</label>
                <input type="text" id="timeSelect" name="timeSelect" value="{{$user->timeSelect}}">
            <div>
                <label>名前</label>
                <input type="text" id="name" name="name" value="{{$user->name}}" />
            </div>
            <div>
                <label>電話</label>
                <input type="text" id="tel" name="tel" value="{{$user->tel}}" />
            </div>
            <div class="product">
                <label for="mix">ミックス:</label>
                <input type="text" id="mix" name="mix" class="product-quantity" data-product="ミックス" value="{{$user->mix}}">
            </div>
            <div class="product">
                <label for="breast">上むね:</label>
                <input type="text" id="breast" name="breast" class="product-quantity" data-product="上むね" value="{{$user->breast}}" >
            
            {{-- <input type="text" name="name" id="id" value="{{$user->breast}}">
            <input type="number" name="name" id="id" value="{{$user->breast}}"> --}}
            </div>
            <div class="product">
                <label for="skin">かわ:</label>
                <input type="text" id="skin" name="skin" class="product-quantity" data-product="かわ" value="{{$user->skin}}">
            </div>
            <div class="product">
                <label for="tsukune">つくね:</label>
                <input type="text" id="tsukune" name="tsukune" class="product-quantity" data-product="つくね" value="{{$user->tsukune}}">
            </div>
            <div class="product">
                <label for="bonjiri">ぼんじり:</label>
                <input type="text" id="bonjiri" name="bonjiri" class="product-quantity" data-product="ぼんじり" value="{{$user->bonjiri}}">
            </div>
            <div class="product">
                <label for="others">その他:</label>
                <input type="text" id="others" name="others" class="product-quantity" data-product="その他" value="{{$user->others}}">
            </div>
            <div class="product">
            <label for="karaage">唐揚げ:</label>
            <input type="text" id="karaage" name="karaage" class="product-quantity" data-product="唐揚げ" value="{{$user->karaage}}">
          </div>
            <input type="submit" value="編集" />
            </form>
            <form action="/delete/{{$ymd}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$user->id}}">
                <input type="submit" value="削除" />
            </form>
        </div>
    </body>
</html>