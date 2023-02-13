<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Subject as ModelsSubject;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data['subjects'] = ModelsSubject::paginate(6);
        return view('config.subject.index', $data);
    }

    public function find(Request $request)
    {
        $data['subjects'] = ModelsSubject::Search($request->search)->orderBy('created_at', 'DESC')->paginate(6);
        return view('config.subject.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('config.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        //return $request;
        DB::beginTransaction();

        try {
            $subject            = new ModelsSubject();
            $subject->name      = $request->name;
            $subject->save();

            DB::commit();

            $request->session()->flash('alert-success', 'Registro Ingresado Exitosamente');
            return redirect('subject');
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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsSubject $subject)
    {
        $data['subject']   = $subject;
        return view('config.subject.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, Subject $subject)
    {
        DB::beginTransaction();

        try {
            $subject->name      = $request->name;
            $subject->save();

            DB::commit();

            $request->session()->flash('alert-success', 'Registro Actualizado Exitosamente');
            return redirect('subject');
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
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        DB::beginTransaction();

        try {
            $subject->delete();

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
}
