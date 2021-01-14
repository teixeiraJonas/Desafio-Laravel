<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rules;
use App\Http\Controllers\RulesController;

class RulesController extends Controller
{
    public $objRules;

    public function __constuct()
    {
        $this->objRules= Rules::latest()->paginate();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //return view(regras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Rules $rule)
    {
        $rules = Rules::latest()->paginate();

        return view('home', compact('rules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type_rule' => 'required',
            'time_start'  => 'required',
            'time_end' => 'required',
        ]);

        Rules::create($request->all());

        return redirect()->route('main')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $rules = Rules::latest()->paginate();

        return view('home', compact('rules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //$deleted = Rules::table('DELETE FROM `desafio_db`.`rules` WHERE (`id` = ?)', [$id]);
        //Rules::table('rules')->where('id', '=', $id)->delete();
        // $rules = Rules::find($id);
        // $id.destroy();
        //Rules::destroy($id);
        $rule = Rules::find($id);
        $rule->delete();

        $rules = Rules::latest()->paginate();
        return redirect()->route('main');
    }
}
