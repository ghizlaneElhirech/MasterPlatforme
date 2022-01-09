<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
   {

      $count_all =User::count();
      $count_student = Student::count();
      $count_teacher = Teacher::count();
      $user=User::all();
  

      if($count_teacher == 0){
          $total2=0;
      }
      else{
          $total2 = $count_teacher/ $count_all*100;
      }

        if($count_student == 0){
            $total1=0;
        }
        else{
            $total1 = $count_student/ $count_all*100;
        }

       


        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 200])
            ->labels(['', ''])
            ->datasets([
              
                [
                    "label" => "students",
                    'backgroundColor' => ['#81b214'],
                    'data' => [$total1]
                ],
                [
                    "label" => "teachers",
                    'backgroundColor' => ['#ff9642'],
                    'data' => [$total2]
                ],


            ])
            ->options([]);


        $chartjs_2 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 340, 'height' => 200])
            ->labels(['teachers', 'students'])
            ->datasets([
                [
                    'backgroundColor' => [ '#81b214','#ff9642'],
                    'data' => [$total1,$total2]
                ]
            ])
            ->options([]);

        return view('dashboard', compact('chartjs','chartjs_2','user'));


    
    }

   
}
