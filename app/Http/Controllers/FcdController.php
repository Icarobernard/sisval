<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fcd;
use App\Models\Project;

class FcdController extends Controller
{
    public function create(Request $request)
    {
        $tma  = $request->input('tma');
        if ($tma == 0 || $tma == null) {
            $tma = 2;
        }

        $idProject = Project::orderBy('created_at', 'desc')->pluck('id')->first();
        $fcdValues = [
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            'sale' => $request->input('sale'),
            'rate' => $request->input('rate'),
            'tma' => $tma,
            'tir' => $request->input('tir'),
            'payback' => $request->input('payback'),
            'project_id' => $idProject,
        ];

        $profit = $request->input('unity') * $request->input('sale');
        $calculated = ($profit * $fcdValues['rate'] / 100) / (1 + $tma / 100);

        $data = Project::find($idProject);
        $data->calculated = $calculated;
        $data->save();
        Fcd::create($fcdValues);

        return redirect('/project/' . $idProject);
    }

    public function recalculated($id)
    {
        $data = Project::find($id);
        $list = Fcd::where('project_id', $id)->orderBy('period')->get();

        $recalculated = 0;
        $index = 1;
        foreach ($list as $value) {
            $recalculated = $recalculated + ($value['unity'] * $value['sale']) * ($value['rate'] / 100) / (pow((1 + $value['tma'] / 100), $index));
            $index++;
        }
        $data->calculated = $recalculated;
        $data->save();
    }
    public function update(Request $request, $id)
    {
        $value = Fcd::where('project_id', $id)->orderBy('period')->first();
        $tma = $value->tma;
        $rate = $value->rate;

        $fcdValues = [
            'tma' => $tma,
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            'sale' => $request->input('sale'),
            'tir' => 0,
            'payback' => 0,
            'profit' => $request->input('unity') * $request->input('sale'),
            'rate' => $rate,
            'project_id' => $id,
        ];

        Fcd::create($fcdValues);
        FcdController::recalculated($id);

        return redirect('/project/' . $id);
    }
    public static function show(Fcd $fcd)
    {
        return Fcd::all();
    }
    public function destroy(Request $request, $id, $project)
    {
        Fcd::where('id', $id)->delete();
        FcdController::recalculated($project);
        return redirect('/project/' . $project);
    }
}
