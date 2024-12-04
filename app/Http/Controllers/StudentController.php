<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    private function mapStudentData($students, $majorName)
    {
        $classCounts = ['10' => 0, '11' => 0, '12' => 0];
        foreach ($students as $student) {
            if (in_array($student->class, ['10', '11', '12'])) {
                $classCounts[$student->class] += $student->amount;
            }
        }
        return [
            'major' => $majorName,
            'class_counts' => $classCounts,
            'total' => array_sum($classCounts),
        ];
    }

    private function getFormattedStudents()
    {
        return Student::with('major')
            ->get()
            ->groupBy('major.name')
            ->map(fn($students, $majorName) => $this->mapStudentData($students, $majorName))
            ->toArray();
    }

    private function renderInformationPage($page, array $data = [])
    {
        return view("pages.information.$page", $data);
    }

    public function students()
    {
        return $this->renderInformationPage('students', ['students' => $this->getFormattedStudents()]);
    }
}
