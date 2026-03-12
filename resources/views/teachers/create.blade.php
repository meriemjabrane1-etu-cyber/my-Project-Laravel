@extends('layouts.index')

@section('content')

<div class="page-bg py-10 px-4">
    <div class="max-w-3xl mx-auto space-y-8">

    {{-- Header --}}
    <header class="animate-in">
        <p class="text-xs tracking-widest uppercase mb-1" style="color:#C4B49A;font-weight:500;">Academic Portal</p>

        <div class="flex items-end justify-between flex-wrap gap-3">
            <h1 class="serif text-5xl leading-tight" style="color:#3D2C1E;">
                Teacher<br><em>Management</em>
            </h1>

            <div class="flex items-center gap-2 text-sm pb-1" style="color:#A09080;">
                <span class="status-dot"></span>
                <span>{{ $teachers->count() }} teacher{{ $teachers->count() !== 1 ? 's' : '' }}</span>
            </div>
        </div>

        <hr class="divider mt-6">
    </header>


    {{-- Flash Messages --}}
    @if(session('success'))
    <div class="card rounded-2xl px-5 py-4 border-l-4 border-green-500 text-sm animate-in" style="color:#276749;">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="card rounded-2xl px-5 py-4 border-l-4 border-red-400 text-sm animate-in" style="color:#9B1C1C;">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    {{-- Create Teacher --}}
    <section class="card rounded-3xl p-8 shadow-sm animate-in animate-in-delay-1">

        <div class="flex items-center justify-between mb-6">
            <div>
                <span class="badge mb-2 inline-block">New Teacher</span>
                <h2 class="serif text-2xl" style="color:#3D2C1E;">Add a Teacher</h2>
            </div>

            <svg class="w-8 h-8" style="color:#D5C8B8;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                    d="M5.121 17.804A6 6 0 0112 15a6 6 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
        </div>

        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf

            <div class="space-y-4">

                <div class="flex flex-col gap-2">
                    <label class="field-label">Teacher Name</label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="e.g. Dr. Ahmed Hassan"
                        class="field-input"
                        required
                    >
                </div>

            </div>

            <div class="mt-6 flex items-center justify-end gap-3">
                <a href="{{ route('teachers.index') }}" class="text-sm transition" style="color:#C4B49A;">
                    Reset
                </a>

                <button type="submit" class="btn-primary">
                    Create Teacher
                </button>
            </div>

        </form>

    </section>



    {{-- Teachers List --}}
    <section class="card rounded-3xl shadow-sm animate-in animate-in-delay-2" style="overflow:hidden;">

        <div class="px-8 py-6 flex items-center justify-between">
            <div>
                <span class="badge mb-2 inline-block">Directory</span>
                <h2 class="serif text-2xl" style="color:#3D2C1E;">All Teachers</h2>
            </div>

            <span class="text-sm font-light" style="color:#C4B49A;">
                {{ $teachers->count() }} total
            </span>
        </div>

        <hr class="divider mx-8">


        @if($teachers->isEmpty())

            <div style="text-align:center; padding: 64px 32px;">
                <p class="serif" style="font-size:1.2rem;color:#C4B49A;font-style:italic;">
                    No teachers yet
                </p>

                <p style="font-size:0.8rem;color:#D5C8B8;margin-top:4px;">
                    Use the form above to add your first teacher.
                </p>
            </div>

        @else

            <div class="px-6 pb-6 pt-4 space-y-3">

                @foreach($teachers->sortByDesc('created_at') as $teacher)

                <div class="course-card">

                    <div class="flex items-center gap-4">

                        <div class="course-icon">

                            <svg style="width:18px;height:18px;color:#A08060;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A6 6 0 0112 15a6 6 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>

                        </div>

                        <div>
                            <h3 style="font-weight:600;font-size:0.925rem;color:#3D2C1E;">
                                {{ $teacher->name }}
                            </h3>
                        </div>

                    </div>

                    <span class="time-pill">
                        {{ $teacher->created_at->diffForHumans() }}
                    </span>

                </div>

                @endforeach

            </div>

        @endif

    </section>

</div>


</div>

@endsection
