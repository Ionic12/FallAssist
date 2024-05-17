<?php

namespace App\Http\Controllers;
require('../vendor/autoload.php');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Models\records; 
use App\Models\contact;
use Carbon\Carbon;
use PhpMqtt\Client\Facades\MQTT;
use \PhpMqtt\Client\MqttClient;
use \PhpMqtt\Client\ConnectionSettings;

class HomeController extends Controller
{
    public function home()
    {
        $userId = auth()->user()->user_id;
        $now = Carbon::now();
        $now->setTimezone('Asia/Jakarta');
        $currentDate = $now->toDateString();
        $recordsCount = records::where('user_id', $userId)->count();
        $contactCount = contact::where('user_id', $userId)->count();
        $userCount = DB::table('users')->count();
        $records = DB::table('records')->where('user_id', $userId)->first();
        $contact = DB::table('contacts')->where('user_id', $userId)->get();
        $activities = DB::table('activity')->whereDate('timestamp', $currentDate)->get();
        $latestactivities = DB::table('activity')->whereDate('timestamp', $currentDate)->orderBy('timestamp', 'desc')->first();
        
        $jsonData = [
        'recordsCount' => $recordsCount,
        'contactCount' => $contactCount,
        'userCount' => $userCount,
        'records' => $records,
        'contact' => $contact,
        'activities' => $activities,
        'latestactivities' => $latestactivities,
        ];
        
        return view('dashboard', $jsonData);
    }
    
    public function chart(Request $request)
    {
        $selectedDate = $request->input('date', Carbon::now()->toDateString());
        $selectedDate = Carbon::createFromFormat('Y-m-d', $selectedDate, 'Asia/Jakarta');
        $activities = DB::table('activity')->whereDate('timestamp', $selectedDate)->get();
        $fallingCount = $activities->where('majority_prediction', 'Falling')->count();
        $standingCount = $activities->where('majority_prediction', 'Standing')->count();
        $walkingCount = $activities->where('majority_prediction', 'Walking')->count();
        $joggingCount = $activities->where('majority_prediction', 'Jogging')->count();
        $sittingCount = $activities->where('majority_prediction', 'Sitting')->count();
        $labels = ['Walking', 'Standing', 'Jogging', 'Sitting', 'Falling'];
        $data = [$walkingCount, $standingCount, $joggingCount, $sittingCount, $fallingCount];
        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
    public function subscribeAndFetch()
    {
        $server = 'broker.emqx.io';
        $port = '1883';
        $clientId = rand();
        $username = 'esp8266';
        $password = 'esp8266';
        $clean_session = false;
    
        $connectionSettings = (new ConnectionSettings)
            ->setUsername($username)
            ->setPassword($password)
            ->setKeepAliveInterval(60)
            ->setLastWillTopic('esp8266/fallassist/test3')
            ->setLastWillMessage('client disconnect')
            ->setLastWillQualityOfService(0);
    
        $mqtt = new MqttClient($server, $port, $clientId);
        $mqtt->connect($connectionSettings, $clean_session);
    
        $latestMessage = null;
    
        $mqtt->subscribe('esp8266/praktikum', function ($topic, $message) use (&$latestMessage) {
            $latestMessage = $message;
        }, 0);
        
        sleep(5);
    
        $mqtt->disconnect();

        if ($latestMessage !== null) {
            return response()->json(['latest_message' => $latestMessage]);
        } else {
            return response()->json(['error' => 'No message received']);
        }
    }
    public function records()
    {
        return view('laravel-examples.user-records');
    }
    public function edit()
    {
        $userId = auth()->user()->user_id;
        $records = DB::table('records')->where('user_id', $userId)->first();
        return view('laravel-examples.user-records-edit', compact('records'));
    }
    public function update(Request $request)
    {
        $validatedData = $request->validate([
        'user_id' => 'required',
        'records_id' => 'required',
        'records' => 'required|string|max:1000',
        ]);
        $record = records::find($validatedData['records_id']);
        
        if (!$record) {
            return back()->withErrors(['error' => 'Record not found.']);
        }
        $record->update($validatedData);
        session()->flash('success', 'Record updated successfully!');
        return redirect('dashboard');
    }
    public function store(Request $request)
    {
        $request->validate([
        'user_id' => 'required',
        'records' => 'required|string|max:1000',
        ]);
        records::create([
        'user_id' => $request->user_id,
        'records' => $request->records,
        ]);
        return redirect('dashboard');
    }
    public function addContact(Request $request)
    {
        $request->validate([
        'user_id' => 'required',
        'name' => 'required',
        'phone' => 'required',
        'username' => 'required',
        'idchat' => 'required',
        ]);
        contact::create([
        'user_id' => $request->user_id,
        'name' => $request->name,
        'phone' => $request->phone,
        'username' => $request->username,
        'idchat' => $request->idchat,
        ]);
        return redirect('dashboard');
    }
    public function editContact($contact_id)
    {
        $userId = auth()->user()->user_id;
        $contact = DB::table('contacts')->where('user_id', $userId)->where('contact_id', $contact_id)->first();
        return view('laravel-examples.user-contact-edit', compact('contact'));
    }
    public function updateContact(Request $request)
    {
        $validatedData = $request->validate([
        'contact_id' => 'required|integer',  // Ensure contact_id is an integer
        'name' => 'required|string',        // Ensure name is a string
        'phone' => 'required',       // Ensure phone is a string
        'username' => 'required|string', // Handle username uniqueness
        'idchat' => 'required|string',      // Ensure idchat is a string
        ]);
        
        contact::find($request->get('contact_id'))->update([
        'name' => $request->get('name'),
        'phone' => $request->get('phone'),
        'username' => $request->get('username'),
        'idchat' => $request->get('idchat'),
        ]);
        
        session()->flash('success', 'Contact updated successfully!');
        
        return redirect()->route('dashboard');  // Use named routes for flexibility
    }
    
    public function destroy($id){
        contact::destroy($id);
        return redirect()->back();
    }
    public function search(Request $request) {
        $keyword = $request->input('search');
        if (empty($keyword)) {
            session()->forget('search_keyword');
            $contacts = contact::orderBy('name')->get();
        } else {
            session()->put('search_keyword', $keyword);
            $contacts = contact::where(function ($query) use ($keyword) {
                $query->where('name', 'like', "%" . $keyword . "%");
                $query->orWhere('phone', 'like', "%" . $keyword . "%"); 
                $query->orWhere('username', 'like', "%" . $keyword . "%");
                $query->orWhere('idchat', 'like', "%" . $keyword . "%");
            })->orderBy('name')->paginate(100);
        }
        return view('laravel-examples.contact-management', compact('contacts'));
    }
}
