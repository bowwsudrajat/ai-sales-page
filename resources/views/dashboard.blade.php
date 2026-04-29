<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
          AI Sales Page Generator
        </h2>
        <p class="mt-1 text-sm text-slate-500">
          Describe your product and let AI craft a high-converting sales page.
        </p>
      </div>
    </div>
  </x-slot>

  <div class="mx-auto max-w-3xl py-8 sm:py-12 px-4 sm:px-6">
    <!-- Form Card -->
    <div class="rounded-2xl border border-gray-200 bg-white p-5 md:p-6">
      <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-semibold text-slate-900 uppercase tracking-wider">
          Product Details
        </h3>
      </div>

      <form method="POST" action="/generate" class="p-6 sm:p-8 space-y-6">
        @csrf

        <div>
          <label for="product_name" class="block text-sm font-semibold text-slate-700 mb-2">
            Product Name
          </label>
          <input
            type="text"
            id="product_name"
            name="product_name"
            required
            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-base text-slate-900 placeholder-slate-400 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-colors input-premium"
            placeholder="Enter your product name"
            value="{{ old('product_name') }}"
          >
        </div>

        <div>
          <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">
            Product Description
          </label>
          <textarea
            id="description"
            name="description"
            required
            rows="4"
            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-base text-slate-900 placeholder-slate-400 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-colors resize-none input-premium"
            placeholder="Describe your product here..."
          >{{ old('description') }}</textarea>
        </div>

        <div>
          <label for="features" class="block text-sm font-semibold text-slate-700 mb-2">
            Key Features <span class="font-normal text-slate-400">(comma separated)</span>
          </label>
          <input
            type="text"
            id="features"
            name="features"
            required
            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-base text-slate-900 placeholder-slate-400 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-colors input-premium"
            placeholder="e.g. Fast onboarding, 24/7 support"
            value="{{ old('features') }}"
          >
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
          <div>
            <label for="target_audience" class="block text-sm font-semibold text-slate-700 mb-2">
              Target Audience
            </label>
            <input
              type="text"
              id="target_audience"
              name="target_audience"
              required
              class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-base text-slate-900 placeholder-slate-400 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-colors input-premium"
              placeholder="e.g. Entrepreneurs, SaaS founders"
              value="{{ old('target_audience') }}"
            >
          </div>
          <div>
            <label for="price" class="block text-sm font-semibold text-slate-700 mb-2">
              Price
            </label>
            <input
              type="text"
              id="price"
              name="price"
              required
              class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-base text-slate-900 placeholder-slate-400 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-colors input-premium"
              placeholder="e.g. $49/month"
              value="{{ old('price') }}"
            >
          </div>
        </div>

        <div>
          <label for="usp" class="block text-sm font-semibold text-slate-700 mb-2">
            Unique Selling Proposition
          </label>
          <input
            type="text"
            id="usp"
            name="usp"
            required
            class="block w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-base text-slate-900 placeholder-slate-400 shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition-colors input-premium"
            placeholder="e.g. AI-powered suggestions for every section"
            value="{{ old('usp') }}"
          >
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center gap-3 pt-2">
          <button
            type="submit"
            class="inline-flex items-center justify-center rounded-xl bg-indigo-600 px-7 py-3 text-base font-semibold text-white shadow-md hover:bg-indigo-700 hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70 focus-visible:ring-offset-2 btn-shine btn-press"
          >
            <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.455 2.456L21.75 6l-1.036.259a3.375 3.375 0 00-2.455 2.456z"></path>
            </svg>
            Generate Sales Page
          </button>

          <a
            href="{{ route('history') }}"
            class="inline-flex items-center justify-center rounded-xl px-7 py-3 text-base font-semibold text-slate-700 border border-slate-200 bg-white hover:bg-slate-50 hover:border-slate-300 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70 btn-press"
          >
            View History
          </a>
        </div>
      </form>
    </div>

    <!-- Tips & Info -->
    <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6 stagger-children">
      <div class="rounded-2xl border border-slate-200 bg-white shadow-sm p-6 card-lift-sm">
        <div class="flex items-center gap-3 mb-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-50">
            <svg class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 001.5-.189m-1.5.189a6.01 6.01 0 01-1.5-.189m3.75 7.478a12.06 12.06 0 01-4.5 0m3.75 2.383a14.406 14.406 0 01-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 10-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
            </svg>
          </div>
          <h3 class="text-sm font-semibold text-slate-900">
            Writing Tips
          </h3>
        </div>
        <ul class="space-y-3 text-sm text-slate-600">
          <li class="flex gap-3">
            <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-indigo-500 shrink-0"></span>
            Be specific about your target customer and their pain points.
          </li>
          <li class="flex gap-3">
            <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-indigo-500 shrink-0"></span>
            List out top 3 features — they drive conversions.
          </li>
          <li class="flex gap-3">
            <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-indigo-500 shrink-0"></span>
            Mention what sets your product apart (USP).
          </li>
          <li class="flex gap-3">
            <span class="mt-1.5 h-1.5 w-1.5 rounded-full bg-indigo-500 shrink-0"></span>
            Add proof: guarantees, testimonials, statistics.
          </li>
        </ul>
      </div>

      <div class="rounded-2xl border border-slate-200 bg-white shadow-sm p-6 flex items-center card-lift-sm">
        <div class="flex items-start gap-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-50 shrink-0">
            <svg class="h-5 w-5 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
            </svg>
          </div>
          <p class="text-sm text-slate-600 leading-relaxed">
            Your details are used only to generate this page.
            Try various value props and features to compare outputs.
          </p>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

