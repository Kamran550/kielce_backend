<div class="min-h-screen bg-surface">
    @if(!$application || $messageType !== 'success')
        <div class="min-h-screen flex flex-col lg:flex-row">
            {{-- Brand panel --}}
            <div class="relative lg:w-[42%] xl:w-[38%] shrink-0 overflow-hidden">
                <div class="absolute inset-0 bg-linear-to-br from-navy via-navy-hover to-brand"></div>
                <div class="absolute inset-0 opacity-[0.07]"
                    style="background-image: radial-gradient(circle at 1px 1px, white 1px, transparent 0); background-size: 28px 28px;">
                </div>
                <div class="relative z-10 flex flex-col justify-between min-h-[220px] lg:min-h-screen p-8 sm:p-10 lg:p-12">
                    <div>
                        <div class="flex flex-col leading-tight">
                            <span class="font-serif text-3xl sm:text-4xl font-bold tracking-[0.2em] text-white">KIELCE</span>
                            <span class="text-xs font-light tracking-[0.42em] text-gold-muted uppercase mt-1">University</span>
                        </div>
                    </div>

                    <div class="py-8 lg:py-0">
                        <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-white/10 border border-white/20 mb-6">
                            <svg class="w-7 h-7 text-gold" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                            </svg>
                        </div>
                        <h1 class="text-2xl sm:text-3xl font-serif font-bold text-white leading-tight max-w-sm">
                            Document Verification Portal
                        </h1>
                        <p class="mt-4 text-sm sm:text-base text-navy-light/80 leading-relaxed max-w-md">
                            Verify the authenticity of official university documents issued by Kielce University.
                        </p>
                        <ul class="mt-8 space-y-3 hidden sm:block">
                            <li class="flex items-center gap-3 text-sm text-navy-light/90">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gold/20 text-gold text-xs font-bold">1</span>
                                Open your original document
                            </li>
                            <li class="flex items-center gap-3 text-sm text-navy-light/90">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gold/20 text-gold text-xs font-bold">2</span>
                                Locate the QR code verification section
                            </li>
                            <li class="flex items-center gap-3 text-sm text-navy-light/90">
                                <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gold/20 text-gold text-xs font-bold">3</span>
                                Enter the bold check digits below
                            </li>
                        </ul>
                    </div>

                    <p class="text-xs text-navy-light/50 hidden lg:block">
                        © {{ date('Y') }} {{ config('app.name') }}
                    </p>
                </div>
            </div>

            {{-- Form panel --}}
            <div class="flex-1 flex items-center justify-center p-6 sm:p-10 lg:p-12">
                <div class="w-full max-w-md">
                    <div class="mb-8 lg:hidden">
                        <div class="w-10 h-1 bg-gold rounded-full mb-4"></div>
                        <h2 class="text-2xl font-bold text-navy">Verify Document</h2>
                        <p class="mt-1 text-sm text-navy-muted">Enter your check digits to continue.</p>
                    </div>

                    {{-- Domain warning --}}
                    <div class="mb-6 rounded-2xl border border-gold/40 bg-gold-light/60 p-4 sm:p-5">
                        <div class="flex gap-4">
                            <div class="shrink-0 flex h-10 w-10 items-center justify-center rounded-xl bg-gold/15 text-gold">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"/>
                                </svg>
                            </div>
                            <div>
                                <p class="text-sm font-semibold text-navy">Check the domain name</p>
                                <p class="mt-1.5 text-xs sm:text-sm text-navy-muted leading-relaxed">
                                    Confirm the address bar shows the correct institution domain —
                                    the same as on your document's verification section.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-surface-card rounded-2xl border border-border shadow-xl p-6 sm:p-8">
                        <div class="hidden lg:block mb-6">
                            <div class="w-10 h-1 bg-gold rounded-full mb-4"></div>
                            <h2 class="text-2xl font-bold text-navy">Enter Check Digits</h2>
                            <p class="mt-1 text-sm text-navy-muted">
                                Type the 4-digit code shown in bold next to the QR code.
                            </p>
                        </div>

                        <form wire:submit.prevent="verify" class="space-y-6">
                            <div>
                                <label for="digitCode" class="sr-only">Check digits</label>
                                <input
                                    type="text"
                                    id="digitCode"
                                    wire:model="digitCode"
                                    maxlength="4"
                                    inputmode="numeric"
                                    pattern="[0-9]*"
                                    placeholder="0000"
                                    class="w-full h-16 sm:h-[4.5rem] border-2 border-border rounded-2xl px-4 text-center text-3xl sm:text-4xl font-mono font-bold tracking-[0.5em] text-navy placeholder:text-navy-muted/25 placeholder:tracking-[0.5em] bg-surface focus:outline-none focus:ring-4 focus:ring-brand/15 focus:border-brand transition"
                                    autocomplete="off"
                                    autofocus
                                >
                                <p class="mt-3 text-center text-xs text-navy-muted leading-relaxed">
                                    Refer to the original document and enter the digits highlighted in <strong class="text-navy font-semibold">bold</strong>.
                                </p>
                            </div>

                            @if($message && $messageType !== 'success')
                                <div class="flex items-start gap-3 rounded-xl border border-brand-muted bg-brand-light px-4 py-3" role="alert">
                                    <svg class="h-5 w-5 shrink-0 text-brand mt-0.5" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                    <p class="text-sm text-brand font-medium">{{ $message }}</p>
                                </div>
                            @endif

                            <button
                                type="submit"
                                wire:loading.attr="disabled"
                                class="w-full inline-flex items-center justify-center gap-2 h-12 px-6 bg-brand hover:bg-brand-hover text-white text-base font-semibold rounded-xl transition disabled:opacity-60 disabled:cursor-not-allowed shadow-md"
                            >
                                <span wire:loading.remove wire:target="verify">Verify Document</span>
                                <span wire:loading wire:target="verify" class="flex items-center gap-2">
                                    <svg class="animate-spin h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Verifying...
                                </span>
                                <svg wire:loading.remove wire:target="verify" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </button>
                        </form>
                    </div>

                    <p class="mt-6 text-center text-xs text-navy-muted lg:hidden">
                        © {{ date('Y') }} {{ config('app.name') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    @if($application && $messageType === 'success')
        @php
            $pdfUrl = $this->getPdfUrl();
            $docTitle = match(true) {
                $application->document_type === \App\Enums\DocumentTypeEnum::ACCEPTANCE => 'Acceptance Letter',
                $application->document_type === \App\Enums\DocumentTypeEnum::CERTIFICATE => 'Certificate',
                default => 'Document',
            };
        @endphp

        <div class="min-h-screen flex flex-col">
            {{-- Success header --}}
            <header class="bg-navy text-white shrink-0">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 py-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="flex flex-col leading-tight">
                            <span class="font-serif text-lg font-bold tracking-[0.18em]">KIELCE</span>
                            <span class="text-[9px] font-light tracking-[0.38em] text-gold-muted uppercase">University</span>
                        </div>
                        <div class="hidden sm:block w-px h-8 bg-white/20"></div>
                        <div class="hidden sm:flex items-center gap-2">
                            <span class="flex h-8 w-8 items-center justify-center rounded-lg bg-gold text-navy">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-sm font-semibold leading-none">Verified</p>
                                <p class="text-xs text-navy-light/70 mt-0.5">Authentic document</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 rounded-xl bg-white/10 border border-white/15 px-4 py-2">
                        <svg class="h-4 w-4 text-gold shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z"/>
                        </svg>
                        <p class="text-xs sm:text-sm text-navy-light">Registered in our system</p>
                    </div>
                </div>
            </header>

            {{-- Mobile success banner --}}
            <div class="sm:hidden bg-gold-light border-b border-gold-muted px-4 py-3 flex items-center gap-3">
                <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-lg bg-brand text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                </span>
                <div>
                    <p class="text-sm font-semibold text-navy">Verification successful</p>
                    <p class="text-xs text-navy-muted">This document is authentic.</p>
                </div>
            </div>

            <main class="flex-1 p-4 sm:p-6 lg:p-8 bg-surface">
                <div class="max-w-6xl mx-auto">
                    @if($pdfUrl)
                        <div class="overflow-hidden rounded-2xl border border-border bg-surface-card shadow-xl">
                            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-border px-5 sm:px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-navy-light text-navy">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                        </svg>
                                    </span>
                                    <div>
                                        <h2 class="text-base sm:text-lg font-bold text-navy">{{ $docTitle }}</h2>
                                        <p class="text-xs text-navy-muted mt-0.5">Official document preview</p>
                                    </div>
                                </div>
                                <span class="inline-flex items-center gap-1.5 rounded-full bg-gold-light border border-gold-muted px-3 py-1 text-xs font-semibold text-navy uppercase tracking-wide">
                                    <span class="h-1.5 w-1.5 rounded-full bg-brand"></span>
                                    Preview
                                </span>
                            </div>
                            <div class="w-full bg-navy/5" style="height: calc(100vh - 200px); min-height: 480px;">
                                <iframe
                                    src="{{ $pdfUrl }}"
                                    class="h-full w-full border-0 bg-white"
                                    title="{{ $docTitle }}"
                                ></iframe>
                            </div>
                        </div>
                    @else
                        <div class="max-w-lg mx-auto mt-12 text-center">
                            <div class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gold-light border border-gold-muted text-gold mb-5">
                                <svg class="h-8 w-8" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.1 2.448-1.1 3.213 0l6.518 9.375A1.75 1.75 0 0116.03 15H3.97a1.75 1.75 0 01-1.429-2.526L8.257 3.1zM11 11a1 1 0 10-2 0v2a1 1 0 102 0v-2zm-1-4a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-navy">PDF not found</h2>
                            <p class="mt-2 text-sm text-navy-muted">
                                Verification succeeded, but the document file could not be loaded.
                            </p>
                        </div>
                    @endif
                </div>
            </main>
        </div>
    @endif
</div>
