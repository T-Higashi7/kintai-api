<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Attendance;



class AttendanceController extends Controller
{
    public function store($year, $month, Request $request)
    {

        Log::debug($request->status);

        //勤怠データをテーブルに格納する。
        //同じ提出者かつ同じ年月のデータを取得する。
        $sameSubmitterYearMonth = Attendance::query()
            ->where([
                ['year', '=', $year],
                ['month', '=', $month],
                ['submitter', '=', $request->submitter],
            ])
            ->first();

        // その結果レコードが存在しない場合は新規作成、存在する場合は更新
        if (is_null($sameSubmitterYearMonth)) {
            $sameSubmitterYearMonth = Attendance::create(
                [
                    'year' => $year,
                    'month' => $month,
                    'date' => $request->data[0]["date"],
                    'attendance' => $request->data,
                    'submitter' => $request->submitter,
                    'status' => $request->status,
                ]
            );
        } else {
            $sameSubmitterYearMonth->update([
                'attendance' => $request->data,
                'status' => $request->status,
            ]);
        }
    }

    public function indexBySubmitterAndDate($year, $month, Request $request)
    {
        Log::debug($request);
        ////同じ提出者かつ同じ年月のレコードを取得する。
        $sameSubmitterYearMonth = Attendance::query()
            ->where([
                ['year', '=', $year],
                ['month', '=', $month],
                ['submitter', '=', $request->submitter],
            ])
            ->first();
        Log::debug($sameSubmitterYearMonth);
        return $sameSubmitterYearMonth;
    }

    public function indexPendingUsers()
    {
        $pendingUsers = Attendance::query()
            ->where([
                ['status', '=', 2],
            ])
            ->get();
        Log::debug($pendingUsers);
        return $pendingUsers;
    }
}
