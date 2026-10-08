<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        :root {
            --navy: #0c2f4e;
            --navy-soft: #1b4b73;
            --red: #b40d14;
            --gold: #f4d06f;
            --paper: #f9f7f3;
            --text: #1f2937;
            --muted: #667085;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            background:
                linear-gradient(rgba(12, 47, 78, 0.84), rgba(12, 47, 78, 0.84)),
                url('/images/component/hero-city.svg') center/cover no-repeat fixed;
            color: var(--text);
        }

        .article-wrap {
            min-height: 100vh;
            padding: 60px 20px;
        }

        .article-shell {
            max-width: 980px;
            margin: 0 auto;
        }

        .article-card {
            background: rgba(255, 255, 255, 0.95);
            border: 0;
            border-radius: 22px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.18);
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.2);
        }

        .article-image-wrap {
            position: relative;
            background: linear-gradient(135deg, rgba(180, 13, 20, 0.08), rgba(12, 47, 78, 0.12));
            padding: 22px 22px 0;
        }

        .article-image {
            width: 100%;
            height: 520px;
            object-fit: cover;
            object-position: center;
            border-radius: 18px 18px 0 0;
            display: block;
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .article-body {
            padding: 30px 34px 42px;
        }

        .article-badge {
            display: inline-block;
            margin-bottom: 18px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(180, 13, 20, 0.08);
            color: var(--red);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .article-title {
            margin: 0 0 18px;
            color: var(--navy);
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 800;
            line-height: 1.15;
        }

        .article-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 28px;
            color: var(--muted);
            font-size: 0.9rem;
        }

        .article-meta span {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px;
            background: #f3f4f6;
            border-radius: 999px;
        }

        .article-content {
            color: var(--text);
            font-size: 1.04rem;
            line-height: 1.9;
        }

        .article-content p {
            margin-bottom: 1.25rem;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 16px;
            margin: 18px 0;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.12);
        }

        .article-content h1,
        .article-content h2,
        .article-content h3,
        .article-content h4,
        .article-content h5,
        .article-content h6 {
            color: var(--navy);
            margin-top: 1.8rem;
            margin-bottom: 0.8rem;
            font-weight: 700;
        }

        .article-content blockquote {
            border-left: 4px solid var(--gold);
            background: #fffaf0;
            padding: 14px 18px;
            border-radius: 10px;
            color: #5b4b32;
            margin: 22px 0;
        }

        .article-content ul,
        .article-content ol {
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        @media (max-width: 767px) {
            .article-wrap {
                padding: 28px 12px;
            }

            .article-body {
                padding: 22px 18px 28px;
            }

            .article-image {
                height: 320px;
            }
        }
    </style>
</head>

<body>
    <div class="article-wrap">
        <div class="article-shell">
            <div class="article-card">
                <div class="article-image-wrap">
                    <img src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}" class="article-image">
                </div>

                <div class="article-body">
                    <div class="article-badge">Artikel</div>
                    <h1 class="article-title">{{ $post->title }}</h1>

                    <div class="article-meta">
                        <span>📅 {{ \Carbon\Carbon::parse($post->created_at)->translatedFormat('d F Y') }}</span>
                        <span>👤 Admin</span>
                    </div>

                    <div class="article-content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>