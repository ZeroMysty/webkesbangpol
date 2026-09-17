@extends('dashboard.layouts.app')
@section('title', 'Tambah Ormas')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="input-toggle-container mb-4">
                            <div class="toggle-switch">
                                <input type="checkbox" id="input-toggle" class="toggle-input">
                                <label for="input-toggle" class="toggle-label">
                                    <span class="toggle-option">Manual Input</span>
                                    <span class="toggle-option">Excel Upload</span>
                                </label>
                            </div>
                        </div>

                        <!-- Manual Input Form -->
                        <div id="manual-input-form">
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                                    <div class="fw-bold mb-1"><i class="fas fa-exclamation-triangle me-2"></i> Terdapat kesalahan pada pengisian form:</div>
                                    <ul class="mb-0 ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('ormass.inputmanualstore') }}" method="POST">
                                @csrf
                                
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">Data Organisasi</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="nama_organisasi" class="form-label">Nama Organisasi <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('nama_organisasi') is-invalid @enderror" name="nama_organisasi" placeholder="Masukkan nama organisasi" value="{{ old('nama_organisasi') }}" required autocomplete="off">
                                                @error('nama_organisasi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="bidang" class="form-label">Bidang <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('bidang') is-invalid @enderror" name="bidang" placeholder="Masukkan bidang" value="{{ old('bidang') }}" required autocomplete="off">
                                                @error('bidang')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span></label>
                                            @php
                                                $alamatValue = old('alamat');
                                                if ($alamatValue) {
                                                    $alamatValue = preg_replace('/<\/?(?:table|tbody|thead|tfoot|tr|th|td)\b[^>]*>/i', '', $alamatValue);
                                                }
                                            @endphp
                                            <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="editor" rows="3" placeholder="Masukkan alamat lengkap" autocomplete="off">{!! $alamatValue !!}</textarea>
                                            @error('alamat')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="sumber_data" class="form-label">Sumber Data <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control @error('sumber_data') is-invalid @enderror" name="sumber_data" id="sumber_data" placeholder="Masukkan sumber data" value="{{ old('sumber_data') }}" required autocomplete="off">
                                            @error('sumber_data')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4">
                                    <div class="card-header bg-success text-white">
                                        <h5 class="mb-0">Data Pengurus</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="pengurus-section mb-4">
                                            <h6 class="border-bottom pb-2">Ketua</h6>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="ketua_nama" class="form-label">Nama Ketua <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('pengurus.0.nama') is-invalid @enderror" name="pengurus[0][nama]" placeholder="Masukkan nama ketua" value="{{ old('pengurus.0.nama') }}" required autocomplete="off">
                                                    <input type="hidden" name="pengurus[0][jabatan]" value="Ketua">
                                                    @error('pengurus.0.nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="ketua_no_telepon" class="form-label">No. Telepon</label>
                                                    <input type="text" class="form-control @error('pengurus.0.no_telepon') is-invalid @enderror" name="pengurus[0][no_telepon]" placeholder="Masukkan nomor telepon ketua" value="{{ old('pengurus.0.no_telepon') }}" autocomplete="off">
                                                    @error('pengurus.0.no_telepon')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pengurus-section mb-4">
                                            <h6 class="border-bottom pb-2">Sekretaris</h6>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="sekretaris_nama" class="form-label">Nama Sekretaris <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('pengurus.1.nama') is-invalid @enderror" name="pengurus[1][nama]" placeholder="Masukkan nama sekretaris" value="{{ old('pengurus.1.nama') }}" required autocomplete="off">
                                                    <input type="hidden" name="pengurus[1][jabatan]" value="Sekretaris">
                                                    @error('pengurus.1.nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="sekretaris_no_telepon" class="form-label">No. Telepon</label>
                                                    <input type="text" class="form-control @error('pengurus.1.no_telepon') is-invalid @enderror" name="pengurus[1][no_telepon]" placeholder="Masukkan nomor telepon sekretaris" value="{{ old('pengurus.1.no_telepon') }}" autocomplete="off">
                                                    @error('pengurus.1.no_telepon')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pengurus-section">
                                            <h6 class="border-bottom pb-2">Bendahara</h6>
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="bendahara_nama" class="form-label">Nama Bendahara <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control @error('pengurus.2.nama') is-invalid @enderror" name="pengurus[2][nama]" placeholder="Masukkan nama bendahara" value="{{ old('pengurus.2.nama') }}" required autocomplete="off">
                                                    <input type="hidden" name="pengurus[2][jabatan]" value="Bendahara">
                                                    @error('pengurus.2.nama')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="bendahara_no_telepon" class="form-label">No. Telepon</label>
                                                    <input type="text" class="form-control @error('pengurus.2.no_telepon') is-invalid @enderror" name="pengurus[2][no_telepon]" placeholder="Masukkan nomor telepon bendahara" value="{{ old('pengurus.2.no_telepon') }}" autocomplete="off">
                                                    @error('pengurus.2.no_telepon')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card mb-4">
                                    <div class="card-header bg-info text-white">
                                        <h5 class="mb-0">Data Dokumen</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 mb-3">
                                                <label for="akta_notaris" class="form-label">Akta Notaris <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('dokumen.akta_notaris') is-invalid @enderror" name="dokumen[akta_notaris]" placeholder="Masukkan nomor akta notaris" value="{{ old('dokumen.akta_notaris') }}" required autocomplete="off">
                                                @error('dokumen.akta_notaris')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="ahu_skt" class="form-label">AHU/SKT <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control @error('dokumen.ahu_skt') is-invalid @enderror" name="dokumen[ahu_skt]" placeholder="Masukkan nomor AHU/SKT" value="{{ old('dokumen.ahu_skt') }}" required autocomplete="off">
                                                @error('dokumen.ahu_skt')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="npwp" class="form-label">NPWP <span class="text-muted small">(opsional)</span></label>
                                                <input type="text" class="form-control @error('dokumen.npwp') is-invalid @enderror" name="dokumen[npwp]" placeholder="Masukkan nomor NPWP (opsional)" value="{{ old('dokumen.npwp') }}" autocomplete="off">
                                                @error('dokumen.npwp')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        <i class="fas fa-undo me-1"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Excel Upload Form -->
                        <div id="excel-upload-form" style="display: none;">
                            <form action="{{ route('ormass.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card mb-4">
                                    <div class="card-header bg-primary text-white">
                                        <h5 class="mb-0">Upload Data Ormas via Excel</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="upload-area mb-3">
                                            <label for="file" class="form-label">Pilih File Excel</label>
                                            <div class="file-upload-wrapper">
                                                <input type="file" name="file" id="file" class="file-upload-input" accept=".xlsx,.xls" required autocomplete="off">
                                                <label for="file" class="file-upload-label">
                                                    <i class="fas fa-cloud-upload-alt upload-icon"></i>
                                                    <span class="upload-text">Pilih file atau drop disini</span>
                                                    <span class="upload-hint">Format: .xlsx, .xls</span>
                                                </label>
                                            </div>
                                            <div id="file-name-display" class="mt-2"></div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#excelTemplateModal">
                                                <i class="fas fa-download me-1"></i> Download Template Excel
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Simpan
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        <i class="fas fa-undo me-1"></i> Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Template Excel -->
    <div class="modal fade" id="excelTemplateModal" tabindex="-1" aria-labelledby="excelTemplateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="excelTemplateModalLabel">Download Template Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Silakan download template Excel untuk mengisi data Ormas dengan format yang sesuai.</p>
                    <a href="{{ asset('document/template-import/Template-Data-Ormas.xlsx') }}" class="btn btn-success">
                        <i class="fas fa-file-excel me-1"></i> Download Template
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard-crud.css') }}">
@endpush
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputToggle = document.getElementById('input-toggle');
            const manualInputForm = document.getElementById('manual-input-form');
            const excelUploadForm = document.getElementById('excel-upload-form');
            
            // Set initial state
            manualInputForm.style.display = 'block';
            excelUploadForm.style.display = 'none';
            
            // Toggle between manual input and excel upload forms
            inputToggle.addEventListener('change', function() {
                if (this.checked) {
                    manualInputForm.style.display = 'none';
                    excelUploadForm.style.display = 'block';
                } else {
                    manualInputForm.style.display = 'block';
                    excelUploadForm.style.display = 'none';
                }
            });

            // File input handling
            const fileInput = document.getElementById('file');
            const fileNameDisplay = document.getElementById('file-name-display');
            
            if (fileInput && fileNameDisplay) {
                fileInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const fileName = this.files[0].name;
                        fileNameDisplay.textContent = `File terpilih: ${fileName}`;
                        fileNameDisplay.classList.add('file-selected');
                    } else {
                        fileNameDisplay.textContent = '';
                        fileNameDisplay.classList.remove('file-selected');
                    }
                });
            }

            // Drag and drop functionality
            const uploadArea = document.querySelector('.file-upload-wrapper');
            
            if (uploadArea) {
                ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                    uploadArea.addEventListener(eventName, preventDefaults, false);
                });

                function preventDefaults(e) {
                    e.preventDefault();
                    e.stopPropagation();
                }

                ['dragenter', 'dragover'].forEach(eventName => {
                    uploadArea.addEventListener(eventName, highlight, false);
                });

                ['dragleave', 'drop'].forEach(eventName => {
                    uploadArea.addEventListener(eventName, unhighlight, false);
                });

                function highlight() {
                    uploadArea.classList.add('highlight');
                }

                function unhighlight() {
                    uploadArea.classList.remove('highlight');
                }

                uploadArea.addEventListener('drop', handleDrop, false);

                function handleDrop(e) {
                    const dt = e.dataTransfer;
                    const files = dt.files;
                    fileInput.files = files;
                    
                    // Trigger change event
                    const event = new Event('change', { bubbles: true });
                    fileInput.dispatchEvent(event);
                }
            }
        });
    </script>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard-ormasform.css') }}?v=3">
@endpush


