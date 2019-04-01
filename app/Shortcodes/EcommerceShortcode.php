<?php

namespace App\Shortcodes;
use App\Compbrand;
use App\Shop\Categories\Repositories\Interfaces\CategoryRepositoryInterface;

class EcommerceShortcode
{
    /**
     * @var CategoryRepositoryInterface
     */
    private $categoryRepo;

    /**
     * HomeController constructor.
     * @param CategoryRepositoryInterface $categoryRepository
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepo = $categoryRepository;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
  
    public function ecommtheme1($shortcode, $content, $compiler, $name, $viewData)
    {
    	

        $cat1 = $this->categoryRepo->findCategoryById(2);
        $cat2 = $this->categoryRepo->findCategoryById(3);

        return view('layoutsecom.front.menu', compact('cat1', 'cat2'));
    }
}
