<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post
{
    private static $blog_posts = [
        [
            "title" => "post 1",
            "slug" => "post_1",
            "author" => "M Syafii",
            "isi" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti modi animi deleniti, 
            ipsa, tempora similique aliquid reiciendis dolore ullam earum blanditiis dolor distinctio magni 
            laboriosam ut? Non ipsa deleniti maiores blanditiis ea totam voluptatem, perferendis quam aut odio 
            temporibus quasi quod exercitationem quas quis consequuntur! Quam nesciunt, adipisci, nisi ullam 
            suscipit molestias accusantium consequuntur repellendus, dolor fuga voluptatem iure in distinctio 
            esse dignissimos alias odio iusto quae velit?
            Eveniet tempora ex aliquam in doloribus magnam quod repellat tempore quas esse.
            suscipit molestias accusantium consequuntur repellendus, dolor fuga voluptatem iure in distinctio 
            suscipit molestias consequuntur repellendus, dolor fuga 
            suscipit molestias accusantium consequuntur repell
            accusantium consequuntur repellendus, dolor fuga voluptatem
            "
        ],
        [
            "title" => "post 2",
            "slug" => "post_2",
            "author" => "Hamzah T",
            "isi" => "
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti modi animi deleniti, 
            ipsa, tempora similique aliquid reiciendis dolore ullam earum blanditiis dolor distinctio magni 
            laboriosam ut? Non ipsa deleniti maiores blanditiis ea totam voluptatem, perferendis quam aut odio 
            temporibus quasi quod exercitationem quas quis consequuntur! Quam nesciunt, adipisci, nisi ullam 
            suscipit molestias accusantium consequuntur repellendus, dolor fuga voluptatem iure in distinctio 
            esse dignissimos alias odio iusto quae velit?
            Eveniet tempora ex aliquam in doloribus magnam quod repellat tempore quas esse.
            "
        ]
    ];

    public static function all(){
        return self::$blog_posts;
    }

    public static function find($slug){
        $posts = self::$blog_posts;
        $post = [];

        foreach($posts as $p){
            if($p['slug'] == $slug){
                $post = $p;
            }
        }

        return $post;
    }
}
