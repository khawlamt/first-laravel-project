@extends('layouts.app')

@section('content')
<div class="container" style="max-width: 700px; margin: 0 auto; padding: 2rem;">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>📋 Mes Tâches</h2>
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Nouvelle tâche</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @forelse($tasks as $task)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <h5 class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
                        {{ $task->title }}
                    </h5>
                    <p class="text-muted mb-0">{{ $task->description }}</p>
                </div>
                <div class="d-flex gap-2 align-items-start">

                    {{-- ✅ Bouton Modifier --}}
                    @can('update', $task)
                        <a href="{{ route('tasks.edit', $task) }}"
                           class="btn btn-sm btn-outline-primary">Modifier</a>
                    @endcan

                    {{-- ✅ Bouton Supprimer --}}
                    @can('delete', $task)
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Supprimer ?')">
                                Supprimer
                            </button>
                        </form>
                    @endcan

                </div>
            </div>
        </div>
    @empty
        <p>Aucune tâche. <a href="{{ route('tasks.create') }}">Créer votre première tâche</a></p>
    @endforelse

</div>
@endsection
