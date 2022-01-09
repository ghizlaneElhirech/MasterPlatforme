<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void 
*/
public function run()
{


$permissions = [
 
         'semestres',
         'add_semestre',
         'edit_semestre',
         'delete_semesre',



         'students',
         'add_student',
         'edit_student',
         'delete_student',
         'view_student',
         'add_student_attachement',
         'download_student_attachement',
         'delete_student_attachement',



         'teachers',
         'add_teacher',
         'edit_teacher',
         'delete_teacher',


         'subject',
         'edit_subject',
         'add_subject',
         'delete_subject',
         'view_subject',
         'view_subject_student',


         'users',
         'edit_user',
         'delete_user',
         'view_user_role',
         'edit_user_role',
         'add_user_role',

         
         'quizzes',
         'add_quizze',
         'edit_quizze',
         'delete_quizze',
         'view_quizze',
         'not_quizze_add',
         'not_quizze_done',
          

];



foreach ($permissions as $permission) {

Permission::create(['name' => $permission]);
}


}
}