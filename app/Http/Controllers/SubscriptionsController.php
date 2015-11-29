<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subscription;
use App\Http\Requests\Subscriptions\CreateSubscriptionRequest;
use App\Http\Requests\Subscriptions\UpdateSubscriptionRequest;

class SubscriptionsController extends Controller
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
        $subscriptions = Subscription::latest()->paginate(20);

        $no = $subscriptions->firstItem();

        return view('subscriptions.index', compact('subscriptions', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('subscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateSubscriptionRequest $request)
    {
        $subscription = Subscription::create($request->all());

        return redirect()->route('subscriptions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $subscription = Subscription::findOrFail($id);

        return view('subscriptions.show', compact('subscription'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
    
        return view('subscriptions.edit', compact('subscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(UpdateSubscriptionRequest $request, $id)
    {       
        $subscription = Subscription::findOrFail($id);

        $subscription->update($request->all());

        return redirect()->route('subscriptions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $subscription = Subscription::findOrFail($id);
        
        $subscription->delete();
    
        return redirect()->route('subscriptions.index');
    }

}
