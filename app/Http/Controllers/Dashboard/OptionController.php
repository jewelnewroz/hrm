<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Option;

class OptionController extends Controller
{
    public function index()
    {
        return view('admin.option.index')->with(['title' => 'Options']);
    }

    public function store(Request $request): RedirectResponse
    {
        $label = '';
        $msg = '';
        if( isset( $_POST['tab'] ) ) :
            Cache::forget('options');
            foreach( $_POST as $key => $value )
            {
                if( $key != 'submit' && $key != 'tab' && $key != 'id' && $key != '_token')
                {
                    if( $this->_option_exist( $key ) ) {
                        DB::table('options')
                            ->where(['label' => $key])
                            ->update(['content' => $value ]);
                        $msg = 'Option has been updated successfully.';
                        $label = 'success';
                    }else{
                        $option = Option::create([
                            'label' => $key,
                            'content' => $value
                        ]);
                        if( $option ) :
                            $msg = 'Option has been updated successfully.';
                            $label = 'success';
                        else :
                            $label = 'error';
                            $msg = 'Sorry! Option cannot be updated.';
                        endif;
                    }
                }
            }
        else :
            $label = 'error';
            $msg = 'Sorry! Option cannot be updated.';
        endif;

        return redirect()->route('option.index', ['tab' => $request->tab ])->with(['message.label' => $label, 'message.content' => $msg]);
    }

    public function _option_exist( $key ): bool
    {
        $where = ['label' => $key];
        $option = Option::where( $where )->first();

        return (bool)$option;
    }
}
