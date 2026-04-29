<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <div>
        <h2 class="text-2xl font-bold tracking-tight text-slate-900">
          History
        </h2>
        <p class="mt-1 text-sm text-slate-500">
          Browse and reopen previously generated pages.
        </p>
      </div>
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
  </x-slot>

  <div class="max-w-5xl mx-auto">
    @forelse($salesPages as $page)
      @php
        $content = json_decode($page->generated_content, true);
      @endphp

      <div class="group rounded-2xl border border-slate-200 bg-white shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 mb-5 overflow-hidden card-lift-sm animate-fade-in-up">
        <div class="p-6 sm:p-7">
          <div class="flex items-start justify-between gap-4">
            <div class="min-w-0 flex-1">
              <h2 class="text-base sm:text-lg font-semibold text-slate-900 truncate">
                {{ $page->product_name }}
              </h2>
              <p class="mt-1 text-xs sm:text-sm text-slate-400">
                {{ $page->created_at->diffForHumans() }}
              </p>
            </div>
            <div class="flex items-center gap-2 shrink-0">
              <a
                href="{{ route('history.show', $page->id) }}"
                class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 border border-indigo-200 transition-colors btn-press"
              >
                View
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
              </a>
              <button
                type="button"
                onclick="openDeleteModal('{{ route('history.destroy', $page->id) }}')"
                class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 border border-red-200 transition-colors btn-press"
              >
                <svg class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
              </button>
            </div>
          </div>

          <div class="mt-4">
            <p class="text-sm text-slate-600 leading-relaxed line-clamp-2">
              {{ Str::limit($content['headline'] ?? '', 140) }}
            </p>
          </div>
        </div>
      </div>
    @empty
      <div class="rounded-2xl border border-dashed border-slate-300 bg-white/60 p-14 text-center animate-fade-in-scale">
        <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 mb-4">
          <svg class="h-6 w-6 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
          </svg>
        </div>
        <p class="text-sm text-slate-600 font-medium">
          No generated sales pages yet.
        </p>
        <p class="text-sm text-slate-400 mt-1 mb-6">
          Create your first AI-generated sales page to see it here.
        </p>
        <a
          href="{{ route('dashboard') }}"
          class="inline-flex items-center justify-center rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow-sm hover:bg-slate-800 hover:shadow-md transition-all duration-200 btn-press"
        >
          Generate your first page
        </a>
      </div>
    @endforelse
  </div>

  <!-- Delete Modal -->
  <div
    id="deleteModal"
    class="hidden fixed inset-0 z-50 bg-black/40 backdrop-blur-sm flex items-center justify-center"
  >
    <div class="bg-white rounded-2xl p-6 sm:p-8 w-full max-w-md mx-4 shadow-2xl border border-slate-200 animate-fade-in-scale">
      <div class="flex items-center gap-3 mb-2">
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-red-50">
          <svg class="h-5 w-5 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
          </svg>
        </div>
        <h2 class="text-xl font-bold text-slate-900">
          Delete Sales Page
        </h2>
      </div>
      <p class="text-slate-500 mb-8 mt-2">
        Are you sure you want to delete this sales page? This action cannot be undone.
      </p>
      <div class="flex justify-end gap-3">
        <button
          onclick="closeDeleteModal()"
          class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-700 bg-white border border-slate-200 hover:bg-slate-50 transition-colors btn-press"
        >
          Cancel
        </button>
        <form id="deleteForm" method="POST">
          @csrf
          @method('DELETE')
          <button
            type="submit"
            class="px-4 py-2.5 rounded-xl text-sm font-semibold text-white bg-red-600 hover:bg-red-700 shadow-sm transition-colors btn-press"
          >
            Delete
          </button>
        </form>
      </div>
    </div>
  </div>

  <script>
    function openDeleteModal(actionUrl) {
      document.getElementById('deleteModal').classList.remove('hidden');
      document.getElementById('deleteForm').action = actionUrl;
    }
    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
    }
  </script>
</x-app-layout>

