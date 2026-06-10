<div class="min-h-screen flex relative bg-surface">
    <!-- Logo - Top Left -->
    <div class="absolute top-4 left-4 sm:top-6 sm:left-6 lg:top-8 lg:left-8 z-10">
        <div class="flex flex-col leading-tight">
            <span class="font-serif text-3xl sm:text-4xl font-bold tracking-[0.2em] text-navy">KIELCE</span>
            <span class="text-xs font-light tracking-[0.42em] text-gold uppercase">University</span>
        </div>
    </div>

    <!-- Left Side - Login Form -->
    <div class="flex-1 flex flex-col justify-center px-4 sm:px-6 lg:px-8 py-16 lg:py-8">
        <div class="w-full max-w-md mx-auto">
            <div class="bg-surface-card rounded-2xl shadow-xl border border-border p-6 sm:p-8">
                <!-- Title -->
                <div class="mb-6">
                    <div class="w-12 h-1 bg-gold rounded-full mb-4"></div>
                    <h2 class="text-3xl font-extrabold text-navy">
                        Login
                    </h2>
                    <p class="mt-2 text-sm text-navy-muted">
                        Welcome back! Please login to your account.
                    </p>
                </div>

                <!-- Login Form -->
                <div class="space-y-6">
                    @if($error)
                        <div class="bg-brand-light border-l-4 border-brand p-4 rounded-lg">
                            <div class="flex">
                                <div class="shrink-0">
                                    <svg class="h-5 w-5 text-brand" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-brand">{{ $error }}</p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <form wire:submit="login" class="space-y-5">
                        <!-- Email/Username Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-navy mb-2">
                                E-mail/Username/Student No
                            </label>
                            <input 
                                id="email" 
                                name="email" 
                                type="text" 
                                wire:model="email"
                                autocomplete="username" 
                                required 
                                class="appearance-none block w-full px-4 py-3 border border-border rounded-xl placeholder-navy-muted/60 bg-surface focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition duration-150 @error('email') border-brand @enderror"
                                placeholder="Type your email or username"
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-brand">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-navy mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input 
                                    id="password" 
                                    name="password" 
                                    type="password" 
                                    wire:model="password"
                                    autocomplete="current-password" 
                                    required 
                                    class="appearance-none block w-full px-4 py-3 pr-10 border border-border rounded-xl placeholder-navy-muted/60 bg-surface focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition duration-150 @error('password') border-brand @enderror"
                                    placeholder="Type your password"
                                >
                                <button 
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-navy-muted hover:text-navy"
                                >
                                    <svg id="eye-icon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    <svg id="eye-off-icon" class="h-5 w-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-brand">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div>
                            <button 
                                type="submit"
                                wire:loading.attr="disabled"
                                wire:target="login"
                                class="w-full flex justify-center py-3 px-4 border border-transparent text-base font-semibold rounded-xl text-white bg-brand hover:bg-brand-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand transition duration-150 disabled:opacity-50 disabled:cursor-not-allowed shadow-md"
                            >
                                <span wire:loading.remove wire:target="login">
                                    Login
                                </span>
                                <span wire:loading wire:target="login" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-6">
                <p class="text-xs font-semibold uppercase tracking-wide text-navy-muted mb-3">Quick Apply</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <a href="{{ route('student.apply.student') }}"
                        class="group flex items-center justify-between rounded-xl border border-gold-muted bg-surface-card px-4 py-3 text-sm font-medium text-navy shadow-sm hover:border-gold hover:bg-gold-light transition">
                        <span>Student Apply</span>
                        <span class="text-gold group-hover:translate-x-0.5 transition">&rarr;</span>
                    </a>

                    <a href="{{ route('student.apply.transfer') }}"
                        class="group flex items-center justify-between rounded-xl border border-border bg-surface-card px-4 py-3 text-sm font-medium text-navy shadow-sm hover:border-gold hover:bg-gold-light transition">
                        <span>Transfer Apply</span>
                        <span class="text-navy-muted group-hover:text-gold group-hover:translate-x-0.5 transition">&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side - Campus Image -->
    <div class="hidden lg:block lg:flex-1 relative">
        <img 
            src="{{ asset('images/hero-campus.jpg') }}" 
            alt="Campus" 
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-linear-to-br from-navy/80 via-navy/50 to-brand/40"></div>
        <div class="absolute bottom-12 left-12 right-12 text-white">
            <p class="text-gold text-sm font-semibold uppercase tracking-widest mb-2">Kielce University</p>
            <p class="text-2xl font-serif font-bold leading-snug">Excellence in Education</p>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        const eyeOffIcon = document.getElementById('eye-off-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.add('hidden');
            eyeOffIcon.classList.remove('hidden');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('hidden');
            eyeOffIcon.classList.add('hidden');
        }
    }
</script>
