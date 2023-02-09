<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Pita;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;

class PitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idProject = Project::orderBy('created_at', 'desc')->pluck('id')->first();
        $data = Project::find($idProject);
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

        $caculated = ($maintenance * ($contribution + $volume + $investment + $concession) * (1 - $period * $tax));
        $data->calculated = $caculated;
        $data->save();


        Pita::create(['concession' => $concession, 'pvolume' => $request->input('volume'), 'pinvestimento' => $request->input('investment'), 'pmargem' => $request->input('contribution'), 'project_id' => $idProject, 'npt' => $request->input('npt'), 'investment' =>  $investment, 'maintenance' => $maintenance, 'volume' => $volume, 'contribution' => $contribution, 'period' => $period, 'tax' => $request->input('tax')]);

        return view('project.message.success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
            $data->admin =  $request->input('admin');
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
    public static function show(Pita $pita)
    {
        return Pita::all();
    }
}
