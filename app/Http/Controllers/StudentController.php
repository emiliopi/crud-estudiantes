<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student as ModelsStudent;
use App\Models\Subject as ModelsSubject;
use App\Models\Assignment as ModelsAssigment;


class StudentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data['students'] = ModelsStudent::paginate(6);
        return view('config.student.index', $data);
    }

    public function find(Request $request)
    {
        $data['students'] = ModelsStudent::Search($request->search)->orderBy('created_at', 'DESC')->paginate(6);
        return view('config.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        //return $request;
        DB::beginTransaction();

        try {
            $student            = new ModelsStudent();
            $student->name      = $request->name;
            $student->lastname  = $request->lastname;
            $student->email     = $request->email;
            $student->age       = $request->age;
            $student->phone     = $request->phone;
            $student->address   = $request->address;
            $student->father    = $request->father;
            $student->mother    = $request->mother;
            $student->save();

            DB::commit();

            $request->session()->flash('alert-success', 'Registro Ingresado Exitosamente');
            return redirect('student');
        } catch (\Exception $e) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        } catch (\Throwable $e) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        } catch (\ModelNotFoundException $exception) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsStudent $student)
    {
        $data['student']   = $student;
        return view('config.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, ModelsStudent $student)
    {
        DB::beginTransaction();

        try {
            $student->name      = $request->name;
            $student->lastname  = $request->lastname;
            $student->email     = $request->email;
            $student->age       = $request->age;
            $student->phone     = $request->phone;
            $student->address   = $request->address;
            $student->father    = $request->father;
            $student->mother    = $request->mother;
            $student->save();

            DB::commit();

            $request->session()->flash('alert-success', 'Registro Actualizado Exitosamente');
            return redirect('student');
        } catch (\Exception $e) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        } catch (\Throwable $e) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        } catch (\ModelNotFoundException $exception) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsStudent $student)
    {
        DB::beginTransaction();

        try {
            $student->delete();

            DB::commit();

            return response()->json(['type' => 'success', 'title' => 'Registro Eliminado Exitosamente'], 200);
        } catch (\Exception $e) {

            DB::rollback();
            return response()->json(['type' => 'error', 'title' => 'Error, Intente nuevamente'], 200);
        } catch (\Throwable $e) {

            DB::rollback();
            return response()->json(['type' => 'error', 'title' => 'Error, Intente nuevamente'], 200);
        } catch (\ModelNotFoundException $exception) {

            DB::rollback();
            return response()->json(['type' => 'error', 'title' => 'Error, Intente nuevamente'], 200);
        }
    }

    public function assigment(ModelsStudent $student)
    {
        $data['subjects_student'] = ModelsAssigment::where('id_student', $student->id)->pluck('id_subject');
        $data['student'] = $student;
        $data['subjects'] = ModelsSubject::pluck('name', 'id');
        return view('config.student.assigment', $data);
    }

    public function assigment_store(Request $request)
    {
        $subjects = $request->subjects;
        $id = $request->id;

        $delete = ModelsAssigment::where('id_student', $id)->delete();

        DB::beginTransaction();

        try {
            foreach ($subjects as $subject) {
                $assiment            = new ModelsAssigment();
                $assiment->id_student  = $id;
                $assiment->id_subject  = $subject;
                $assiment->save();
            }

            DB::commit();

            $request->session()->flash('alert-success', 'Registro Ingresado Exitosamente');
            return redirect('student');
        } catch (\Exception $e) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        } catch (\Throwable $e) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        } catch (\ModelNotFoundException $exception) {

            DB::rollback();
            $request->session()->flash('alert-error', 'Error: Intente nuevamente');
            return redirect()->back();
        }
    }
}
