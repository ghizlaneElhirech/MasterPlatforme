<?php

namespace App\Repository;

use App\Semestre;
use App\Quizze;
use App\Subject;
use App\Teacher;
use App\User;
use App\Student;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class QuizzRepository implements QuizzRepositoryInterface
{

    public function index()
    {
        $quizzes = Quizze::get();
        return view('pages.Quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        $data['semestres'] = Semestre::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.create', $data);
    }

    public function store($request)
    {
        try {

            $quizzes = new Quizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->semestre_id = $request->semestre_id;
           
            $quizzes->teacher_id = $request->teacher_id;
            $quizzes->save();

            
            $user = User::get();
             
            $quizzes = Quizze::latest()->first();
            //$user->notify(new \App\Notifications\add_quizz($quizzes) );

            
           Notification::send($user, new \App\Notifications\add_quizz($quizzes)); 





            toastr()->success('success');
            return redirect()->route('Quizzes.create');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $quizz = Quizze::findorFail($id);
        $data['semestres'] = Semestre::all();
        $data['subjects'] = Subject::all();
        $data['teachers'] = Teacher::all();
        return view('pages.Quizzes.edit', $data, compact('quizz'));
    }

    public function update($request)
    {
        try {
            $quizz = Quizze::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->semestre_id = $request->semestre_id;
           
            $quizz->teacher_id = $request->teacher_id;
            $quizz->save();
            toastr()->success('Updated');
            return redirect()->route('Quizzes.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Quizze::destroy($request->id);
            toastr()->error(trans('Quizz Deleted'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}