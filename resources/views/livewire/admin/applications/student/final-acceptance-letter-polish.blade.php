<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zaswiadczenie studenta - {{ $student->first_name }} {{ $student->last_name }}</title>
    <style>
        @page {
            margin: 14mm 16mm 14mm 16mm;
            size: A4;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'DejaVu Sans', 'Helvetica Neue', Arial, sans-serif;
            font-size: 8.5pt;
            line-height: 1.45;
            color: #1a2332;
            background: #ffffff;
            padding-bottom: 52mm;
        }

        .document {
            width: 100%;
            position: relative;
        }

        /* ── Decorative frame ── */
        .frame-outer {
            border: 2px solid #1e3a5f;
            padding: 3px;
            margin-bottom: 0;
        }

        .frame-inner {
            border: 1px solid #c5a55a;
            padding: 18px 22px 0 22px;
        }

        /* ── Header crest area ── */
        .crest-header {
            text-align: center;
            padding-bottom: 14px;
            margin-bottom: 16px;
            border-bottom: 1px solid #d4dce8;
            position: relative;
        }

        .crest-header::before,
        .crest-header::after {
            content: '';
            position: absolute;
            bottom: -1px;
            width: 80px;
            height: 3px;
            background: #c5a55a;
        }

        .crest-header::before {
            left: 0;
        }

        .crest-header::after {
            right: 0;
        }

        .crest-emblem {
            display: inline-block;
            width: 36px;
            height: 36px;
            border: 2px solid #1e3a5f;
            border-radius: 50%;
            line-height: 32px;
            font-size: 14pt;
            font-weight: bold;
            color: #1e3a5f;
            margin-bottom: 8px;
            letter-spacing: -1px;
        }

        .brand-name {
            font-family: 'DejaVu Serif', Georgia, serif;
            font-size: 17pt;
            font-weight: bold;
            color: #1e3a5f;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            margin: 0;
            line-height: 1.15;
        }

        .brand-sub {
            font-size: 7.5pt;
            color: #6b7c93;
            margin: 5px 0 0 0;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: normal;
        }

        .meta-strip {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 18px;
        }

        .meta-strip td {
            vertical-align: middle;
            padding: 0;
        }

        .meta-strip .meta-left {
            font-size: 7.2pt;
            color: #5a6a7e;
            line-height: 1.55;
        }

        .meta-strip .meta-left span {
            color: #1e3a5f;
            font-weight: bold;
        }

        .meta-strip .meta-right {
            text-align: right;
        }

        .barcode-wrap {
            display: inline-block;
            line-height: 0;
            margin-top: 4px;
        }

        /* ── Document title ── */
        .title-block {
            text-align: center;
            margin: 0 0 20px 0;
            padding: 14px 20px;
            background: linear-gradient(135deg, #f0f4fa 0%, #e8eef6 100%);
            border-left: 4px solid #c5a55a;
            border-right: 4px solid #c5a55a;
        }

        .hero-title {
            font-family: 'DejaVu Serif', Georgia, serif;
            font-size: 20pt;
            font-weight: bold;
            text-transform: uppercase;
            color: #1e3a5f;
            margin: 0 0 6px 0;
            letter-spacing: 3px;
        }

        .hero-subtitle {
            font-size: 8.5pt;
            color: #5a6a7e;
            margin: 0;
            letter-spacing: 0.5px;
        }

        /* ── Identity section ── */
        .identity-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }

        .identity-table td {
            vertical-align: top;
            padding: 0;
        }

        .identity-table .info-col {
            width: 74%;
            padding-right: 16px;
        }

        .identity-table .photo-col {
            width: 26%;
            text-align: center;
        }

        .info-grid {
            width: 100%;
            border-collapse: collapse;
        }

        .info-grid tr {
            border-bottom: 1px solid #e8edf3;
        }

        .info-grid tr:last-child {
            border-bottom: none;
        }

        .info-grid td {
            padding: 5px 0;
            vertical-align: top;
        }

        .info-grid .label {
            width: 38%;
            color: #6b7c93;
            font-size: 7pt;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding-right: 8px;
        }

        .info-grid .value {
            color: #1a2332;
            font-weight: bold;
            font-size: 8.3pt;
        }

        .photo-frame {
            display: inline-block;
            width: 96px;
            height: 118px;
            border: 2px solid #1e3a5f;
            padding: 3px;
            background: #f8fafc;
            overflow: hidden;
        }

        .photo-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .photo-empty {
            width: 100%;
            height: 100%;
            display: table;
        }

        .photo-empty span {
            display: table-cell;
            vertical-align: middle;
            font-size: 7pt;
            color: #9aaabb;
            text-align: center;
            line-height: 1.3;
        }

        /* ── Program card ── */
        .program-card {
            background: #1e3a5f;
            color: #ffffff;
            padding: 14px 16px;
            margin-bottom: 16px;
            position: relative;
        }

        .program-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: #c5a55a;
        }

        .card-title {
            margin: 0 0 8px 0;
            font-size: 7pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: #c5a55a;
        }

        .program-title {
            margin: 0 0 10px 0;
            font-family: 'DejaVu Serif', Georgia, serif;
            font-size: 11pt;
            font-weight: bold;
            color: #ffffff;
            line-height: 1.35;
        }

        .program-meta {
            margin: 0;
            font-size: 7.5pt;
            color: #b8c8dc;
            line-height: 1.6;
        }

        .program-meta-divider {
            color: #c5a55a;
            margin: 0 4px;
        }

        /* ── Statement ── */
        .statement {
            margin: 0 0 20px 0;
            padding: 14px 16px;
            border: 1px solid #d4dce8;
            background: #fafbfd;
            font-size: 8.3pt;
            text-align: justify;
            line-height: 1.55;
        }

        .statement p {
            margin: 0 0 8px 0;
            color: #2d3748;
        }

        .statement p:last-child {
            margin-bottom: 0;
        }

        /* ── Signature ── */
        .signature-block {
            margin-top: 8px;
            text-align: right;
            position: relative;
            min-height: 72px;
            padding-right: 4px;
        }

        .signature-line {
            display: inline-block;
            width: 200px;
            border-top: 1px solid #1e3a5f;
            margin-bottom: 6px;
        }

        .stamp {
            position: absolute;
            right: 12px;
            top: -8px;
            width: 78px;
            opacity: 0.75;
        }

        .sign-name {
            position: relative;
            z-index: 1;
            font-family: 'DejaVu Serif', Georgia, serif;
            font-size: 9pt;
            font-weight: bold;
            color: #1e3a5f;
        }

        .sign-title {
            position: relative;
            z-index: 1;
            font-size: 7.5pt;
            color: #6b7c93;
            margin-top: 3px;
            letter-spacing: 0.5px;
        }

        /* ── Verification footer ── */
        .verify {
            position: fixed;
            left: 16mm;
            right: 16mm;
            bottom: 0;
            background: #1e3a5f;
            color: #dce6f2;
            padding: 10px 14px;
            border-top: 3px solid #c5a55a;
        }

        .verify-header {
            margin: 0 0 6px 0;
            font-size: 7.5pt;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            color: #c5a55a;
        }

        .verify-url {
            margin: 0 0 8px 0;
            font-family: 'DejaVu Sans Mono', 'Courier New', monospace;
            font-size: 6.2pt;
            word-break: break-all;
            color: #8fb4d9;
            line-height: 1.4;
        }

        .verify-body-table {
            width: 100%;
            border-collapse: collapse;
        }

        .verify-body-table td {
            vertical-align: top;
            padding: 0;
        }

        .verify-qr-cell {
            width: 72px;
            padding-right: 12px;
        }

        .verify-qr-cell img {
            background: #ffffff;
            padding: 3px;
            display: block;
        }

        .verify-text-cell {
            font-size: 7.2pt;
            line-height: 1.45;
            text-align: justify;
            color: #dce6f2;
        }

        .verify-text-cell strong {
            color: #ffffff;
            font-size: 9pt;
            letter-spacing: 1px;
        }

        .verify-code {
            display: inline-block;
            margin-top: 2px;
        }

        .address {
            margin-top: 8px;
            padding-top: 7px;
            border-top: 1px solid rgba(197, 165, 90, 0.35);
            font-size: 6pt;
            text-align: center;
            color: #8fb4d9;
            line-height: 1.35;
        }

        .address p {
            margin: 1px 0;
        }
    </style>
</head>

<body>
    @php
        use Illuminate\Support\Facades\Storage;

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
        $studyLangEn = match ($studyLangCode) {
            'EN' => 'English',
            'TR' => 'Turkish',
            'PL' => 'Polish',
            default => 'English',
        };
        $studyLangDisplay = language_to_polish($studyLangEn);

        $nationalityDisplay = nationality_to_polish($student->nationality);
        $placeOfBirthDisplay = nationality_to_polish($student->place_of_birth ?? $student->nationality);

        $educationTypePl = 'Studia stacjonarne';
        $classYear = $student->current_course ?? 1;
        $classPl = "Etap zajec ({$classYear}. rok studiow)";

        $scholarshipStatus = $student->scholarship_status ?? '75%';
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
        $academicYearPl = "Rok akademicki {$startYear}-{$endYear}";
        $duration = $degree?->duration ?? 4;
        $durationPl = $duration === 1 ? 'rok' : ($duration < 5 ? 'lata' : 'lat');

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
            }
        }

        $stampPath = public_path('images/kielce-möhür.png');
        $stampData = file_exists($stampPath) ? base64_encode(file_get_contents($stampPath)) : '';

        $verificationCodeForUrl = $verificationCode ?? null;
        $verificationUrl = $student->getVerificationUrl($verificationCodeForUrl);
        $codeForEntry = isset($digitCode) && $digitCode !== null ? trim((string) $digitCode) : '-';
        $qrCode = \SimpleSoftwareIO\QrCode\Facades\QrCode::format('svg')
            ->size(70)
            ->generate($verificationUrl);
        $qrCodeBase64 = base64_encode($qrCode);
        $barcodeCode = trim($student->student_number ?? ($student->application_number ?? '')) ?: 'KIELCE-' . $student->id . '-' . now()->format('Ymd');
        $barcodeBase64 = '';
        try {
            $barcodePng = (new \Picqer\Barcode\BarcodeGeneratorPNG())->getBarcode(
                $barcodeCode,
                \Picqer\Barcode\BarcodeGenerator::TYPE_CODE_128,
                1,
                22,
                [26, 39, 68],
            );
            $barcodeBase64 = base64_encode($barcodePng);
        } catch (\Throwable $e) {
            // fallback - barcode hidden
        }
    @endphp

    <div class="document">
        <div class="frame-outer">
            <div class="frame-inner">

                <div class="crest-header">
                    <div class="crest-emblem">K</div>
                    <div class="brand-name">KIELCE UNIVERSITY</div>
                    <div class="brand-sub">Biuro spraw studenckich</div>
                </div>

                <table class="meta-strip">
                    <tr>
                        <td class="meta-left">
                            <span>Data wydania:</span> {{ now()->format('d/m/Y') }}<br>
                            <span>Numer referencyjny:</span> {{ $student->application_number ?? now()->format('d/m/Y') }}/{{ str_pad($student->id, 3, '0', STR_PAD_LEFT) }}
                        </td>
                        <td class="meta-right">
                            @if ($barcodeBase64)
                                <div class="barcode-wrap">
                                    <img src="data:image/png;base64,{{ $barcodeBase64 }}" alt="Barcode"
                                        style="max-width: 110px; height: auto; max-height: 28px; display: block;" />
                                </div>
                            @endif
                        </td>
                    </tr>
                </table>

                <div class="title-block">
                    <h1 class="hero-title">Zaswiadczenie studenta</h1>
                    <p class="hero-subtitle">Potwierdzenie statusu studenta i danych rejestracyjnych</p>
                </div>

                <table class="identity-table">
                    <tr>
                        <td class="info-col">
                            <table class="info-grid">
                                <tr>
                                    <td class="label">Imie i nazwisko</td>
                                    <td class="value">{{ strtoupper($student->first_name) }} {{ strtoupper($student->last_name) }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Numer dokumentu</td>
                                    <td class="value">{{ $student->passport_number ?? ($student->student_number ?? 'N/A') }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Imie ojca</td>
                                    <td class="value">{{ strtoupper($student->father_name ?? 'N/A') }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Data urodzenia</td>
                                    <td class="value">{{ $student->date_of_birth ? $student->date_of_birth->format('d.m.Y') : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Miejsce urodzenia</td>
                                    <td class="value">{{ $placeOfBirthDisplay }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Obywatelstwo</td>
                                    <td class="value">{{ $nationalityDisplay }}</td>
                                </tr>
                                <tr>
                                    <td class="label">Plec</td>
                                    <td class="value">{{ $student->gender ? (strtolower($student->gender) === 'male' ? 'Mezczyzna' : (strtolower($student->gender) === 'female' ? 'Kobieta' : ucfirst($student->gender))) : 'N/A' }}</td>
                                </tr>
                            </table>
                        </td>
                        <td class="photo-col">
                            <div class="photo-frame">
                                @if ($photoData)
                                    <img src="data:{{ $photoMime }};base64,{{ $photoData }}" alt="Zdjecie studenta">
                                @else
                                    <div class="photo-empty"><span>Brak zdjecia</span></div>
                                @endif
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="program-card">
                    <p class="card-title">Dane programu</p>
                    <p class="program-title">{{ $programNamePl }} - {{ $degreeNamePl }}</p>
                    <p class="program-meta">
                        Jednostka akademicka: {{ $facultyNamePl }}
                        <span class="program-meta-divider">|</span>
                        Jezyk nauczania: {{ $studyLangDisplay }}
                        <span class="program-meta-divider">|</span>
                        Typ edukacji: {{ $educationTypePl }}
                        <span class="program-meta-divider">|</span>
                        Status stypendium: {{ $scholarshipPl }}
                        <span class="program-meta-divider">|</span>
                        Rok studiow: {{ $classPl }}
                        <span class="program-meta-divider">|</span>
                        Rok akademicki: {{ $academicYearPl }}
                    </p>
                </div>

                <div class="statement">
                    <p>Osoba wskazana w niniejszym dokumencie jest zarejestrowanym studentem KIELCE UNIVERSITY i posiada aktywny status studenta.</p>
                    <p>Planowany laczny okres trwania programu wynosi {{ $duration }} {{ $durationPl }}. Aktualna rejestracja dotyczy okresu akademickiego {{ $startYear }}-{{ $endYear }}.</p>
                    <p>Zgodnie z regulaminem studiow uczelni student ma obowiazek realizowac wymagania programowe, uczestniczyc w zajeciach oraz przystepowac do zaliczen i egzaminow zgodnie z harmonogramem.</p>
                    <p>Niniejsze zaswiadczenie wydano na wniosek osoby zainteresowanej wyłącznie w celu potwierdzenia statusu studenta.</p>
                </div>

                <div class="signature-block">
                    @if ($stampData)
                        <img class="stamp" src="data:image/png;base64,{{ $stampData }}" alt="Pieczec">
                    @endif
                    <div class="signature-line"></div>
                    <div class="sign-name">Prof. Dr. hab. Tomasz Zelazowski-Krepski</div>
                    <div class="sign-title">Rektor</div>
                </div>

            </div>
        </div>

        <div class="verify">
            <p class="verify-header">Weryfikacja autentycznosci dokumentu</p>
            <p class="verify-url">{{ $verificationUrl }}</p>
            <table class="verify-body-table">
                <tr>
                    <td class="verify-qr-cell">
                        <img src="data:image/svg+xml;base64,{{ $qrCodeBase64 }}" alt=""
                            style="width: 64px; height: 64px; display: block;" />
                    </td>
                    <td class="verify-text-cell">
                        Zeskanuj kod QR lub otworz powyzszy link. Podczas weryfikacji wpisz 4-cyfrowy kod:
                        <strong class="verify-code">{{ $codeForEntry }}</strong>
                    </td>
                </tr>
            </table>

            <div class="address">
                <p>Aleja Jozefa Pilsudskiego 35, 09-407 Plock, Poland</p>
                <p>Tel: +48 73 947 16 22</p>
                <p>E-mail: admission@kielceuniversity.pl | rectorate@kielceuniversity.pl</p>
            </div>
        </div>
    </div>
</body>

</html>
