<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo)
    {
        $this->categoryRepo = $categoryRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepo->getCategoryList();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $options['name'] = $request->name;
        $options['slug'] = Str::slug($request->name);
        $options['status'] = $request->is_show ? $request->is_show : config('custom.category_status.hidden');
        $status = $this->categoryRepo->creatCategory($options);

        if ($status) {
            return redirect()->route('admin.category.index')->with('success', __('remove_success'));
        }

        return back()->with('error', __('remove_fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepo->getCategory($id);

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $options['name'] = $request->name;
        $options['slug'] = Str::slug($request->name);
        $options['status'] = $request->is_show ? $request->is_show : config('custom.category_status.hidden');
        $status = $this->categoryRepo->update($id, $options);

        if ($status) {
            return redirect()->route('admin.category.index')->with('success', __('edit_success'));
        }

        return back()->with('error', __('edit_fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = $this->categoryRepo->delete($id);

        if ($status) {
            return response()->json([
                'code' => 200,
                'message' => __('delete_success'),
            ]);
        }

        return response()->json([
            'code' => 400,
            'message' => __('something_wrong'),
        ]);
    }
}
