<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBudgetRequest;
use App\Http\Requests\UpdateBudgetRequest;
use App\Models\Budget;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Inertia\Inertia;
use Inertia\Response;
use phpDocumentor\Reflection\Types\Collection;

class BudgetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Budget $budget): Response
    {
        Redis::set('current_budget_id', $budget->id);
        $categoryAmount = $budget->category()->get()->sum('category_amount_assigned');
        $accountBalance = $budget->account()->get()->sum('account_balance');

        return Inertia::render('Budget/Budget', [
            'budget' => $budget,
            'allAccounts' => $budget->account()->get(),
            'accountBalance' => $accountBalance,
            'allCategories' => $budget->category()->get(),
            'amountToBudget' => $accountBalance - $categoryAmount
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreBudgetRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBudgetRequest $request)//
    {
        try {
            Budget::create([
                'budget_name' => $request->budget_name,
            ]);
        } catch (\Exception $e) {
            return Response()->json(['exception' => $e]);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Budget $budget
     * @return \Illuminate\Http\Response
     */
    public function show(Budget $budget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Budget $budget
     * @return \Illuminate\Http\Response
     */
    public function edit(Budget $budget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateBudgetRequest $request
     * @param \App\Models\Budget $budget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBudgetRequest $request, Budget $budget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Budget $budget
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Budget $budget)
    {
        try {
            //BudgetObserver is deleting child data on deleting
            $budget->delete();
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }

        return Redirect()->back()->setStatusCode(302);
    }
}
