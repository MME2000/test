<?php

namespace App\Http\Controllers\item;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\repositories\item as RepositoriesItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ItemController extends Controller
{
    //  public function __construct()
    //  {
    //     $this->middleware('auth:api');
    //  }

    public function index()
    {
        return response()->json(resolve(RepositoriesItem::class)->index(),Response::HTTP_OK);
    }


    public function store(ItemRequest $itemRequest)
    {
        resolve(RepositoriesItem::class)->createItem($itemRequest);
        return response()->json([
            'success' => true,
            'message' => 'created successfuly'
            ],Response::HTTP_CREATED);
    }

    public function update(Item $item,ItemRequest $itemRequest)
    {

        resolve(RepositoriesItem::class)->updateItem($itemRequest,$item);
        return response()->json([
            'success' => true,
            'message' => 'update successfuly'
        ],Response::HTTP_OK);
    }

    public function destroy(Item $item)
    {
        resolve(RepositoriesItem::class)->deleteItem($item);
        return response()->json([
            'success' => true,
            'message' => 'delete successfuly'
        ],Response::HTTP_OK);
    }
}
