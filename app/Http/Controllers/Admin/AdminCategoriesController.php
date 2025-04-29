<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

/**
 * Controller pour la gestion des catégories (CRUD) côté Admin.
 */
class AdminCategoriesController extends Controller
{
    protected CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Lister toutes les catégories avec leurs sous-catégories.
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'categories' => $this->categoryService->getAll(),
        ]);
    }

    /**
     * Créer une nouvelle catégorie.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->create($request->validated());

        return response()->json([
            'message' => 'Catégorie créée avec succès.',
            'category' => $category,
        ], 201);
    }

    /**
     * Afficher une catégorie spécifique.
     */
    public function show(int $id): JsonResponse
    {
        $category = $this->categoryService->find($id);

        return response()->json([
            'category' => $category,
        ]);
    }

    /**
     * Modifier une catégorie existante.
     */
    public function update(UpdateCategoryRequest $request, int $id): JsonResponse
    {
        $category = $this->categoryService->update($id, $request->validated());

        return response()->json([
            'message' => 'Catégorie mise à jour avec succès.',
            'category' => $category,
        ]);
    }

    /**
     * Supprimer une catégorie.
     */
    public function destroy(int $id): JsonResponse
    {
        $this->categoryService->delete($id);

        return response()->json([
            'message' => 'Catégorie supprimée avec succès.',
        ]);
    }
}
