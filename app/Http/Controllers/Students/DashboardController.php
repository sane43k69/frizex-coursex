<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Enrollment;
use App\Models\Checkout;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $student_id = currentUserId();

        // Информация о студенте
        $student_info = Student::find($student_id);

        // Получаем все зачисления студента и подгружаем связанные модели
        $enrollments = Enrollment::where('student_id', $student_id)
            ->with(['course', 'course.instructor'])
            ->get();

        // Для совместимости с текущим Blade: переменная $enrollment
        $enrollment = $enrollments;

        // Коллекция моделей Course (без null)
        $courses = $enrollments->map(function ($e) {
            return $e->course;
        })->filter()->values();

        // Активные зачисления (если в базе есть статус)
        $activeEnrollments = $enrollments->filter(function ($e) {
            return isset($e->status) && in_array($e->status, ['active', 'enrolled', 'started']);
        })->values();

        // Завершённые зачисления
        $completedEnrollments = $enrollments->filter(function ($e) {
            return isset($e->status) && in_array($e->status, ['completed', 'finished']);
        })->values();

        // Коллекции Course для удобного использования в Blade
        $activeCourses = $activeEnrollments->map->course->filter()->values();
        $completedCourses = $completedEnrollments->map->course->filter()->values();

        // История покупок (checkout)
        $checkout = Checkout::where('student_id', $student_id)
            ->latest()
            ->get();

        // Возвращаем все переменные во View
        return view('students.dashboard', compact(
            'student_info',
            'enrollment',
            'enrollments',
            'courses',
            'activeEnrollments',
            'completedEnrollments',
            'activeCourses',
            'completedCourses',
            'checkout'
        ));
    }
}
