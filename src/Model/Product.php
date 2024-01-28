<?php

namespace Contatoseguro\TesteBackend\Model;

class Product
{
    // O problema pode estar aqui! A categoria e o nome não estão sendo encontrados corretamente
    public $category;
    public $name;

    public function __construct(
        public int $id,
        public int $companyId,
        public string $title,
        public float $price,
        public bool $active,
        public string $createdAt
    ) {
    }

    public static function hydrateByFetch($fetch): self
{
    $product = new self(
        $fetch->id,
        $fetch->company_id,
        $fetch->title,
        $fetch->price,
        $fetch->active,
        $fetch->created_at
    );
    
    if (isset($fetch->category)) {
        $product->setCategory($fetch->category);
    }

    return $product;
}


    public function setCategory($category)
    {
        $this->category = $category;
    }
    public function setname($name)
    {
        $this->name = $name;
    }
}

