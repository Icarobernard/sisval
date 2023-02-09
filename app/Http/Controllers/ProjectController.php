<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pita;
use App\Models\Royalty;
use App\Models\Fcd;
use App\Models\Sunk;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\PitaController;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect(Request $request)
    {
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'admin' => $request->input('admin'),
            'calculated' => $request->input('calculated'),
        ];
        Project::create($dataValues);

        if ($request->input('method') == 'Fluxo de caixa descontado') {
            return view('project.methods.fcd.form', ['data' => $dataValues]);
        } else if ($request->input('method') == 'Royalty Rates') {
            return view('project.methods.royalty.form', ['data' => $dataValues]);
        } else if ($request->input('method') == 'Pita') {
            return view('project.methods.pita.create', ['data' => $dataValues]);
        } else if ($request->input('method') == 'Sunk Cost') {
            return view('project.methods.sunk.form', ['data' => $dataValues]);
        } else {
            return view('project.message.fail');
        }
    }

    public function find(Request $request, $id)
    {
        $method = [];
        $data = Project::find($id);
        if ($data['method'] == 'Pita') {
            $method = Pita::where('project_id', $data['id'])->first();
        }
        if ($data['method'] == 'Royalty Rates') {
            $method = Royalty::where('project_id', $id)->orderBy('period')->get();
        }
        if ($data['method'] == 'Fluxo de caixa descontado') {
            $method = Fcd::where('project_id', $id)->orderBy('period')->get();
        }
        if ($data['method'] == 'Sunk Cost') {
            $method = Sunk::where('project_id', $id)->orderBy('period')->get();
        }

        return view('project.details', ['data' => $data])->with('method', $method);
    }


    public function create(Request $request)
    {
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'calculated' => $request->input('calculated'),
        ];


        Project::create($dataValues);

        return view('project.message.success');
    }

    public function createFcd(Request $request, $id)
    {
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public static function show(Project $project)
    {
        return Project::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $project = Project::find($id);
        if ($project['method'] == 'Pita') {
            Pita::where('project_id', $id)->delete();
        }
        if ($project['method'] == 'Royalty Rates') {
            Royalty::where('project_id', $id)->delete();
        }
        if ($project['method'] == 'Fluxo de caixa descontado') {
            Fcd::where('project_id', $id)->delete();
        }
        if ($project['method'] == 'Sunk Cost') {
            Sunk::where('project_id', $id)->delete();
        }
        $project->delete();
        return view('project.message.success');
    }
}
