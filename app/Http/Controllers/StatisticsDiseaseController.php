<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsDiseaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $diseases = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->join('presence_disease', 'presence_disease.presence_id',
                          '=', 'presences.id')
                   ->join('diseases', 'presence_disease.disease_id',
                          '=', 'diseases.id')
                   ->select('diseases.name')
                   ->get();

      foreach($diseases as $disease)
      {
        $diseasesArr[] = $disease->name;
      }
      $diseasesCount = array_count_values($diseasesArr);

      return view('statisticsDisease', [
        'user' => $user,
        'diseasesCount' => $diseasesCount,
      ]);
    }
}
