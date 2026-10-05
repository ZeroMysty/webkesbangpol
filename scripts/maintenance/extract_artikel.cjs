const fs = require('fs');
const path = require('path');

const dir = 'resources/views/landingpage/artikel';
const files = fs.readdirSync(dir)
    .filter(f => f.endsWith('.blade.php'))
    .map(f => path.join(dir, f));

let cssContent = '';
for (const file of files) {
  if (fs.existsSync(file)) {
    let content = fs.readFileSync(file, 'utf8');
    let match = content.match(/<style>([\s\S]*?)<\/style>/);
    if (match) {
      cssContent += '/* =========================================\n   From ' + file + '\n   ========================================= */\n' + match[1] + '\n\n';
      content = content.replace(/<style>[\s\S]*?<\/style>/, `@push('styles')\n    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-artikel.css') }}">\n@endpush`);
      fs.writeFileSync(file, content);
    }
  }
}
if (cssContent.trim().length > 0) {
  fs.writeFileSync('public/assets/css/landingpage-artikel.css', cssContent);
  console.log('Artikel CSS extracted successfully.');
} else {
  console.log('No CSS found in Artikel files.');
}
