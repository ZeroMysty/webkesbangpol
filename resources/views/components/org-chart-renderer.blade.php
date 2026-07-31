@props(['nodes' => null, 'connectorData' => []])

@php
    if (!$nodes || $nodes->isEmpty()) {
        echo '<div style="padding:60px 20px;text-align:center;color:#b0b8c9;"><i class="fas fa-sitemap" style="font-size:2.5rem;display:block;margin-bottom:12px;opacity:0.4;"></i><p style="font-size:0.95rem;">Belum ada data struktur organisasi.</p></div>';
        return;
    }

    $colorMap = [
        'blue' => '#3b82f6', 'red' => '#ef4444', 'green' => '#22c55e',
        'yellow' => '#eab308', 'purple' => '#a855f7', 'orange' => '#f97316',
        'teal' => '#14b8a6', 'pink' => '#ec4899', 'gray' => '#6b7280',
    ];

    // Normalize connector data arrays
    $savedWaypoints = $connectorData['waypoints'] ?? [];
    $savedColors    = $connectorData['colors']    ?? [];
    $savedStyles    = $connectorData['styles']    ?? [];
    $savedPorts     = $connectorData['ports']     ?? [];

    // Calculate bounding box
    $minX = $nodes->min('x') ?? 0;
    $minY = $nodes->min('y') ?? 0;
    $maxX = $nodes->max(function($n) { return ($n->x ?? 0) + 220; });
    $maxY = $nodes->max(function($n) { return ($n->y ?? 0) + 80; });

    $padding = 60;
    $totalW = max($maxX - $minX + $padding * 2, 800);
    $totalH = max($maxY - $minY + $padding * 2, 600);

    // Unique ID for this chart instance (to support multiple charts on one page)
    $uid = 'ocr-' . \Illuminate\Support\Str::random(6);
@endphp

<div class="org-chart-static" id="{{ $uid }}-wrap" style="position:relative;width:100%;overflow:auto;scrollbar-width:none;-ms-overflow-style:none;">
<style>.org-chart-static::-webkit-scrollbar{display:none}</style>
    <div style="position:relative;width:100%;min-width:{{ $totalW }}px;height:{{ $totalH }}px;min-height:500px;">

        {{-- SVG Connectors — initial estimated positions, will be corrected by JS --}}
        <svg id="{{ $uid }}-svg" style="position:absolute;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:1;overflow:visible;">
            @foreach($nodes as $node)
                @if($node->parent_id)
                    @php
                        $parent = $nodes->firstWhere('id', $node->parent_id);
                        if (!$parent) continue;
                        $connKey = $parent->id . '-' . $node->id;
                        $pColor = $colorMap[$savedColors[$connKey] ?? $parent->color] ?? ($colorMap[$parent->color] ?? '#8892a8');

                        // Use saved ports if available, else auto-detect
                        $pRect = ['x' => $parent->x ?? 0, 'y' => $parent->y ?? 0, 'w' => 200, 'h' => 65];
                        $cRect = ['x' => $node->x ?? 0, 'y' => $node->y ?? 0, 'w' => 200, 'h' => 65];
                        $pCx = $pRect['x'] + $pRect['w'] / 2;
                        $pCy = $pRect['y'] + $pRect['h'] / 2;
                        $cCx = $cRect['x'] + $cRect['w'] / 2;
                        $cCy = $cRect['y'] + $cRect['h'] / 2;
                        $dx = $cCx - $pCx;
                        $dy = $cCy - $pCy;

                        $savedPort = $savedPorts[$connKey] ?? null;
                        if ($savedPort && isset($savedPort['fromPort'], $savedPort['toPort'])) {
                            $fd = $savedPort['fromPort'];
                            $td = $savedPort['toPort'];
                            switch ($fd) {
                                case 'b': $x1 = $pCx; $y1 = $pRect['y'] + $pRect['h']; break;
                                case 't': $x1 = $pCx; $y1 = $pRect['y']; break;
                                case 'r': $x1 = $pRect['x'] + $pRect['w']; $y1 = $pCy; break;
                                default:  $x1 = $pRect['x']; $y1 = $pCy; break;
                            }
                            switch ($td) {
                                case 't': $x2 = $cCx; $y2 = $cRect['y']; break;
                                case 'b': $x2 = $cCx; $y2 = $cRect['y'] + $cRect['h']; break;
                                case 'r': $x2 = $cRect['x'] + $cRect['w']; $y2 = $cCy; break;
                                default:  $x2 = $cRect['x']; $y2 = $cCy; break;
                            }
                        } else {
                            if (abs($dy) >= abs($dx)) {
                                if ($dy >= 0) { $x1 = $pCx; $y1 = $pRect['y'] + $pRect['h']; $x2 = $cCx; $y2 = $cRect['y']; $fd = 'b'; $td = 't'; }
                                else         { $x1 = $pCx; $y1 = $pRect['y']; $x2 = $cCx; $y2 = $cRect['y'] + $cRect['h']; $fd = 't'; $td = 'b'; }
                            } else {
                                if ($dx >= 0) { $x1 = $pRect['x'] + $pRect['w']; $y1 = $pCy; $x2 = $cRect['x']; $y2 = $cCy; $fd = 'r'; $td = 'l'; }
                                else         { $x1 = $pRect['x']; $y1 = $pCy; $x2 = $cRect['x'] + $cRect['w']; $y2 = $cCy; $fd = 'l'; $td = 'r'; }
                            }
                        }

                        // Build path with saved waypoints
                        $wps = $savedWaypoints[$connKey] ?? [];
                        $styleType = isset($savedStyles[$connKey]['type']) ? $savedStyles[$connKey]['type'] : 'orthogonal';
                        $isDashed = isset($savedStyles[$connKey]['dash']) && $savedStyles[$connKey]['dash'] === 'dashed';

                        if ($styleType === 'straight') {
                            if (!empty($wps)) {
                                $d = "M $x1 $y1";
                                foreach ($wps as $wp) { $d .= " L {$wp['x']} {$wp['y']}"; }
                                $d .= " L $x2 $y2";
                            } else {
                                $d = "M $x1 $y1 L $x2 $y2";
                            }
                        } elseif ($styleType === 'curved') {
                            if (count($wps) === 1) {
                                $d = "M $x1 $y1 Q {$wps[0]['x']} {$wps[0]['y']} $x2 $y2";
                            } else {
                                $ddx = $x2 - $x1; $ddy = $y2 - $y1;
                                $cx1v = $x1; $cy1v = $y1 + $ddy * 0.5;
                                $cx2v = $x2; $cy2v = $y2 - $ddy * 0.5;
                                if ($fd === 'r' || $fd === 'l') { $cx1v = $x1 + $ddx * 0.5; $cy1v = $y1; }
                                if ($td === 'r' || $td === 'l') { $cx2v = $x2 - $ddx * 0.5; $cy2v = $y2; }
                                $d = "M $x1 $y1 C $cx1v $cy1v, $cx2v $cy2v, $x2 $y2";
                            }
                        } else {
                            // Orthogonal
                            if (!empty($wps)) {
                                $pts = [['x' => $x1, 'y' => $y1]];
                                foreach ($wps as $i => $wp) {
                                    $last = end($pts);
                                    if ($i === 0) {
                                        if ($fd === 'b' || $fd === 't') {
                                            $pts[] = ['x' => $last['x'], 'y' => $wp['y']];
                                            $pts[] = ['x' => $wp['x'], 'y' => $wp['y']];
                                        } else {
                                            $pts[] = ['x' => $wp['x'], 'y' => $last['y']];
                                            $pts[] = ['x' => $wp['x'], 'y' => $wp['y']];
                                        }
                                    } else {
                                        $pts[] = ['x' => $last['x'], 'y' => $wp['y']];
                                        $pts[] = ['x' => $wp['x'], 'y' => $wp['y']];
                                    }
                                }
                                $lastPt = end($pts);
                                if ($td === 't' || $td === 'b') {
                                    $pts[] = ['x' => $lastPt['x'], 'y' => $y2];
                                    $pts[] = ['x' => $x2, 'y' => $y2];
                                } else {
                                    $pts[] = ['x' => $x2, 'y' => $lastPt['y']];
                                    $pts[] = ['x' => $x2, 'y' => $y2];
                                }
                                // Deduplicate
                                $clean = [];
                                foreach ($pts as $pt) {
                                    if (empty($clean) || abs($clean[count($clean)-1]['x'] - $pt['x']) > 0.5 || abs($clean[count($clean)-1]['y'] - $pt['y']) > 0.5) {
                                        $clean[] = $pt;
                                    }
                                }
                                $d = "M {$clean[0]['x']} {$clean[0]['y']}";
                                for ($pi = 1; $pi < count($clean); $pi++) {
                                    $d .= " L {$clean[$pi]['x']} {$clean[$pi]['y']}";
                                }
                            } else {
                                if (($fd === 'b' || $fd === 't') && ($td === 't' || $td === 'b')) {
                                    $midY = ($y1 + $y2) / 2;
                                    $d = "M $x1 $y1 L $x1 $midY L $x2 $midY L $x2 $y2";
                                } elseif (($fd === 'l' || $fd === 'r') && ($td === 'l' || $td === 'r')) {
                                    $midX = ($x1 + $x2) / 2;
                                    $d = "M $x1 $y1 L $midX $y1 L $midX $y2 L $x2 $y2";
                                } elseif (($fd === 'b' || $fd === 't') && ($td === 'l' || $td === 'r')) {
                                    $d = "M $x1 $y1 L $x1 $y2 L $x2 $y2";
                                } else {
                                    $d = "M $x1 $y1 L $x2 $y1 L $x2 $y2";
                                }
                            }
                        }

                        $arrowLen = 10; $arrowWid = 6;
                        $ax = $x2; $ay = $y2;
                        switch ($td) {
                            case 't': $pts2 = ($ax-$arrowWid).','.($ay+$arrowWid).' '.$ax.','.$ay.' '.($ax+$arrowWid).','.($ay+$arrowWid); break;
                            case 'b': $pts2 = ($ax-$arrowWid).','.($ay-$arrowWid).' '.$ax.','.$ay.' '.($ax+$arrowWid).','.($ay-$arrowWid); break;
                            case 'l': $pts2 = ($ax+$arrowWid).','.($ay-$arrowWid).' '.$ax.','.$ay.' '.($ax+$arrowWid).','.($ay+$arrowWid); break;
                            case 'r': $pts2 = ($ax-$arrowWid).','.($ay-$arrowWid).' '.$ax.','.$ay.' '.($ax-$arrowWid).','.($ay+$arrowWid); break;
                            default:  $pts2 = '';
                        }
                        $dashAttr = $isDashed ? 'stroke-dasharray="6,4"' : '';
                    @endphp
                    {{-- Shadow path --}}
                    <path data-conn="{{ $parent->id }}-{{ $node->id }}" d="{{ $d }}" stroke="rgba(0,0,0,0.05)" stroke-width="7" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                    {{-- Main connector path --}}
                    <path data-conn="{{ $parent->id }}-{{ $node->id }}" d="{{ $d }}" stroke="{{ $pColor }}" stroke-width="2.5" fill="none" stroke-linejoin="round" stroke-linecap="round" {!! $dashAttr !!} />
                    @if($pts2)
                    <polygon data-conn="{{ $parent->id }}-{{ $node->id }}" points="{{ $pts2 }}" fill="{{ $pColor }}" />
                    @endif
                @endif
            @endforeach
        </svg>

        {{-- Nodes with data-id (required by JS to compute actual dimensions) --}}
        @foreach($nodes as $node)
            @php
                $colorHex = $colorMap[$node->color] ?? '#3b82f6';
                $hasName = $node->nama && $node->nama !== '-';
            @endphp
            <div class="builder-node" data-id="{{ $node->id }}" style="position:absolute;left:{{ $node->x ?? 0 }}px;top:{{ $node->y ?? 0 }}px;cursor:default;">
                <div class="node-header">
                    <span class="node-color-dot" style="background:{{ $colorHex }};"></span>
                    <span class="node-jabatan">{{ $node->jabatan }}</span>
                </div>
                <div class="node-body">
                    <div class="node-nama{{ !$hasName ? ' empty' : '' }}">
                        {{ $hasName ? $node->nama : '[Kosong]' }}
                    </div>
                    @if($node->nip && $node->nip !== '-')
                        <div class="node-nip">{{ $node->nip }}</div>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
</div>

{{-- JS: Recalculate connector paths using actual DOM dimensions (matching dashboard logic) --}}
<script>
(function() {
    'use strict';
    var wrap = document.getElementById('{{ $uid }}-wrap');
    if (!wrap) return;
    var svgEl = document.getElementById('{{ $uid }}-svg');
    if (!svgEl) return;

    var colorMap = @json($colorMap);

    // Saved connector data from database
    var savedWaypoints = @json($savedWaypoints);
    var savedColors    = @json($savedColors);
    var savedStyles    = @json($savedStyles);
    var savedPorts     = @json($savedPorts);

    var nodesData = @json($nodes);
    var nodesMap = {};
    nodesData.forEach(function(n) { nodesMap[n.id] = n; });

    function getNodeEl(id) { return wrap.querySelector('.builder-node[data-id="' + id + '"]'); }

    function getNodeRect(id) {
        var n = nodesMap[id];
        if (!n) return null;
        var el = getNodeEl(id);
        var w = 200, h = 65;
        if (el) {
            var r = el.getBoundingClientRect();
            if (r.width > 0)  w = r.width;
            if (r.height > 0) h = r.height;
        }
        return {
            x: n.x || 0,
            y: n.y || 0,
            w: w,
            h: h
        };
    }

    function getNodePorts(id) {
        var r = getNodeRect(id);
        if (!r) return null;
        return {
            t: { x: r.x + r.w / 2, y: r.y },
            b: { x: r.x + r.w / 2, y: r.y + r.h },
            l: { x: r.x,           y: r.y + r.h / 2 },
            r: { x: r.x + r.w,     y: r.y + r.h / 2 }
        };
    }

    function getBestPorts(parentId, childId) {
        var pp = getNodePorts(parentId);
        var cp = getNodePorts(childId);
        if (!pp || !cp) return null;
        var pr = getNodeRect(parentId);
        var cr = getNodeRect(childId);
        var dx = (cr.x + cr.w / 2) - (pr.x + pr.w / 2);
        var dy = (cr.y + cr.h / 2) - (pr.y + pr.h / 2);
        if (Math.abs(dy) >= Math.abs(dx)) {
            if (dy >= 0) return { from: pp.b, to: cp.t, fd: 'b', td: 't' };
            else         return { from: pp.t, to: cp.b, fd: 't', td: 'b' };
        } else {
            if (dx >= 0) return { from: pp.r, to: cp.l, fd: 'r', td: 'l' };
            else         return { from: pp.l, to: cp.r, fd: 'l', td: 'r' };
        }
    }

    function getOrthogonalPts(x1, y1, x2, y2, fd, td, wps) {
        if (wps && wps.length > 0) {
            var pts = [{ x: x1, y: y1 }];
            for (var i = 0; i < wps.length; i++) {
                var last = pts[pts.length - 1];
                var wp = wps[i];
                if (i === 0) {
                    if (fd === 'b' || fd === 't') {
                        pts.push({ x: last.x, y: wp.y });
                        pts.push({ x: wp.x, y: wp.y });
                    } else {
                        pts.push({ x: wp.x, y: last.y });
                        pts.push({ x: wp.x, y: wp.y });
                    }
                } else {
                    pts.push({ x: last.x, y: wp.y });
                    pts.push({ x: wp.x, y: wp.y });
                }
            }
            var lastPt = pts[pts.length - 1];
            if (td === 't' || td === 'b') {
                pts.push({ x: lastPt.x, y: y2 });
                pts.push({ x: x2, y: y2 });
            } else {
                pts.push({ x: x2, y: lastPt.y });
                pts.push({ x: x2, y: y2 });
            }
            var clean = [];
            pts.forEach(function(p) {
                if (clean.length === 0 || Math.abs(clean[clean.length - 1].x - p.x) > 0.5 || Math.abs(clean[clean.length - 1].y - p.y) > 0.5) {
                    clean.push(p);
                }
            });
            return clean;
        }
        if ((fd === 'b' || fd === 't') && (td === 't' || td === 'b')) {
            var midY = Math.round((y1 + y2) / 2);
            return [{ x: x1, y: y1 }, { x: x1, y: midY }, { x: x2, y: midY }, { x: x2, y: y2 }];
        }
        if ((fd === 'l' || fd === 'r') && (td === 'l' || td === 'r')) {
            var midX = Math.round((x1 + x2) / 2);
            return [{ x: x1, y: y1 }, { x: midX, y: y1 }, { x: midX, y: y2 }, { x: x2, y: y2 }];
        }
        if ((fd === 'b' || fd === 't') && (td === 'l' || td === 'r')) {
            return [{ x: x1, y: y1 }, { x: x1, y: y2 }, { x: x2, y: y2 }];
        }
        if ((fd === 'l' || fd === 'r') && (td === 't' || td === 'b')) {
            return [{ x: x1, y: y1 }, { x: x2, y: y1 }, { x: x2, y: y2 }];
        }
        return [{ x: x1, y: y1 }, { x: x1, y: y2 }, { x: x2, y: y2 }];
    }

    function buildPath(x1, y1, x2, y2, wps, fd, td, styleType) {
        styleType = styleType || 'orthogonal';
        if (styleType === 'straight') {
            if (wps && wps.length > 0) {
                var d = 'M ' + x1 + ' ' + y1;
                wps.forEach(function(wp) { d += ' L ' + wp.x + ' ' + wp.y; });
                return d + ' L ' + x2 + ' ' + y2;
            }
            return 'M ' + x1 + ' ' + y1 + ' L ' + x2 + ' ' + y2;
        }
        if (styleType === 'curved') {
            if (wps && wps.length === 1) {
                return 'M ' + x1 + ' ' + y1 + ' Q ' + wps[0].x + ' ' + wps[0].y + ' ' + x2 + ' ' + y2;
            }
            var dx = x2 - x1, dy = y2 - y1;
            var cx1 = x1, cy1 = y1 + dy * 0.5;
            var cx2 = x2, cy2 = y2 - dy * 0.5;
            if (fd === 'r' || fd === 'l') { cx1 = x1 + dx * 0.5; cy1 = y1; }
            if (td === 'r' || td === 'l') { cx2 = x2 - dx * 0.5; cy2 = y2; }
            return 'M ' + x1 + ' ' + y1 + ' C ' + cx1 + ' ' + cy1 + ', ' + cx2 + ' ' + cy2 + ', ' + x2 + ' ' + y2;
        }
        var pts = getOrthogonalPts(x1, y1, x2, y2, fd, td, wps);
        var res = 'M ' + pts[0].x + ' ' + pts[0].y;
        for (var i = 1; i < pts.length; i++) {
            res += ' L ' + pts[i].x + ' ' + pts[i].y;
        }
        return res;
    }

    function arrowheadPoints(x, y, td) {
        var wid = 6;
        switch (td) {
            case 't': return (x-wid)+','+(y+wid)+' '+x+','+y+' '+(x+wid)+','+(y+wid);
            case 'b': return (x-wid)+','+(y-wid)+' '+x+','+y+' '+(x+wid)+','+(y-wid);
            case 'l': return (x+wid)+','+(y-wid)+' '+x+','+y+' '+(x+wid)+','+(y+wid);
            case 'r': return (x-wid)+','+(y-wid)+' '+x+','+y+' '+(x-wid)+','+(y+wid);
        }
        return '';
    }

    function recalculateConnectors() {
        var paths = svgEl.querySelectorAll('[data-conn]');
        if (paths.length === 0) return;
        var connectors = {};
        paths.forEach(function(p) {
            var key = p.getAttribute('data-conn');
            if (!connectors[key]) connectors[key] = {};
            var tag = p.tagName.toLowerCase();
            if (tag === 'path') {
                if (p.getAttribute('stroke-width') === '7') connectors[key].shadow = p;
                else connectors[key].main = p;
            } else if (tag === 'polygon') {
                connectors[key].arrow = p;
            }
        });

        Object.keys(connectors).forEach(function(key) {
            var parts = key.split('-');
            if (parts.length < 2) return;
            var parentId = parseInt(parts[0]);
            var childId  = parseInt(parts[1]);
            if (!parentId || !childId) return;

            var c = connectors[key];

            // Get port info: use saved ports first, else auto-detect
            var x1, y1, x2, y2, fd, td;
            var sp = savedPorts[key];
            if (sp && sp.fromPort && sp.toPort) {
                var pp = getNodePorts(parentId);
                var cp = getNodePorts(childId);
                if (!pp || !cp) return;
                fd = sp.fromPort; td = sp.toPort;
                x1 = pp[fd].x; y1 = pp[fd].y;
                x2 = cp[td].x; y2 = cp[td].y;
            } else {
                var best = getBestPorts(parentId, childId);
                if (!best) return;
                x1 = best.from.x; y1 = best.from.y;
                x2 = best.to.x;   y2 = best.to.y;
                fd = best.fd;     td = best.td;
            }

            var wps = savedWaypoints[key] || [];
            var styleType = (savedStyles[key] && savedStyles[key].type) ? savedStyles[key].type : 'orthogonal';
            var isDashed  = savedStyles[key] && savedStyles[key].dash === 'dashed';

            var pColor = '#8892a8';
            // Get parent color from DOM node
            var parentEl = getNodeEl(parentId);
            if (parentEl) {
                var dot = parentEl.querySelector('.node-color-dot');
                if (dot) pColor = dot.style.background || '#8892a8';
            }
            // Override with saved connector color
            if (savedColors[key]) {
                var colorNames = {
                    blue:'#3b82f6', red:'#ef4444', green:'#22c55e', yellow:'#eab308',
                    purple:'#a855f7', orange:'#f97316', teal:'#14b8a6', pink:'#ec4899', gray:'#6b7280'
                };
                pColor = colorNames[savedColors[key]] || pColor;
            }

            var d = buildPath(x1, y1, x2, y2, wps, fd, td, styleType);
            var arrowPts = arrowheadPoints(x2, y2, td);

            if (c.shadow) c.shadow.setAttribute('d', d);
            if (c.main) {
                c.main.setAttribute('d', d);
                c.main.setAttribute('stroke', pColor);
                if (isDashed) {
                    c.main.setAttribute('stroke-dasharray', '6,4');
                } else {
                    c.main.removeAttribute('stroke-dasharray');
                }
            }
            if (c.arrow) {
                c.arrow.setAttribute('points', arrowPts);
                c.arrow.setAttribute('fill', pColor);
            }
        });
    }

    // Run after DOM is ready, and also on resize
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', recalculateConnectors);
    } else {
        recalculateConnectors();
    }
    // Re-run on resize with debounce
    var resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(recalculateConnectors, 150);
    });
})();
</script>
