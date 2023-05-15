<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Yakitori;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index()
    {
        // 現在の日付を取得
        $currentDate = Carbon::now();

        // カレンダーの表示に必要なデータを計算
        $year = $currentDate->year;
        $month = $currentDate->month;
        $daysInMonth = $currentDate->daysInMonth;
        $startOfMonth = $currentDate->copy()->startOfMonth();
        $endOfMonth = $currentDate->copy()->endOfMonth();

        // カレンダーデータをビューに渡す
        return view('calendar.index', compact('year', 'month', 'daysInMonth', 'startOfMonth', 'endOfMonth'));
    }

    // /calendar/{year}/{month}/{day}の処理
    public function show($year, $month, $day)
    {
        $date = "$year/$month/$day";
        $lists = DB::table('yakitoris')->whereDate('timeSelect', $date)->orderBy('timeSelect','asc')->get();
        
        return view('calendar.show',compact('date','lists'));
    }

    // /reserve/{year}/{month}/{day}の処理
    public function reserve($year, $month, $day)
    {
        $date = "$year/$month/$day";
        return view('calendar.reserve',compact('date'));
    }

    // /your-server-endpoint/{year}/{month}/{day}の処理
    public function create(Request $request, $year, $month, $day)
    {
        $date = "$year/$month/$day";
        // dd($request);
        $datetime = new \DateTime($date);
        // dd($datetime);
        $request->validate([
            'timeSelect' => 'required',
            'name' => 'required',
            'tel'=>'required',
          ],
           [
            'timeSelect.required' => '時間は必ず選択してください',
            'name.required' => '名前は必ず入力してください',
            'tel.required' =>'電話番号は必ず入力してください',
        ]);
      Yakitori::create([
        "timeSelect" => $datetime->format('Y-m-d') . ' ' .$request->timeSelect,
        "name" => $request->name,
        "tel" => $request->tel,
        "mix" => $request->mix,
        "breast" => $request->breast,
        "skin" => $request->skin,
        "tsukune" => $request->tsukune,
        "bonjiri" => $request->bonjiri,
        "others" => $request->others,
        "karaage" => $request->karaage,
      ]);

      return redirect('/calendar/'.$date);
    }

    public function edit(Request $request,$id)
    {
        $user = DB::table('yakitoris')->where('id', '=', $id)->first();
        $datetime=new \DateTime($user->timeSelect);
        return view('/calendar.edit',["user" => $user,'ymd' => $datetime->format('Y/m/d')]);
    }
    public  function update(Request $request, $year, $month, $day) 
    {
        $date = "$year/$month/$day";
        $datetime = new \DateTime($date);
      Yakitori::find( $request->id)->update([
        "timeSelect" =>$request->timeSelect,
        "name" => $request->name,
        "tel" => $request->tel,
        "mix" => $request->mix,
        "breast" => $request->breast,
        "skin" => $request->skin,
        "tsukune" => $request->tsukune,
        "bonjiri" => $request->bonjiri,
        "others" => $request->others,
        "karaage" => $request->karaage,
      ]);
      return redirect('/calendar/'.$date);
  }
  public  function delete(Request $request, $year, $month, $day) 
    {
        $date = "$year/$month/$day";
        $datetime = new \DateTime($date);
      Yakitori::find($request->id)->delete();
      return redirect('/calendar/'.$date);
    }
}