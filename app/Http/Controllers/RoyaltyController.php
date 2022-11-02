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
        $royalties = Royalty::where('project_id', $idProject);
        return view('project.methods.royalty.index', ['data' => $dataValues])->with('step', true)->with('royalties', $royalties);
    }
    public static function show(Royalty $royalty)
    {
        return Royalty::all();
    }
}