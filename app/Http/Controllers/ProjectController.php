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
            'calculated' => $request->input('calculated'),
        ];

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


    public function createPita(Request $request)
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
        $period = $request->input('time');
        $tax = $request->input('tax') / 100;

        $dataValues['calculated'] = ($maintenance * ($contribution + $volume + $investment + $concession) * (1 - $period * $tax));

        Project::create($dataValues);
        $idProject = Project::orderBy('created_at', 'desc')->pluck('id')->first();
        Pita::create(['concession' => $concession, 'pvolume' => $request->input('volume'), 'pinvestimento' => $request->input('investment'), 'pmargem' => $request->input('contribution'), 'project_id' => $idProject, 'npt' => $request->input('npt'), 'investment' =>  $investment, 'maintenance' => $maintenance, 'volume' => $volume, 'contribution' => $contribution, 'period' => $period, 'tax' => $request->input('tax')]);

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
    public function updatePita(Request $request, $id)
    {
        $data = Project::find($id);
        if ($data['method'] == 'Pita') {

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
            $period = $request->input('period');
            $tax = $request->input('tax') / 100;

            Pita::where('id', $request->input('id'))->update(['concession' => $concession, 'pvolume' => $request->input('volume'), 'pinvestimento' => $request->input('investment'), 'pmargem' => $request->input('contribution'),  'npt' => $request->input('npt'), 'investment' =>  $investment, 'maintenance' => $maintenance, 'volume' => $volume, 'contribution' => $contribution, 'period' => $period, 'tax' => $request->input('tax')]);
            $data->calculated = ($maintenance * ($contribution + $volume + $investment + $concession) * (1 - $period * $tax));
            $data->save();
            return view('project.message.success');
        }
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
