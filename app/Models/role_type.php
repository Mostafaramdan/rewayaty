<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class role_type extends GeneralModel
{
    protected $table = 'role_type';

    public static function createUpdate($params)
    {
        $record= isset($params["id"])? self::find($params["id"]) :new self();
        $record->type = isset($params["type"])? $params["type"]: $record->type;
        $record->name_ar = isset($params["name_ar"])? $params["name_ar"]: $record->name_ar;
        $record->name_en = isset($params["name_en"])? $params["name_en"]: $record->name_en;
        $record->number_of_pages = isset($params["number_of_pages"])? $params["number_of_pages"]: $record->number_of_pages;
        $record->musics = isset($params["musics"])? $params["musics"]: $record->musics;
        $record->effects = isset($params["effects"])? $params["effects"]: $record->effects;
        $record->backgrounds = isset($params["backgrounds"])? $params["backgrounds"]: $record->backgrounds;
        $record->fonts = isset($params["fonts"])? $params["fonts"]: $record->fonts;
        $record->number_of_month = isset($params["number_of_month"])? $params["number_of_month"]: $record->number_of_month;
        $record->image_per_page = isset($params["image_per_page"])? $params["image_per_page"]: $record->image_per_page;
        $record->price = isset($params["price"])? $params["price"]: $record->price;
        $record->number_of_novels_per_month = isset($params["number_of_novels_per_month"])? $params["number_of_novels_per_month"]: $record->number_of_novels_per_month;
        $record->image = isset($params["image"])?self::$helper::base64_image( $params["image"],'role_type'): $record->image;
        isset($params["id"])?:$record->created_at = date("Y-m-d H:i:s");
        $record->save();
        return $record;
    }
}