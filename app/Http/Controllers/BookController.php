<?php

namespace App\Http\Controllers;

use App\Exceptions\BookException;
use App\Helper\ApiResponse;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Http\Resources\Collection\BookCollection;
use App\Service\BookService;
use Faker\Provider\Base;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends BaseController
{

    private BookService $bookService;
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     */


    public function index(): JsonResponse
    {

        try {
            $books = $this->bookService->getAllBooks();
            return $this->successResponse(new BookCollection($books), 'Books retrieved successfully');
        } catch (BookException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request) : JsonResponse
    {

        try {
            $book = $this->bookService->create($request->validated());
            return $this->successResponse(new BookResource($book), 'Book created successfully', 201);
        } catch (BookException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id) :JsonResponse
    {

        try {
            $book = $this->bookService->getBookById((int)$id);
            return $this->successResponse(new BookResource($book), 'Book retrieved successfully');
        } catch (BookException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $id): JsonResponse
    {
        try {
            $this->bookService->update((int)$id, $request->validated()->all());
            return $this->successResponse(new BookResource($book), 'Book updated successfully');
        } catch (BookException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        try {
            $this->bookService->delete((int)$id);
            return $this->successResponse(new BookResource($book), 'Book deleted successfully');
        } catch (BookException $e) {
            return $this->errorResponse($e->getMessage(), $e->getCode());
        }
    }
}
