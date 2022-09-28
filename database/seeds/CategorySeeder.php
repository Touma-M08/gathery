<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategorySeeder extends Seeder
{
    private $categories = [
        ["寿司", 1],
        ["和食", 1],
        ["ラーメン・麺類", 1],
        ["丼物", 1],
        ["粉物", 1],
        ["郷土料理", 1],
        ["中華", 1],
        ["イタリアン", 1],
        ["洋食", 1],
        ["フレンチ", 1],
        ["焼肉・ステーキ", 1],
        ["焼き鳥・串料理", 1],
        ["鍋", 1],
        ["しゃぶしゃぶ・すき焼き", 1],
        ["居酒屋", 1],
        ["カフェ", 1],
        ["スイーツ", 1],
        ["ファミレス", 1],
        ["ファストフード", 1],
        ["遊園地", 2],
        ["動物園", 2],
        ["水族館", 2],
        ["博物館", 2],
        ["映画", 2],
        ["ボーリング", 2],
        ["カラオケ", 2],
        ["プール", 2],
        ["ゲームセンター", 2]
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
                'name' => $category[0],
                'type' => $category[1],
            ]);
        }
    }
}
