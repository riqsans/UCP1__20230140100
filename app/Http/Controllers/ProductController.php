<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\QueryException;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('product.index', compact('products'));
    }

    /**
     * Menyimpan produk baru ke database.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            Product::create($request->validated());

            return redirect()
                ->route('product.index')
                ->with('success', 'Product created successfully.');

        } catch (QueryException $e) {
            Log::error('Product store database error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Database error while creating product.');

        } catch (\Throwable $e) {
            Log::error('Product store unexpected error', [
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unexpected error occurred.');
        }
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        $users = User::orderBy('name')->get();
        return view('product.create', compact('users'));
    }

    /**
     * Menampilkan detail produk tertentu.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.view', compact('product'));
    }

    /**
     * Memperbarui data produk di database.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        // Memeriksa izin sebelum melakukan update data
        Gate::authorize('update', $product);

        try {
            $product->update($request->validated());

            return redirect()
                ->route('product.index')
                ->with('success', 'Product updated successfully.');

        } catch (QueryException $e) {
            Log::error('Product update database error', [
                'id' => $id,
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Database error while updating product.');

        } catch (\Throwable $e) {
            Log::error('Product update unexpected error', [
                'id' => $id,
                'message' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Unexpected error occurred.');
        }
    }

    /**
     * Menampilkan form edit produk.
     */
    public function edit(Product $product)
    {
        Gate::authorize('update', $product);
    
        $users = User::orderBy('name')->get();
        return view('product.edit', compact('product', 'users'));
    }

    /**
     * Menghapus produk dari database.
     */
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        Gate::authorize('delete', $product);
    
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product dihapus');
    }

    /**
     * Fitur tambahan untuk export data.
     */
    public function export()
    {
        Gate::authorize('access-admin');
        return "Halaman Export Data (Hanya Admin yang bisa lihat ini)";
    }
}