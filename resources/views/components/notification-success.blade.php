<div
    x-cloak
    x-data="{
        isOpen: false,
        messageToDisplay: '{{ session('success_message') }}'
    }"
    x-init="
        @if(session('success_message'))
            $nextTick(() => isOpen = true)

            setTimeout(() => {
                isOpen = false
            }, 5000)
        @endif
         Livewire.on('successNotify', message => {
              isOpen = true
              messageToDisplay = message
              setTimeout(() => {
                isOpen = false
              }, 4000)
          })
            "
    x-show="isOpen"
    x-transition:enter="transition-transform ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-8"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition-all ease-in duration-300"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0 transform translate-x-8"

    class="z-10 flex justify-between max-w-sm w-104 fixed right-0 top-8 bg-white rounded-lg shadow-lg border px-6 py-6 mx-4 my-8">
    <div class="flex items-center font-semibold text-sm text-gray-500 text-base">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-green w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div class="ml-2" x-text="messageToDisplay"></div>
    </div>
    <button class="text-gray-500" @click="isOpen = false">
        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
