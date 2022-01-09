<?php


namespace App\Repository;
 

use App\Semestre;
use App\Subject;
use App\Teacher;  
use App\Image;
use App\Student;
use App\User;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
class SubjectRepository implements SubjectRepositoryInterface 
{

    public function index()
    {
        $subjects = Subject::get();
        return view('pages.Subjects.index',compact('subjects'));
    }

    public function create()
    {
        $semestres = Semestre::get();
        $teachers = Teacher::get();
        
        return view('pages.Subjects.create',compact('semestres','teachers'));
    }
    public function Show_Subject($id)
    {
        $subject = Subject::findorfail($id);
        return view('pages.Subjects.show',compact('subject'));
    }

    public function store($request)
    {
         DB::beginTransaction();
        try {
            $subjects = new Subject();
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->semestre_id = $request->semestre_id;
           
            $subjects->teacher_id = $request->teacher_id;
            $subjects->save();

              if($request->hasfile('photos'))
            {
                foreach($request->file('photos') as $file)
                {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/subjects/'.$subjects->name, $file->getClientOriginalName(),'upload_attachments');

                    // insert in image_table
                    $images= new Image();
                    $images->filename=$name;
                    $images->imageable_id= $subjects->id;
                    $images->imageable_type = 'App\Subject';
                    $images->save();
                }
            }

          
             DB::commit(); // insert data

            
            toastr()->success('success');
            return redirect()->route('subjects.create');
        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function edit($id){

        $subject =Subject::findorfail($id);
        $semestres = Semestre::get();
        $teachers = Teacher::get();
        return view('pages.Subjects.edit',compact('subject','semestres','teachers'));

    }

    public function update($request)
    {
        try {
            $subjects =  Subject::findorfail($request->id);
            $subjects->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $subjects->semestre_id = $request->semestre_id;
          
            $subjects->teacher_id = $request->teacher_id;
         
            $subjects->save();
            toastr()->success('Subject Updated');
            return redirect()->route('subjects.index');
        }
        catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Subject::destroy($request->id);
            toastr()->error(trans('Subject Deleted'));
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

   public function Upload_attachment($request)
    {
        foreach(  (array)$request->file('photos') as $file)
        {
            $name = $file->getClientOriginalName();
            $file->storeAs('attachments/subjects/'.$request->subject_name, $file->getClientOriginalName(),'upload_attachments');

            // insert in image_table
            $images= new Image();
            $images->filename=$name;
            $images->imageable_id = $request->subject_id;
            $images->imageable_type = 'App\Subject';
            $images->save();
        }
        toastr()->success('success');
        return redirect()->route('subjects.show',$request->subject_id);
    }
    public function Download_attachment($subjectsname, $filename)
    {
        return response()->download(public_path('attachments/subjects/'.$subjectsname.'/'.$filename));
    }

    public function Delete_attachment($request)
    {
        // Delete img in server disk 
        Storage::disk('upload_attachments')->delete('attachments/subjects/'.$request->subject_name.'/'.$request->filename);

        // Delete in data
        Image::where('id',$request->id)->where('filename',$request->filename)->delete();
        toastr()->error('Deleted');
        return redirect()->route('subjects.show',$request->subject_id);
    }


   public function Get_classrooms($id){

        $list_classes = Classroom::where("semestre_id", $id)->pluck("Name_Class", "id");
        return $list_classes;
 
    }

  public function Get_Students($id){

    $list_students =Student::where("semestre_id",$id)->pluck("name","id");
    return view('pages.Subjects.show')->with('list_students');
  }

}