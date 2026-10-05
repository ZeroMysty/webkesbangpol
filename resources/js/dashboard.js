import $ from 'jquery';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import toastr from 'toastr';
import 'toastr/build/toastr.min.css';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import html2canvas from 'html2canvas';

window.$ = $;
window.jQuery = $;
window.toastr = toastr;
window.html2canvas = html2canvas;

// ===== CKEDITOR5 CONFIG & PASTE FILTER =====
function stripTablesFromHtml(html) {
    if (!html || !/<table/i.test(html)) return html;

    try {
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        const tables = Array.from(doc.querySelectorAll('table'));
        tables.forEach(table => {
            const rows = Array.from(table.querySelectorAll('tr'));
            const fragment = doc.createDocumentFragment();

            rows.forEach(row => {
                const cells = Array.from(row.querySelectorAll('th, td'))
                    .filter(cell => cell.textContent.trim().length > 0)
                    .map(cell => cell.innerHTML.trim());

                if (cells.length > 0) {
                    const p = doc.createElement('p');
                    p.innerHTML = cells.join(' ');
                    fragment.appendChild(p);
                }
            });

            if (fragment.childNodes.length > 0) {
                table.parentNode.replaceChild(fragment, table);
            } else {
                table.remove();
            }
        });

        return doc.body.innerHTML;
    } catch (e) {
        return html
            .replace(/<table\b[^>]*>/gi, '')
            .replace(/<\/table>/gi, '')
            .replace(/<tbody\b[^>]*>/gi, '')
            .replace(/<\/tbody>/gi, '')
            .replace(/<thead\b[^>]*>/gi, '')
            .replace(/<\/thead>/gi, '')
            .replace(/<tfoot\b[^>]*>/gi, '')
            .replace(/<\/tfoot>/gi, '')
            .replace(/<tr\b[^>]*>/gi, '')
            .replace(/<\/tr>/gi, '<br>')
            .replace(/<td\b[^>]*>/gi, '')
            .replace(/<\/td>/gi, ' ')
            .replace(/<th\b[^>]*>/gi, '')
            .replace(/<\/th>/gi, ' ');
    }
}

function setupPasteFilter(editor) {
    if (!editor || !editor.editing || !editor.editing.view) return;

    editor.editing.view.document.on('clipboardInput', (evt, data) => {
        const dataTransfer = data.dataTransfer;
        if (!dataTransfer) return;

        const html = dataTransfer.getData('text/html');
        if (html && /<table/i.test(html)) {
            const cleanHtml = stripTablesFromHtml(html);
            const originalGetData = dataTransfer.getData.bind(dataTransfer);
            dataTransfer.getData = function (type) {
                if (type === 'text/html') {
                    return cleanHtml;
                }
                return originalGetData(type);
            };
        }
    }, { priority: 'high' });
}

const editorConfig = {
    toolbar: [
        'undo', 'redo', '|',
        'heading', '|',
        'bold', 'italic', '|', 'link', 'blockQuote', '|',
        'bulletedList', 'numberedList', '|',
        'indent', 'outdent', '|',
    ],
    removePlugins: ['Table', 'TableToolbar']
};

document.addEventListener('DOMContentLoaded', function () {
    const editorElement = document.querySelector('#editor');
    if (editorElement) {
        ClassicEditor
            .create(editorElement, editorConfig)
            .then(editor => {
                setupPasteFilter(editor);
            })
            .catch(error => {
                console.error(error);
            });
    }

    const editorIDs = ['editor1', 'editor2', 'editor3', 'editor4', 'tentang'];
    editorIDs.forEach(id => {
        const el = document.getElementById(id);
        if (el) {
            ClassicEditor
                .create(el, editorConfig)
                .then(editor => {
                    setupPasteFilter(editor);
                })
                .catch(error => {
                    console.error(`Editor untuk ${id} gagal:`, error);
                });
        }
    });
});
