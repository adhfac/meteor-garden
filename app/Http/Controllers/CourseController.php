<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Menampilkan daftar semua kelas.
     */
    public function index()
    {
        $courses = Course::all();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Menampilkan form untuk membuat kelas baru.
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Menyimpan kelas baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'kapasitas' => ['required', 'integer', 'min:1'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'status' => ['required', 'in:aktif,tidak aktif'],
        ]);

        Course::create($request->all());

        return redirect()->route('course.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail satu kelas tertentu (jika diperlukan).
     */
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }

    public function memberIndex()
    {
        $courses = Course::where('status', 'aktif')->get();

        return view('course.index', compact('courses'));
    }

    /**
     * Menampilkan form edit untuk kelas tertentu.
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Memperbarui data kelas di database.
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'nama_kelas' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'kapasitas' => ['required', 'integer', 'min:1'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'status' => ['required', 'in:aktif,tidak aktif'],
        ]);

        // 2. Update data
        $course->update($request->all());

        return redirect()->route('course.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    /**
     * Menghapus kelas dari database.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('course.index')->with('success', 'Kelas berhasil dihapus.');
    }
}