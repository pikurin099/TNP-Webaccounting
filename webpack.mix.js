const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js') // 既存の設定
   .js('resources/js/gridjs.js', 'public/js') // gridjs.jsを追加
   .sass('resources/sass/app.scss', 'public/css');
