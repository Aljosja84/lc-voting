<x-app-layout xmlns:x-transition="http://www.w3.org/1999/xhtml">
    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
            <span class="ml-2">All ideas (including filters)</span>
        </a>
    </div>

    <livewire:idea-show :idea="$idea" :votesCount="$votesCount"/>
    <livewire:idea-comments :idea="$idea" />
    <!-- success notification -->
    <x-notification-success />
    <!-- end success notification -->

    <x-modals-container :idea="$idea" />


</x-app-layout>
