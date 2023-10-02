@can('update', $idea)
    <livewire:edit-idea :idea="$idea" />
@endcan

@can('delete', $idea)
    <livewire:delete-idea :idea="$idea" />
@endcan

@if(!auth()->guest())
    <livewire:mark-idea-as-spam :idea="$idea" />
@endif

<livewire:mark-idea-as-not-spam :idea="$idea" />
