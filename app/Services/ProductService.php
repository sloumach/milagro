<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function getAll(): Collection
    {
        return Product::with(['category', 'images', 'tags'])->get();
    }

    public function create(array $data): Product
    {
        $product = Product::create($data);

        if (!empty($data['tags'])) {
            $product->tags()->sync($data['tags']);
        }

        if (!empty($data['images'])) {
            foreach ($data['images'] as $imageFile) {
                $path = $imageFile->store('product-images', 'public');
                $product->images()->create(['image_path' => '/storage/' . $path]);
            }
        }

        return $product->load(['category', 'tags', 'images']);
    }


    public function find(int $id): Product
    {
        return Product::with(['category', 'images', 'tags'])->findOrFail($id);
    }

    public function update(int $id, array $data): Product
    {
        $product = Product::findOrFail($id);
        $product->update($data);

        if (!empty($data['tags'])) {
            $product->tags()->sync($data['tags']);
        }

        if (!empty($data['images'])) {
            // Supprimer anciennes images (fichiers + DB)
            /* foreach ($product->images as $img) {
                if ($img->image_path && file_exists(public_path($img->image_path))) {
                    unlink(public_path($img->image_path));
                }
                $img->delete();
            } */

            foreach ($data['images'] as $imageFile) {
                $path = $imageFile->store('product-images', 'public');
                $product->images()->create(['image_path' => '/storage/' . $path]);
            }
        }

        return $product->load(['category', 'tags', 'images']);
    }


    public function delete(int $id): void
    {
        $product = Product::findOrFail($id);

        // Supprimer les fichiers images du disque
        foreach ($product->images as $img) {
            if ($img->image_path && file_exists(public_path($img->image_path))) {
                unlink(public_path($img->image_path));
            }
            $img->delete(); // Supprimer la ligne de la table product_images
        }

        // Détacher les tags
        $product->tags()->detach();

        // Supprimer le produit lui-même
        $product->delete();
    }

}
