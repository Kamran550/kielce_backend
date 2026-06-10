<div class="min-h-screen flex relative bg-surface">
    <!-- Left Side - Brand Panel -->
    <div class="hidden lg:flex lg:flex-1 relative">
        <div class="absolute inset-0 bg-linear-to-br from-navy via-navy-hover to-brand"></div>
        <div class="relative z-10 flex flex-col justify-between p-12 text-white w-full">
            <div class="flex flex-col leading-tight">
                <span class="font-serif text-4xl font-bold tracking-[0.2em] text-white">KIELCE</span>
                <span class="text-xs font-light tracking-[0.42em] text-gold-muted uppercase mt-1">University</span>
            </div>
            <div>
                <div class="w-16 h-1 bg-gold rounded-full mb-6"></div>
                <h1 class="text-3xl font-serif font-bold leading-tight mb-3">Admin Panel</h1>
                <p class="text-navy-light/90 text-lg max-w-sm">Manage students, applications, and academic programs from one place.</p>
            </div>
            <p class="text-sm text-navy-light/60">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>

    <!-- Right Side - Login Form -->
    <div class="flex-1 flex flex-col justify-center px-4 sm:px-6 lg:px-8 py-12">
        <div class="max-w-md w-full mx-auto space-y-8">
            <!-- Mobile Logo -->
            <div class="text-center lg:hidden">
                <div class="flex flex-col items-center leading-tight mb-6">
                    <span class="font-serif text-3xl font-bold tracking-[0.2em] text-navy">KIELCE</span>
                    <span class="text-xs font-light tracking-[0.42em] text-gold uppercase">University</span>
                </div>
            </div>

            <div class="bg-surface-card rounded-2xl shadow-xl border border-border p-6 sm:p-8">
                <div class="mb-6">
                    <div class="w-12 h-1 bg-gold rounded-full mb-4 lg:hidden"></div>
                    <h2 class="text-3xl font-extrabold text-navy">
                        Admin Panel
                    </h2>
                    <p class="mt-2 text-sm text-navy-muted">
                        Login to your account
                    </p>
                </div>

                @if($error)
                    <div class="mb-6 bg-brand-light border-l-4 border-brand p-4 rounded-lg">
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
                    <!-- Email Field -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-navy mb-2">
                            Email Address
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-navy-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input 
                                id="email" 
                                name="email" 
                                type="email" 
                                wire:model="email"
                                autocomplete="email" 
                                required 
                                class="appearance-none block w-full pl-10 pr-3 py-3 border border-border rounded-xl placeholder-navy-muted/60 bg-surface focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition duration-150 @error('email') border-brand @enderror"
                                placeholder="Enter your email address"
                            >
                        </div>
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
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-navy-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input 
                                id="password" 
                                name="password" 
                                type="password" 
                                wire:model="password"
                                autocomplete="current-password" 
                                required 
                                class="appearance-none block w-full pl-10 pr-3 py-3 border border-border rounded-xl placeholder-navy-muted/60 bg-surface focus:outline-none focus:ring-2 focus:ring-brand/30 focus:border-brand transition duration-150 @error('password') border-brand @enderror"
                                placeholder="••••••••"
                            >
                        </div>
                        @error('password')
                            <p class="mt-1 text-sm text-brand">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input 
                                id="remember" 
                                name="remember" 
                                type="checkbox" 
                                wire:model="remember"
                                class="h-4 w-4 text-brand focus:ring-brand/30 border-border rounded"
                            >
                            <label for="remember" class="ml-2 block text-sm text-navy">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button 
                            type="submit"
                            wire:loading.attr="disabled"
                            wire:target="login"
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-brand hover:bg-brand-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand transition duration-150 disabled:opacity-50 disabled:cursor-not-allowed shadow-md"
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

            <!-- Footer (mobile) -->
            <div class="text-center lg:hidden">
                <p class="text-xs text-navy-muted">
                    © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</div>
