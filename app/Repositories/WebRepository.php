<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class WebRepository
{
    public function query_a()
    {
        return DB::select('select users.id,users.name, (select count(*) from posts where posts.added_by=users.id) as count from users');
    }

    public function query_b()
    {
        return DB::select('select users.id,users.name, (select count(*) from comments where comments.added_by=users.id) as count from users');
    }

    public function query_c()
    {
        return DB::select('select users.id,users.name, (select count(*) from comments where comments.added_by=users.id) as count from users order by count desc limit 0,5');
    }

    public function query_d()
    {
        return DB::select('select posts.id,posts.title, (select count(*) from comments where comments.post_id=posts.id) as count from posts order by count desc limit 0,5');
    }

    public function query_e()
    {
        return DB::select('select name,count from tagging_tags order by count desc limit 0,5');
    }

    public function query_f()
    {
        return DB::select('select posts.title,(select count(*) from tagging_tagged where tagging_tagged.taggable_id=posts.id and tagging_tagged.taggable_type like "%Post%") as count from posts order by count desc limit 0,5');
    }

    public function query_g()
    {
        return DB::select('select users.id,users.name from users where (select count(*) from comments where comments.added_by=users.id)=0');
    }

}
