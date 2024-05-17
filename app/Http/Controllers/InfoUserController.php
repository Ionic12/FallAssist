<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\records; 
use App\Models\contact;
use Carbon\Carbon;
use PhpMqtt\Client\Facades\MQTT;
use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;
class InfoUserController extends Controller
{
    public function management()
    {
        $user = DB::table('users')->orderBy('name')->get();
        $jsonData = [
        'user' => $user,
        ];
        return view('laravel-examples/user-management', $jsonData);
    }
    public function contact()
    {
        $contacts = DB::table('contacts')->orderBy('name')->get();;
        $jsonData = [
        'contacts' => $contacts,
        ];
        return view('laravel-examples/contact-management', $jsonData);
    }
    public function destroy($user_id){
        User::destroy($user_id);
        return redirect()->back();
    }
    public function contactDestroy($contact_id){
        DB::table('contacts')->where('contact_id', $contact_id)->delete();
        return redirect()->back();
    }
    public function search(Request $request) {
        $keyword = $request->input('search');
        if (empty($keyword)) {
            session()->forget('search_keyword');
            $user = User::orderBy('name')->get();
        } else {
            session()->put('search_keyword', $keyword);
            $user = User::where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
                $query->orWhere('phone', 'like', "%" . $keyword . "%"); 
                $query->orWhere('email', 'like', "%" . $keyword . "%");
            })->orderBy('name')->paginate(100);
        }
        return view('laravel-examples.user-management', compact('user'));
    }
    function updateStatus($user_id){
        $user = User::select('setStatus')
        ->where('user_id','=',$user_id)
        ->first();
        if($user -> setStatus == 1){
            $setStatus = 0;
        }else{
            $setStatus = 1;
        }
        $values = array('setStatus' => $setStatus);
        DB::table('users')->where('user_id',$user_id)->update($values);
        return redirect()->back();
    }
    function updateLevel($user_id){
        $user = User::select('setLevel')
        ->where('user_id','=',$user_id)
        ->first();
        if($user -> setLevel == 1){
            $setLevel = 0;
        }else{
            $setLevel = 1;
        }
        $values = array('setLevel' => $setLevel);
        DB::table('users')->where('user_id',$user_id)->update($values);
        return redirect()->back();
    }
}