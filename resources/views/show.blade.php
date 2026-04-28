<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-black leading-tight py-2">
      {{ $salesPage->product_name }}
    </h2>
  </x-slot>

  <div class="max-w-4xl mx-auto">
    <div class="flex items-center justify-between gap-4 flex-wrap">
      <a
        href="{{ route('history') }}"
        class="inline-flex items-center gap-2 rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-white/10 bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-white/5 hover:-translate-y-0.5 active:translate-y-0 transition will-change-transform focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70"
      >
        <span aria-hidden="true">←</span>
        Back to History
      </a>

      <a
        href="{{ route('dashboard') }}"
        class="inline-flex items-center justify-center rounded-xl bg-gradient-to-b from-slate-900 to-slate-950 dark:from-white dark:to-slate-100 px-4 py-2.5 text-sm font-semibold text-white dark:text-slate-900 shadow-sm hover:shadow-md hover:-translate-y-0.5 active:translate-y-0 transition will-change-transform focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70"
      >
        New generation
      </a>
    </div>

    <div class="mt-6 rounded-2xl border border-slate-200/70 dark:border-white/10 bg-white dark:bg-slate-900 shadow-sm">
      <div class="p-6 sm:p-8">
        <div class="flex items-start justify-between gap-4">
          <div class="min-w-0">
            <h1 class="text-xl font-bold mb-3">
              {{ $generatedData['headline'] ?? 'No headline' }}
              <form
                action="{{ route('sales.regenerate.section', [$salesPage->id, 'headline']) }}"
                method="POST"
                class="mt-4"
              >
                @csrf
  
                <button
                  class="bg-blue-500 px-4 py-2 rounded-lg"
                >
                  Regenerate Headline
                </button>
  
              </form>
            </h1>

            <h2 class="text-gray-700 mb-6">
              {{ $generatedData['subheadline'] ?? '' }}
              <form
                action="{{ route('sales.regenerate.section', [$salesPage->id, 'subheadline']) }}"
                method="POST"
                class="mt-3"
              >
                @csrf
  
                <button class="bg-purple-500 px-4 py-2 rounded-lg">
                  Regenerate Subheadline
                </button>
              </form>
            </h2>
          </div>
        </div>

        <div class="mt-6 h-px bg-slate-200/70 dark:bg-white/10"></div>

        <h2 class="font-bold mb-3">
          Product Description
        </h2>

        <p class="text-gray-700 mb-6">
          {{ $generatedData['description'] }}
        </p>

        <h2 class="font-bold mb-3">
          Benefits
        </h2>

        <ul class="space-y-3 mb-6">
          @foreach($generatedData['benefits'] as $benefit)
            <li class="bg-gray-100 p-4 rounded-lg">
              ✅ {{ $benefit }}
            </li>
          @endforeach
          <form
            action="{{ route('sales.regenerate.section', [$salesPage->id, 'benefits']) }}"
            method="POST"
            class="mb-5"
          >
            @csrf

            <button class="bg-orange-500 px-4 py-2 rounded-lg">
              Regenerate Benefits
            </button>
          </form>
        </ul>

        <h2 class="font-bold mb-3">
          Features
        </h2>

        <div class="grid grid-cols-2 gap-4 mb-6">
          @foreach($generatedData['features'] as $feature)
            <div class="p-5 border rounded-xl">
              {{ $feature }}
            </div>
          @endforeach
        </div>

        <div class="bg-blue-50 p-8 rounded-2xl mb-6">

          <h2 class="font-bold mb-3">
            Social Proof
          </h2>

          <p class="font-bold">
            {{ $generatedData['social_proof'] }}
          </p>

        </div>

        <div class="bg-blue-50 p-8 rounded-2xl mb-6">

          <h2 class="font-bold mb-3">
            Pricing
          </h2>

          <p class="font-bold">
            {{ $generatedData['pricing'] }}
          </p>

        </div>

        <div class="text-center">

          <button class="bg-blue px-10 py-5 rounded-xl text-xl">
            {{ $generatedData['cta'] }}
          </button>
          <form
            action="{{ route('sales.regenerate.section', [$salesPage->id, 'cta']) }}"
            method="POST"
            class="mt-4"
          >
            @csrf

            <button class="bg-green-500 px-4 py-2 rounded-lg">
              Regenerate CTA
            </button>
          </form>

        </div>

        <div class="mt-10 text-center">

          <form
            action="{{ route('sales.regenerate', $salesPage->id) }}"
            method="POST"
          >
            @csrf

            <button
              type="submit"
              class="bg-yellow-500 hover:bg-yellow-600 px-8 py-4 rounded-2xl font-bold"
            >
              Regenerate Sales Page
            </button>

          </form>

        </div>

        <div class="mt-5 text-center">

          <a
            href="{{ route('sales.export', $salesPage->id) }}"
            class="bg-green-600 hover:bg-green-700 px-8 py-4 rounded-2xl font-bold inline-block"
          >
            Export HTML
          </a>

        </div>

      </div>
    </div>
  </div>
</x-app-layout>