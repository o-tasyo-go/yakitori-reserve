<!DOCTYPE html>
<html>
<head>
    <title>Calendar</title>
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
</head>
<body>
<div>
<h1 style="text-align: center">{{ $year }}年{{ $month }}月のカレンダー</h1>
</div>
<table>
    <thead>
        <tr>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @for ($i = 1; $i <= $startOfMonth->dayOfWeek; $i++)
                <td></td>
            @endfor

            @for ($day = 1; $day <= $daysInMonth; $day++)
                <td>
                    <a href="{{ route('calendar.show', ['year' => $year, 'month' => $month, 'day' => $day]) }}">
                        {{ $day }}
                    </a>
                </td>

                @if ($startOfMonth->copy()->addDays($day)->dayOfWeek === 0)
                    </tr><tr>
                @endif
            @endfor

            @for ($i = $endOfMonth->dayOfWeek + 1; $i <= 6; $i++)
                <td></td>
            @endfor
        </tr>
    </tbody>
</table>
</body>
</html>