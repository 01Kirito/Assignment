<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Querys extends Controller
{


    public function AverageDecade()
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
            $group->Average_Salary = $group->Average_Salary ." USD"  ;
        }

       return response($averageSalaries);
    }


    public function EmployeeToFounder(Employee $employee)
    {
        // with associative array saving id of managers
        // $employeeToFounderNames [$employee->id] = $employee->full_name;

       // with index array
      $names = [$employee->full_name];
        try {

      while (true){
      $manager = Employee::find($employee->manager_id);
//      uncomment for the associative array
//      $employeeToFounderNames[$manager->id] = $manager->full_name;
      array_push($names, $manager->full_name);

      if ($manager->manager_id == null){
          break;
      }
      else{
          $employee = $manager ;
      }

      }
            return response(["data",$names]);
        }
        catch (\Exception $e){
            return response(["error","an error occured."]);
        }

    }


}
