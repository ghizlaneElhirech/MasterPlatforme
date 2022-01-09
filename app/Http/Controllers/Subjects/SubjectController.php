<?php

namespace App\Http\Controllers\Subjects;
use App\Http\Controllers\Controller;
use App\Repository\SubjectRepositoryInterface;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    protected $Subject;

    public function __construct(SubjectRepositoryInterface $Subject)
    {
        $this->Subject = $Subject;
    }

    public function index()
    {
        return $this->Subject->index();
    }


    public function create()
    {
        return $this->Subject->create();
    }


    public function store(Request $request)
    {
        return $this->Subject->store($request);
    }


    public function show($id)
    {
         return $this->Subject->Show_Subject($id);
    }


    public function edit($id)
    {
        return $this->Subject->edit($id);
    }

    public function update(Request $request)
    {
        return $this->Subject->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->Subject->destroy($request);
    }

    public function Download_attachment($subjectsname,$filename)
    {
        return $this->Subject->Download_attachment($subjectsname,$filename);
    }
     public function Upload_attachment(Request $request)
    {
        return $this->Subject->Upload_attachment($request);
    }
      public function Delete_attachment(Request $request)
    {
        return $this->Subject->Delete_attachment($request);

    }
    public function Get_Students($id){
        return $this->Subject->Get_Students($id);
    }



    public function MarkAsRead_all (Request $request)
    {

        $userUnreadNotification= auth()->user()->unreadNotifications;

        if($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }


    }


    public function unreadNotifications_count()

    {
        return auth()->user()->unreadNotifications->count();
    }

    public function unreadNotifications()

    {
        foreach (auth()->user()->unreadNotifications as $notification){

return $notification->data['title'];

        }

    }
  
}