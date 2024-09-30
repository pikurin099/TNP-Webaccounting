import { Grid } from "gridjs";
import "gridjs/dist/theme/mermaid.css";

const data = [];
const grid = new Grid({
    columns: ['日付', '内容', '金額','取引タイプ', '残高', '備考', '記入者'],
    data: data,
}).render(document.getElementById('cashbook_table'));

document.getElementById('cashbook_form').addEventListener('submit', function (e) { // 修正: IDを正しく修正
    e.preventDefault();

    const date = document.getElementById('date').value;
    const description = document.getElementById('description').value;
    const amount = document.getElementById('amount').value; // 修正: descriptionを適切に取得
    const transactionType = document.getElementById('transaction-type').value; // 修正: transaction-typeを適切に取得
    const balance = document.getElementById('balance').value;
    const remark = document.getElementById('remark').value;
    const writer = document.getElementById('writer').value;

    addDataToGrid(date, description,amount, transactionType, balance, remark, writer);
    document.getElementById('cashbook_form').reset(); // 修正: IDを正しく修正
});

function addDataToGrid(date, description, amount,transactionType, balance, remark, writer) {
    data.push([date, description, amount,transactionType, balance, remark, writer]);
    grid.updateConfig({ data }).forceRender();
}


