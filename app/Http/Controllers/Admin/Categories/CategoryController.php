<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Shop\Categories\Repositories\CategoryRepository;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Shop\Categories\Requests\CreateCategoryRequest;
use App\Shop\Categories\Requests\UpdateCategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\EcommTrait;

class CategoryController extends Controller
{
    use EcommTrait;
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * CategoryController constructor.
     *
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->ebrandsAll();
        $list = $this->categoryRepo->rootCategories('created_at', 'desc');

        return view('admin.categories.list', [
            'categories' => $this->categoryRepo->paginateArrayResults($list->all()), 'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->ebrandsAll();
        return view('admin.categories.create', [
            'categories' => $this->categoryRepo->listCategories('name', 'asc'), 'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $this->categoryRepo->createCategory($request->except('_token', '_method'));

        return redirect()->route('admin.categories.index')->with('message', 'Category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->ebrandsAll();
        $category = $this->categoryRepo->findCategoryById($id);

        $cat = new CategoryRepository($category);

        return view('admin.categories.show', [
            'category' => $category,
            'categories' => $category->children,
            'products' => $cat->findProducts(),
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->ebrandsAll();
        return view('admin.categories.edit', [
            'categories' => $this->categoryRepo->listCategories('name', 'asc', $id),
            'category' => $this->categoryRepo->findCategoryById($id), 
            'data' => $data

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category = $this->categoryRepo->findCategoryById($id);

        $update = new CategoryRepository($category);
        $update->updateCategory($request->except('_token', '_method'));

        $request->session()->flash('message', 'Update successful');
        return redirect()->route('admin.categories.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $category = $this->categoryRepo->findCategoryById($id);
        $category->products()->sync([]);
        $category->delete();

        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removeImage(Request $request)
    {
        $this->categoryRepo->deleteFile($request->only('category'));
        request()->session()->flash('message', 'Image delete successful');
        return redirect()->route('admin.categories.edit', $request->input('category'));
    }
}
