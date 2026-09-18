@extends('landingpage.layouts.app')
@section('title', 'Potensi Konflik di Kota Bandung')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/landingpage-potensikonflik.css') }}">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@section('content')

    <div class="dashboard-container">
        <div class="container-fluid px-3 px-xl-4">
            <!-- Command Bar (Header, Compact Stats & Controls in one sleek bar) -->
            <div class="command-bar">
                <!-- Brand / Title -->
                <div class="command-bar-title">
                    <div class="brand-icon-badge">
                        <i class="fas fa-shield-halved"></i>
                    </div>
                    <div class="brand-text">
                        <h1>Potensi Konflik Kota Bandung</h1>
                        <span>Sistem Monitoring Kewaspadaan Dini Wilayah</span>
                    </div>
                </div>

                <!-- Compact Stats Chips -->
                <div class="command-bar-stats">
                    <div class="stat-chip chip-danger" title="Total Kejadian Terdata">
                        <i class="fas fa-layer-group text-danger"></i>
                        <span>Total:</span>
                        <span class="stat-number" id="totalKonflik">{{ count($potensiKonfliks) }}</span>
                    </div>
                    <div class="stat-chip chip-blue" title="Kecamatan Terpetakan">
                        <i class="fas fa-city text-primary"></i>
                        <span>Kecamatan:</span>
                        <span class="stat-number" id="totalKecamatan">{{ count($statistikKecamatan) }}</span>
                    </div>
                    <div class="stat-chip chip-amber" title="Kategori Kasus">
                        <i class="fas fa-tags text-warning"></i>
                        <span>Kategori:</span>
                        <span class="stat-number" id="totalKategori">{{ count($statistikKategori) }}</span>
                    </div>
                    <div class="stat-chip chip-emerald" title="Kasus Aktif">
                        <i class="fas fa-satellite-dish text-success"></i>
                        <span>Aktif:</span>
                        <span class="stat-number" id="konflikAktif">{{ $potensiKonfliks->where('status', 'aktif')->count() }}</span>
                    </div>
                </div>

                <!-- Controls: Year Filter & Segmented View Switcher -->
                <div class="command-bar-controls">
                    <div class="year-filter-wrapper">
                        <i class="fas fa-calendar-alt"></i>
                        <select id="yearFilter" class="year-select">
                            <option value="">Semua Tahun</option>
                            <!-- Years will be populated by JavaScript -->
                        </select>
                    </div>

                    <div class="view-selector-container">
                        <button type="button" id="btnShowMap" class="view-btn" data-target="gis-container">
                            <i class="fas fa-map-location-dot"></i> Peta
                        </button>
                        <button type="button" id="btnShowTable" class="view-btn" data-target="table-container">
                            <i class="fas fa-table-list"></i> Tabel
                        </button>
                    </div>
                </div>
            </div>

            <!-- GIS Map Container (Split View: Map Left, Info Right) -->
            <div class="gis-container">
                <div class="gis-split-layout">
                    <!-- Left: Interactive Map -->
                    <div class="gis-map-panel">
                        <div id="map"></div>
                    </div>
                    <!-- Right: Information Side Panel (No Map Popups) -->
                    <div id="sideInfoPanel" class="gis-side-panel"></div>
                </div>
            </div>

            <!-- Data Table Container -->
            <div class="table-container">
                <div class="table-header-bar">
                    <h3 class="table-title">
                        <i class="fas fa-table-list text-danger"></i> Data Detail Potensi Konflik
                    </h3>
                    <div class="table-search-wrapper">
                        <i class="fas fa-search table-search-icon"></i>
                        <input type="text" id="tableFilterInput" class="table-search-input" placeholder="Cari potensi, kecamatan, kelurahan..." onkeyup="filterTableLive(this.value)">
                    </div>
                </div>
                <div style="overflow-x: auto;">
                    <table class="modern-table" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nama Potensi</th>
                                <th>Kategori</th>
                                <th>Kecamatan</th>
                                <th>Kelurahan</th>
                                <th>Tanggal</th>
                                <th>Tingkat</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            @foreach ($potensiKonfliks1 as $item)
                            <tr data-year="{{ \Carbon\Carbon::parse($item->tanggal)->format('Y') }}">
                                <td><strong>{{ $item->nama_potensi }}</strong></td>
                                <td><span class="badge bg-light text-dark border">{{ $item->kategori }}</span></td>
                                <td>{{ $item->lokasi_kecamatan }}</td>
                                <td>{{ $item->lokasi_kelurahan }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                                <td>
                                    <span class="tingkat-badge tingkat-{{ strtolower($item->tingkat_potensi) }}">
                                        {{ $item->tingkat_potensi }}
                                    </span>
                                </td>
                                <td>
                                    <span class="status-badge status-{{ strtolower($item->status) }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="pagination-section">
                    {{ $potensiKonfliks1->links('components.custom-pagination') }}
                </div>
            </div>
        </div>
    </div>

    <script>
        // Live Table Search Filtering
        function filterTableLive(keyword) {
            const query = (keyword || '').toLowerCase().trim();
            const rows = document.querySelectorAll('#tableBody tr');
            rows.forEach(tr => {
                const text = tr.innerText.toLowerCase();
                tr.style.display = text.includes(query) ? '' : 'none';
            });
        }
    </script>

    <!-- Script Pilihan tampilan -->
    <script>
        // Tambahkan variabel untuk menyimpan currentView
        let currentView = 'gis-container'; // default view

        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.view-selector-container .view-btn');
            const containers = {
                'gis-container'   : document.querySelector('.gis-container'),
                'table-container' : document.querySelector('.table-container')
            };

            function showOnly(targetClass) {
                Object.keys(containers).forEach(key => {
                    if (containers[key]) {
                        containers[key].style.display = (key === targetClass) ? '' : 'none';
                    }
                });

                buttons.forEach(btn => {
                    btn.classList.toggle('active', btn.getAttribute('data-target') === targetClass);
                });

                currentView = targetClass;

                if (targetClass === 'gis-container' && typeof map !== 'undefined' && map) {
                    setTimeout(() => {
                        map.invalidateSize();
                    }, 50);
                }

                localStorage.setItem('lastView', targetClass);
            }

            const lastView = localStorage.getItem('lastView') === 'table-container' ? 'table-container' : 'gis-container';
            showOnly(lastView);

            buttons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const target = this.getAttribute('data-target');
                    if (containers[target]) {
                        showOnly(target);
                    }
                });
            });
        });
    </script>

    <!-- Main Script -->
    <script>
        // INISIALISASI DATA & VARIABEL
        const potensiKonfliks = @json($potensiKonfliks);
        const statistikKategori = @json($statistikKategori);
        const statistikKecamatan = @json($statistikKecamatan);
        const statistikTingkat = @json($statistikTingkat);
        const statistikKelurahan = @json($statistikKelurahan);

        let map;
        let markers = [];
        let currentYear = '';

        let kecamatanLayer;
        let kelurahanLayer;
        let geoJsonKecamatan;
        let geoJsonKelurahan;
        
        let activeLabel = null;

        let isHovering = false;
        let hoverTimeout = null;
        let currentHoveredFeature = null;

        // EVENT LISTENER UTAMA
        document.addEventListener('DOMContentLoaded', function () {
            initializeMap();
            initializeYearFilter();
            renderSidePanelDefault();
            loadGeoJsonData();
            
            if (currentView === 'table-container') {
                updateTableStatistics();
            } else {
                updateMapsChartStatistics();
            }
            animateNumbers();

            document.getElementById('yearFilter').addEventListener('change', function() {
                const newYear = this.value;
                const oldYear = currentYear;

                if (currentView === 'table-container') {
                    currentYear = newYear;
                    reloadTableWithYearFilter(newYear);
                    return;
                }

                if (newYear !== oldYear) {
                    currentYear = newYear;
                    updateCurrentView();
                }
            });
        });

        async function loadGeoJsonData() {
            try {
                const [kecamatanResponse, kelurahanResponse] = await Promise.all([
                    fetch('/geojson-bandung-master/3273-kota-bandung-level-kecamatan.json'),
                    fetch('/geojson-bandung-master/3273-kota-bandung-level-kelurahan.json')
                ]);

                geoJsonKecamatan = await kecamatanResponse.json();
                geoJsonKelurahan = await kelurahanResponse.json();

                // console.log('GeoJSON data loaded successfully');
                
                updateVisualization();
            } catch (error) {
                console.error('Error loading GeoJSON data:', error);
                updateMapWithMarkers();
            }
        }

        let selectedKelurahanName = null;
        let selectedLayerRef = null;

        function onEachKelurahanCombined(feature, layer) {
            const kelurahanName = feature.properties.nama_kelurahan;
            const kecamatanName = feature.properties.nama_kecamatan;

            let centroid = null;
            if (feature.geometry.type === 'Polygon') {
                centroid = calculateCentroid(feature.geometry.coordinates[0]);
            } else if (feature.geometry.type === 'MultiPolygon') {
                centroid = calculateCentroid(feature.geometry.coordinates[0][0]);
            }

            const filteredData = getFilteredData();
            const listConflict = filteredData.filter(item => item.lokasi_kelurahan === kelurahanName);
            const totalCount = listConflict.length;

            layer.on({
                mouseover: function(e) {
                    if (currentHoveredFeature === kelurahanName || isHovering) {
                        return;
                    }

                    e.originalEvent && e.originalEvent.stopPropagation();
                    isHovering = true;
                    currentHoveredFeature = kelurahanName;

                    if (hoverTimeout) {
                        clearTimeout(hoverTimeout);
                        hoverTimeout = null;
                    }

                    hoverTimeout = setTimeout(() => {
                        if (currentHoveredFeature === kelurahanName) {
                            if (selectedKelurahanName !== kelurahanName) {
                                e.target.setStyle({
                                    weight: 2.5,
                                    color: '#2563eb',
                                    fillOpacity: 0.88
                                });
                            }

                            if (!isMobileDevice() && centroid) {
                                showKelurahanLabel(feature, centroid, totalCount);
                            }
                        }
                        isHovering = false;
                    }, 80);
                },

                mouseout: function(e) {
                    e.originalEvent && e.originalEvent.stopPropagation();

                    if (hoverTimeout) {
                        clearTimeout(hoverTimeout);
                        hoverTimeout = null;
                    }

                    if (currentHoveredFeature === kelurahanName) {
                        currentHoveredFeature = null;
                    }
                    isHovering = false;

                    setTimeout(() => {
                        if (currentHoveredFeature !== kelurahanName) {
                            if (kelurahanLayer && selectedKelurahanName !== kelurahanName) {
                                kelurahanLayer.resetStyle(e.target);
                            }

                            if (!isMobileDevice()) {
                                removeActiveLabel();
                            }
                        }
                    }, 50);
                },

                click: function(e) {
                    e.originalEvent && e.originalEvent.stopPropagation();
                    removeActiveLabel();

                    const currentData = getFilteredData();
                    const currentConflictList = currentData.filter(item => item.lokasi_kelurahan === kelurahanName);

                    map.fitBounds(layer.getBounds(), { padding: [50, 50], maxZoom: 15, animate: true });
                    selectKelurahanForSidePanel(feature, layer, currentConflictList);
                }
            });
        }

        function renderSidePanelDefault() {
            const sidePanel = document.getElementById('sideInfoPanel');
            if (!sidePanel) return;

            const filteredData = getFilteredData();
            const totalKonflik = filteredData.length;

            const kelMap = {};
            filteredData.forEach(item => {
                const k = item.lokasi_kelurahan || 'Lainnya';
                if (!kelMap[k]) {
                    kelMap[k] = { name: k, kecamatan: item.lokasi_kecamatan || '', total: 0, tinggi: 0, sedang: 0, rendah: 0 };
                }
                kelMap[k].total++;
                const tingkat = (item.tingkat_potensi || '').toLowerCase();
                if (tingkat === 'tinggi') kelMap[k].tinggi++;
                else if (tingkat === 'sedang') kelMap[k].sedang++;
                else if (tingkat === 'rendah') kelMap[k].rendah++;
            });

            const affectedKelurahanCount = Object.keys(kelMap).length;
            const highRiskCount = filteredData.filter(i => (i.tingkat_potensi || '').toLowerCase() === 'tinggi').length;

            const topKelurahans = Object.values(kelMap)
                .sort((a, b) => b.total - a.total || b.tinggi - a.tinggi)
                .slice(0, 6);

            let html = `
                <div class="side-panel-header">
                    <div class="side-panel-title-area">
                        <h4 class="side-panel-title">
                            <i class="fa-solid fa-layer-group text-danger"></i> Informasi Wilayah
                        </h4>
                        <p class="side-panel-subtitle">
                            ${currentYear ? 'Tahun ' + currentYear : 'Semua Periode Data'}
                        </p>
                    </div>
                    <span class="badge bg-light text-secondary border px-2 py-1" style="font-size: 0.72rem; font-weight: 700;">
                        Kota Bandung
                    </span>
                </div>

                <div class="side-panel-body">
                    <div class="side-prompt-box">
                        <i class="fa-solid fa-hand-pointer text-primary" style="font-size: 1rem; margin-top: 2px;"></i>
                        <div>
                            <strong>Pilih Kelurahan di Peta</strong>
                            <div style="font-size: 0.76rem; color: #64748B; margin-top: 2px;">
                                Klik salah satu wilayah kelurahan pada peta untuk melihat rincian potensi konflik di panel ini.
                            </div>
                        </div>
                    </div>

                    <div class="side-stats-grid">
                        <div class="side-stat-card">
                            <div class="side-stat-val text-danger">${totalKonflik}</div>
                            <div class="side-stat-lbl">Total Kasus</div>
                        </div>
                        <div class="side-stat-card">
                            <div class="side-stat-val text-primary">${affectedKelurahanCount}</div>
                            <div class="side-stat-lbl">Kel. Terdampak</div>
                        </div>
                        <div class="side-stat-card">
                            <div class="side-stat-val text-warning">${highRiskCount}</div>
                            <div class="side-stat-lbl">Prioritas Tinggi</div>
                        </div>
                    </div>

                    <div>
                        <div class="side-section-heading">
                            <span>Wilayah Rawan Tertinggi</span>
                            <span style="font-size: 0.7rem; color: #94A3B8; font-weight: normal;">Klik untuk sorot</span>
                        </div>
                        <div class="side-rank-list" style="margin-top: 0.5rem;">
            `;

            if (topKelurahans.length === 0) {
                html += `
                    <div style="text-align: center; padding: 1.5rem; color: #94A3B8; font-size: 0.82rem;">
                        Tidak ada data potensi konflik untuk periode ini
                    </div>
                `;
            } else {
                topKelurahans.forEach((k, idx) => {
                    const escapedName = k.name.replace(/'/g, "\\'");
                    html += `
                        <div class="side-rank-item" onclick="focusKelurahanByName('${escapedName}')">
                            <div class="side-rank-info">
                                <div class="side-rank-name">${idx + 1}. ${k.name}</div>
                                <div class="side-rank-sub">Kec. ${k.kecamatan || '-'}</div>
                            </div>
                            <div class="side-rank-badge">
                                ${k.total} konflik
                                <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem; margin-left: 2px;"></i>
                            </div>
                        </div>
                    `;
                });
            }

            html += `
                        </div>
                    </div>
                </div>
            `;

            sidePanel.innerHTML = html;
        }

        function selectKelurahanForSidePanel(feature, layer, conflictList) {
            const sidePanel = document.getElementById('sideInfoPanel');
            if (!sidePanel) return;

            const kelurahanName = feature.properties.nama_kelurahan;
            const kecamatanName = feature.properties.nama_kecamatan;
            selectedKelurahanName = kelurahanName;

            // Highlight polygon on map
            if (selectedLayerRef && kelurahanLayer) {
                kelurahanLayer.resetStyle(selectedLayerRef);
            }
            selectedLayerRef = layer;
            if (layer) {
                layer.setStyle({
                    weight: 3.5,
                    color: '#B40D14',
                    fillColor: '#B40D14',
                    fillOpacity: 0.45
                });
                layer.bringToFront();
            }

            const totalCount = conflictList.length;
            const highCount = conflictList.filter(c => (c.tingkat_potensi || '').toLowerCase() === 'tinggi').length;
            const mediumCount = conflictList.filter(c => (c.tingkat_potensi || '').toLowerCase() === 'sedang').length;
            const lowCount = conflictList.filter(c => (c.tingkat_potensi || '').toLowerCase() === 'rendah').length;

            let html = `
                <div class="side-panel-header">
                    <div class="side-panel-title-area">
                        <h4 class="side-panel-title" title="${kelurahanName}">
                            <i class="fa-solid fa-location-dot text-danger"></i> Kel. ${kelurahanName}
                        </h4>
                        <p class="side-panel-subtitle">Kecamatan ${kecamatanName}</p>
                    </div>
                    <button type="button" class="side-btn-back" onclick="resetSidePanelSelection()">
                        <i class="fa-solid fa-arrow-left"></i> Ringkasan
                    </button>
                </div>

                <div class="side-panel-body">
                    <div class="side-risk-breakdown">
                        <span class="side-risk-pill total"><strong>${totalCount}</strong> Total Kasus</span>
                        ${highCount > 0 ? `<span class="side-risk-pill tinggi">🔴 ${highCount} Tinggi</span>` : ''}
                        ${mediumCount > 0 ? `<span class="side-risk-pill sedang">🟡 ${mediumCount} Sedang</span>` : ''}
                        ${lowCount > 0 ? `<span class="side-risk-pill rendah">🟢 ${lowCount} Rendah</span>` : ''}
                    </div>
            `;

            if (totalCount === 0) {
                html += `
                    <div class="side-empty-state">
                        <div class="side-empty-icon"><i class="fa-solid fa-circle-check"></i></div>
                        <h5 class="side-empty-title">Wilayah Aman & Terkendali</h5>
                        <p class="side-empty-desc">Tidak tercatat adanya potensi konflik di Kelurahan ${kelurahanName} pada periode yang dipilih.</p>
                    </div>
                `;
            } else {
                html += `
                    <div class="side-section-heading">
                        <span>Daftar Potensi Konflik</span>
                        <span style="font-size: 0.7rem; color: #94A3B8; font-weight: normal;">Klik untuk detail</span>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 0.6rem;">
                `;

                conflictList.forEach((conflict, index) => {
                    const priorityColor = getPriorityColor(conflict.tingkat_potensi);
                    const statusBadge = getStatusBadge(conflict.status);
                    const tanggalFormatted = conflict.tanggal ? formatDate(conflict.tanggal) : '-';

                    html += `
                        <div class="side-conflict-card" 
                             id="side-card-${index}"
                             style="border-left-color: ${priorityColor};" 
                             onclick="renderConflictDetailInSidePanel(${index})">
                            <div class="side-card-top">
                                <h5 class="side-card-title">${conflict.nama_potensi}</h5>
                                ${statusBadge}
                            </div>
                            <div class="side-card-meta">
                                <div class="side-card-meta-row">
                                    <i class="fa-solid fa-folder-open text-muted" style="width: 13px;"></i>
                                    <span>${conflict.kategori || 'Umum'}</span>
                                </div>
                                <div class="side-card-meta-row">
                                    <i class="fa-solid fa-location-dot text-muted" style="width: 13px;"></i>
                                    <span>${conflict.alamat || 'Alamat tidak tersedia'}</span>
                                </div>
                            </div>
                            <div class="side-card-footer">
                                <span class="text-muted"><i class="fa-regular fa-calendar me-1"></i>${tanggalFormatted}</span>
                                <span class="side-card-link">Detail <i class="fa-solid fa-chevron-right" style="font-size: 0.65rem;"></i></span>
                            </div>
                        </div>
                    `;
                });

                html += `</div>`;
            }

            html += `</div>`;
            sidePanel.innerHTML = html;

            window._currentSideConflictList = conflictList;
            window._currentSelectedFeature = feature;
            window._currentSelectedLayer = layer;
        }

        function renderConflictDetailInSidePanel(index) {
            const sidePanel = document.getElementById('sideInfoPanel');
            const conflictList = window._currentSideConflictList;
            const feature = window._currentSelectedFeature;
            const layer = window._currentSelectedLayer;
            if (!sidePanel || !conflictList || !conflictList[index]) return;

            const conflict = conflictList[index];
            const priorityColor = getPriorityColor(conflict.tingkat_potensi);
            const statusBadge = getStatusBadge(conflict.status);
            const tanggalFormatted = conflict.tanggal ? formatDate(conflict.tanggal) : '-';

            let html = `
                <div class="side-panel-header">
                    <div class="side-panel-title-area">
                        <h4 class="side-panel-title">
                            <i class="fa-solid fa-circle-info text-primary"></i> Rincian Kasus
                        </h4>
                        <p class="side-panel-subtitle">Kel. ${feature.properties.nama_kelurahan}</p>
                    </div>
                    <button type="button" class="side-btn-back" onclick="selectKelurahanForSidePanel(window._currentSelectedFeature, window._currentSelectedLayer, window._currentSideConflictList)">
                        <i class="fa-solid fa-arrow-left"></i> Daftar
                    </button>
                </div>

                <div class="side-panel-body side-detail-view">
                    <div class="side-detail-header-card">
                        <h4 class="side-detail-title">${conflict.nama_potensi}</h4>
                        <div class="side-detail-badge-group">
                            <span style="background: ${priorityColor}; color: white; padding: 3px 8px; border-radius: 6px; font-size: 0.72rem; font-weight: 700; text-transform: uppercase;">
                                Tingkat: ${conflict.tingkat_potensi || '-'}
                            </span>
                            ${statusBadge}
                        </div>
                    </div>

                    <div class="side-detail-meta-list">
                        <div class="side-detail-meta-item">
                            <span class="side-detail-meta-lbl"><i class="fa-solid fa-folder me-1 text-muted"></i> Kategori Masalah</span>
                            <span class="side-detail-meta-val">${conflict.kategori || '-'}</span>
                        </div>
                        <div class="side-detail-meta-item">
                            <span class="side-detail-meta-lbl"><i class="fa-regular fa-calendar me-1 text-muted"></i> Tanggal Kejadian</span>
                            <span class="side-detail-meta-val">${tanggalFormatted}</span>
                        </div>
                        <div class="side-detail-meta-item">
                            <span class="side-detail-meta-lbl"><i class="fa-solid fa-location-dot me-1 text-muted"></i> Lokasi / Alamat</span>
                            <span class="side-detail-meta-val">${conflict.alamat || '-'}</span>
                        </div>
                        ${conflict.pihak_terlibat ? `
                            <div class="side-detail-meta-item">
                                <span class="side-detail-meta-lbl"><i class="fa-solid fa-users me-1 text-muted"></i> Pihak Terlibat</span>
                                <span class="side-detail-meta-val">${conflict.pihak_terlibat}</span>
                            </div>
                        ` : ''}
                    </div>

                    <div class="side-detail-desc-box">
                        <span class="side-detail-meta-lbl"><i class="fa-solid fa-align-left me-1 text-muted"></i> Deskripsi Potensi Konflik</span>
                        <p class="side-detail-desc-val">${conflict.deskripsi || 'Tidak ada keterangan rincian deskripsi untuk potensi konflik ini.'}</p>
                    </div>

                    <button type="button" class="side-btn-back" style="justify-content: center; padding: 0.6rem; margin-top: 0.25rem;" 
                            onclick="selectKelurahanForSidePanel(window._currentSelectedFeature, window._currentSelectedLayer, window._currentSideConflictList)">
                        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Konflik Kelurahan
                    </button>
                </div>
            `;

            sidePanel.innerHTML = html;
        }

        function resetSidePanelSelection() {
            selectedKelurahanName = null;
            if (selectedLayerRef && kelurahanLayer) {
                kelurahanLayer.resetStyle(selectedLayerRef);
                selectedLayerRef = null;
            }
            if (kecamatanLayer && map) {
                map.fitBounds(kecamatanLayer.getBounds(), { padding: [15, 15], animate: true });
            }
            renderSidePanelDefault();
        }

        function focusKelurahanByName(kelurahanName) {
            if (!kelurahanLayer) return;

            let targetLayer = null;
            let targetFeature = null;

            kelurahanLayer.eachLayer(layer => {
                if (layer.feature && layer.feature.properties && layer.feature.properties.nama_kelurahan === kelurahanName) {
                    targetLayer = layer;
                    targetFeature = layer.feature;
                }
            });

            if (targetLayer && targetFeature) {
                const filteredData = getFilteredData();
                const conflictList = filteredData.filter(item => item.lokasi_kelurahan === kelurahanName);
                
                map.fitBounds(targetLayer.getBounds(), { padding: [50, 50], maxZoom: 15, animate: true });
                selectKelurahanForSidePanel(targetFeature, targetLayer, conflictList);
            }
        }

        function getPriorityColor(tingkat) {
            switch(tingkat?.toLowerCase()) {
                case 'tinggi': return '#dc2626';
                case 'sedang': return '#d97706';
                case 'rendah': return '#16a34a';
                default: return '#94a3b8';
            }
        }

        function getStatusBadge(status) {
            const statusKey = (status || '').toLowerCase();
            const statusClassMap = {
                'aktif': 'status-aktif',
                'monitoring': 'status-monitoring',
                'selesai': 'status-selesai',
                'pending': 'status-pending'
            };
            const badgeClass = statusClassMap[statusKey] || 'status-pending';
            return `<span class="status-badge ${badgeClass}">${status || 'N/A'}</span>`;
        }

        function formatDate(dateString) {
            try {
                const date = new Date(dateString);
                return date.toLocaleDateString('id-ID', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
            } catch (e) {
                return dateString;
            }
        }

        function showKelurahanLabel(feature, centroidCoords, conflictCount) {
            removeActiveLabel();

            const kelurahanName = feature.properties.nama_kelurahan;

            // PERBAIKAN: HTML di dalam ternary operator harus dalam bentuk string (menggunakan backtick ``)
            const labelContent = `
                <div style="
                    background: rgba(255, 255, 255, 0.95);
                    border: 1px solid #ddd;
                    border-radius: 6px;
                    padding: 6px 10px;
                    font-size: 11px;
                    font-weight: 500;
                    text-align: center;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.3);
                    white-space: nowrap;
                    max-width: 200px;
                    pointer-events: none;
                    ${conflictCount > 0 ? 'border-left: 3px solid #f59e0b;' : 'border-left: 3px solid #10b981;'}
                ">
                    <div style="color: #374151; font-weight: 600; margin-bottom: 2px;">${kelurahanName}</div>
                    ${conflictCount > 0 
                        ? `<div style="color: #dc2626; font-size: 10px;">${conflictCount} konflik</div>` 
                        : `<div style="color: #10b981; font-size: 10px;">Tidak ada konflik</div>`
                    }
                </div>
            `;

            activeLabel = L.marker(
                [centroidCoords[1], centroidCoords[0]],
                {
                    icon: L.divIcon({
                        className: 'kelurahan-hover-label',
                        html: labelContent,
                        iconSize: null,
                        iconAnchor: [0, 0]
                    }),
                    zIndexOffset: 1000,
                    interactive: false
                }
            ).addTo(map);
        }

        function removeActiveLabel() {
            if (activeLabel) {
                map.removeLayer(activeLabel);
                activeLabel = null;
            }
        }

        function isMobileDevice() {
            return (
                typeof window.orientation !== "undefined" ||
                navigator.userAgent.indexOf('IEMobile') !== -1 ||
                /Android|iPhone|iPad|iPod|Opera Mini|IEMobile/i.test(navigator.userAgent)
            );
        }

        function calculateCentroid(coordinates) {
            let x = 0, y = 0, area = 0;
            const len = coordinates.length;
            
            if (len < 3) return null;
            
            for (let i = 0; i < len; i++) {
                const j = (i + 1) % len;
                const xi = coordinates[i][0], yi = coordinates[i][1];
                const xj = coordinates[j][0], yj = coordinates[j][1];
                const a = xi * yj - xj * yi;
                area += a;
                x += (xi + xj) * a;
                y += (yi + yj) * a;
            }
            
            area *= 0.5;
            if (area === 0) return null;
            
            return [x / (6 * area), y / (6 * area)];
        }

        function createColorLegend() {
            const legend = L.control({position: 'bottomright'});
            
            legend.onAdd = function(map) {
                const div = L.DomUtil.create('div', 'legend');
                div.innerHTML = `
                    <h4 style="margin: 0 0 10px 0; font-size: 14px;">Jumlah Konflik</h4>
                    <div style="display: flex; flex-direction: column; gap: 4px;">
                        <div style="display: flex; align-items: center;">
                            <i style="background: #f0f0f0; width: 18px; height: 12px; margin-right: 8px;"></i>
                            <span style="font-size: 12px;">Tidak ada</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <i style="background: #84cc16; width: 18px; height: 12px; margin-right: 8px;"></i>
                            <span style="font-size: 12px;">Rendah</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <i style="background: #eab308; width: 18px; height: 12px; margin-right: 8px;"></i>
                            <span style="font-size: 12px;">Sedang</span>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <i style="background: #ef4444; width: 18px; height: 12px; margin-right: 8px;"></i>
                            <span style="font-size: 12px;">Tinggi</span>
                        </div>
                    </div>
                `;
                return div;
            };
            
            return legend;
        }

        function initializeMap() {
            addMinimalHomeButtonStyles();
            map = L.map('map', {
                minZoom: 11,
                maxZoom: 18
            }).setView([-6.9175, 107.6191], 12);
            
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_nolabels/{z}/{x}/{y}{r}.png', {
                attribution: '© OpenStreetMap contributors © CARTO',
                subdomains: 'abcd',
                maxZoom: 19
            }).addTo(map);
            
            L.tileLayer('https://{s}.basemaps.cartocdn.com/light_only_labels/{z}/{x}/{y}{r}.png', {
                attribution: '',
                subdomains: 'abcd',
                maxZoom: 19,
                pane: 'overlayPane',
                opacity: 1
            }).addTo(map);
            
            const homeButton = L.control({ position: 'topleft' });
            homeButton.onAdd = function (map) {
                const div = L.DomUtil.create('div', 'home-button-control');
                div.innerHTML = '<button class="home-btn" title="Fokuskan ke Kota Bandung & Reset Pilihan"><i class="fa-solid fa-location-dot"></i></button>';            
                div.onclick = function(e) {
                    e.stopPropagation();
                    resetSidePanelSelection();
                };
                return div;
            };
            homeButton.addTo(map);
        }

        function addMinimalHomeButtonStyles() {
            if (document.getElementById('minimal-home-button-styles')) {
                return;
            }
            const style = document.createElement('style');
            style.id = 'minimal-home-button-styles';
            style.textContent = `
                .home-button-control { background: none; border: none; margin: 0; padding: 0; }
                .home-btn {
                    background: white; border: 2px solid #e2e8f0; border-radius: 8px;
                    width: 38px; height: 38px; font-size: 15px; cursor: pointer; color: #1E293B;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08); transition: all 0.2s ease;
                    display: flex; align-items: center; justify-content: center;
                }
                .home-btn:hover {
                    background: #f8fafc; border-color: #cbd5e0; transform: translateY(-1px);
                    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12); color: #B40D14;
                }
                .home-btn:active { transform: translateY(0); box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08); }
            `;
            document.head.appendChild(style);
        }

        function getColorForKonflik(count, maxCount) {
            if (count === 0) return '#f0f0f0';
            const intensity = count / maxCount;
            if (intensity <= 0.20) return 'rgb(0, 180, 0)';
            else if (intensity <= 0.60) return 'rgb(255, 200, 0)';
            else if (intensity <= 0.80) return 'rgb(255, 90, 0)';
            else return 'rgb(255, 0, 0)';
        }

        function getFilteredData() {
            if (!currentYear) return potensiKonfliks;
            
            return potensiKonfliks.filter(item => {
                const itemYear = new Date(item.tanggal).getFullYear();
                return itemYear.toString() === currentYear;
            });
        }

        function updateMapWithGeoJson() {
            if (kecamatanLayer) map.removeLayer(kecamatanLayer);
            if (kelurahanLayer) map.removeLayer(kelurahanLayer);
            kecamatanLayer = null;
            kelurahanLayer = null;

            removeActiveLabel();
            currentHoveredFeature = null;
            isHovering = false;
            if (hoverTimeout) clearTimeout(hoverTimeout);
            hoverTimeout = null;

            const filteredData = getFilteredData();

            const kelurahanData = {};
            filteredData.forEach(item => {
                const namaKel = item.lokasi_kelurahan;
                if (!kelurahanData[namaKel]) kelurahanData[namaKel] = [];
                kelurahanData[namaKel].push(item);
            });

            const maxKonflik = Math.max(1, ...Object.values(kelurahanData).map(arr => arr.length));

            function styleKelurahan(feature) {
                const namaKel = feature.properties.nama_kelurahan;
                const count = kelurahanData[namaKel] ? kelurahanData[namaKel].length : 0;
                return {
                    fillColor: getColorForKonflik(count, maxKonflik),
                    weight: 1, opacity: 0.85, color: '#ffffff', fillOpacity: 0.75
                };
            }

            function styleKecamatan(feature) {
                return {
                    fillColor: 'transparent', weight: 2.5, opacity: 1,
                    color: '#B40D14', fillOpacity: 0, interactive: false
                };
            }

            // Layer Kelurahan & Kecamatan
            kelurahanLayer = L.geoJson(geoJsonKelurahan, {
                style: styleKelurahan,
                onEachFeature: onEachKelurahanCombined
            }).addTo(map);

            kecamatanLayer = L.geoJson(geoJsonKecamatan, {
                style: styleKecamatan,
                interactive: false
            }).addTo(map);

            kelurahanLayer.bringToFront();
            kecamatanLayer.bringToFront();

            // Paskan dan kunci tampilan peta ke seluruh batas Kota Bandung
            if (kecamatanLayer) {
                const bandungBounds = kecamatanLayer.getBounds();
                map.fitBounds(bandungBounds, { padding: [15, 15] });
                map.setMaxBounds(bandungBounds.pad(0.08));
            }

            if (!map.legend) {
                map.legend = createColorLegend();
                map.legend.addTo(map);
            }

            // Update side panel for current view
            if (selectedKelurahanName) {
                focusKelurahanByName(selectedKelurahanName);
            } else {
                renderSidePanelDefault();
            }
        }

        function updateMap() {
            if (geoJsonKecamatan && geoJsonKelurahan) {
                updateMapWithGeoJson();
            } else {
                updateMapWithMarkers();
            }
        }

        function updateMapWithMarkers() {
            markers.forEach(marker => map.removeLayer(marker));
            markers = [];
            const filteredData = getFilteredData();
        }

        function getUrlParameter(name) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(name);
        }

        function initializeYearFilter() {
            const years = [...new Set(potensiKonfliks.map(item => {
                return new Date(item.tanggal).getFullYear();
            }))].sort((a, b) => b - a);
            
            const yearSelect = document.getElementById('yearFilter');
            years.forEach(year => {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                yearSelect.appendChild(option);
            });

            const urlYearFilter = getUrlParameter('year_filter');
            if (urlYearFilter) {
                yearSelect.value = urlYearFilter;
                currentYear = urlYearFilter;
            }
        }

        function reloadTableWithYearFilter(year) {
            const currentUrl = new URL(window.location.href);
            
            if (year) {
                currentUrl.searchParams.set('year_filter', year);
            } else {
                currentUrl.searchParams.delete('year_filter');
            }
            
            currentUrl.searchParams.delete('page');
            
            window.location.href = currentUrl.toString();
        }

        function updateCurrentView() {
            switch(currentView) {
                case 'gis-container':
                    updateMap();
                    updateMapsChartStatistics();
                    break;
                case 'table-container':
                    updateTableStatistics();
                    break;
            }
        }

        function updateVisualization() {
            updateCurrentView();
        }

        function updateTableStatistics() {
            const filteredData = getFilteredData();
            document.getElementById('totalKonflik').textContent = filteredData.length;
            const uniqueKecamatan = [...new Set(filteredData.map(item => item.lokasi_kecamatan))];
            document.getElementById('totalKecamatan').textContent = uniqueKecamatan.length;
            const uniqueKategori = [...new Set(filteredData.map(item => item.kategori))];
            document.getElementById('totalKategori').textContent = uniqueKategori.length;
            const konflikAktif = filteredData.filter(item => item.status === 'aktif').length;
            document.getElementById('konflikAktif').textContent = konflikAktif;
        }

        function updateMapsChartStatistics() {
            const filteredData = getFilteredData();
            document.getElementById('totalKonflik').textContent = filteredData.length;
            const uniqueKecamatan = [...new Set(filteredData.map(item => item.lokasi_kecamatan))];
            document.getElementById('totalKecamatan').textContent = uniqueKecamatan.length;
            const uniqueKategori = [...new Set(filteredData.map(item => item.kategori))];
            document.getElementById('totalKategori').textContent = uniqueKategori.length;
            const konflikAktif = filteredData.filter(item => item.status === 'aktif').length;
            document.getElementById('konflikAktif').textContent = konflikAktif;
        }

        let hasAnimated = false;
        function animateNumbers() {
            if (hasAnimated) return;
            hasAnimated = true;

            const statNumbers = document.querySelectorAll('.stat-number');
            statNumbers.forEach(element => {
                const target = parseInt(element.textContent);
                if (isNaN(target) || target <= 0) return;
                let current = 0;
                const increment = Math.max(1, Math.ceil(target / 25));
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    } else {
                        element.textContent = current;
                    }
                }, 20);
            });
        }
    </script>
@endsection
