const fs = require('fs');
const path = require('path');

function getFilesRecursively(dir, fileList = []) {
  const files = fs.readdirSync(dir);
  for (const file of files) {
    const filePath = path.join(dir, file);
    if (fs.statSync(filePath).isDirectory()) {
      getFilesRecursively(filePath, fileList);
    } else if (file.endsWith('.blade.php')) {
      fileList.push(filePath);
    }
  }
  return fileList;
}

const dir = 'resources/views/dashboard';
let files = getFilesRecursively(dir);

// Remove layouts as they are usually handled differently or don't have CRUD styles
files = files.filter(f => !f.includes('layouts'));

const uniqueStyles = new Set();
let cssContent = '';

for (const file of files) {
  let content = fs.readFileSync(file, 'utf8');
  let match = content.match(/<style>([\s\S]*?)<\/style>/);
  if (match) {
    const styleContent = match[1].trim();
    if (!uniqueStyles.has(styleContent)) {
      uniqueStyles.add(styleContent);
      cssContent += '/* =========================================\n   Extracted Style Block \n   ========================================= */\n' + styleContent + '\n\n';
    }
    
    // Replace with link
    content = content.replace(/<style>[\s\S]*?<\/style>/, `@push('styles')\n    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-crud.css') }}">\n@endpush`);
    fs.writeFileSync(file, content);
  }
}

if (cssContent.length > 0) {
  fs.writeFileSync('public/assets/css/dashboard-crud.css', cssContent);
  console.log('Dashboard CSS extracted successfully.');
} else {
  console.log('No CSS found to extract.');
}
