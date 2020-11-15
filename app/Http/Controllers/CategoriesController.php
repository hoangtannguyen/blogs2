<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Repositories\Category\CategoryRepository;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{

      /**
     * @var CategoryRepositoryInterfaces|\App\Repositories\Repository
     */
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->middleware('auth');
        $this->categoryRepository = $categoryRepository;    
    }

    public function view()
    {
        return view('backend.category.index');
    }

    public function index()
    {   
        $categories = $this->categoryRepository->getAll();
        return response()->json($categories);
    }

    public function show($id)
    {
        $category = $this->categoryRepository->find($id);
        return response()->json($category);
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();      
        $categories = $this->categoryRepository->create($data);
        return response()->json($categories);
    }
    
    public function edit($id)
    {
        $categories = $this->categoryRepository->edits($id);
        return response()->json($categories);
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $category = $this->categoryRepository->update($id, $data);
        return response()->json($category);
    }
    
    public function destroy($id)
    {
        $categories = $this->categoryRepository->delete($id);
        return response()->json($categories);
    }
}
