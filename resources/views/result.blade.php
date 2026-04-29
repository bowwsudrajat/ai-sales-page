<x-app-layout>
  <x-slot name="header">
    <h2 class="text-2xl font-bold tracking-tight text-slate-900">
      Generated Sales Page
    </h2>
  </x-slot>

  <div class="min-h-screen w-full bg-mesh py-8 sm:py-12 px-4">
    <div class="max-w-4xl mx-auto flex flex-col gap-12 stagger-children">

      @if(isset($generatedData['headline']) && $generatedData['headline'] === 'Failed to generate headline')
        <div class="rounded-2xl border border-red-200 bg-red-50 px-6 py-5 text-red-700 shadow-sm animate-fade-in-scale">
          <div class="flex items-center gap-3">
            <svg class="h-5 w-5 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
            <p class="font-medium">Failed to generate sales page. Please try again.</p>
          </div>
        </div>
      @endif

      @if(session('success'))
        <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-6 py-5 text-emerald-700 shadow-sm animate-fade-in-scale">
          <div class="flex items-center gap-3">
            <svg class="h-5 w-5 text-emerald-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="font-medium">{{ session('success') }}</p>
          </div>
        </div>
      @endif

      <!-- HERO SECTION -->
      <section class="relative bg-white rounded-3xl px-6 sm:px-14 py-14 flex flex-col items-center text-center overflow-hidden shadow-sm border border-slate-200 card-lift glow-indigo-hover">
        <div class="absolute -z-10 pointer-events-none right-0 top-0 w-96 h-64 bg-indigo-100/60 blur-3xl rounded-full"></div>
        <div class="absolute -z-10 pointer-events-none left-0 bottom-0 w-72 h-72 bg-blue-100/40 blur-3xl rounded-full"></div>

        <span class="inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10 mb-6 animate-fade-in-down">
          AI Generated
        </span>

        <h1 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-slate-900 mb-6 leading-tight animate-fade-in-up text-balance">
          {{ $generatedData['headline'] }}
        </h1>
        <h2 class="text-lg sm:text-xl font-semibold text-slate-700 mb-4 leading-snug max-w-xl mx-auto animate-fade-in-up text-balance">
          {{ $generatedData['subheadline'] }}
        </h2>
        <p class="mx-auto max-w-2xl text-base sm:text-lg text-slate-500 leading-relaxed animate-fade-in-up text-balance">
          {{ $generatedData['description'] }}
        </p>
      </section>

      <!-- BENEFITS + FEATURES -->
      <section class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        <!-- Benefits -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 group transition-all duration-300 hover:-translate-y-1 hover:shadow-lg card-lift">
          <h3 class="text-xl font-bold text-slate-900 mb-6 tracking-tight flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50">
              <svg class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            Benefits
          </h3>
          <ul class="flex flex-col gap-3">
            @foreach($generatedData['benefits'] as $benefit)
              <li class="flex items-start gap-3 p-4 rounded-xl bg-slate-50 border border-slate-100 font-medium text-slate-800 transition duration-200 hover:bg-white hover:shadow-sm group-hover:scale-[1.01]">
                <svg class="h-5 w-5 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ $benefit }}</span>
              </li>
            @endforeach
          </ul>
        </div>

        <!-- Features -->
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm p-8 group transition-all duration-300 hover:-translate-y-1 hover:shadow-lg card-lift">
          <h3 class="text-xl font-bold text-slate-900 mb-6 tracking-tight flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50">
              <svg class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
              </svg>
            </div>
            Features
          </h3>
          <ul class="grid grid-cols-1 sm:grid-cols-2 gap-3">
            @foreach($generatedData['features'] as $feature)
              <li class="bg-slate-50 border border-slate-100 text-slate-800 font-medium rounded-xl px-4 py-3 transition duration-200 hover:bg-white hover:shadow-sm group-hover:scale-[1.01] flex items-center gap-2">
                <span class="h-1.5 w-1.5 rounded-full bg-indigo-500 shrink-0"></span>
                {{ $feature }}
              </li>
            @endforeach
          </ul>
        </div>
      </section>

      <!-- SOCIAL PROOF -->
      <section>
        <div class="rounded-2xl bg-slate-900 px-8 sm:px-14 py-12 sm:py-16 shadow-lg text-center relative overflow-hidden noise-overlay">
          <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent"></div>
          <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-full h-px bg-gradient-to-r from-transparent via-indigo-500/20 to-transparent"></div>

          <h3 class="font-semibold text-sm uppercase tracking-widest text-indigo-400 mb-4">
            Social Proof
          </h3>
          <p class="text-xl sm:text-2xl font-medium leading-relaxed text-white italic max-w-2xl mx-auto text-balance">
            "{{ $generatedData['social_proof'] }}"
          </p>
        </div>
      </section>

      <!-- PRICING CARD -->
      <section class="mx-auto w-full text-center">
        <div class="relative bg-white border border-slate-200 rounded-3xl px-10 py-14 shadow-lg flex flex-col items-center overflow-hidden card-lift glow-indigo">
          <div class="absolute -top-20 -right-20 w-64 h-64 bg-indigo-100/50 rounded-full blur-3xl pointer-events-none"></div>
          <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-blue-100/40 rounded-full blur-3xl pointer-events-none"></div>

          <span class="relative inline-flex items-center rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10 mb-5">
            Premium Deal
          </span>
          <h3 class="text-5xl font-extrabold text-slate-900 mb-2">{{ $generatedData['pricing'] }}</h3>
          <p class="text-slate-500 text-base mb-8 font-medium">Simple, no hidden fees.</p>

          <button class="relative mt-2 px-10 py-4 rounded-xl text-lg font-bold bg-indigo-600 text-white shadow-lg hover:bg-indigo-700 hover:shadow-xl hover:scale-105 transition-all duration-200 focus:outline-none focus-visible:ring-4 focus-visible:ring-indigo-500/30 flex items-center gap-2 btn-shine btn-press">
            {{ $generatedData['cta'] }}
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>
          </button>
        </div>
      </section>

      <!-- CTA SECTION -->
      <section>
        <div class="relative bg-slate-900 rounded-3xl p-10 sm:p-14 text-center shadow-xl flex flex-col items-center justify-center overflow-hidden border border-slate-800 noise-overlay">
          <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-0 left-0 w-60 h-60 bg-indigo-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl"></div>
          </div>
          <h4 class="relative z-10 text-3xl sm:text-4xl font-extrabold mb-8 text-white animate-fade-in-up text-balance">
            Ready to supercharge your sales?
          </h4>
          <a
            href="{{ route('dashboard') }}"
            class="relative z-10 inline-flex items-center justify-center px-10 py-4 rounded-xl bg-white font-bold text-slate-900 text-lg shadow-lg ring-1 ring-slate-200 transition-all duration-200 hover:bg-slate-50 hover:-translate-y-1 hover:shadow-xl group btn-press"
          >
            Generate Another Page
            <svg class="ml-3 w-5 h-5 text-slate-700 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
            </svg>
          </a>
        </div>
      </section>

    </div>
  </div>
</x-app-layout>

