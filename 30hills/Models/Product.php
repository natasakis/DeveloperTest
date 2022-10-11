<?php

namespace Models\Product;

use Models\Model\Model;

class Product extends Model
{
    const ORDER_BY_PRICE_ASC = 'price-asc';
    const ORDER_BY_PRICE_DESC = 'price-desc';
    
    public $id;
    public $title;
    public $description;
    public $features;
    public $price;
    public $keywords;
    public $url;
    public $category;
    public $subcategory;
    public $img;

    public function __construct($product)
    {
        $this->id = $product['id'];
        $this->name = $product['name'];
        $this->description = $product['description'];
        $this->features = $product['features'];
        $this->price = $product['price'];
        $this->keywords= $product['keywords'];
        $this->url = $product['url'];
        $this->category = $product['category'];
        $this->subcategory = $product['subcategory'];
        $this->img = $product['images'];
    }

    public static function getAllProducts()
    {
        parent::connection('products');
        $allProducts = [];
        if (self::$db_status) {
            foreach (parent::fetchAll() as $product) {
                $allProducts[] = new self($product);
            }
        }
        return $allProducts;
    }

        

    public static function getOneProductById($id)
    {
        $products = self::getAllProducts();
        foreach ($products as $product) {
            if ($product->id == $id) {
                return $product;
            }
        }
    }
    
    public static function filteredProducts($term){
        $filteredProducts = [];
        foreach (self::getAllProducts() as $product) {
            if(strpos(strtolower($product->name), strtolower($term))) {
                $filteredProducts[] = $product;
            }
        }
        return $filteredProducts;
    }

    public static function sortProductBy($sortBy, $products = [])
    {
        $products = !empty($products) ? $products : self::getAllProducts();
        switch ($sortBy) {
            case self::ORDER_BY_PRICE_ASC:
                usort($products, function ($item1, $item2) {
                    return $item1->price > $item2->price;
                });
                break;
            case self::ORDER_BY_PRICE_DESC:
                usort($products, function ($item1, $item2) {
                    return $item1->price < $item2->price;
                });
                break;
            default:
                break;
        }
        return $products;
    }

    public static function getThreeRandomProducts()
    {
        $randProd = [];
        $products=self::getAllProducts();
        foreach ($products as $product) {
            if (count($randProd) >= 3) {
                break;
            }
            $randProd[] = $products[rand(0,count($products)-1)];
        }
        return $randProd;
    }

    public function getRelatedProducts()
    {
        $related = [];
        $products = self::getAllProducts();
        foreach ($products as  $product) {
            if ($product->category == $this->category && $this->id != $product->id) {
                $related[] = $product;
                if (count($related) >= 3) {
                    break;
                }
            }
        }
        return $related;
    }

    public static function getCategoryProducts($category, $products = [])
    {
        $categoryproducts = [];
        $products = !empty($products) ? $products : self::getAllProducts();
        foreach ($products as $product) {
            if ($category == $product->category) {
                $categoryproducts[] = $product;
            }
        }
        return $categoryproducts;
    }


    public function getPrevProductId()
    {
        $products = self::getAllProducts();
        foreach ($products as $key => $product) {
            if ($product->id == $this->id) {
                if ($key == 0) {
                    return $products[count($products) - 1]->id;
                } else {
                    return $products[$key - 1]->id;
                }
            }
        }
    }

    public function getNextProductId()
    {
        $products = self::getAllProducts();
        foreach ($products as $key => $product) {
            if ($product->id == $this->id) {
                if ($key == (count($products) - 1)) {
                    return $products[0]->id;
                } else {
                    return $products[$key + 1]->id;
                }
            }
        }
    }
    
}
