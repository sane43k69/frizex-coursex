public function search(Request $request)
{
    $query = $request->input('q');

    // Если нет запроса — показываем все курсы
    if (!$query) {
        $courses = \App\Models\Course::paginate(12);
    } else {
        $courses = \App\Models\Course::where('title_en', 'like', "%{$query}%")
            ->orWhere('description_en', 'like', "%{$query}%")
            ->paginate(12);
    }

    return view('frontend.courses.search', compact('courses', 'query'));
}
