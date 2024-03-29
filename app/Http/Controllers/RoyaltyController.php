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
        $royalty = $profit * ($request->input('rate') / 100) * $tax / 100;
        $idProject = 0;
        $idProject = Project::orderBy('created_at', 'desc')->pluck('id')->first();
        $data = Project::find($idProject);


        $royaltyValues = [
            'tax' => $tax,
            'admin' => $request->input('admin'),
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            'sale' => $request->input('sale'),
            'profit' => $request->input('unity') * $request->input('sale'),
            'royalty' => $royalty,
            'rate' => $request->input('rate'),
            'project_id' => $idProject,
        ];

        Royalty::create($royaltyValues);
        //    $calculated = $royalty;
        // $data->admin = $request->input('admin');
        // $data->save();
        RoyaltyController::recalculated($idProject);
        return redirect('/project/' . $idProject);
    }

    public function recalculated($id)
    {

        $data = Project::find($id);
        $royalties = Royalty::where('project_id', $id)->orderBy('period')->get();

        $recalculated = 0;
        foreach ($royalties as $value) {
            $recalculated = $recalculated + $value['profit'] * ($value['tax'] / 100) * ($value['rate'] / 100);
        }
        $data->calculated = $recalculated;
        $data->save();
    }
    public function update(Request $request, $id)
    {
        // $data = Project::find($id);
        $value = Royalty::where('project_id', $id)->orderBy('period')->first();
        $tax = $value->tax;
        $rate = $value->rate;
        $profit = $request->input('unity') * $request->input('sale');
        $royalty = $profit * ($rate / 100) * ($tax / 100);

        $royaltyValues = [
            'tax' => $tax,
            'period' => $request->input('period'),
            'unity' => $request->input('unity'),
            'sale' => $request->input('sale'),
            'profit' => $request->input('unity') * $request->input('sale'),
            'royalty' => $royalty,
            'rate' => $rate,
            'project_id' => $id,
        ];


        // $royaltyValues['period'] =  count(Royalty::where('project_id', $id)->get()) + 1;
        Royalty::create($royaltyValues);
        RoyaltyController::recalculated($id);

        return redirect('/project/' . $id);
    }
    public static function show(Royalty $royalty)
    {
        return Royalty::all();
    }
    public function destroy(Request $request, $id, $project)
    {
        // $data = Project::find($project);
        Royalty::where('id', $id)->delete();
        RoyaltyController::recalculated($project);
        return redirect('/project/' . $project);
    }
}
