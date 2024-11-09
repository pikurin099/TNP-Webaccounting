import { Grid } from "gridjs";
import "gridjs/dist/theme/mermaid.css";

const data = [];
const grid = new Grid({
    columns: ['日付', '内容', '金額','取引タイプ', '残高', '備考', '記入者'],
    data: data,
}).render(document.getElementById('cashbook_table'));

/*document.getElementById('cashbook_form').addEventListener('submit', function (e) { // 修正: IDを正しく修正
    e.preventDefault();

    const date = document.getElementById('input_date').value;
    const description = document.getElementById('description').value;
    const amount = document.getElementById('amount').value; // 修正: descriptionを適切に取得
    const transactionType = document.getElementById('transaction-type').value; // 修正: transaction-typeを適切に取得
    const balance = document.getElementById('balance').value;
    const remark = document.getElementById('remark').value;
    const writer = document.getElementById('input_writer').value;

    addDataToGrid(date, description,amount, transactionType, balance, remark, writer);
    document.getElementById('cashbook_form').reset(); // 修正: IDを正しく修正
});*/

function addDataToGrid(date, description, amount,transactionType, balance, remark, writer) {
    data.push([date, description, amount,transactionType, balance, remark, writer]);
    grid.updateConfig({ data }).forceRender();
}

//金種別入力
/*document.getElementById('denomination_input_form').addEventListener('submit', function(e) {

    // フォームの値を取得し、数値に変換
    const date = document.getElementById('denomination_date').value;
    const yen_10000 = parseInt(document.getElementById('yen_10000').value) || 0;
    const yen_5000 = parseInt(document.getElementById('yen_5000').value) || 0;
    const yen_1000 = parseInt(document.getElementById('yen_1000').value) || 0;
    const yen_500 = parseInt(document.getElementById('yen_500').value) || 0;
    const yen_100 = parseInt(document.getElementById('yen_100').value) || 0;
    const yen_50 = parseInt(document.getElementById('yen_50').value) || 0;
    const yen_10 = parseInt(document.getElementById('yen_10').value) || 0;
    const yen_5 = parseInt(document.getElementById('yen_5').value) || 0;
    const yen_1 = parseInt(document.getElementById('yen_1').value) || 0;
    const writer = document.getElementById('denomination_writer').value;

    const total_10000 = yen_10000 * 10000;
    const total_5000 = yen_5000 * 5000;
    const total_1000 = yen_1000 * 1000;
    const total_500 = yen_500 * 500;
    const total_100 = yen_100 * 100;
    const total_50 = yen_50 * 50;
    const total_10 = yen_10 * 10;
    const total_5 = yen_5 * 5;
    const total_1 = yen_1 * 1;
    const totalAmount = total_10000 + total_5000 + total_1000 + total_500 + total_100 + total_50 + total_10 + total_5 + total_1;

    //コンマ区切りにした方が見栄えよさそう
    const display_total_10000 = total_10000.toLocaleString();
    const display_total_5000 = total_5000.toLocaleString();
    const display_total_1000 = total_1000.toLocaleString();
    const display_total_500 = total_500.toLocaleString();
    const display_total_100 = total_100.toLocaleString();
    const display_total_50 = total_50.toLocaleString();
    const display_total_10 = total_10.toLocaleString();
    const display_total_5 = total_5.toLocaleString();
    const display_total_1 = total_1.toLocaleString();
    const display_total_Amount = totalAmount.toLocaleString();

    // データをグリッドに追加
    addDataToGrid(date,"10000円札:"+ yen_10000+"枚", display_total_10000, "", "", "", writer);
    addDataToGrid("", "5000円札:"+yen_5000+"枚", display_total_5000, "", "", "", "");
    addDataToGrid("", "1000円札:"+yen_1000+"枚", display_total_1000, "", "", "", "");
    addDataToGrid("", "500円硬貨:"+yen_500+"枚", display_total_500, "", "", "", "");
    addDataToGrid("", "100円硬貨:"+yen_100+"枚", display_total_100, "", "", "", "");
    addDataToGrid("", "50円硬貨:"+yen_50+"枚", display_total_50, "", "", "", "");
    addDataToGrid("", "10円硬貨:"+yen_10+"枚", display_total_10, "", "", "", "");
    addDataToGrid("", "5円硬貨:"+yen_5+"枚", display_total_5, "", "", "", "");
    addDataToGrid("", "1円硬貨:"+yen_1+"枚", display_total_1, "", "", "", "");
    addDataToGrid("", "", "", "","合計:"+display_total_Amount,"", "");

    // フォームをリセット
    document.getElementById('denomination_input_form').reset();
});*/

const navItems = document.querySelectorAll('.list');
navItems.forEach(item => {
    item.addEventListener('click', () => {
        // クリックしたボタンに「active」クラスを追加し、他のボタンから削除
        navItems.forEach(nav => nav.classList.remove('active'));
        item.classList.add('active');
        // 対応するフォームを表示・非表示
        const targetId = item.getAttribute('data-target');
        document.querySelectorAll('.input-area').forEach(area => {
            if (area.id === targetId) {
                // フォームの表示状態を切り替え
                if (area.style.display === 'none' || area.style.display === '') {
                    area.style.display = 'block';  // フォームを表示
                } else {
                    area.style.display = 'none';   // フォームを非表示
                }
            } else {
                area.style.display = 'none';  // 他のフォームは非表示
            }
        });
    });
});
// 最初にすべてのフォームを非表示に設定
document.querySelectorAll('.input-area').forEach(area => {
    area.style.display = 'none';
});
// 最初にすべてのフォームを非表示に設定
document.querySelectorAll('.input-area').forEach(area => {
    area.style.display = 'none';
});


/*document.getElementById('denomination_input_form').addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(this); 

    const csrfToken = document.querySelector('input[name="_token"]').value;

    fetch('/submit', { 
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken 
        }
    })
});*/


