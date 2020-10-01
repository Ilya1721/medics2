<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class StatisticsMedicamentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $user = Auth::user();
      $medicaments = DB::table('presences')
                   ->where('presences.doctor_id',
                           '=', $user->employee->id)
                   ->join('presence_medicament', 'presence_medicament.presence_id',
                          '=', 'presences.id')
                   ->join('medicaments', 'presence_medicament.medicament_id',
                          '=', 'medicaments.id')
                   ->select('medicaments.name')
                   ->get();

      foreach($medicaments as $medicament)
      {
        $medicamentsArr[] = $medicament->name;
      }
      $medicamentsCount = array_count_values($medicamentsArr);

      return view('statisticsMedicament', [
        'user' => $user,
        'medicamentsCount' => $medicamentsCount,
      ]);
    }
}
