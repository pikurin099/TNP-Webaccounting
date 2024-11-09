<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/gridjs/dist/theme/mermaid.css">
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js" type="text/javascript">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Axiosの読み込み -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/css/cashbook.css'])
</head>
<body>
    <!--ツールバーのトリガー-->
    <div class="toolbar">
        <ul>
            <li class="list active" data-target="cashbook_form">
            <i class="fa-solid fa-calculator"></i>
            <span>通常入力</span>
            </li>
            <li class="list" data-target="denomination_input_form">
                <i class="fa-solid fa-coins"></i>
                <span>金種別入力</span>
            </li>
        </ul>
    </div>
 <!--サイドバーのトリガー-->
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="menu"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>

    <div class="sidebar">
    <header class="sidebar-title">TNP会計アプリ</header>
    <ul>
        <li>
            <a href="#"><i class="fa-solid fa-swatchbook">現金出納帳</i></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-chart-simple">今年度収支</i></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-download">ダウンロード</i></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-print">印刷</i></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-cashbook">収支計画書</i></a>
        </li>
        <li>
            <a href="#"><i class="fa-solid fa-cashbook">収支報告書</i></a>
        </li>
    </ul>
    </div>

    <!-- 通常入力欄 -->
<form id="cashbook_form" class="input-area" method="POST" action="{{ route('cashbook.store') }}">
    @csrf
    <label for="input_date">日付</label>
    <input type="date" id="input_date" name="date" required><br>
    <label for="description">内容</label>
    <input type="text" id="description" name="description" required><br>
    <label for="amount">金額</label>
    <input type="number" id="amount" name="amount" required><br>
    <label for="transaction-type">取引タイプ</label>
    <select id="transaction-type" name="transaction_type">
        <option value="収入">収入</option>
        <option value="支出">支出</option>
        <option value="金庫入力">金庫入力</option>
    </select><br>
    <label for="balance">残高</label>
    <input type="number" id="balance" name="balance" required><br>
    <label for="remark">備考</label>
    <input type="text" id="remark" name="remark"><br>
    <label for="input_writer">記入者</label>
    <input type="text" id="input_writer" name="writer" required><br>
    <button type="submit" name="submit_type" value="type1">追加</button>
</form>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<!-- 金種別入力 -->
<form id="denomination_input_form" class="input-area" method="POST" action="{{ route('cashbook.store') }}">
    @csrf
    <label for="denomination_date">日付</label>
    <input type="date" id="denomination_date" name="date"><br>
    
    <label for="yen_10000">10000円札</label>
    <input type="number" id="yen_10000" name="cash_type_10000"><br>
    
    <label for="yen_5000">5000円札</label>
    <input type="number" id="yen_5000" name="cash_type_5000"><br>
    
    <label for="yen_1000">1000円札</label>
    <input type="number" id="yen_1000" name="cash_type_1000"><br>
    
    <label for="yen_500">500円硬貨</label>
    <input type="number" id="yen_500" name="cash_type_500"><br>
    
    <label for="yen_100">100円硬貨</label>
    <input type="number" id="yen_100" name="cash_type_100"><br>
    
    <label for="yen_50">50円硬貨</label>
    <input type="number" id="yen_50" name="cash_type_50"><br>
    
    <label for="yen_10">10円硬貨</label>
    <input type="number" id="yen_10" name="cash_type_10"><br>
    
    <label for="yen_5">5円硬貨</label>
    <input type="number" id="yen_5" name="cash_type_5"><br>
    
    <label for="yen_1">1円硬貨</label>
    <input type="number" id="yen_1" name="cash_type_1"><br>
    
    <label for="denomination_writer">記入者</label>
    <input type="text" id="denomination_writer" name="writer"><br>
    
    <button type="submit" id="denomination_submit" name="submit_type" value="type2">登録</button>
</form>

    <!--現金出納帳-->
    <div id="cashbook_table"></div> 

    <!--こっちにも書いた方が読み込み早くなるってほんと？
    <script>
        
        const data = [];
        const grid = new gridjs.Grid({ // 'gridjs'を使用
            columns: ['日付', '内容','金額', '取引タイプ', '残高', '備考', '記入者'],
            data: data,
        }).render(document.getElementById('cashbook_table'));

        document.getElementById('cashbook_form').addEventListener('submit', function (e) {
            e.preventDefault();

            const date = document.getElementById('date').value;
            const description = document.getElementById('description').value;
            const amount = document.getElementById('amount').value;
            const transactionType = document.getElementById('transaction-type').value;
            const balance = document.getElementById('balance').value;
            const remark = document.getElementById('remark').value;
            const writer = document.getElementById('writer').value;

            addDataToGrid(date, description, amount, transactionType, balance, remark, writer);
            document.getElementById('cashbook_form').reset();
        });

        function addDataToGrid(date, description, amount,transactionType, balance, remark, writer) {
            data.push([date, description,amount, transactionType, balance, remark, writer]);
            grid.updateConfig({ data }).forceRender();
        }
    </script> -->
    @vite(['resources/js/gridjs.js'])
</body>
</html>

