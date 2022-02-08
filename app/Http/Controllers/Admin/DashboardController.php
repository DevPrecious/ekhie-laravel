<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Profile;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware(['is_admin']);
    }

    public function index()
    {
        $events = Event::all()->where('is_active', 0);
        return view('admin.index', compact('events'));
    }

    public function events()
    {
        $events = Event::all();
        return view('admin.events', compact('events'));
    }

    public function settings()
    {
        $user = User::find(auth()->id());
        $profile = Profile::where('user_id', auth()->id())->first();
        return view('admin.settings', compact('user', 'profile'));
    }

    public function savesettings(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        // Profile data
        $profile_data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'user_id' => auth()->id()
        ];

        $profile = Profile::where('user_id', auth()->id())->first();
        if($profile){
            $pdata = new Profile();
            $pdata->where('user_id', auth()->id())->update($profile_data);
        }else{
            Profile::create($profile_data);
        }

        // user data
        $user_data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if($request->password){
            $request->validate([
                'password' => ['confirmed', Rules\Password::defaults()],
            ]);

            $user_data['password'] = Hash::make($request->password);
        }
        $userup = new User();
        $userup->where('id', auth()->id())->update($user_data);
        return redirect()->route('admin.settings')->with('success', 'Account updated');

    }


    public function event($id)
    {
        $event = Event::where('events.id', $id)->join('users', 'events.user_id', '=', 'users.id')
            ->join('profiles', 'events.user_id', '=', 'profiles.user_id')
            ->first();
        $tickets  = Ticket::where('event_id', $id)->get();
        // dd($event);
        return view('admin/devent', compact('event', 'tickets'));
    }

    public function accept($id){
        $event = Event::find($id);
        $event->is_active = 1;
        $event->save();
        return redirect()->route('admin.home')->with('success', 'Event accepted');
    }

    public function reject($id){
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin.home')->with('success', 'Event rejected');
    }


    public function organizers()
    {
        $organizers = User::all();
        return view('admin/organizers', compact('organizers'));
    }

    public function delete($id)
    {
        $organizers = User::find($id);
        // delete user from db
        $organizers->delete();
        return redirect()->route('admin.organizers')->with('success', 'Organizers deleted');
    }

    public function products()
    {
        $products = Event::where('user_id', auth()->id())->join('tickets', 'events.id', '=', 'tickets.event_id')->get();
        return view('admin/myproducts', compact('products'));
    }
}
