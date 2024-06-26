<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
      
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'status' => 'required|boolean',
            'subjects' => 'required|array',
            'subjects.*.name' => 'required|string|max:255',
            'subjects.*.marks_scored' => 'required|integer',
            'subjects.*.grade' => 'required|string|max:2',
        ]);
       
        $student = Student::create($data);
        foreach ($data['subjects'] as $subject) {
            $student->subjects()->create($subject);
        }

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'status' => 'required|boolean',
            'subjects' => 'required|array',
            'subjects.*.id' => 'sometimes|exists:subjects,id',
            'subjects.*.name' => 'required|string|max:255',
            'subjects.*.marks_scored' => 'required|integer',
            'subjects.*.grade' => 'required|string|max:2',
        ]);

        $student->update($data);
        foreach ($data['subjects'] as $subject) {
            if (isset($subject['id'])) {
                $student->subjects()->where('id', $subject['id'])->update($subject);
            } else {
                $student->subjects()->create($subject);
            }
        }

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }

    public function toggleStatus(Student $student)
    {
        $student->status = !$student->status;
        $student->save();

        return response()->json(['status' => 'success', 'student' => $student]);
    }
}
?>