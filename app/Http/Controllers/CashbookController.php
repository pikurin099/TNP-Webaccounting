<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cashbook; // Cashbookモデルをインポート

class CashbookController extends Controller
{
    // 現金出納帳の一覧表示
    public function index()
    {
        // 全てのcashbookデータを取得してビューに渡す
        $cashbooks = Cashbook::all();

        // cashbook.indexビューにデータを渡して表示
        return view('cashbook.index', compact('cashbooks'));
    }

    // データの保存処理（フォームからPOSTされたデータの処理）
    public function store(Request $request)
    {
        // バリデーションルールを設定
        $validated = $request->validate([
            'date' => 'required|date',
            'year' => 'required|integer',
            'month' => 'required|integer',
            'description' => 'required|string|max:255',
            'amount' => 'required|integer',
            'transaction_type' => 'required|string',
            'category' => 'nullable|string',
            'balance' => 'required|integer',
            'cash_type_10000' => 'required|integer',
            'cash_type_5000' => 'required|integer',
            'cash_type_1000' => 'required|integer',
            'cash_type_500' => 'required|integer',
            'cash_type_100' => 'required|integer',
            'cash_type_50' => 'required|integer',
            'cash_type_10' => 'required|integer',
            'cash_type_5' => 'required|integer',
            'cash_type_1' => 'required|integer',
        ]);

        // データを新規作成して保存
        Cashbook::create($validated);

        // 保存後に一覧ページにリダイレクト
        return response()->json(['message'=>'Data stored successfully!'],200);
    }

    // 個別のデータ表示（詳細ページなど）
    public function show($id)
    {
        // idを元に個別のcashbookデータを取得
        $cashbook = Cashbook::findOrFail($id);

        // cashbook.showビューにデータを渡して表示
        return view('cashbook.show', compact('cashbook'));
    }
}

