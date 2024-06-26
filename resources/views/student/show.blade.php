@extends('layouts.app')

@section('content')
    <h1>Student Details</h1>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>Address:</strong> {{ $student->address }}</p>
    <p><strong>City:</strong> {{ $student->city }}</p>
    <p><strong>State:</strong> {{ $student->state }}</p>
    <p><strong>Country:</strong> {{ $student->country }}</p>
    <p><strong>Status:</strong> {{ $student->status ? 'Active' : 'Inactive' }}</p>

    <h3>Subjects</h3>
    <table>
        <thead>
            <tr>
                <th>Subject Name</th>
                <th>Marks Scored</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($student->subjects as $subject)
                <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->marks_scored }}</td>
                    <td>{{ $subject->grade }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('students.index') }}">Back to Students</a>
@endsection
