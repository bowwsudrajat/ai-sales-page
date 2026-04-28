<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      AI Sales Page Generator
    </h2>
  </x-slot>

  <div class="mx-auto max-w-4xl py-10 px-4 sm:px-8">
    <div class="bg-white dark:bg-slate-900 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-md">
      <form method="POST" action="/generate" class="p-8 space-y-7">
        @csrf

        <div>
          <label for="product_name" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Product Name</label>
          <input
            type="text"
            id="product_name"
            name="product_name"
            required
            class="block w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 px-4 py-3 text-base text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="Enter your product name"
            value="{{ old('product_name') }}"
          >
        </div>

        <div>
          <label for="description" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Product Description</label>
          <textarea
            id="description"
            name="description"
            required
            rows="4"
            class="block w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 px-4 py-3 text-base text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"
            placeholder="Describe your product here..."
          >{{ old('description') }}</textarea>
        </div>

        <div>
          <label for="features" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Key Features <span class="font-normal text-slate-400">(comma separated)</span></label>
          <input
            type="text"
            id="features"
            name="features"
            required
            class="block w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 px-4 py-3 text-base text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="e.g. Fast onboarding, 24/7 support"
            value="{{ old('features') }}"
          >
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-7">
          <div>
            <label for="target_audience" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Target Audience</label>
            <input
              type="text"
              id="target_audience"
              name="target_audience"
              required
              class="block w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 px-4 py-3 text-base text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="e.g. Entrepreneurs, SaaS founders"
              value="{{ old('target_audience') }}"
            >
          </div>
          <div>
            <label for="price" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Price</label>
            <input
              type="text"
              id="price"
              name="price"
              required
              class="block w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 px-4 py-3 text-base text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
              placeholder="e.g. $49/month"
              value="{{ old('price') }}"
            >
          </div>
        </div>

        <div>
          <label for="usp" class="block text-sm font-semibold text-slate-700 dark:text-slate-200 mb-2">Unique Selling Proposition</label>
          <input
            type="text"
            id="usp"
            name="usp"
            required
            class="block w-full rounded-lg border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 px-4 py-3 text-base text-slate-900 dark:text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
            placeholder="e.g. AI-powered suggestions for every section"
            value="{{ old('usp') }}"
          >
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center gap-3 pt-2">
          <button
            type="submit"
            class="inline-flex items-center justify-center rounded-xl bg-gradient-to-b from-indigo-700 to-indigo-900 dark:from-indigo-300 dark:to-indigo-400 px-7 py-3 text-base font-semibold text-white dark:text-indigo-950 shadow-sm hover:shadow-md hover:-translate-y-0.5 active:translate-y-0 transition will-change-transform focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70 focus-visible:ring-offset-2 focus-visible:ring-offset-white dark:focus-visible:ring-offset-slate-950"
          >
            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 19V6l-2 2m8-2v13l2-2M15 12H9"></path>
            </svg>
            Generate Sales Page
          </button>

          <a
            href="{{ route('history') }}"
            class="inline-flex items-center justify-center rounded-xl px-7 py-3 text-base font-semibold text-indigo-800 dark:text-indigo-300 border border-slate-200 dark:border-indigo-700 bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-indigo-950 hover:-translate-y-0.5 active:translate-y-0 transition will-change-transform focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-400/70"
          >
            View History
          </a>
        </div>
      </form>
    </div>

    <div class="mt-10 max-w-3xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
      <div class="rounded-2xl border border-slate-200/70 dark:border-white/10 bg-white/70 dark:bg-slate-900/40 backdrop-blur shadow-sm">
        <div class="p-6">
          <h3 class="text-sm font-semibold tracking-wide text-slate-900 dark:text-white mb-2">
            Writing Tips
          </h3>
          <ul class="mt-3 space-y-2 text-sm text-slate-600 dark:text-slate-300">
            <li class="flex gap-2">
              <span class="mt-1 h-2 w-2 rounded-full bg-indigo-500/70"></span>
              Be specific about your target customer.
            </li>
            <li class="flex gap-2">
              <span class="mt-1 h-2 w-2 rounded-full bg-indigo-500/70"></span>
              List out top 3 features—they drive conversions.
            </li>
            <li class="flex gap-2">
              <span class="mt-1 h-2 w-2 rounded-full bg-indigo-500/70"></span>
              Mention what sets your product apart (USP).
            </li>
            <li class="flex gap-2">
              <span class="mt-1 h-2 w-2 rounded-full bg-indigo-500/70"></span>
              Add proof: guarantees, testimonials, statistics.
            </li>
          </ul>
        </div>
      </div>
      <div class="rounded-2xl border border-slate-200/70 dark:border-white/10 bg-white dark:bg-slate-950/30 p-6 flex items-center">
        <p class="text-sm text-slate-500 dark:text-slate-300 leading-6">
          Your details are used only to generate this page.<br>
          Try various value props and features to compare outputs.<br>
        </p>
      </div>
    </div>
  </div>
</x-app-layout>