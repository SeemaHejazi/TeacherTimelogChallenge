<?php

namespace App\Http\Controllers;

use App\Entry;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $entries = Entry::all();
        return view('entries.index')->with('entries', $entries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required',
            'lastName' => 'required',
            'clockingType' => 'required',
        ]);

        $clockingType = $request->input('clockingType');
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');

        $entry = Entry::where('firstname', $firstName)
            ->where('lastname', $lastName)
            ->whereNull('out_time')
            ->orderBy('created_at', 'desc')
            ->first();

        // If no open entry exists
        if (!$entry) {
            if ($clockingType === 'in') {
                // Create New Entry
                $entry = new Entry;
                $entry->firstname = $request->input('firstName');
                $entry->lastname = $request->input('lastName');
                $entry->in_time = Carbon::now();

                // Save Entry
                $entry->save();

                // Redirect Success
                return redirect('/')->with('success', '<strong>Success!</strong> You have successfully clocked in, have a great day!');
            }

            // Redirect Failure
            return redirect('/')->with('failure', 'You have not clocked in; please clock in before attempting to clock out');
        }

        // Open Entry Exists
        $entryId = $entry->id;

        if ($clockingType === 'in') {
            // Redirect Failure
            $failureMessage = '<strong>Warning!</strong> You have not clocked out of your last session.';
            $moreInfo = 'If you meant to clock out, please try again. </br> If you meant to clock in 
                         and forgot to clockout on a different day, please go to the <a href="/entries" class="alert-link">entries page</a> to edit your last
                         unclosed session with the approx. time intended.';

            return redirect('/')->with([
                'failure' => $failureMessage,
                'moreInfo' => $moreInfo
            ]);
        }

        // Update the Started Entry
        return $this->update($request, $entryId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request = null, $id)
    {
        $entry = Entry::find($id);

        if ($request->clockout) {
            $date = DateTime::createFromFormat('m/d/Y g:i A', $request->clockout);
            $end = new Carbon($date->format('Y-m-d H:i:s'));
        } else {
            $end = Carbon::now();
        }

        $time = $end->diffInMinutes($entry->in_time);
        $entry->out_time = $end;
        $entry->total_minutes = $time;

        // Save Entry
        $entry->save();

        // Redirect
        return redirect('/')->with('success', '<strong>Success!</strong> You have successfully clocked out, have a great day!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entry = Entry::find($id);
        return view('entries.edit')->with('entry', $entry);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $entry = Entry::find($id);

        //Delete Entry
        $entry->delete();

        // Redirect
        return redirect('/entries')->with('success', '<strong>Success!</strong> You have successfully deleted the entry.');
    }
}