import { Grid } from "gridjs";
import "gridjs/dist/theme/mermaid.css";

new Grid({
    data: [
        ['John', 'john@example.com'],
        ['Mike', 'mike@gmail.com']
    ]
}).updateConfig({
    columns:['日付','項目','収支','備考','記入者'],
    sort: true,
}).render(document.getElementById('table'));
