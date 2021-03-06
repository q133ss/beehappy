<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\CategoryPath;
use App\Models\City;
use App\Models\Color;
use App\Models\Country;
use App\Models\FailedJob;
use App\Models\MainBanner;
use App\Models\Migration;
use App\Models\ModelHasPermission;
use App\Models\ModelHasRole;
use App\Models\News;
use App\Models\NewsComment;
use App\Models\NotificationUser;
use App\Models\Notification;
use App\Models\OrderPhoto;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\PasswordReset;
use App\Models\Permission;
use App\Models\PersonalAccessToken;
use App\Models\Photo;
use App\Models\ProductPath;
use App\Models\ProductSizePath;
use App\Models\ProductTag;
use App\Models\ProductView;
use App\Models\Product;
use App\Models\Promocode;
use App\Models\QuizOrder;
use App\Models\QuizSetting;
use App\Models\Region;
use App\Models\Review;
use App\Models\ReviewsPhoto;
use App\Models\RoleHasPermission;
use App\Models\Role;
use App\Models\Setting;
use App\Models\Size;
use App\Models\SubscribeHideCity;
use App\Models\SubscribeOrder;
use App\Models\Subscribe;
use App\Models\Tag;
use App\Models\UserEventSetting;
use App\Models\UserEvent;
use App\Models\User;

use Illuminate\Support\Facades\Schema;

class CatProdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//        $admin = User::create([
//            'name' => 'admin',
//            'email' => 'admin@admin.ru',
//            'phone' => '123',
//            'avatar' => '123',
//            'date_of_birthday' => '123',
//            'city_id' => '1',
//            'password' => crypt('admin@admin.ru')
//        ]);
//
//        $user = User::create([
//            'name' => 'user',
//            'email' => 'user@user.ru',
//            'phone' => '123',
//            'avatar' => '123',
//            'date_of_birthday' => '123',
//            'city_id' => '1',
//            'password' => crypt('user@user.ru')
//        ]);


        /*
         * ????????????
         */

       $sizes = [];
       foreach (['S' => '/img/circle_size.svg', 'M' => '/img/circle_size.svg', 'L' => '/img/circle_size.svg', 'XL' => '/img/circle_size.svg', '2XL' => '/img/circle_size.svg', 'Wow' => '/img/circle_size.svg'] as $name => $icon) {
           $sizes[] = Size::create(['name' => $name, 'icon' => $icon]);
       }

       //Tag
       Tag::create([
           'name' => '?? ?????? ???????????? ???????????????????? ???????????????? ???? ????????????',
           'icon' => '/img/tag0.svg',
       ]);

       Tag::create([
           'name' => '?? ???????????? ???????????????? ???????????? ?????????????????????????? ???????????????? ???????????????? ?????? ?? ???? ?????? ??????????????',
           'icon' => '/img/tag1.svg',
       ]);
       $colors = [];
       foreach (['#FFFFFF' => '??????????', '#CCCCCC' => '??????????', '#FF00FF' => '????????????????????', '#00FFFF' => '????????????-??????????'] as $hex => $name) {
           $colors[] = Color::create(['hex' => $hex, 'name' => $name]);
       }

       $cats = [];
       foreach (Category::TYPES as $key => $type) {
            $catsDef = [];
           if ($key == Category::TYPE_PRODUCTS) {
               $max = 15;
               $size = rand(0,1)?0:3;
               $color = rand(0,1)?0:3;
               $catsDef = [
                   ['????????????????', '/img/cat.svg', '????????????????????'],
                   ['??????????????????', '/img/cat.svg', '????????????????????'],
                   ['?????????? ?????? 2021', '/img/cat.svg',  '????????']
               ];
           } else if ($key == Category::TYPE_ADDITIONALLY) {
               $max = 15;
               $size = rand(0,1)?0:3;
               $color = rand(0,1)?0:3;
               $catsDef = [
                   ['?????????????? ', '/img/cat.svg', '??????????????'],
                   ['?????????????? ', '/img/cat.svg', '??????????????'],
               ];
           } else if ($key == Category::TYPE_URGENTLY) {
                $max = 5;
                $size = 0;
                $color = 3;
                $catsDef = [
                    ['?????????????? ??????????', '/img/cat.svg', ''],
                ];
            }

           foreach ($catsDef as $v) {
               $mainCat = Category::create([
                   'name' => $v[0],
                   'img' => $v[1],
                   'type' => $key,
                   'status' => 1
               ]);

               if ($v[2] == '') {
                   for ($i = 1; $i < 20; $i++) {
                       $this->createProduct($mainCat->id, $max, $size, $color);
                   }
               } else {
                   for ($i = 1; $i < 10; $i++) {
                       $subCat = Category::create([
                           'name' => $v[2] . ' #' . $i,
                           'img' => '/img/cat.svg',
                           'type' => $key,
                           'status' => rand(0, 1)
                       ], $mainCat);

                       $this->createProduct($subCat->id, $max, $size, $color);
                   }
               }

           }
       }

       $cats = [];
       // ??????????????????
       $cats[] = Category::create([
           'name' => '???? ????????????',
           'img' => '/dist/img/basket0.svg',
           'type' => Category::TYPE_CONSTR_OAZIS,
           'status' => 1,
       ]);
       $cats[] = Category::create([
           'name' => '????????????????',
           'img' => '/dist/img/basket1.svg',
           'type' => Category::TYPE_CONSTR_SUB,
           'status' => 1,
       ]);
       $cats[] = Category::create([
           'name' => '???????????? ?? ??????????',
           'img' => '/dist/img/basket2.svg',
           'type' => Category::TYPE_CONSTR_SUB,
           'status' => 1,
       ]);
       $cats[] = Category::create([
           'name' => 'Party-??????????',
           'img' => '/dist/img/basket3.svg',
           'type' => Category::TYPE_CONSTR_SUB,
           'status' => 1,
       ]);
        for ($i = 1; $i < 12; $i++) {
            $cats[] = Category::create([
                'name' => '?????????????????? '.$i,
                'img' => '/dist/img/flower-2.png',
                'type' => Category::TYPE_CONSTR_MAIN,
                'status' => 1
            ]);
        }
        foreach($cats as $cat) {
            if ($cat->type == Category::TYPE_CONSTR_MAIN || $cat->type == Category::TYPE_CONSTR_SUB) {
                for ($i = 1; $i < 21; $i++) {
                    $product = Product::create([
                        'name' => '?????????????? '.$i,
                        'descr' => '????????????????',
                        'img' => '/dist/img/constructor/item-'.rand(1,2).'.png',
                        'price' => rand(600, 4800),
                        'score' => rand(0,20),
                        'sale' => rand(0,10),
                        'status' => 1,
                    ], $cat);

                    $this->addDataProduct(rand(0,1)?0:3, rand(0,1)?0:3, $product);
                }
            }else {
                $product = Product::create([
                    'name' => '??????',
                    'descr' => '????????????????',
                    'img' => '/dist/img/oazis0.svg',
                    'price' => rand(600, 4800),
                    'score' => rand(0,20),
                    'sale' => rand(0,10),
                    'status' => 1,
                ], $cat);
                $this->addDataProduct(2, 5, $product);

                $product = Product::create([
                    'name' => '????????????',
                    'descr' => '????????????????',
                    'img' => '/dist/img/oazis1.svg',
                    'price' => rand(600, 4800),
                    'score' => rand(0,20),
                    'sale' => rand(0,10),
                    'status' => 1,
                ], $cat);
                $this->addDataProduct(2, 5, $product);

                $product = Product::create([
                    'name' => '??????????????',
                    'descr' => '????????????????',
                    'img' => '/dist/img/oazis2.svg',
                    'price' => rand(600, 4800),
                    'score' => rand(0,20),
                    'sale' => rand(0,10),
                    'status' => 1,
                ], $cat);
                $this->addDataProduct(2, 5, $product);

                $product = Product::create([
                    'name' => '??????????????',
                    'descr' => '????????????????',
                    'img' => '/dist/img/oazis3.svg',
                    'price' => rand(600, 4800),
                    'score' => rand(0,20),
                    'sale' => rand(0,10),
                    'status' => 1,
                ], $cat);
                $this->addDataProduct(0,0,$product);


                $product = Product::create([
                    'name' => '????????',
                    'descr' => '????????????????',
                    'img' => '/dist/img/oazis4.svg',
                    'price' => rand(600, 4800),
                    'score' => rand(0,20),
                    'sale' => rand(0,10),
                    'status' => 1,
                ], $cat);
                $this->addDataProduct(0,0,$product);

            }
        }
    }

    private function createProduct($catId,$max = 30, $size = 0, $color = 0){
        for ($i = 1; $i < $max; $i++) {
            $product = Product::create([
                'name' => '?????????? #'.$i,
                'descr' => '????????????????',
                'img' => '/img/product.png',
                'price' => rand(600, 4800),
                'score' => rand(10,20),
                'sale' => rand(0,10),
                'status' => 1,
                'category_id' => $catId
            ]);
            $this->addDataProduct($size, $color, $product);
        }
    }
    private function addDataProduct($size, $color, $product){
        if($size > 0) {
            for($e = 0; $e<=$size; $e++){
                $product->productSizes()->create([
                    'size_id' => $e+1,
                    'is_main' => $e == 0 ? 1:0,
                    'price'   => rand(1000, 3000),
                    'sale'    => rand(0,15),
                    'status'  => 1
                ]);
            }
        }

        if($color > 0) {
            for($e = 0; $e<=$color; $e++){
                $product->productColors()->create([
                    'color_id' => $e+1,
                    'is_main'  => $e == 0 ? 1:0
                ]);
            }
        }

        $product->productTags()->create([
            'tag_id' => 1
        ]);

        $product->productTags()->create([
            'tag_id' => 2
        ]);

        for($i = 0; $i<rand(1,3); $i++){
            $product->photos()->create([
                'filename' => '/img/photo.png'
            ]);
        }
    }



                // ?????????????? 20 ??????????????????
                // ?? ???????????? ?????????????????? 20 ??????????????
//                'name'
//                'img'
//                'type'
//                'order'
//                'status'
//                'descr'

//
//            } else if($key == Category::TYPE_CONSTR_MAIN) {
//                // ?????????????? 10 ??????????????????
//                // ?? ???????????? ?????????????????? 20 ??????????????
//
//            } else if($key == Category::TYPE_CONSTR_SUB) {
//                // ?????????????? 3 ??????????????????
//                // ?? ???????????? ?????????????????? 20 ??????????????
//            } else if($key ==  Category::TYPE_CONSTR_OAZIS) {
//                // ?????????????? 1 ??????????????????
//                // ?? ???????????? ?????????????????? 5 ??????????????
//            } else if($key ==  Category::TYPE_ADDITIONALLY) {
//                // ?????????????? 1 ??????????????????
//                // ?? ???????????? ?????????????????? 20 ??????????????
//            } else if($key ==  Category::TYPE_URGENTLY){
//
//            }

//
//            // ??????????????????
//            $cats = Category::create([
//                'name' => '???? ????????????',
//                'img' => '/dist/img/basket0.svg',
//                'type' => $key,
//                'order' => '10000',
//                'status' => 1,
//            ]);
//        }
//
//        //Category
//            //Product
//            //Photo
//            //ProductTag
//
//        //
//        //
//        //
//        //
//        //CategoryPath
//        //ProductPath
//        //ProductSizePath
//
//        //
//        //OrderPhoto
//        //OrderProduct
//        //Order
//
//
//
//        // ??????????
//
//
//
//        $cats = [];
//        // ??????????????????
//        $cats[] = ConstrCat::create([
//            'name' => '???? ????????????',
//            'img' => '/dist/img/basket0.svg',
//            'type' => '2',
//            'order' => '10000',
//        ]);
//        $cats[] = ConstrCat::create([
//            'name' => '????????????????',
//            'img' => '/dist/img/basket1.svg',
//            'type' => '1',
//            'order' => '20000',
//        ]);
//        $cats[] = ConstrCat::create([
//            'name' => '???????????? ?? ??????????',
//            'img' => '/dist/img/basket2.svg',
//            'type' => '1',
//            'order' => '30000',
//        ]);
//        $cats[] = ConstrCat::create([
//            'name' => 'Party-??????????',
//            'img' => '/dist/img/basket3.svg',
//            'type' => '1',
//            'order' => '40000',
//        ]);
//        for ($i = 1; $i < 12; $i++) {
//            $cats[] = ConstrCat::create([
//                'name' => '?????????????????? '.$i,
//                'img' => '/dist/img/flower-2.png',
//                'type' => '0',
//                'order' => '50000',
//            ]);
//        }
//
//        $sizes = Size::all();
//        // ????????????????
//
//        foreach($cats as $cat) {
//            if ($cat->type == 0) {
//                for ($i = 1; $i < 21; $i++) {
//                    $product = ConstrProduct::create([
//                        'name' => '?????????????? '.$i,
//                        'descr' => '????????????????',
//                        'img' => '/dist/img/constructor/item-'.rand(1,2).'.png',
//                        'score' => rand(0, 2) > 0 ? 0 : rand(10, 15) * 10,
//                        'price' => rand(229, 445)*10,
//                        'sale_price' => rand(0, 5) > 0 ? 0 : rand(200, 228) * 10,
//                        'status' => 1,
//                        'cat_id' => $cat->id,
//                        'order' => $i * 10000,
//                    ]);
//
//                    if (rand(0, 1)) {
//                        $max = rand(0, count($colors)-1);
//                        $e = 0;
//                        while($e < $max) {
//                            ConstrProductColor::create([
//                                'color_id' => $colors[$e]->id,
//                                'product_id' => $product->id
//                            ]);
//                            $e++;
//                        }
//                    }
//
//                    if (rand(0, 1)) {
//                        $max = rand(0, $sizes->count()-1);
//                        $e = 0;
//                        while($e < $max) {
//                            ConstrProductSize::create([
//                                'main' => $e == 0,
//                                'price' => 4450 + ($e * 10),
//                                'sale_price' => 0,
//                                'size_id' => $sizes[$e]->id,
//                                'product_id' => $product->id
//                            ]);
//                            $e++;
//                        }
//                    }
//                }
//            } else if ($cat->type == 1) {
//                for ($i = 1; $i < 21; $i++) {
//                    $product = ConstrProduct::create([
//                        'name' => $cat->name.' '.$i,
//                        'descr' => '????????????????',
//                        'img' => '/dist/img/constructor/item-'.rand(1,2).'.png',
//                        'score' => rand(0, 2) > 0 ? 0 : rand(10, 15) * 10,
//                        'price' => rand(229, 445)*10,
//                        'sale_price' => rand(0, 5) > 0 ? 0 : rand(200, 228) * 10,
//                        'status' => 1,
//                        'cat_id' => $cat->id,
//                        'order' => $i * 10000,
//                    ]);
//                    if (rand(0, 1)) {
//                        $max = rand(0, count($colors)-1);
//                        $e = 0;
//                        while($e < $max) {
//                            ConstrProductColor::create([
//                                'color_id' => $colors[$e]->id,
//                                'product_id' => $product->id
//                            ]);
//                            $e++;
//                        }
//                    }
//
//                    if (rand(0, 1)) {
//                        $max = rand(0, $sizes->count()-1);
//                        $e = 0;
//                        while($e < $max) {
//                            ConstrProductSize::create([
//                                'main' => $e == 0,
//                                'price' => 4450 + ($e * 10),
//                                'sale_price' => 0,
//                                'size_id' => $sizes[$e]->id,
//                                'product_id' => $product->id
//                            ]);
//                            $e++;
//                        }
//                    }
//                }
//            } else {
//                $product = ConstrProduct::create([
//                    'name' => '??????',
//                    'descr' => '????????????????',
//                    'img' => '/dist/img/oazis0.svg',
//                    'score' => 100,
//                    'price' => 1000,
//                    'sale_price' => 100,
//                    'status' => 1,
//                    'cat_id' => $cat->id,
//                    'order' => 10000,
//                ]);
//
//
//                $max = count($colors)-1;
//                $e = 0;
//                while($e < $max) {
//                    ConstrProductColor::create([
//                        'color_id' => $colors[$e]->id,
//                        'product_id' => $product->id
//                    ]);
//                    $e++;
//                }
//
//                $max = $sizes->count();
//                $e = 0;
//                while($e < $max) {
//                    ConstrProductSize::create([
//                        'main' => $e == 0,
//                        'price' => 4450 + ($e * 10),
//                        'sale_price' => 0,
//                        'size_id' => $sizes[$e]->id,
//                        'product_id' => $product->id
//                    ]);
//                    $e++;
//                }
//
//                $product = ConstrProduct::create([
//                    'name' => '????????????',
//                    'descr' => '????????????????',
//                    'img' => '/constr/img/oazis1.svg',
//                    'score' => 100,
//                    'price' => 1000,
//                    'sale_price' => 100,
//                    'status' => 1,
//                    'cat_id' => $cat->id,
//                    'order' => 20000,
//                ]);
//
//                $max = count($colors)-1;
//                $e = 0;
//                while($e < $max) {
//                    ConstrProductColor::create([
//                        'color_id' => $colors[$e]->id,
//                        'product_id' => $product->id
//                    ]);
//                    $e++;
//                }
//                $product = ConstrProduct::create([
//                    'name' => '??????????????',
//                    'descr' => '????????????????',
//                    'img' => '/constr/img/oazis2.svg',
//                    'score' => 100,
//                    'price' => 1000,
//                    'sale_price' => 100,
//                    'status' => 1,
//                    'cat_id' => $cat->id,
//                    'order' => 30000,
//                ]);
//
//                $max = $sizes->count();
//                $e = 0;
//                while($e < $max) {
//                    ConstrProductSize::create([
//                        'main' => $e == 0,
//                        'price' => 4450 + ($e * 10),
//                        'sale_price' => 0,
//                        'size_id' => $sizes[$e]->id,
//                        'product_id' => $product->id
//                    ]);
//                    $e++;
//                }
//                $product = ConstrProduct::create([
//                    'name' => '??????????????',
//                    'descr' => '????????????????',
//                    'img' => '/constr/img/oazis3.svg',
//                    'score' => 100,
//                    'price' => 1000,
//                    'sale_price' => 100,
//                    'status' => 1,
//                    'cat_id' => $cat->id,
//                    'order' => 40000,
//                ]);
//                $product = ConstrProduct::create([
//                    'name' => '????????',
//                    'descr' => '????????????????',
//                    'img' => '/constr/img/oazis4.svg',
//                    'score' => 100,
//                    'price' => 1000,
//                    'sale_price' => 100,
//                    'status' => 1,
//                    'cat_id' => $cat->id,
//                    'order' => 50000,
//                ]);
//            }
//        }
//
//    }
}
//
//
//
//$cats = Categoty::getCats($type);
//$cats = Category::bySlug($id);
//$product = Product::getByCat($id)->pagination();
//Product::getByIds([]);
//Product::findById(id)
//    $product->csizes
