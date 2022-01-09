<?php
  

namespace App\Repository;

 
interface SubjectRepositoryInterface
{
    public function index();

    public function create();

    public function store($request);
      // Show_Subject
    public function Show_Subject($id);

    public function Get_classrooms($id);

    public function edit($id);

    public function update($request);

    public function destroy($request);
        //Upload_attachment
    public function Upload_attachment($request);

    //Download_attachment
    public function Download_attachment($studentsname,$filename);

    //Delete_attachment
    public function Delete_attachment($request);
    public function Get_Students($id);
}