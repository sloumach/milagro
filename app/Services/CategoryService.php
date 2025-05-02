<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

/**
 * Service pour encapsuler la logique métier des catégories.
 */
class CategoryService
{
    /**
     * Récupérer toutes les catégories avec leurs sous-catégories.
     */
    public function getAll(): Collection
    {
        return Category::with('children')->whereNull('parent_id')->get();
    }

    /**
     * Créer une nouvelle catégorie.
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * Trouver une catégorie par ID.
     */
    public function find(int $id): Category
    {
        return Category::with('children')->findOrFail($id);
    }

    /**
     * Mettre à jour une catégorie.
     */
    public function update(int $id, array $data): Category
    {
        $category = Category::findOrFail($id);
        $category->update($data);

        return $category;
    }

    /**
     * Supprimer une catégorie.
     */
    public function delete(int $id): void
    {
        $category = Category::findOrFail($id);
        $category->delete();
    }
}
