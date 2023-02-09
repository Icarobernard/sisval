<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sunk;
use App\Models\Project;

class SunkController extends Controller
{
    public function create(Request $request)
    {
        $total = $request->input('quantity') * $request->input('unity') * 12;
        $sunkValues = [
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            // 'hours' => $request->input('hours'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'total' => $total,
            'project_id' => 0,
        ];
        $dataValues = [
            'name' =>  $request->input('name'),
            'responsible' =>  $request->input('responsible'),
            'method' => $request->input('method'),
            'calculated' => $total,
        ];


        Project::create($dataValues);
        $idProject = Project::orderBy('created_at', 'desc')->pluck('id')->first();
        $sunkValues['project_id'] = $idProject;
        Sunk::create($sunkValues);
        return redirect('/project/' . $idProject);
    }

    public function recalculated($id)
    {

        $data = Project::find($id);
        $sunks = Sunk::where('project_id', $id)->orderBy('id')->get();

        $recalculated = 0;
        foreach ($sunks as $value) {
            $recalculated = $recalculated + ($value['quantity'] * $value['unity'] * 12);
        }
        $data->calculated = $recalculated;
        $data->save();
    }
    public function update(Request $request, $id)
    {
        $total = $request->input('quantity') * $request->input('unity') * 12;
        $sunkValues = [
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            // 'hours' => $request->input('hours'),
            'quantity' => $request->input('quantity'),
            'description' => $request->input('description'),
            'total' => $total,
            'project_id' => $id,
        ];

        Sunk::create($sunkValues);
        SunkController::recalculated($id);

        return redirect('/project/' . $id);
    }
    public function destroy(Request $request, $id, $project)
    {
        // $data = Project::find($project);
        Sunk::where('id', $id)->delete();
        SunkController::recalculated($project);
        return redirect('/project/' . $project);
    }
}
