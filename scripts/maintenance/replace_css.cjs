const fs = require('fs');
const path = require('path');

const dir = 'resources/views/landingpage/sakip';
const files = fs.readdirSync(dir)
    .filter(f => f.endsWith('.blade.php'))
    .map(f => path.join(dir, f));

files.push('resources/views/landingpage/profile/menu.blade.php');

for (const file of files) {
    if (!fs.existsSync(file)) continue;
    let content = fs.readFileSync(file, 'utf8');
    
    // Replace class prefixes
    content = content.replace(/(renstra|renja|lakip|iku|ukurkerja|menu)-(hero|overlay|content|title|subtitle|lead|table)/g, 'dokumen-$2');
    
    // Replace style block with push styles
    content = content.replace(/<style>[\s\S]*?<\/style>/, `@push('styles')\n    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-dokumen.css') }}">\n@endpush`);
    
    fs.writeFileSync(file, content);
}
console.log('Replacement done successfully.');
