{{-- @extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-4">Student Registration</h1>

<form action="{{ route('student.store') }}" method="post" class="w-[60vh] border p-4 flex flex-col gap-y-6">
    @csrf

    <input type="text" name="name" placeholder="Name" class="border p-2" required>
    <input type="number" name="age" placeholder="Age" class="border p-2" required>
    <input type="email" name="email" placeholder="Email" class="border p-2" required>
    <input type="text" name="phone" placeholder="Phone" class="border p-2" required>

    <div>
        <label>School:</label>
        <input type="checkbox" name="school[]" value="Coding"> Coding
        <input type="checkbox" name="school[]" value="Media"> Media
    </div>

    <div>
        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female
    </div>

    <div>
        <label>English Level:</label>
        <input type="range" name="english_level" min="0" max="100">
    </div>

    <select name="campus" class="border p-2" required>
        <option value="">Select Campus</option>
        <option value="Casablanca">Casablanca</option>
        <option value="Bruxel">Bruxel</option>
        <option value="Amsterdam">Amsterdam</option>
    </select>

    <div>
        <label>Accept Terms:</label>
        <input type="radio" name="terms" value="1" required> Yes
        <input type="radio" name="terms" value="0"> No
    </div>

    <button type="submit" class="bg-green-400 p-2 rounded">
        Register
    </button>
</form>

<hr class="my-6">

<h2 class="text-xl font-bold">All Students</h2>

@foreach($students as $student)
    <div class="border p-3 my-2">
        <p><strong>Name:</strong> {{ $student->name }}</p>
        <p><strong>Email:</strong> {{ $student->email }}</p>
        <p><strong>Campus:</strong> {{ $student->campus }}</p>
        <p><strong>School:</strong> {{ implode(', ', $student->school) }}</p>
    </div>
@endforeach

@endsection --}}
