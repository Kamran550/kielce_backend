<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaświadczenie o statusie studenta - {{ $student->first_name }} {{ $student->last_name }}</title>
    <style>
        @page {
            margin: 9mm 10mm 9mm 10mm;
            size: A4;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'DejaVu Sans', Helvetica, Arial, sans-serif;
            font-size: 7pt;
            line-height: 1.35;
            color: #1c1c1c;
            margin: 0;
            padding: 0;
            background: #fff;
        }

        .page-content {
            padding-bottom: 30mm;
        }

        .page-bottom-fixed {
            position: fixed;
            left: 0;
            right: 0;
            bottom: 0;
            width: auto;
            page-break-inside: avoid;
        }

        /* ===== OUTER FRAME ===== */
        .outer-frame {
            border: 1.5px solid #14532d;
            padding: 7px 9px;
            margin-bottom: 8px;
        }

        /* ===== HEADER: centered card, not two-column split ===== */
        .letterhead {
            text-align: center;
            border-bottom: 1px solid #cfd8cf;
            padding-bottom: 6px;
            margin-bottom: 5px;
        }

        .uni-pl {
            font-family: 'DejaVu Serif', Georgia, serif;
            font-size: 12.5pt;
            font-weight: bold;
            letter-spacing: 0.03em;
            color: #14532d;
            margin: 0;
            line-height: 1;
        }

        .uni-en {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 7pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.15em;
            color: #666;
            margin: 3px 0 0 0;
        }

        .uni-sub {
            font-size: 6pt;
            color: #777;
            margin: 3px 0 0 0;
        }

        .contact-strip {
            width: 100%;
            font-size: 6.2pt;
            color: #444;
            text-align: center;
            margin-top: 4px;
        }

        .contact-strip span {
            margin: 0 6px;
        }

        .contact-strip .lbl {
            color: #14532d;
            font-weight: bold;
        }

        /* ===== TITLE: ribbon style, centered ===== */
        .doc-title {
            text-align: center;
            margin: 2px 0 6px 0;
        }

        .doc-title .pl {
            display: inline-block;
            font-size: 9pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: #fff;
            background: #14532d;
            padding: 4px 14px;
            margin: 0;
        }

        .doc-title .en {
            font-size: 7.3pt;
            font-style: italic;
            color: #555;
            margin: 3px 0 0 0;
        }

        /* ===== PROFILE PHOTO (added) ===== */
        .title-row-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2px 0 6px 0;
            border: none;
        }

        .title-row-table td {
            padding: 0;
            border: none;
        }

        .title-row-table td.title-cell {
            width: 80%;
            vertical-align: middle;
        }

        .title-row-table td.title-cell .doc-title {
            margin: 0;
        }

        .title-row-table td.photo-cell {
            width: 20%;
            text-align: right;
            vertical-align: top;
        }

        .photo-box {
            width: 19mm;
            height: 22mm;
            border: none;
            padding: 1px;
            margin-left: auto;
            background: #fff;
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-placeholder {
            width: 100%;
            height: 100%;
            text-align: center;
            font-size: 5.3pt;
            color: #999;
            border: 1px dashed #ccc;
            padding-top: 8px;
        }

        /* ===== META: right aligned small table under title ===== */
        .meta-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 6.4pt;
            color: #444;
            margin-bottom: 7px;
        }

        .meta-table td {
            padding: 0;
        }

        .meta-table .right {
            text-align: right;
        }

        .meta-table strong {
            color: #14532d;
        }

        /* ===== OPENING DECLARATION (moved to top, before data) ===== */
        .declaration {
            background: #f3f6f3;
            border-left: 3px solid #14532d;
            padding: 6px 9px;
            margin-bottom: 9px;
            font-size: 6.9pt;
            line-height: 1.4;
        }

        .declaration .lang-tag {
            display: inline-block;
            font-size: 5.7pt;
            font-weight: bold;
            color: #14532d;
            border: 1px solid #14532d;
            border-radius: 2px;
            padding: 0 4px;
            margin-bottom: 3px;
        }

        .declaration p {
            margin: 0 0 5px 0;
            text-align: justify;
        }

        .declaration p:last-child {
            margin-bottom: 0;
        }

        /* ===== SECTION LABELS: underline tab style ===== */
        .section-tag {
            font-size: 7pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #14532d;
            border-bottom: 2px solid #14532d;
            padding-bottom: 2px;
            margin: 8px 0 4px 0;
        }

        /* ===== FIELD TABLE: single-line label:value, zebra striping, no borders ===== */
        .field-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 6.8pt;
            margin-bottom: 4px;
            table-layout: fixed;
        }

        .field-table tr:nth-child(odd) {
            background: #f3f6f3;
        }

        .field-table td {
            padding: 3.5px 7px;
            vertical-align: middle;
            width: 50%;
        }

        .field-table .k {
            color: #666;
        }

        .field-table .v {
            font-weight: bold;
            color: #111;
        }

        /* ===== SIGNATURE: inline, left-aligned, part of content flow ===== */
        .sig-inline {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0 2px 0;
        }

        .sig-inline td {
            vertical-align: top;
            padding: 0;
        }

        .sig-graphic-wrap {
            position: relative;
            min-height: 34px;
            text-align: left;
        }

        .sig-stamp-overlay {
            position: absolute;
            left: 88px;
            bottom: -4px;
            width: 52px;
            height: auto;
            max-height: 54px;
            object-fit: contain;
            opacity: 0.82;
        }

        .e-sign-box {
            border-top: 2px solid #14532d;
            padding: 5px 0 0 0;
            text-align: left;
            line-height: 1.3;
            max-width: 190px;
            font-size: 6.65pt;
        }

        .e-sign-badge {
            font-weight: bold;
            font-size: 6.4pt;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: #14532d;
            margin-bottom: 4px;
        }

        .e-sign-name {
            font-weight: bold;
            color: #111;
            font-size: 7pt;
            margin-top: 2px;
        }

        .e-sign-title {
            font-size: 6.3pt;
            color: #444;
            line-height: 1.3;
        }

        /* ===== VERIFICATION BAND: inverted dark strip, fixed at page bottom ===== */
        .verify-band {
            background: #14532d;
            color: #fff;
            padding: 5px 10px;
        }

        .verify-band-header {
            font-size: 6.2pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 3px;
            color: #e8f0e8;
        }

        .verify-table {
            width: 100%;
            border-collapse: collapse;
        }

        .verify-table td {
            vertical-align: middle;
            padding: 0;
        }

        .verify-table .text-cell {
            font-size: 5.9pt;
            line-height: 1.4;
            color: #eef3ee;
            text-align: left;
        }

        .verify-table .text-cell strong {
            color: #fff;
        }

        .verify-table .code-cell {
            width: 30%;
            font-size: 5.8pt;
            padding-left: 8px;
            border-left: 1px solid #3f7350;
        }

        .verify-table .qr-cell {
            width: 44px;
            text-align: center;
            padding-left: 8px;
        }

        .verify-table .qr-cell img {
            width: 40px;
            height: 40px;
            display: block;
            background: #fff;
            padding: 2px;
        }

        .verification-url {
            word-break: break-all;
            font-family: 'DejaVu Sans Mono', monospace;
            font-size: 5.3pt;
            color: #cfe8d4;
        }

        .footer-line {
            text-align: center;
            font-size: 5.9pt;
            color: #fff;
            background: #0e3d20;
            margin: 0;
            padding: 3px 0;
            line-height: 1.25;
        }

        @media print {
            body {
                margin: 0;
            }
        }
    </style>
</head>

<body>

    @php
        $program = $student->application?->program;
        $degree = $program?->degree;
        $faculty = $program?->faculty;

        $programNameEn = $program?->getName('EN') ?: $program?->name ?? 'N/A';
        $programNamePl = $program?->getName('PL') ?: $programNameEn;
        $degreeNameEn = $degree?->getName('EN') ?: $degree?->name ?? 'N/A';
        $degreeNamePl = $degree?->getName('PL') ?: $degreeNameEn;
        $facultyNameEn = $faculty?->getName('EN') ?: $faculty?->name ?? 'Institute of Graduate Education';
        $facultyNamePl = $faculty?->getName('PL') ?: $facultyNameEn;

        $studyLangCode = strtoupper($student->study_language ?? 'EN');
        $studyLangEn = 'English';
        $studyLangDisplay = language_to_polish($studyLangEn);

        $nationalityDisplay = nationality_to_polish($student->nationality);
        $placeOfBirthDisplay = nationality_to_polish($student->place_of_birth ?? $student->nationality);

        $educationTypeEn = 'Full time';
        $educationTypePl = 'Studia stacjonarne';

        $classYear = $student->current_course ?? 1;
        $classEn = "Lesson stage ({$classYear}st year)";
        $classPl = "Etap zajęć ({$classYear}. rok studiów)";

        $scholarshipStatus = $student->scholarship_status ?? '75%';
        $scholarshipEn = "{$scholarshipStatus} Scholarship";
        $scholarshipPl = '%50 Stypendium';

        if (str_contains($scholarshipStatus, '100')) {
            $scholarshipPl = '100% Stypendium';
        } elseif (str_contains($scholarshipStatus, '75')) {
            $scholarshipPl = '%75 Stypendium';
        } elseif (str_contains($scholarshipStatus, '50')) {
            $scholarshipPl = '%50 Stypendium';
        } else {
            $scholarshipPl = $scholarshipStatus . ' Stypendium';
        }

        $startYear = $student->graduation_year ?? now()->year;
        $endYear = $startYear + 1;
        $academicYearEn = "{$startYear}-{$endYear} academic year";
        $academicYearPl = "Rok akademicki {$startYear}-{$endYear}";

        $genderDisplay = $student->gender
            ? (strtolower($student->gender) === 'male'
                ? 'Mężczyzna / Male'
                : (strtolower($student->gender) === 'female'
                    ? 'Kobieta / Female'
                    : ucfirst($student->gender)))
            : 'N/A';

        $duration = $degree?->duration ?? 4;
        $durationPl = $duration === 1 ? 'rok' : ($duration < 5 ? 'lata' : 'lat');

        $stampPath = public_path('images/kielce-möhür.png');
        $stampData = file_exists($stampPath) ? base64_encode(file_get_contents($stampPath)) : '';

        $signaturePath = public_path('images/imza.png');

        $verificationCodeForUrl = $verificationCode ?? null;
        $verificationUrl = $student->getVerificationUrl($verificationCodeForUrl);
        $codeForEntry = isset($digitCode) && $digitCode !== null ? trim((string) $digitCode) : '—';
        $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')->size(48)->generate($verificationUrl);
        $qrCodeBase64 = base64_encode($qrCode);

        // --- Profile photo (added) ---
        $photoData = null;
        $photoMime = 'image/jpeg';

        if ($student->profile_photo_path && Storage::exists($student->profile_photo_path)) {
            try {
                $photoContent = Storage::get($student->profile_photo_path);
                if ($photoContent) {
                    $photoData = base64_encode($photoContent);
                    $extension = strtolower(pathinfo($student->profile_photo_path, PATHINFO_EXTENSION));
                    $photoMime = match ($extension) {
                        'jpg', 'jpeg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                        'webp' => 'image/webp',
                        default => 'image/jpeg',
                    };
                }
            } catch (\Exception $e) {
                $photoData = null;
            }
        }
    @endphp

    <div class="page-content">
    <div class="outer-frame">

    {{-- Header (Biuro Spraw Studenckich / Student Affairs Office) --}}
    <div class="letterhead">
        <div class="uni-pl">UNIWERSYTET KIELCE</div>
        <div class="uni-en">Kielce University</div>
        <p class="uni-sub">Biuro Spraw Studenckich / Student Affairs Office</p>
        <div class="contact-strip">
            <span><span class="lbl">Tel:</span> +48 73 947 16 22</span>|
            <span><span class="lbl">KIELCE, Poland</span></span>|
            <span><span class="lbl">E-mail:</span> admission@kielceuniversity.pl</span>
        </div>
    </div>

    {{-- Title row: PL/EN title on the left, profile photo on the right (added) --}}
    <table class="title-row-table">
        <tr>
            <td class="title-cell">
                <div class="doc-title">
                    <p class="pl">Zaświadczenie o statusie studenta</p>
                    <p class="en">Certificate of Student Status</p>
                </div>
            </td>
            <td class="photo-cell">
                <div class="photo-box">
                    @if ($photoData)
                        <img src="data:{{ $photoMime }};base64,{{ $photoData }}" alt="">
                    @else
                        <div class="photo-placeholder">Foto<br>N/A</div>
                    @endif
                </div>
            </td>
        </tr>
    </table>

    <table class="meta-table">
        <tr>
            <td>
                <strong>Nr dokumentu / Document Number:</strong>
                {{ $student->application_number ?? now()->format('d/m/Y') }}/{{ str_pad($student->id, 3, '0', STR_PAD_LEFT) }}
            </td>
            <td class="right">
                <strong>Data wydania / Date of Issue:</strong> {{ now()->format('d.m.Y') }}
            </td>
        </tr>
    </table>

    {{-- Opening declaration moved to the top, above the data sections --}}
    <div class="declaration">
        <span class="lang-tag">PL</span>
        <p>Osoba, której dane wskazano powyżej, jest zarejestrowanym studentem naszej uczelni. Przewidywany
            czas trwania programu wynosi {{ $duration }} {{ $durationPl }}. Zgodnie z odpowiednimi
            przepisami
            Regulaminu Studiów, student zobowiązany jest do spełniania wymogów programu. Niniejsze zaświadczenie
            wydano na wniosek osoby, której dotyczy. Oczekuje się osiągnięcia etapu ukończenia studiów w roku
            akademickim {{ $startYear }}-{{ $endYear }}.</p>

        <span class="lang-tag">EN</span>
        <p>The person named above is a registered student of our university. The foreseen duration of the
            programme is {{ $duration }} years. In accordance with the Study Regulations, the
            student must fulfil programme requirements. This certificate is issued upon the request of the
            person concerned. Graduation is expected in the {{ $startYear }}-{{ $endYear }} academic
            year.</p>
    </div>

    <div class="section-tag">Dane studenta / Student Information</div>
    <table class="field-table">
        <tr>
            <td><span class="k">Imię i nazwisko / Full Name:</span> <span class="v">{{ tr_upper($student->first_name) }} {{ tr_upper($student->last_name) }}</span></td>
            <td><span class="k">Imię ojca / Father's Name:</span> <span class="v">{{ tr_upper($student->father_name ?? 'N/A') }}</span></td>
        </tr>
        <tr>
            <td><span class="k">Data urodzenia / Date of Birth:</span> <span class="v">{{ $student->date_of_birth ? $student->date_of_birth->format('d.m.Y') : 'N/A' }}</span></td>
            <td><span class="k">Płeć / Gender:</span> <span class="v">{{ $genderDisplay }}</span></td>
        </tr>
        <tr>
            <td><span class="k">Miejsce urodzenia / Place of Birth:</span> <span class="v">{{ $placeOfBirthDisplay }}</span></td>
            <td><span class="k">Numer albumu / Student ID Number:</span> <span class="v">{{ $student->student_number ?? 'N/A' }}</span></td>
        </tr>
        <tr>
            <td><span class="k">Obywatelstwo / Nationality:</span> <span class="v">{{ $nationalityDisplay }}</span></td>
            <td><span class="k">Adres e-mail / E-mail Address:</span> <span class="v">{{ $student->email ?? 'N/A' }}</span></td>
        </tr>
        <tr>
            <td><span class="k">Numer dokumentu / Passport Number:</span> <span class="v">{{ $student->passport_number ?? 'N/A' }}</span></td>
            <td><span class="k">Numer telefonu / Phone Number:</span> <span class="v">{{ $student->phone ?? 'N/A' }}</span></td>
        </tr>
    </table>

    <div class="section-tag">Dane programu / Programme Information</div>
    <table class="field-table">
        <tr>
            <td><span class="k">Kierunek studiów / Study Programme:</span> <span class="v">{{ $programNamePl }} / {{ $programNameEn }}</span></td>
            <td><span class="k">Wydział / Faculty:</span> <span class="v">{{ $facultyNamePl }} / {{ $facultyNameEn }}</span></td>
        </tr>
        <tr>
            <td><span class="k">Poziom studiów / Degree Level:</span> <span class="v">{{ $degreeNamePl }} / {{ $degreeNameEn }}</span></td>
            <td><span class="k">Rok studiów / Year of Study:</span> <span class="v">{{ $classYear }}</span></td>
        </tr>
        <tr>
            <td><span class="k">Forma studiów / Mode of Study:</span> <span class="v">{{ $educationTypePl }} / {{ $educationTypeEn }}</span></td>
            <td><span class="k">Przewidywany rok ukończenia studiów / Expected Graduation:</span> <span class="v">{{ $startYear }}/{{ $endYear }}</span></td>
        </tr>
        <tr>
            <td><span class="k">Język kształcenia / Language of Instruction:</span> <span class="v">{{ $studyLangDisplay }}</span></td>
            <td><span class="k">Status studenta / Student Status:</span> <span class="v">Aktywny / Active</span></td>
        </tr>
        <tr>
            <td><span class="k">Forma studiów / Mode of Study:</span> <span class="v">Studia stacjonarne Full-Time Study</span></td>
            <td><span class="k">Status stypendium / Scholarship Status:</span> <span class="v">{{ $scholarshipPl }} / {{ $scholarshipEn }}</span></td>
        </tr>
    </table>

    {{-- Signature: inline within the content flow, not pinned to the page bottom --}}
    <table class="sig-inline">
        <tr>
            <td>
                <div class="sig-graphic-wrap">
                    @if ($stampData)
                        <img class="sig-stamp-overlay" src="data:image/png;base64,{{ $stampData }}" alt="">
                    @endif
                </div>
                <div class="e-sign-box">
                    <div class="e-sign-badge">Podpis elektroniczny / E-Signed</div>
                    <div class="e-sign-name">Michał Kowalski</div>
                    <div class="e-sign-title">Dyrektor Działu Spraw Studenckich / Director of Student Affairs</div>
                </div>
            </td>
        </tr>
    </table>

    </div>{{-- .outer-frame --}}
    </div>{{-- .page-content --}}

    <div class="page-bottom-fixed">
        <div class="verify-band">
            <div class="verify-band-header">Weryfikacja autentyczności dokumentu / Document Verification</div>
            <table class="verify-table">
                <tr>
                    <td class="text-cell">
                        Zeskanuj kod QR lub otwórz link weryfikacyjny, aby potwierdzić autentyczność niniejszego dokumentu.
                        Po wyświetleniu monitu wpisz 4-cyfrowy kod: <strong>{{ $codeForEntry }}</strong><br />
                        Scan the QR code or open the verification link. Enter the 4-digit code:
                        <strong>{{ $codeForEntry }}</strong>
                    </td>
                    <td class="code-cell">
                        <div class="verification-url">{{ $verificationUrl }}</div>
                    </td>
                    <td class="qr-cell">
                        <img src="data:image/svg+xml;base64,{{ $qrCodeBase64 }}" alt="" />
                    </td>
                </tr>
            </table>
        </div>
        <div class="footer-line">
            KIELCE, Poland &nbsp;|&nbsp; Tel: +48 73 947 16 22 &nbsp;|&nbsp; E-mail: admission@kielceuniversity.pl
        </div>
    </div>

</body>

</html>