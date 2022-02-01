<?php

namespace App\Http\Controllers\item;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ItemStatController extends Controller
{
    public function numView(Item $item)
    {
        // setcookie('a','b',time() + 60);
        // if(isset($_COOKIE['a'])){
        //     return 'yes';
        // }else{
        //     return 'no';
        // }

            if(isset($_COOKIE['view'])){
                return 'شما این پست را قبلا مشاهده کرده اید';
            }else{
                $item->itemStat->increment('i_num_views');
                setcookie('view',1,time() + 60);
            }

        // if(Cookie::get('view',1)==){
        //     echo Cookie::get('view');
        // }else{
        //     return 'no';
        // }
        //  $item->itemStat()->increment('i_num_views');
        //  Cookie::set('view',1,60);
    }

    public function numRepeated(Item $item)
    {
        $item->itemStat()->increment('i_num_repeated');
    }

    public function numSpam(Item $item)
    {
        $item->itemStat()->increment('i_num_spam');
    }

    public function numOffensive(Item $item)
    {
        $item->itemStat()->increment('i_num_offensive');
    }

    public function badClassified(Item $item)
    {
        $item->itemStat()->increment('i_num_bad_classified');
    }

}
