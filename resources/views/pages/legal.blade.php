@extends('layouts.index')

@section('title', 'Lhena.ma - ' . $title)

@section('content')
    <main class="px-5 pb-20 pt-24 sm:px-8 lg:px-10">
        <div class="mx-auto max-w-4xl">
            <div class="mb-6 rounded-xl border border-[#e8dcc3] bg-[#faf6ed] px-5 py-4 text-sm leading-6 text-[#716142]">
                Document de travail : les informations entre crochets restent à compléter. Le contenu et les pratiques décrites doivent être vérifiés par LHENA avant publication définitive.
            </div>

            <article class="legal-document rounded-2xl border border-[#e7ece8] bg-white px-6 py-8 shadow-sm sm:px-10 sm:py-10">
                {!! \Illuminate\Support\Str::markdown(file_get_contents($documentPath)) !!}
            </article>

            <p class="mt-6 text-sm text-[#68736d]">
                <a class="font-semibold text-[#0b3b31] underline-offset-4 hover:underline"
                    href="{{ route($otherDocumentRoute) }}">{{ $otherDocumentLabel }}</a>
            </p>
        </div>
    </main>

    <style>
        .legal-document {
            color: #3d433f;
            font-size: 15px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .legal-document h1,
        .legal-document h2,
        .legal-document h3 {
            color: #0b3b31;
            font-weight: 700;
            line-height: 1.35;
        }

        .legal-document h1 {
            margin-bottom: 0.75rem;
            font-size: clamp(1.7rem, 4vw, 2.25rem);
        }

        .legal-document h2 {
            margin-top: 2rem;
            margin-bottom: 0.75rem;
            border-bottom: 1px solid #e7ece8;
            padding-bottom: 0.45rem;
            font-size: 1.35rem;
        }

        .legal-document h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.5rem;
            font-size: 1.05rem;
        }

        .legal-document p {
            margin-top: 0.8rem;
            margin-bottom: 0.8rem;
        }

        .legal-document ul,
        .legal-document ol {
            margin: 0.75rem 0 1rem;
            padding-left: 1.5rem;
        }

        .legal-document ul {
            list-style: disc;
        }

        .legal-document ol {
            list-style: decimal;
        }

        .legal-document li {
            margin-top: 0.25rem;
        }

        .legal-document a {
            color: #0b3b31;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .legal-document strong {
            color: #29332d;
        }

        @media (max-width: 640px) {
            .legal-document {
                font-size: 14px;
            }
        }
    </style>
@endsection
