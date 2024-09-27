import { Grid } from "gridjs";
import "gridjs/dist/theme/mermaid.css";

new Grid({
    data: [
        ['John', 'john@example.com'],
        ['Mike', 'mike@gmail.com']
    ]
}).updateConfig({
    columns:['Name','Email','Phone Number'],
}).render(document.getElementById('table'));
