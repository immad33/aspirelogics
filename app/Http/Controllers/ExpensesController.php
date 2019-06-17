<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $expenses = DB::table('expenses')
               ->select('*')
               ->where('user_id',  Auth::id())
               ->get();
        return view('expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories_list = Category::all();
        return view('expenses.create', compact('categories_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => Auth::id()]);

        $validatedData = $request->validate([
            'amount'        => 'required|max:191',  
            'date'          => 'required',
            'category_id'   => 'required'
        ]);

        $expenses = Expenses::create($request->input());

        return redirect('/expenses')->with('success', 'Expense is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show(Expenses $expenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $categories_list = Category::all();
        $expense         = Expenses::where('expense_id',$id)->first();
        return view('expenses.edit', compact('expense','categories_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'amount'        => 'required|max:191',  
            'date'          => 'required',
            'category_id'   => 'required'
        ]);

        Expenses::where('expense_id',$id)->update($validatedData);

        return redirect('/expenses')->with('success', 'Expense is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expenses::where('expense_id',$id)->delete();
        return redirect('/expenses')->with('success', 'Expense is successfully deleted');
    }
}
