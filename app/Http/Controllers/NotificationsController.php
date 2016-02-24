<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notification, App\User, App\Subscription, DB;
use App\Http\Requests\Notifications\CreateNotificationRequest;
use App\Http\Requests\Notifications\UpdateNotificationRequest;

class NotificationsController extends Controller
{
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $notifications = Notification::latest()->paginate(20);

        $no = $notifications->firstItem();

        return view('notifications.index', compact('notifications', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    	$user_data = User::lists('name','id');
    	$subscription_data = Subscription::lists('subscription_name','id');
        return view('notifications.create',compact('user_data','subscription_data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateNotificationRequest $request)
    {
    	$input = $request->all();
    	if($input['user_selection'] == 'user_list')
    		$user_obj = User::findOrFail($input['user_id']);
    	else
    		$user_obj = User::where('subscription', $input['user_selection'])->get()->toArray();

    		
		define( 'API_ACCESS_KEY', 'AIzaSyAglCBzKTWNam2prAZ6mjJfY0gn9os3M7s' );
		$data = array();
		$all_data = array();
		
    	foreach ($user_obj as $user)
    	{
    		$data['user_id'] = $user['id']; 
    		$data['title'] = $input['title'];
    		$data['description'] = $input['description'];
    		$data['image_url'] = $input['image_url'];
    		$data['type'] = $input['type'];
    		$data['image_url'] = $input['image_url'];
    		$data['created_at'] = date('Y-m-d H:i:s');
    		$all_data[] = $data;
    		
    		$device_id = $user['device_id'];
    		//echo $device_id;
    		// API access key from Google API's Console
    		 
    		$registrationIds = array( $device_id );
    		// prep the bundle
    		$msg = array
    		(
    				'message' 	=> $input['description'],
    				'title'		=> $input['title'],
    				'vibrate'	=> 1,
    				'sound'		=> 1
    		);
    		/* $msg = array
    		 (
    		 'message' 	=> 'here is a message. message',
    		 'title'		=> 'This is a title. title',
    		 'subtitle'	=> 'This is a subtitle. subtitle',
    		 'tickerText'	=> 'Ticker text here...Ticker text here...Ticker text here',
    		 'vibrate'	=> 1,
    		 'sound'		=> 1,
    		 'largeIcon'	=> 'large_icon',
    		 'smallIcon'	=> 'small_icon'
    		 ); */
    		$fields = array
    		(
    				'registration_ids' 	=> $registrationIds,
    				'data'			=> $msg
    		);
    		 
    		$headers = array
    		(
    				'Authorization: key=' . API_ACCESS_KEY,
    				'Content-Type: application/json'
    		);
    		 
    		$ch = curl_init();
    		curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
    		curl_setopt( $ch,CURLOPT_POST, true );
    		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    		$result = curl_exec($ch );  
    	}

    	curl_close( $ch );
    	
    	$data = array(
    			array('name'=>'Coder 1', 'rep'=>'4096'),
    			array('name'=>'Coder 2', 'rep'=>'2048'),
    			//...
    	);
    	
    	Notification::insert($all_data);    	
    	
        //$notification = Notification::create($request->all());

        //return redirect()->route('notifications.index');
    	return redirect()->action('NotificationsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $notification = Notification::findOrFail($id);

        return view('notifications.show', compact('notification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $notification = Notification::findOrFail($id);
    
        return view('notifications.edit', compact('notification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateNotificationRequest $request, $id)
    {       
        $notification = Notification::findOrFail($id);

        $notification->update($request->all());

        return redirect()->route('notifications.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        
        $notification->delete();
    
        return redirect()->route('notifications.index');
    }

}
