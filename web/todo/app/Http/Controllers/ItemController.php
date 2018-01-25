<?php

namespace App\Http\Controllers;

use App\Item;
use App\Card;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
  /**
   * Creates a new item.
   *
   * @param  int  $list_id
   * @return Response
   */
  public function create(Request $request, $card_id)
  {
    if (!Auth::check()) return redirect('/login');

    $card = Card::find($card_id);
    if (Auth::user()->id != $card->user_id) return "error";

    $item = new Item();
    $item->card_id = $card_id;
    $item->description = $request->input('description');
    $item->save();

    return $item;
  }

    /**
     * Updates the state of an individual item.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
      if (!Auth::check()) return redirect('/login');

      $item = Item::find($id);
      if (Auth::user()->id != $item->card->user_id) return "error";

      $item->done = $request->input('done');
      $item->save();

      return $item;
    }
}