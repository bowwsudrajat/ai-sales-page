<x-app-layout>
  @if(isset($generatedData['headline']) &&
      $generatedData['headline'] === 'Failed to generate headline')

    <div class="bg-red-100 border border-red-300 text-red-700 p-5 rounded-2xl mb-8">

      Failed to generate sales page.
      Please try again.

    </div>

  @endif
  @if(session('success'))

    <div
      class="bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl mb-6"
    >

      {{ session('success') }}

    </div>

  @endif
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-black leading-tight py-2">
      Generate Page
    </h2>
  </x-slot>

  <div class="min-h-screen w-full bg-gradient-to-br from-blue-50 via-white to-purple-100 py-8 sm:py-14 px-2">
    <div class="max-w-4xl mx-auto flex flex-col gap-14">

      <!-- HERO SECTION -->
      <section class="relative isolate bg-white shadow-lg rounded-3xl px-6 sm:px-14 py-14 flex flex-col items-center text-center overflow-hidden mb-2">
        <div class="absolute -z-10 blur-3xl pointer-events-none right-0 top-0 w-96 h-64 bg-blue-200 opacity-40"></div>
        <h1 class="text-4xl sm:text-5xl font-black tracking-tight text-blue-900 mb-6 leading-tight animate-fade-in">
          {{ $generatedData['headline'] }}
        </h1>
        <h2 class="text-lg sm:text-2xl font-semibold text-slate-700 mb-4 leading-snug max-w-xl mx-auto animate-fade-in-up">
          {{ $generatedData['subheadline'] }}
        </h2>
        <p class="mx-auto max-w-2xl text-lg sm:text-xl text-slate-600 font-light leading-relaxed mb-1 animate-fade-in-up">
          {{ $generatedData['description'] }}
        </p>
      </section>

      <!-- BENEFITS + FEATURES -->
      <section class="grid grid-cols-1 md:grid-cols-2 gap-7 md:gap-10">
        <!-- Benefits -->
        <div class="bg-white rounded-2xl border border-blue-100 shadow-md p-8 group transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
          <h3 class="text-2xl font-bold text-blue-700 mb-6 tracking-tight flex items-center gap-3">
            <svg class="h-7 w-7 text-green-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" d="M8 13l2.5 2.5L16 10" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            Benefits
          </h3>
          <ul class="flex flex-col gap-4">
            @foreach($generatedData['benefits'] as $benefit)
              <li class="flex items-start gap-3 p-4 rounded-lg bg-green-50 border border-green-100 font-medium text-blue-900 transition duration-200 hover:bg-green-100 hover:shadow-sm group-hover:scale-[1.025]">
                <span class="text-green-600 text-lg mt-1">✔️</span>
                <span>{{ $benefit }}</span>
              </li>
            @endforeach
          </ul>
        </div>
        <!-- Features -->
        <div class="bg-white rounded-2xl border border-purple-100 shadow-md p-8 group transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
          <h3 class="text-2xl font-bold text-purple-700 mb-6 tracking-tight flex items-center gap-3">
            <svg class="h-7 w-7 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><rect x="4" y="4" width="16" height="16" rx="4" stroke-width="2"/></svg>
            Features
          </h3>
          <ul class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach($generatedData['features'] as $feature)
              <li class="bg-blue-50 border border-blue-100 text-blue-900 font-semibold rounded-lg px-4 py-3 transition duration-200 hover:bg-blue-100 hover:shadow-sm group-hover:scale-[1.025]">
                {{ $feature }}
              </li>
            @endforeach
          </ul>
        </div>
      </section>

      <!-- SOCIAL PROOF -->
      <section>
        <div class="rounded-2xl bg-gradient-to-br from-purple-50 to-blue-100 px-8 sm:px-14 py-10 sm:py-14 shadow border border-blue-100 text-center">
          <h3 class="font-bold text-2xl text-purple-800 mb-3 tracking-tight">
            Social Proof
          </h3>
          <p class="text-xl sm:text-2xl font-medium leading-normal text-blue-900 italic max-w-2xl mx-auto">
            “{{ $generatedData['social_proof'] }}”
          </p>
        </div>
      </section>

      <!-- PRICING CARD -->
      <section class="mx-auto w-full max-w-lg">
        <div class="relative bg-white border border-blue-100 rounded-3xl px-10 py-14 shadow-xl flex flex-col items-center overflow-hidden">
          <div class="absolute -top-20 -left-20 w-64 h-64 bg-gradient-to-br from-blue-200/40 to-pink-300/20 rounded-full blur-3xl pointer-events-none"></div>
          <span class="uppercase text-xs font-medium tracking-wider text-blue-500 mb-4 animate-bounce">Premium Deal</span>
          <h3 class="text-4xl font-black text-blue-900 mb-2">{{ $generatedData['pricing'] }}</h3>
          <p class="text-blue-600 text-lg mb-6 font-medium">Simple, no hidden fees.</p>
          <button class="transition-all duration-200 ease-in-out mt-4 px-10 py-4 rounded-xl text-xl font-bold  bg-gradient-to-tr from-pink-500 via-blue-500 to-yellow-400 shadow-lg hover:scale-105 hover:from-pink-600 hover:to-yellow-500 focus:ring-4 focus:ring-blue-100 group flex items-center gap-2 animate-fade-in-up">
            {{ $generatedData['cta'] }}
            <span class="inline-block align-middle">
              <svg class="h-6 w-6 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
            </span>
          </button>
        </div>
      </section>

      <!-- CTA SECTION -->
      <section>
        <div class="relative bg-gradient-to-r from-blue-500 via-indigo-400 to-pink-400 rounded-3xl p-10 sm:p-14 text-center shadow-2xl flex flex-col items-center justify-center overflow-hidden border border-blue-200 transition-all duration-300 hover:shadow-pink-200/50 hover:scale-[1.015]">
          <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-0 left-0 w-60 h-60 bg-white/20 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-80 h-80 bg-pink-200/20 rounded-full blur-3xl"></div>
          </div>
          <h4 class="relative z-10  text-3xl sm:text-4xl font-black mb-6 drop-shadow-lg animate-fade-in-up">
            Ready to supercharge your sales?
          </h4>
          <a
            href="{{ route('dashboard') }}"
            class="relative z-10 inline-flex items-center justify-center px-10 py-4 rounded-xl bg-white/95 font-extrabold text-blue-700 text-xl shadow-lg ring-2 ring-blue-100 transition-all duration-200 hover:bg-blue-50 hover:-translate-y-1 group"
          >
            Generate Another Page
            <svg class="ml-3 w-6 h-6 text-blue-600 group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" /></svg>
          </a>
        </div>
      </section>

    </div>
  </div>

  <style>
    @keyframes fade-in {
      from { opacity: 0; transform: translateY(20px);}
      to { opacity: 1; transform: translateY(0);}
    }
    .animate-fade-in {
      animation: fade-in 0.7s cubic-bezier(.4,0,.2,1) both;
    }
    .animate-fade-in-up {
      animation: fade-in 1.2s cubic-bezier(.4,0,.2,1) both 0.2s;
    }
  </style>
</x-app-layout>