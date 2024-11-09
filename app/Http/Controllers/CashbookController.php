<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashbook;
use App\Models\Denomination;
use Carbon\Carbon;

class CashbookController extends Controller
{

    public function index(Request $request)
{
    switch ($request->input('submit_type')) {
        case 'type1':
            $cashbooks = Cashbook::all();
            return view('posts.cashbook', compact('cashbooks'));
            break;
        
        case 'type2':
            $denominations = Denomination::all();
            return view('posts.denomination', compact('denominations'));
            break;
        
        default:
            $cashbooks = Cashbook::all();
            $denominations = Denomination::all();
            return view('posts.index', compact('cashbooks', 'denominations'));
    }
}



   
    public function store(Request $request)
    {
        switch($request->input('submit_type')){
            case 'type1':
                $data = $request->validate([
                    'date' => 'nullable|date',
                    'cash_type_10000' => 'nullable|integer',
                    'cash_type_5000' => 'nullable|integer',
                    'cash_type_1000' => 'nullable|integer',
                    'cash_type_500' => 'nullable|integer',
                    'cash_type_100' => 'nullable|integer',
                    'cash_type_50' => 'nullable|integer',
                    'cash_type_10' => 'nullable|integer',
                    'cash_type_5' => 'nullable|integer',
                    'cash_type_1' => 'nullable|integer',
                    'writer' => 'nullable|string',
                ]);
        
                $data['date'] = isset($data['date']) && is_string($data['date']) ? Carbon::parse($data['date']) : now();
                $data['year'] = $data['date']->year;
                $data['month'] = $data['date']->month;
                $data['description']='nothing';
                $data['amount']=0;
                $data['balance']=0;
                $data['category']='nothing';
                $data['updated_at'] = now();
                $data['created_at'] = now();
        
                Cashbook::create($data);
        
                return redirect('/')->with('status','データが送信されました！');
                break;
            case 'type2':
                $data=$request->validate([
                    'date' => 'nullable|date',
                    'year'=>'nullable|integer',
                    'month'=>'nullable|integer',
                    'description'=>'nullable|integer',
                    'amount'=>'nullable|integer',
                    'transaction_type'=>'nullable',
                    'category'=>'nullable',
                    'balance'=>'nullable',
                    'cash_type_10000' => 'nullable|integer',
                    'cash_type_5000' => 'nullable|integer',
                    'cash_type_1000' => 'nullable|integer',
                    'cash_type_500' => 'nullable|integer',
                    'cash_type_100' => 'nullable|integer',
                    'cash_type_50' => 'nullable|integer',
                    'cash_type_10' => 'nullable|integer',
                    'cash_type_5' => 'nullable|integer',
                    'cash_type_1' => 'nullable|integer',
                    'writer' => 'nullable|string',
                ]);
                $data['date'] = isset($data['date']) && is_string($data['date']) ? Carbon::parse($data['date']) : now();
                $data['year'] = $data['date']->year;
                $data['month'] = $data['date']->month;

                Denomination::create($data);
                return redirect('/')->with('status','データが送信されました！');
                break;
    }
}
}

