const fs = require('fs');
const path = require('path');

const files = [
  'resources/views/landingpage/informasi/data-ormas.blade.php',
  'resources/views/landingpage/informasi/index.blade.php',
  'resources/views/landingpage/informasi/legislatif/detail.blade.php',
  'resources/views/landingpage/informasi/legislatif/legislatif.blade.php',
  'resources/views/landingpage/informasi/legislatif/show.blade.php',
  'resources/views/landingpage/informasi/pilpres/list.blade.php',
  'resources/views/landingpage/informasi/pilpres/detail.blade.php',
  'resources/views/landingpage/informasi/pilpres/show.blade.php',
  'resources/views/landingpage/informasi/walikota/detail.blade.php',
  'resources/views/landingpage/informasi/walikota/list.blade.php',
  'resources/views/landingpage/informasi/walikota/show.blade.php'
];

let cssContent = '';
for (const file of files) {
  if (fs.existsSync(file)) {
    let content = fs.readFileSync(file, 'utf8');
    let match = content.match(/<style>([\s\S]*?)<\/style>/);
    if (match) {
      cssContent += '/* =========================================\n   From ' + file + '\n   ========================================= */\n' + match[1] + '\n\n';
      content = content.replace(/<style>[\s\S]*?<\/style>/, `@push('styles')\n    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-informasi.css') }}">\n@endpush`);
      fs.writeFileSync(file, content);
    }
  }
}
fs.writeFileSync('public/assets/css/landingpage-informasi.css', cssContent);
console.log('Informasi CSS extracted successfully.');
