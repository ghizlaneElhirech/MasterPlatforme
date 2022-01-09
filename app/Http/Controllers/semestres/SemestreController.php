<?php

namespace App\Http\Controllers\semestres;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Semestre;
use App\Http\Requests\StoreSemestres;

class SemestreController extends Controller
{
     public function index()
  {
  	$semestres = Semestre::all();
    return view('pages.semestres.semestre',compact('semestres'));
  }

  /**
   * Show the form for creating a new resource.
   * 
   * @return Response
   */
  public function store(StoreSemestres $request)
  {

   

 try {
          $validated = $request->validated();
          $semestres = new Semestre(); 
        
          $semestres->semestre_name =  $request->semestre_name;
         
          $semestres->save();
          toastr()->success('messages.success');
          return redirect()->route('semestres.index');
      }

      catch (\Exception $e){
          return redirect()->back()->withErrors(['error' => $e->getMessage()]);
      }
   if (Semestre::where('semestre_name', $request->semestre_name)->exists()) {

          return redirect()->back()->withErrors(' already exists');}

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
   public function update(StoreSemestres $request)
 {
   try {

       $validated = $request->validated();
       $semestres = Semestre::findOrFail($request->id);
       $semestres->update([
         $semestres->semestre_name = $request->semestre_name
        
       ]);
       toastr()->success(trans('messages.Update'));
       return redirect()->route('semestres.index');
   }
   catch
   (\Exception $e) {
       return redirect()->back()->withErrors(['error' => $e->getMessage()]);
   }
 }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
      

     

          $semestres = Semestre::findOrFail($request->id)->delete();
          toastr()->error('Delete');
          return redirect()->route('semestres.index');
     

          toastr()->error(trans('delete_semestre_Error'));
          return redirect()->route('semestres.index');

      


  }

}