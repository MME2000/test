<?php

namespace App\repositories;


use Carbon\Carbon;
use App\Models\Item as ModelsItem;
use App\Models\ItemMeta;
use Symfony\Component\HttpFoundation\Response;

class item
{
    public function index()
    {
        $items = ModelsItem::orderBy('id','DESC')->get();
        return $items;
    }

    public function createItem($itemRequest)
    {
        $itemRequest['dt_pub_date'] = Carbon::now();
        $itemRequest['dt_date'] = Carbon::now();
        $itemRequest['dt_expiration'] = Carbon::now()->addDays(10);
        $item = ModelsItem::create($itemRequest->all());
        $item->itemLocation()->create($itemRequest->all());
        $item->itemStat()->create($itemRequest->all());
        $images = $itemRequest->file('images');
        if($images != null)
        {
            item::createImage($images,$item);
        }

    }

    public function updateItem($itemRequest,$item)
    {
        $images = $itemRequest->file('images');
        item::deleteImage($item);
        $item->itemResources()->delete();
        if($images != null)
        {
            item::createImage($images,$item);
        }
        $item->update($itemRequest->all());
        return item::updateItemLocation($itemRequest,$item);
    }

    public function deleteItem($item)
    {
        item::deleteImage($item);
        $item->delete();
        $item->itemResources()->delete();
    }

    public function deleteImage($item)
    {
        foreach($item->itemResources as $path)
        {
            $image_path = public_path("storage/$path->s_path");
            unlink($image_path);
        }
    }

    public function createImage($images,$item)
    {
        foreach($images as $image)
        {
            $path = $image->store("images/items",['disk' => 'public']);
            $item->itemResources()->create(['s_path' => $path]);
        }
    }

    public function updateItemLocation($itemRequest,$item)
    {


        $item->itemLocation()->update([
            'fk_c_country_code' => $itemRequest->fk_c_country_code,
            's_country' => $itemRequest->s_country,
            's_address' => $itemRequest->s_address,
            's_zip' => $itemRequest->s_zip,
            'fk_i_region_id' => $itemRequest->fk_i_region_id,
            's_region' => $itemRequest->s_region,
            'fk_i_city_id' => $itemRequest->fk_i_city_id,
            's_city' => $itemRequest->s_city,
            'fk_i_city_area_id' => $itemRequest->fk_i_city_area_id,
            's_city_area' => $itemRequest->s_city_area,
            'd_coord_lat' => $itemRequest->s_city_area,
            'd_coord_long' => $itemRequest->s_city_long,
        ]);

    }
}
