<?php

namespace App\Http\Requests;

use App\Rules\PublishDate;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'book_name' => 'required|string',
            'book_author' => 'required|string',
            'book_price' => 'required|numeric|min:0',
            'book_description' => 'required|string',
            'book_language' => 'required|string',
            'book_publisher_date' => ['required', 'date', new PublishDate()],
            'book_publisher_id' => 'required|integer|exists:publishers,id',
            'book_image' => 'required|string|url',
            'book_page_count'=> 'required|integer|min:0',
            'book_reading_age'=> 'required|string',
            'book_dimensions'=> 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'book_name.required' => 'The book name is required.',
            'book_author.required' => 'The author of the book is required.',
            'book_price.required' => 'Please provide the price of the book.',
            'book_price.numeric' => 'The book price must be a valid number.',
            'book_price.min' => 'The book price cannot be negative.',
            'book_description.required' => 'A description of the book is required.',
            'book_language.required' => 'Please specify the language of the book.',
            'book_publisher_date.required' => 'The publishing date is required.',
            'book_publisher_date.date' => 'Please provide a valid date for the publishing date.',
            'book_publisher.required' => 'The publisher ID is required.',
            'book_publisher.integer' => 'The publisher ID must be an integer.',
            'book_publisher.exists' => 'The specified publisher does not exist.',
            'book_image.required' => 'A URL for the book image is required.',
            'book_image.string' => 'The book image URL must be a valid string.',
            'book_image.url' => 'The book image must be a valid URL.',
            'book_page_count.required' => 'Please provide the number of pages in the book.',
            'book_page_count.integer' => 'The page count must be a valid integer.',
            'book_page_count.min' => 'The page count cannot be negative.',
            'book_reading_age.required' => 'Please provide the recommended reading age.',
            'book_reading_age.integer' => 'The reading age must be a valid integer.',
            'book_reading_age.min' => 'The reading age cannot be negative.',
            'book_dimensions.required' => 'Please provide the dimensions of the book.',
            'book_dimensions.string' => 'The book dimensions must be a valid string.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors], 422));
    }


}
