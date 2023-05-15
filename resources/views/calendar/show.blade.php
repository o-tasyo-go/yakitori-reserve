<!DOCTYPE html>
<html>
<head>
    <title>焼き鳥予約</title>
    <link rel="stylesheet" href="{{asset('css/show.css')}}">
</head>
<body>
    <h1>{{ $date }}の予約</h1>
    <table border="1";>
        <tr>
            <th>受け取り時間</th>
            <th>名前</th>
            <th>電話番号</th>
            <th>MIX</th>
            <th>上むね</th>
            <th>かわ</th>
            <th>つくね</th>
            <th>ぼんじり</th>
            <th>その他</th>
            <th>唐揚げ</th>
        </tr>
            @foreach($lists as $list)
                <tr>
                    <?php $time= new \DateTime($list->timeSelect); ?>
                    <td>{{$time->format('H:i')}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->tel}}</td>
                    <th>{{$list->mix}}本</th>
                    <th>{{$list->breast}}本</th>
                    <th>{{$list->skin}}本</th>
                    <th>{{$list->tsukune}}本</th>
                    <th>{{$list->bonjiri}}本</th>
                    <th>{{$list->others}}本</th>
                    <th>{{$list->karaage}}g</th>
                    <th><a href="/edit/{{$list->id}}">編集</a></th>
                </tr>
            @endforeach
    </table>
    <th class="anchor"><a href="/reserve/{{ $date }}">追加</a></th>
    <th class="anchor"><a href="/">日付を選択</a></th>
</body>
</html>