<?php
/**
 * Created by PHPStorm.
 * User: Serhii Kondratovec
 * Email: sergey@spheremall.com
 * Date: 10/22/2017
 * Time: 7:36 PM
 */

namespace SphereMall\MS\Lib\Mappers;

use SphereMall\MS\Entities\Product;
use SphereMall\MS\Entities\ProductOptionValue;

/**
 * Class ProductsMapper
 * @package SphereMall\MS\Lib\Mappers
 */
class ProductsMapper extends Mapper
{
    #region [Protected methods]
    /**
     * @param array $array
     *
     * @return Product
     */
    protected function doCreateObject(array $array)
    {
        $product = new Product($array);

        if (isset($array['productAttributeValues'])) {
            $mapper              = new ProductAttributeValuesMapper();
            $product->attributes = $mapper->createObject($array['productAttributeValues']);
        }

        if (isset($array['media'])) {
            $media = [];
            $mapper = new ImagesMapper();
            foreach ($array['media'] as $image) {
                $media[] = $mapper->createObject($image);
            }

            $product->media = $media;

            if (!empty($product->media[0])) {
                $product->mainMedia = $product->media[0];
            }
        }

        if (isset($array['brands'][0])) {
            $mapper         = new BrandsMapper();
            $product->brand = $mapper->createObject($array['brands'][0]);

        }

        if (isset($array['functionalNames'][0])) {
            $mapper                  = new FunctionalNamesMapper();
            $product->functionalName = $mapper->createObject($array['functionalNames'][0]);

        }

        if (isset($array['promotions']) && is_array($array['promotions'])) {
            $mapper = new PromotionsMapper();
            $promotions = [];
            foreach ($array['promotions'] as $promotion) {
                $promotions[] = $mapper->createObject($promotion);
            }

            $product->promotions = $promotions;
        }

        if (isset($array['productsToPromotions']) && is_array($array['productsToPromotions'])) {
            $mapper = new ProductsToPromotionsMapper();
            $productsToPromotions = [];
            foreach ($array['productsToPromotions'] as $productsToPromotion) {
                $productsToPromotions[] = $mapper->createObject($productsToPromotion);
            }

            $product->productsToPromotions = $productsToPromotions;
        }

        if(isset($array['options']) && is_array($array['options'])){
            $optionMapper = new OptionsMapper();
            $productOptionValuesMapper = new ProductOptionValuesMapper();
            $options = [];

            foreach ($array['options'] as $option){
                $productOptionValues = array_filter($array['productOptionValues'] ?? [], function($productOptionValue) use ($option) {
                    return $option['id'] == $productOptionValue['optionId'];
                });

                foreach ($productOptionValues ?? [] as $productOptionValue){
                    $option['values'][] = $productOptionValuesMapper->createObject($productOptionValue);
                }

                $options[] = $optionMapper->createObject($option);
            }

            $product->options = $options;

        }

        return $product;
    }
    #endregion
}
