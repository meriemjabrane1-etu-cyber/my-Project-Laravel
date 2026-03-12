@extends('layouts.index')

@section('content')

<style>
    * { font-family: 'DM Sans', sans-serif; }
    .serif { font-family: 'DM Serif Display', serif; }

    @import url('https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500;600&display=swap');

    .page-bg {
        background-color: #F5F2EC;
        background-image:
            radial-gradient(circle at 20% 10%, rgba(210,180,140,0.18) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(139,115,85,0.12) 0%, transparent 50%);
        min-height: 100vh;
    }

    .card {
        background: rgba(255,255,255,0.85);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(180,160,130,0.25);
    }

    .divider {
        border: none;
        border-top: 1px solid rgba(139,115,85,0.18);
    }

    .badge {
        background: rgba(139,115,85,0.12);
        color: #7A5C3E;
        font-size: 0.7rem;
        letter-spacing: 0.08em;
        padding: 2px 10px;
        border-radius: 99px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .status-dot {
        width: 7px; height: 7px;
        background: #8BBB7A;
        border-radius: 50%;
        display: inline-block;
        margin-right: 6px;
        animation: pulse-dot 2.5s ease-in-out infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; }
        50%       { opacity: 0.4; }
    }

    @keyframes fadeSlideIn {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .animate-in            { animation: fadeSlideIn 0.5s ease forwards; }
    .animate-in-delay-1    { animation-delay: 0.1s; opacity: 0; }
    .animate-in-delay-2    { animation-delay: 0.2s; opacity: 0; }

    /* Form */
    .field-label {
        font-size: 0.7rem;
        font-weight: 500;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: #A09080;
    }
    .field-input {
        width: 100%;
        border: 1px solid rgba(180,160,130,0.35);
        background: rgba(245,242,236,0.6);
        border-radius: 12px;
        padding: 11px 16px;
        font-size: 0.875rem;
        color: #3D2C1E;
        transition: box-shadow 0.2s, border-color 0.2s;
    }
    .field-input::placeholder { color: #C4B49A; }
    .field-input:focus {
        outline: none;
        border-color: rgba(139,115,85,0.5);
        box-shadow: 0 0 0 3px rgba(139,115,85,0.15);
    }

    .select-arrow {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%237A5C3E' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 14px center;
        -webkit-appearance: none;
        appearance: none;
    }

    .btn-primary {
        background: #3D2C1E;
        color: #fff;
        font-size: 0.875rem;
        font-weight: 500;
        padding: 11px 28px;
        border-radius: 12px;
        border: none;
        cursor: pointer;
        transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    }
    .btn-primary:hover {
        background: #5C432E;
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(61,44,30,0.22);
    }
    .btn-primary:active { transform: translateY(0); }

    /* Course cards */
    .course-card {
        border: 1px solid rgba(180,160,130,0.22);
        border-radius: 16px;
        padding: 18px 20px;
        background: rgba(255,255,255,0.55);
        transition: background 0.18s, transform 0.18s, box-shadow 0.18s;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
    }
    .course-card:hover {
        background: rgba(255,255,255,0.9);
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(139,115,85,0.1);
    }

    .course-icon {
        width: 36px; height: 36px;
        border-radius: 10px;
        background: rgba(139,115,85,0.1);
        display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
        transition: background 0.18s;
    }
    .course-card:hover .course-icon {
        background: rgba(212,149,106,0.18);
    }

    .teacher-link {
        color: #7A5C3E;
        border-bottom: 1px dashed rgba(122,92,62,0.4);
        font-weight: 500;
        transition: color 0.15s, border-color 0.15s;
    }
    .teacher-link:hover {
        color: #3D2C1E;
        border-bottom-style: solid;
    }

    .time-pill {
        font-size: 0.68rem;
        color: #A09080;
        background: rgba(139,115,85,0.08);
        border-radius: 99px;
        padding: 2px 10px;
        white-space: nowrap;
        flex-shrink: 0;
    }
</style>

<div class="page-bg py-10 px-4">
    <div class="max-w-3xl mx-auto space-y-8">

        {{-- ── Header ─────────────────────────────────────────── --}}
        <header class="animate-in">
            <p class="text-xs tracking-widest uppercase mb-1" style="color:#C4B49A;font-weight:500;">Academic Portal</p>
            <div class="flex items-end justify-between flex-wrap gap-3">
                <h1 class="serif text-5xl leading-tight" style="color:#3D2C1E;">
                    Course<br><em>Management</em>
                </h1>
                <div class="flex items-center gap-2 text-sm pb-1" style="color:#A09080;">
                    <span class="status-dot"></span>
                    <span>{{ $courses->count() }} course{{ $courses->count() !== 1 ? 's' : '' }} active</span>
                </div>
            </div>
            <hr class="divider mt-6">
        </header>

        {{-- ── Flash Messages ──────────────────────────────────── --}}
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

        {{-- ── Create Course Form ───────────────────────────────── --}}
        <section class="card rounded-3xl p-8 shadow-sm animate-in animate-in-delay-1">

            <div class="flex items-center justify-between mb-6">
                <div>
                    <span class="badge mb-2 inline-block">New Course</span>
                    <h2 class="serif text-2xl" style="color:#3D2C1E;">Add a Course</h2>
                </div>
                <svg class="w-8 h-8" style="color:#D5C8B8;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.966 8.966 0 00-6 2.292m0-14.25v14.25"/>
                </svg>
            </div>

            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                <div class="space-y-4">

                    <div class="flex flex-col gap-2">
                        <label for="title" class="field-label">Course Title</label>
                        <input
                            type="text"
                            id="title"
                            name="title"
                            value="{{ old('title') }}"
                            placeholder="e.g. Introduction to Physics"
                            class="field-input"
                            required
                        >
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="teacher_id" class="field-label">Assigned Teacher</label>
                        <select id="teacher_id" name="teacher_id" class="field-input select-arrow">
                            <option value="" disabled {{ old('teacher_id') ? '' : 'selected' }}>Select a teacher…</option>
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                    {{ $teacher->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="mt-6 flex items-center justify-end gap-3">
                    <a href="{{ route('courses.index') }}" class="text-sm transition" style="color:#C4B49A;">
                        Reset
                    </a>
                    <button type="submit" class="btn-primary">
                        Create Course
                    </button>
                </div>
            </form>
        </section>

        {{-- ── Courses List ─────────────────────────────────────── --}}
        <section class="card rounded-3xl shadow-sm animate-in animate-in-delay-2" style="overflow:hidden;">

            <div class="px-8 py-6 flex items-center justify-between">
                <div>
                    <span class="badge mb-2 inline-block">Directory</span>
                    <h2 class="serif text-2xl" style="color:#3D2C1E;">All Courses</h2>
                </div>
                <span class="text-sm font-light" style="color:#C4B49A;">{{ $courses->count() }} total</span>
            </div>

            <hr class="divider mx-8">
            
            @if($courses->isEmpty())
                <div style="text-align:center; padding: 64px 32px;">
                    <div style="width:56px;height:56px;border-radius:14px;background:rgba(139,115,85,0.08);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;">
                        <svg style="width:24px;height:24px;color:#C4B49A;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                  d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <p class="serif" style="font-size:1.2rem;color:#C4B49A;font-style:italic;">No courses yet</p>
                    <p style="font-size:0.8rem;color:#D5C8B8;margin-top:4px;">Use the form above to add your first course.</p>
                </div>
            @else
                <div class="px-6 pb-6 pt-4 space-y-3">
                    @foreach($courses->sortByDesc('created_at') as $course)
                    <div class="course-card">
                        <div class="flex items-center gap-4">
                            <div class="course-icon">
                                <svg style="width:18px;height:18px;color:#A08060;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                                          d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.966 8.966 0 00-6 2.292m0-14.25v14.25"/>
                                </svg>
                            </div>
                            <div>
                                <h3 style="font-weight:600;font-size:0.925rem;color:#3D2C1E;">
                                    {{ $course->title }}
                                </h3>
                                <p style="font-size:0.8rem;color:#A09080;margin-top:2px;display:flex;align-items:center;gap:5px;">
                                    <svg style="width:12px;height:12px;opacity:0.6;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <a href="{{ route('teachers.show', $course->teacher->id) }}" class="teacher-link">
                                        {{ $course->teacher->name }}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <span class="time-pill">
                            {{ $course->created_at->diffForHumans() }}
                        </span>
                    </div>
                    @endforeach
                </div>
            @endif

        </section>

    </div>
</div>

@endsection
