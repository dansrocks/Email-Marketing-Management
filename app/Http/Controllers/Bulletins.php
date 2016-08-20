<?php

namespace App\Http\Controllers;

use App\Models\Bulletin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Bulletin as BulletinRequest;

use \App\Managers\Bulletins as BulletinsManager;

/**
 * Class Bulletins
 *
 * @package App\Http\Controllers
 */
class Bulletins extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $content = [
            'bulletins' => BulletinsManager::getAllBulletinsList()
        ];        
        return view('bulletins/list', $content);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add()
    {
        return view('bulletins/add_or_edit');
    }

    /**
     * @param integer $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function edit($id)
    {
        $bulletin = Bulletin::find($id);
        
        if ($bulletin) {
            $content = [ 'bulletin' => $bulletin ];
            $response = view('bulletins/add_or_edit', $content);
        } else {
            $response = redirect()->route('$bulletins.list')
                    ->with('message', 'Invalid bulletin.');
        }
        
        return $response;
    }

    /**
     * @param BulletinRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(BulletinRequest $request)
    {
        $bulletin = $request->fill(new Bulletin());

        if ($bulletin->save()) {
            $response = redirect()
                     ->route('bulletins.list')
                     ->with('messages', 'Bulletin saved');
        } else {
            $content = [
                'bulletin' => $bulletin
            ];
            $response = view('bulletins.add_or_edit', $content )
                     ->with('errors', 'Error saving bulletin');
        }
                
        return $response;
    }

    /**
     * @param integer $id
     * @param BulletinRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id, BulletinRequest $request)
    {
        $response = redirect()->route('bulletins.list');

        $bulletin = Bulletin::find($id);
        if ($bulletin) {
            $request->fill($bulletin)->save();
            $response->with('message', 'Bulletin updated');
        } else {
            $response->with('message', 'Invalid bulletin');
        }
                
        return $response;
    }

    /**
     * @param integer $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $bulletin = Bulletin::find($id);

        $response = redirect()->route('bulletins.list');
        
        if ($bulletin) {
            $bulletin->delete();
            $bulletin->with('message', 'Bulletin has been deleted sucessfully');
        } else {
            $bulletin->with('message', 'Invalid bulletin.');
        }
        
        return $response;
    }
}
