<?php

namespace App\Http\Controllers\Api;

use App\Models\UserItem;
use App\Models\Item;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\UserItemResource;

class UserItemController extends Controller
{
    /**
     * Get Current User Avatar + list of all unlocked items.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCurrentStateWithItems()
    {
        //
        return $this->execute(function () {

            $userAllItem = UserItem::with('item')->where('user_id',auth()->user()->id)->get()->sortBy('item.category.position');

            $userCurrentAvatar = $userAllItem->filter(function ($item) {
               return $item->is_selected === 1;
            });

            return $this->sendResponse([
                'userCurrentAvatar' => UserItemResource::collection($userCurrentAvatar),
                'userAllItem' => UserItemResource::collection($userAllItem)
            ]);

        });
        
    }
    /**
     * Store purchased item.
     *
     * @param  \App\Http\Requests\StoreUserItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function buyItem(Request $request)
    {
        //
        return $this->execute(function () use ($request) {

            $validateItem = Validator::make($request->all(), 
            [
                "item_id"    => "required",
            ]);

            if($validateItem->fails()){
                return $this->sendError($validateItem->errors(),403);
            }

            //check if item already purchased or not to avoid duplicate enteries
            $itemAlreadyPurchased = UserItem::where('item_id',$request->item_id)->where('user_id',auth()->user()->id)->first();

            if($itemAlreadyPurchased == null){

                //item exists or not
                $item = Item::find($request->item_id);

                if($item !== null){

                    if(auth()->user()->wallet > $item->price){

                        // create item entry is user_item table
                        $userItem = UserItem::create([
                            'user_id' => auth()->user()->id,
                            'item_id' => $item->id
                        ]);

                        // update user wallet amount
                        $this->updateWallet($item->price);

                        return $this->sendNotifyMessage('Purchased successfully');
                    }
                    else{

                        return $this->sendNotifyMessage('Insufficient Amount in wallet',403);

                    }
                }
                else{

                    return $this->sendNotifyMessage('Item not found',403);

                }
            }
            else{

                return $this->sendNotifyMessage('Item is already purchased');

            }
        },true);
    }

    public function changeAvatar(Request $request)
    {
        //
        return $this->execute(function () use ($request) {
            $validateUser = Validator::make($request->all(), 
            [
                "items"    => "required|array|min:1",
                "items.*"  => "required|string|distinct|min:1",
            ]);

            if($validateUser->fails()){
                return $this->sendError($validateItem->errors(),403);
            }
            
            $this->unselectAllItems();

            $this->selectItemById($request->items);

            return $this->sendNotifyMessage('Avatar changed successfully');

        },true);
    }

    protected function updateWallet($amount) {
        return $this->execute(function () use ($amount) {
            auth()->user()->update([
                'wallet' => auth()->user()->wallet - $amount
            ]);
        },true);
    }

    protected function unselectAllItems()
    {
        return $this->execute(function () {
            UserItem::where('user_id',auth()->user()->id)->update([
                'is_selected' => 0
            ]);
        },true);
    }

    protected function selectItemById($items)
    {
        return $this->execute(function () use ($items) {
            UserItem::where('user_id',auth()->user()->id)
                    ->whereIn('item_id',$items)
                    ->update([
                        'is_selected' => 1
                    ]);
        },true);
    }

}
