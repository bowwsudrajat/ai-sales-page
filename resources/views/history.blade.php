<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      History
    </h2>
  </x-slot>

  <div class="flex items-start justify-between gap-4 flex-wrap">
    <div>
      <h1 class="text-2xl sm:text-3xl font-semibold tracking-tight text-slate-900 dark:text-white">
        Generated Sales Pages
      </h1>
      <p class="mt-1 text-sm text-slate-600 dark:text-slate-300">
        Browse and reopen previously generated pages.
      </p>
    </div>

    <a
      href="{{ route('dashboard') }}"
      class="inline-flex items-center justify-center rounded-xl px-4 py-2.5 text-sm font-semibold text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-white/10 bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-white/5 hover:-translate-y-0.5 active:translate-y-0 transition will-change-transform focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70"
    >
      New generation
    </a>
  </div>

  <div class="mt-6">
    @forelse($salesPages as $page)
      @php
        $content = json_decode($page->generated_content, true);
      @endphp
      
      <div class="p-6 sm:p-7">
        <div class="flex items-start justify-between gap-4">
          <div class="min-w-0">
            <h2 class="text-base sm:text-lg font-semibold text-slate-900 dark:text-white truncate">
              {{ $page->product_name }}
            </h2>
            <p class="mt-1 text-xs sm:text-sm text-slate-500 dark:text-slate-400">
              {{ $page->created_at->diffForHumans() }}
            </p>
          </div>
          <span class="inline-flex items-center gap-1 text-sm font-semibold text-indigo-600 dark:text-indigo-400">
            <a
              href="{{ route('history.show', $page->id) }}"
              class="group block rounded-2xl border border-slate-200/70 dark:border-white/10 bg-white dark:bg-slate-900 shadow-sm hover:shadow-md transition-shadow hover:-translate-y-0.5 will-change-transform focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70"
            >
              View
              <span class="transition-transform group-hover:translate-x-0.5" aria-hidden="true">→</span>
            </a>
            <button
              type="button"
              onclick="openDeleteModal('{{ route('history.destroy', $page->id) }}')"
              class="text-red-500 hover:text-red-700"
            >
              Delete
            </button>
          </span>
        </div>
        
        <div class="mt-4 text-sm leading-6 text-slate-700 dark:text-slate-300 whitespace-pre-wrap">
          {{ Str::limit($content['headline'] ?? '', 120) }}
        </div>
      </div>

      <div class="h-4"></div>
    @empty
      <div class="rounded-2xl border border-dashed border-slate-300/70 dark:border-white/15 bg-white/60 dark:bg-slate-900/30 p-10 text-center">
        <p class="text-sm text-slate-600 dark:text-slate-300">
          No generated sales pages yet.
        </p>
        <div class="mt-5">
          <a
            href="{{ route('dashboard') }}"
            class="inline-flex items-center justify-center rounded-xl bg-gradient-to-b from-slate-900 to-slate-950 dark:from-white dark:to-slate-100 px-5 py-3 text-sm font-semibold text-white dark:text-slate-900 shadow-sm hover:shadow-md hover:-translate-y-0.5 active:translate-y-0 transition will-change-transform focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500/70 focus-visible:ring-offset-2 focus-visible:ring-offset-slate-50 dark:focus-visible:ring-offset-slate-950"
          >
            Generate your first page
          </a>
        </div>
      </div>
    @endforelse
    <div
      id="deleteModal"
      class="hidden inset-0 bg-black/60 backdrop-blur-sm flex items-center justify-center z-50"
    >
      <div class="bg-white dark:bg-gray-800 p-6 rounded-2xl w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">
          Delete Sales Page
        </h2>
        <p class="text-gray-600 dark:text-gray-300 mb-6">
          Are you sure you want to delete this sales page?
        </p>
        <div class="flex justify-end gap-3">
          <button
            onclick="closeDeleteModal()"
            class="px-4 py-2 rounded-lg bg-gray-200 dark:bg-gray-700"
          >
            Cancel
          </button>
          <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <button
              type="submit"
              class="px-4 py-2 rounded-lg bg-red-600 text-white"
            >
              Delete
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>

    function openDeleteModal(actionUrl) {
      document
        .getElementById('deleteModal')
        .classList.remove('hidden');
      document
        .getElementById('deleteForm')
        .action = actionUrl;
    }
    function closeDeleteModal() {
      document
        .getElementById('deleteModal')
        .classList.add('hidden');
    }

  </script>
</x-app-layout>