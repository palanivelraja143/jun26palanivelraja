@extends('layouts.app')

@section('content')
<div class="container" style="border: 1px solid black;">
    <h1 style="text-align:center;">{{ isset($student) ? 'Edit Student' : 'Add Student' }}</h1>
    <form action="{{ isset($student) ? route('students.update', $student) : route('students.store') }}" method="POST">
        @csrf
        @if(isset($student))
            @method('PUT')
        @endif
        <div class="form-group col-md-6">
            <label>Name</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $student->name ?? '') }}">
            @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
        </div>
        <div class="form-group col-md-6">
            <label>Email</label>
            <input class="form-control" type="email" name="email" value="{{ old('email', $student->email ?? '') }}">
            @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
        </div>
        <div class="form-group col-md-6">
            <label>Phone</label>
            <input class="form-control" type="text" name="phone" value="{{ old('phone', $student->phone ?? '') }}">
            @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
        </div>
        <div class="form-group col-md-6">
            <label>Address</label>
            <input class="form-control" type="text" name="address" value="{{ old('address', $student->address ?? '') }}">
            @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
        </div>
       
        <div class="form-group col-md-6">
            <label>City</label>
            <input class="form-control" type="text" name="city" value="{{ old('city', $student->city ?? '') }}">
            @if ($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
        </div>
        <div class="form-group col-md-6">
            <label>State</label>
            <input class="form-control" type="text" name="state" value="{{ old('state', $student->state ?? '') }}">
            @if ($errors->has('state'))
                    <span class="text-danger">{{ $errors->first('state') }}</span>
                @endif
        </div>
        <div class="form-group col-md-6">
            <label>Country</label>
            <input class="form-control" type="text" name="country" value="{{ old('country', $student->country ?? '') }}">
            @if ($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
        </div>
        <div class="form-group col-md-6">
            <label>Status</label>
            <select class="form-control" name="status">
                <option value="1" {{ old('status', $student->status ?? '1') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $student->status ?? '1') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <div>
            <h3>Subjects</h3>
            <div id="subjects-container">
                @if(isset($student))
                    @foreach($student->subjects as $subject)
                        <div class="subject">
                            <input type="hidden" name="subjects[{{ $loop->index }}][id]" value="{{ $subject->id }}">
                            <label>Subject Name</label>
                            <input type="text" name="subjects[{{ $loop->index }}][name]" value="{{ $subject->name }}">
                            <label>Marks Scored</label>
                            <input type="number" name="subjects[{{ $loop->index }}][marks_scored]" value="{{ $subject->marks_scored }}">
                            <label>Grade</label>
                            <input type="text" name="subjects[{{ $loop->index }}][grade]" value="{{ $subject->grade }}">
                        </div>
                    @endforeach
                @else
                    <div class="subject">
                        <label>Subject Name</label>
                        <input type="text" name="subjects[0][name]">
                        <label>Marks Scored</label>
                        <input type="number" name="subjects[0][marks_scored]">
                        <label>Grade</label>
                        <input type="text" name="subjects[0][grade]">
                    </div>
                @endif
            </div>
            <div class="pull-right">
              <button  class="btn btn-success" type="button" id="add-subject">Add Subject</button>
            </div>
        </div>
        <div class="pull-left">
         <button class="btn btn-success" type="submit">{{ isset($student) ? 'Update' : 'Add' }} Student</button>
        </div>
    </form>
</div>
    <script>
        document.getElementById('add-subject').addEventListener('click', function() {
            const container = document.getElementById('subjects-container');
            const index = container.children.length;
            const newSubject = document.createElement('div');
            newSubject.classList.add('subject');
            newSubject.innerHTML = `
                <label>Subject Name</label>
                <input type="text" name="subjects[${index}][name]">
                <label>Marks Scored</label>
                <input type="number" name="subjects[${index}][marks_scored]">
                <label>Grade</label>
                <input type="text" name="subjects[${index}][grade]">
            `;
            container.appendChild(newSubject);
        });
    </script>
@endsection
