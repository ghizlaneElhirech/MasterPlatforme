<?php


namespace App\Repository;


use App\Attendance;
use App\Semestre;
use App\Student;
use App\Teacher;
use App\Subject;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AttendanceRepository implements AttendanceRepositoryInterface
{


    public function index()
    {
        $semestres = Semestre::get();
        $list_semestres = Semestre::all();
        $teachers = Teacher::all();
        $students=Student::all();
        return view('pages.Subjects.students_list',compact('semestres','list_semestres','teachers','students'));
    }
 
    public function show($id)
    {
      $students = DB::table('students')
           
             ->join('subjects', 'subjects.semestre_id', '=', 'students.semestre_id')
        
             ->select('students.*','subjects.id')
             ->get();
        return view('pages.Subjects.students_list',compact('students'));
    }

    public function store($request)
    {
       
    }

    public function update($request)
    {
        // TODO: Implement update() method.
    }

    public function destroy($request)
    {
        // TODO: Implement destroy() method.
    }
}