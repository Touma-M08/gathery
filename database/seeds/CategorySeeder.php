<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    private $categories = [
        "寿司",
        "和食",
        "ラーメン・麺類",
        "丼物",
        "粉物",
        "郷土料理",
        "中華",
        "イタリアン",
        "洋食",
        "フレンチ",
        "焼肉・ステーキ",
        "焼き鳥・串料理",
        "鍋",
        "しゃぶしゃぶ・すき焼き",
        "居酒屋",
        "カフェ",
        "スイーツ",
        "ファミレス",
        "ファストフード",
        "遊園地",
        "動物園",
        "水族館",
        "博物館",
        "映画",
        "ボーリング",
        "カラオケ",
        "プール",
        "ゲームセンター",
        "フェス",
        "祭り",
        "イベント",
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->categories as $category) {
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
