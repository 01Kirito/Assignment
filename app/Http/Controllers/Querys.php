<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Querys extends Controller
{
    public function average_decade()
    {
         $averageSalaries = DB::table('employees')
            ->select(DB::raw(' FLOOR(age / 10)  AS Age_Group ,AVG(salary) AS Average_Salary'))
            ->groupBy(DB::raw(' FLOOR(age/10)'))
            ->get();

        foreach ($averageSalaries as $group) {
            // Edit the Age_Group into decade
            $start =(int)$group->Age_Group*10;
            $end   =((int) $group->Age_Group+1)*10;
            $group->Age_Group = $start ."-".$end  ;
        }

       return response($averageSalaries);
    }

}
