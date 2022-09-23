<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
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
    public function create(Request $request)
    {
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'calculated' => $request->input('calculated'),
        ];
        $values = [];

    if($request->input('method') == 'Fluxo de caixa descontado') {
        $tax = $request->input('tax');
        $period = $request->input('period');
        if($tax && $period) {
                // var_dump($values);
                // for($i=1; $i <= $request->input('period'); $i++ ) {
                //    $dataValues['calculated'] = $dataValues['calculated'] + $request->input('value')/ pow($tax,$i);
                Project::create($dataValues);
               return view('project.message.success', ['data' => $dataValues]);
        }
        return view('project.methods.fcd', ['data' => $dataValues]);
    } else {
        return view('project.message.fail');
    }
    // return view('project.index');
    // else if ($request->input('end')) {               
    //     Project::create($dataValues);
    //     return view('project.message.success');
    // }
    // else {
    //     return view('project.index');
    // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request)
    {
        auth()->user()->update($request->all());
        return back()->withStatus(__('Project successfully updated.'));
    }

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
    public function edit(Project $project)
    {
        //
    }

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
    public function destroy(Project $project)
    {
        //
    }
}
