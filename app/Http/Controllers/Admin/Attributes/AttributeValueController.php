<?php

namespace App\Http\Controllers\Admin\Attributes;

use App\Http\Controllers\Controller;
use App\Shop\Attributes\Repositories\AttributeRepositoryInterface;
use App\Shop\AttributeValues\AttributeValue;
use App\Shop\AttributeValues\Repositories\AttributeValueRepository;
use App\Shop\AttributeValues\Repositories\AttributeValueRepositoryInterface;
use App\Shop\AttributeValues\Requests\CreateAttributeValueRequest;
use App\Http\Traits\EcommTrait;

class AttributeValueController extends Controller
{
    use EcommTrait;
    /**
     * @var AttributeRepositoryInterface
     */
    private $attributeRepo;

    /**
     * @var AttributeValueRepositoryInterface
     */
    private $attributeValueRepo;

    /**
     * AttributeValueController constructor.
     * @param AttributeRepositoryInterface $attributeRepository
     * @param AttributeValueRepositoryInterface $attributeValueRepository
     */
    public function __construct(
        AttributeRepositoryInterface $attributeRepository,
        AttributeValueRepositoryInterface $attributeValueRepository
    ) {
        $this->attributeRepo = $attributeRepository;
        $this->attributeValueRepo = $attributeValueRepository;
    }

    public function create($id)
    {
        $data = $this->ebrandsAll();
        return view('admin.attribute-values.create', [
            'attribute' => $this->attributeRepo->findAttributeById($id),
            'data' => $data
        ]);
    }

    /**
     * @param CreateAttributeValueRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateAttributeValueRequest $request, $id)
    {
        $attribute = $this->attributeRepo->findAttributeById($id);

        $attributeValue = new AttributeValue($request->except('_token'));
        $attributeValueRepo = new AttributeValueRepository($attributeValue);

        $attributeValueRepo->associateToAttribute($attribute);

        $request->session()->flash('message', 'Attribute value created');

        return redirect()->route('admin.attributes.show', $attribute->id);
    }

    /**
     * @param $attributeId
     * @param $attributeValueId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($attributeId, $attributeValueId)
    {
        $attributeValue = $this->attributeValueRepo->findOneOrFail($attributeValueId);

        $attributeValueRepo = new AttributeValueRepository($attributeValue);
        $attributeValueRepo->dissociateFromAttribute();

        request()->session()->flash('message', 'Attribute value removed!');
        return redirect()->route('admin.attributes.show', $attributeId);
    }
}
