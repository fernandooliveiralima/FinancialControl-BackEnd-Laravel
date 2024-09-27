<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

use App\Models\Transactions;

class TransactionsController extends Controller implements HasMiddleware
{
    public function __construct(protected Transactions $transactions){}

    public static function middleware(){
        return [ new Middleware('auth:sanctum', except:['index', 'show']) ];
    }

    /**
     * Display a listing of the resource. index() method
     */
    public function index()
    {
        return response()->json($this->transactions->with('userRelation:id')->get());
    }

    /**
     * Store a newly created resource in storage. store() method
     */
    public function store(Request $request)
    {
        $transactionFields = $request->validate([
            'transaction_name' => 'required|max:255',
            'transaction_date' => 'required',
            'transaction_category' => 'required',
            'transaction_amount' => 'required',
            'transaction_type' => 'required'
        ]);
        
        $transaction = $request->user()->transactionsRelation()->create($transactionFields);
        return response()->json($transaction, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = $this->transactions->with('userRelation')->find($id);
        if(!$transaction){
            return response()->json(['errorMessage' => 'Searched resource does not exist!'], 404);
        }

        return response()->json($transaction, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $transaction = $this->transactions->find($id);
        if(!$transaction){
            return response()->json(['errorMessage' => 'Searched resource does not exist!'], 404);
        }

        $transactionFields = $request->validate([
            'transaction_name' => 'required|max:255',
            'transaction_date' => 'required',
            'transaction_category' => 'required',
            'transaction_amount' => 'required',
            'transaction_type' => 'required'
        ]);

        $transaction->update($transactionFields);
        return response()->json($transaction, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaction = $this->transactions->find($id);
        if(!$transaction){
            return response()->json(['errorMessage' => 'Searched resource does not exist!'], 404);
        }

        $transaction->delete($transaction);
        return response()->json(['SuccessMessage' => 'Transaction removed successfully!'], 200);
    }
}
