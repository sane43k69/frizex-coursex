<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseCategory;

class SearchCourseController extends Controller
{
    public function index(Request $request)
    {
        // Получаем все категории для фильтра
        $categories = CourseCategory::get();

        // Параметры фильтрации
        $selectedCategories = $request->input('categories', []);
        $search = $request->input('q'); // поисковый запрос
        $minRating = 4.0; // минимальный рейтинг

        // Фильтрация курсов
        $courses = Course::where('status', 2)
            ->when($selectedCategories, function ($query) use ($selectedCategories) {
                $query->whereIn('course_category_id', $selectedCategories);
            })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title_en', 'like', "%{$search}%")
                      ->orWhere('title_ru', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->get()
            ->filter(function ($course) use ($minRating) {
                // Генерация стабильного "рандомного" рейтинга, чтобы не менялся при обновлении
                mt_srand($course->id);
                $rating = mt_rand(43, 49) / 10;
                return $rating >= $minRating;
            });

        // Все активные курсы (для количества)
        $allCourses = Course::where('status', 2)->get();

        return view('frontend.searchCourse', [
            'course' => $courses,
            'category' => $categories,
            'selectedCategories' => $selectedCategories,
            'allCourse' => $allCourses,
        ]);
    }
}
