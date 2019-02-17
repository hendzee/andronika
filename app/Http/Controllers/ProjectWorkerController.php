<?php

namespace App\Http\Controllers;

use App\ProjectWorker;
use App\Project;
use Illuminate\Http\Request;
use App\GeneratorId;
use App\Http\Requests\ProjectWorkerRequest;

class ProjectWorkerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data_worker = ProjectWorker::where('id_project', $id)->get();
        $id_project = $id;

        return view('project.project_worker.index', compact('data_worker', 'id_project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $id_project = $id;    

        $data_project = Project::where('id_project', $id)->first();

        return view('project.project_worker.create', compact('id_project', 'data_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectWorkerRequest $request)
    {
        $gen = new GeneratorId();

        $check_worker = ProjectWorker::where('name', $request->name)
            ->where('address', $request->address)
            ->first();

        if ($check_worker == null){
            $worker = ProjectWorker::create([
                'id_worker' => $gen->generateId('project_worker'),
                'id_project' => $request->id_project,
                'name' => $request->name,            
                'address' => $request->address,
                'telp' => $request->telp,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'division' => $request->division,
                'salary_status' => $request->salary_status
            ]);
        
            return redirect('project_worker_index/' . $request->id_project)
                ->with('success', 'Data berhasil ditambahkan.');
        }else{
            return redirect('project_worker_index/' . $request->id_project)
                ->with('error', 'Data dengan nama dan alamat yang dimasukkan sudah ada.');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectWorker  $projectWorker
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectWorker $projectWorker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectWorker  $projectWorker
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data_worker = ProjectWorker::where('id_worker', $id)
            ->first();

        return view('project.project_worker.edit', compact('data_worker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectWorker  $projectWorker
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectWorkerRequest $request, $id)
    {
        $check_worker = ProjectWorker::where('name', $request->name)
            ->where('address', $request->address)
            ->first();

        if ($check_worker == null){
            $data_worker = ProjectWorker::where('id_worker', $id)
                ->first()
                ->update([            
                    'id_project' => $request->id_project,
                    'name' => $request->name,            
                    'address' => $request->address,
                    'telp' => $request->telp,
                    'gender' => $request->gender,
                    'religion' => $request->religion,
                    'division' => $request->division,
                ]);
        }else{
            $data_worker = ProjectWorker::where('id_worker', $id)
                ->first()
                ->update([            
                    'id_project' => $request->id_project,
                    'telp' => $request->telp,
                    'gender' => $request->gender,
                    'religion' => $request->religion,
                    'division' => $request->division,
                ]);
        }
    
        return redirect('project_worker_index/' . $request->id_project)
            ->with('success', 'Data berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectWorker  $projectWorker
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_project = ProjectWorker::where('id_worker', $id)
            ->first();

        $data_worker = ProjectWorker::where('id_worker', $id)
            ->delete();

        return redirect('project_worker_index/' . $data_project->id_project)
            ->with('success', 'Data berhasil dihapus.');
    }
}
