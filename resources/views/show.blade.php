<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
          {{ $salesPage->product_name }}
        </h2>
        <p class="mt-1 text-sm text-slate-500">
          Edit and refine your generated sales page.
        </p>
      </div>
    </div>
  </x-slot>

  <div class="max-w-5xl mx-auto">
    <!-- Top Actions -->
    <div class="flex items-center justify-between gap-4 flex-wrap mb-6 animate-fade-in-down">
      <a
        href="{{ route('history') }}"
        class="inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 border border-slate-200 bg-white hover:bg-slate-50 hover:border-slate-300 transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70 btn-press"
      >
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        Back to History
      </a>

      <a
        href="{{ route('dashboard') }}"
        class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 hover:shadow-md transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70 btn-press"
      >
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        New generation
      </a>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden stagger-children">
      <!-- Hero Section -->
      <div class="p-8 sm:p-10 border-b border-slate-100">
        <div>
          <div class="flex items-start justify-between gap-4">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-tight text-balance">
              {{ $generatedData['headline'] ?? 'No headline' }}
            </h1>
            <form action="{{ route('sales.regenerate.section', [$salesPage->id, 'headline']) }}" method="POST">
              @csrf
              <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 border border-indigo-200 transition-colors btn-press">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182" />
                </svg>
                Regenerate
              </button>
            </form>
          </div>

          <div class="mt-3 flex items-start justify-between gap-4">
            <p class="text-lg text-slate-600 font-medium text-balance">
              {{ $generatedData['subheadline'] ?? '' }}
            </p>
            <form action="{{ route('sales.regenerate.section', [$salesPage->id, 'subheadline']) }}" method="POST">
              @csrf
              <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 border border-indigo-200 transition-colors btn-press">
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182" />
                </svg>
                Regenerate
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Description -->
      <div class="p-8 sm:p-10 border-b border-slate-100">
        <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500 mb-3">Description</h3>
        <p class="text-slate-700 leading-relaxed text-base text-balance">
          {{ $generatedData['description'] }}
        </p>
      </div>

      <!-- Benefits -->
      <div class="p-8 sm:p-10 border-b border-slate-100">
        <div class="flex items-center justify-between mb-5">
          <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500">Benefits</h3>
          <form action="{{ route('sales.regenerate.section', [$salesPage->id, 'benefits']) }}" method="POST">
            @csrf
            <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 border border-indigo-200 transition-colors btn-press">
              <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182" />
              </svg>
              Regenerate Benefits
            </button>
          </form>
        </div>
        <ul class="space-y-3">
          @foreach($generatedData['benefits'] as $benefit)
            <li class="flex items-start gap-3 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-slate-800 card-lift-sm">
              <svg class="h-5 w-5 text-emerald-500 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="font-medium">{{ $benefit }}</span>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Features -->
      <div class="p-8 sm:p-10 border-b border-slate-100">
        <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500 mb-5">Features</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
          @foreach($generatedData['features'] as $feature)
            <div class="flex items-center gap-3 p-4 rounded-xl bg-slate-50 border border-slate-100 text-slate-800 font-medium card-lift-sm">
              <span class="h-2 w-2 rounded-full bg-indigo-500 shrink-0"></span>
              {{ $feature }}
            </div>
          @endforeach
        </div>
      </div>

      <!-- Social Proof & Pricing -->
      <div class="grid grid-cols-1 md:grid-cols-2 border-b border-slate-100">
        <div class="p-8 sm:p-10 border-b md:border-b-0 md:border-r border-slate-100">
          <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500 mb-3">Social Proof</h3>
          <p class="text-slate-800 font-medium italic leading-relaxed text-lg text-balance">
            "{{ $generatedData['social_proof'] }}"
          </p>
        </div>
        <div class="p-8 sm:p-10">
          <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-500 mb-3">Pricing</h3>
          <p class="text-3xl font-extrabold text-slate-900">{{ $generatedData['pricing'] }}</p>
        </div>
      </div>

      <!-- CTA -->
      <div class="p-10 sm:p-14 text-center border-b border-slate-100">
        <button class="px-10 py-4 rounded-xl text-lg font-bold bg-indigo-600 text-white shadow-lg hover:bg-indigo-700 hover:shadow-xl hover:-translate-y-0.5 transition-all duration-200 btn-shine btn-press">
          {{ $generatedData['cta'] }}
        </button>
        <form action="{{ route('sales.regenerate.section', [$salesPage->id, 'cta']) }}" method="POST" class="mt-4">
          @csrf
          <button type="submit" class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 border border-indigo-200 transition-colors btn-press">
            <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182" />
            </svg>
            Regenerate CTA
          </button>
        </form>
      </div>

      <!-- Bottom Actions -->
      <div class="p-8 sm:p-10 bg-slate-50/50">
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
          <form action="{{ route('sales.regenerate', $salesPage->id) }}" method="POST">
            @csrf
            <button
              type="submit"
              class="inline-flex items-center gap-2 rounded-xl bg-amber-500 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-amber-600 hover:shadow-lg transition-all duration-200 btn-shine btn-press"
            >
              <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182" />
              </svg>
              Regenerate Entire Page
            </button>
          </form>

          <a
            href="{{ route('sales.export', $salesPage->id) }}"
            class="inline-flex items-center gap-2 rounded-xl bg-emerald-600 px-6 py-3 text-sm font-bold text-white shadow-md hover:bg-emerald-700 hover:shadow-lg transition-all duration-200 btn-shine btn-press"
          >
            <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
            </svg>
            Export HTML
          </a>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

