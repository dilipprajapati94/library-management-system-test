<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->role === 'librarian';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'isbn' => 'required|unique:books,isbn,' . $this->id,
            'copies_total' => 'required|integer|min:1',
            'published_at' => 'nullable|date|before_or_equal:today',
        ];
    }
}
