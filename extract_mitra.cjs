const fs = require('fs');
const files = [
  'resources/views/landingpage/mitra/index.blade.php',
  'resources/views/landingpage/mitra/detail.blade.php',
  'resources/views/landingpage/mitra/kategori.blade.php'
];
let cssContent = '';
for (const file of files) {
  if (fs.existsSync(file)) {
    let content = fs.readFileSync(file, 'utf8');
    let match = content.match(/<style>([\s\S]*?)<\/style>/);
    if (match) {
      cssContent += '/* =========================================\n   From ' + file + '\n   ========================================= */\n' + match[1] + '\n\n';
      content = content.replace(/<style>[\s\S]*?<\/style>/, `@push('styles')\n    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-mitra.css') }}">\n@endpush`);
      fs.writeFileSync(file, content);
    }
  }
}
fs.writeFileSync('public/assets/css/landingpage-mitra.css', cssContent);
console.log('Mitra CSS extracted successfully.');
