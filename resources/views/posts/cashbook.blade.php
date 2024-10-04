<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/gridjs/dist/theme/mermaid.css">
    <script src="https://unpkg.com/gridjs/dist/gridjs.umd.js" type="text/javascript"></script> <!-- CDNからGrid.jsを読み込み -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> <!-- Axiosの読み込み -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

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
            <a href="#"><i class="fa-solid fa-money-bill">金種別入力</i></a>
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

    <!--入力欄-->
    <form id="cashbook_form">
        <label for="date">日付</label>
        <input type="date" id="date" required><br>
        <label for="description">内容</label>
        <input type="text" id="description" required><br>
        <label for="amount">金額</label>
        <input type="number" id="amount"required><br>
        <label for="transaction-type">取引タイプ</label>
        <select id="transaction-type">
            <option value="収入">収入</option>
            <option value="支出">支出</option>
            <option value="金庫入力">金庫入力</option>
        </select><br>
        <label for="balance">残高</label>
        <input type="number" id="balance" required><br>
        <label for="remark">備考</label>
        <input type="text" id="remark"><br>
        <label for="writer">記入者</label>
        <input type="text" id="writer" required><br>
        <button type="submit">追加</button>
    </form>

    <!--現金出納帳-->
    <div id="cashbook_table"></div> 

    <!--こっちにも書いた方が読み込み早くなるってほんと？-->
    <script>
        <!--grid.jsによる表作成-->
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
    </script>
</body>
</html>

