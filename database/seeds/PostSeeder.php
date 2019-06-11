<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Post::class, 40)->make()
        ->each(function($post){
          $user = App\User::inRandomOrder()->first();
          $post->user()->associate($user);
          $post->save();

          $categories = App\Category::inRandomOrder()->take(rand(1,3))->get();
          $post->categories()->attach($categories);
        });

          // 1- crea ma non salva (make)  tot posts
          //  2- cicla su ogni post fatto. Per ciascuno...
          //  3- prende un user random: prende gli autori in ordine random e prende il primo
          //  4- associa al post ennesimo l'autore preso tramite la relazione definita in user() (belongsTo)
          //  5- Salvo il posts
          // 6- Prende n categories random: prende le cat in rand order e ne prende le prime n-random
          // 7- Attacca al post le n categorie  (tabella pivot) tramite la realazione manyToMany in categories()
      }
}
