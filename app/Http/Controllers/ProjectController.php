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

        if ($request->input('method') == 'Fluxo de caixa descontado') {
            return view('project.methods.fcd', ['data' => $dataValues]);
        } else if ($request->input('method') == 'Royalty Rates') {
            return view('project.methods.royalty', ['data' => $dataValues]);
        } else if ($request->input('method') == 'Pita') {
            return view('project.methods.pita', ['data' => $dataValues]);
        } else {
            return view('project.message.fail');
        }
    }

    public function royalty(Request $request)
    {
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'calculated' => $request->input('calculated'),
        ];
        $tax = $request->input('tax');
        $value = $request->input('value');
        if ($tax && $value) {
            $dataValues['calculated'] = ($value * $tax) / 100;
            Project::create($dataValues);
            return view('project.message.success', ['data' => $dataValues]);
        }
    }
    public function pita(Request $request)
    {
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'calculated' => $request->input('calculated'),
        ];

        $npt = [
            '1' => ['low' => 1, 'medium' => 4, 'high' => 7],
            '2' => ['low' => 2, 'medium' => 5, 'high' => 8],
            '3' => ['low' => 3, 'medium' => 6, 'high' => 9],
            '4' => ['low' => 6, 'medium' => 12, 'high' => 18],
            '5' => ['low' => 8, 'medium' => 14, 'high' => 20],
            '6' => ['low' => 10, 'medium' => 16, 'high' => 22]

        ];

        $contribution = $npt[$request->input('npt')];
        $contribution = $contribution[$request->input('contribution')];

        $volume = $npt[$request->input('npt')];
        $volume = $volume[$request->input('volume')];

        $investment = $npt[$request->input('npt')];
        $investment = $investment[$request->input('investment')];

        $concession = $request->input('concession');
        $maintenance = $request->input('maintenance');
        $time = $request->input('time');
        $tax = $request->input('tax') / 100;

        $dataValues['calculated'] = ($maintenance * ($contribution + $volume + $investment + $concession) * (1 - $time * $tax));

        Project::create($dataValues);
        return view('project.message.success', ['contribution' => $contribution]);
    }

    public function fcd(Request $request)
    {
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'calculated' => $request->input('calculated'),
        ];
        $tax = $request->input('tax');
        $period = $request->input('period');
        if ($tax && $period) {
            // var_dump($values);
            // for($i=1; $i <= $request->input('period'); $i++ ) {
            //    $dataValues['calculated'] = $dataValues['calculated'] + $request->input('value')/ pow($tax,$i);
            Project::create($dataValues);
            return view('project.message.success', ['data' => $dataValues]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjectRequest $request)
    {
        // auth()->user()->update($request->all());
        // return back()->withStatus(__('Project successfully updated.'));
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