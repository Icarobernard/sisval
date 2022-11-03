<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Royalty;

class RoyaltyController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tax = $request->input('tax');
        $profit = $request->input('unity') * $request->input('sale');
        $royalty = $profit * $tax / 100;
        $idProject = 0;

        $royaltyValues = [
            'tax' => $tax,
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            'sale' => $request->input('sale'),
            'profit' => $request->input('unity') * $request->input('sale'),
            'royalty' => $royalty,
            'project_id' => $idProject,
        ];
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'calculated' => $request->input('calculated'),
        ];


        Project::create($dataValues);
        $idProject = Project::orderBy('created_at', 'desc')->pluck('id')->first();
        $royaltyValues['project_id'] = $idProject;
        Royalty::create($royaltyValues);
        $dataValues['calculated'] = $royalty;

        return redirect('/project/' . $idProject);
        // return view('project.methods.royalty.index', ['data' => $dataValues])->with('step', true);
    }

    public function update(Request $request, $id)
    {
        $data = Project::find($id);
        $tax = $request->input('tax');
        $profit = $request->input('unity') * $request->input('sale');
        $royalty = $profit * $tax / 100;

        $royaltyValues = [
            'tax' => $tax,
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            'sale' => $request->input('sale'),
            'profit' => $request->input('unity') * $request->input('sale'),
            'royalty' => $royalty,
            'project_id' => $id,
        ];
        $royalty = Royalty::where('project_id', $id)->orderBy('period')->first();
        $royaltyValues['tax'] = $royalty->tax;
        $royaltyValues['period'] = $royalty->period + 1;
        Royalty::create($royaltyValues);
        // Royalty::where('id', $request->input('id'))->update(['concession' => $concession, 'pvolume' => $request->input('volume'), 'pinvestimento' => $request->input('investment'), 'pmargem' => $request->input('contribution'),  'npt' => $request->input('npt'), 'investment' =>  $investment, 'maintenance' => $maintenance, 'volume' => $volume, 'contribution' => $contribution, 'period' => $period, 'tax' => $request->input('tax')]);
        // $data->calculated = ($maintenance * ($contribution + $volume + $investment + $concession) * (1 - $period * $tax));
        // $data->save();
        return redirect('/project/' . $id);
    }
    public static function show(Royalty $royalty)
    {
        return Royalty::all();
    }
    public function destroy(Request $request, $id, $project)
    {
        Royalty::where('id', $id)->delete();
        return redirect('/project/' . $project);
    }
}