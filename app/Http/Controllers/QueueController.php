<?php

namespace App\Http\Controllers;

use App\Jobs\SayHelloJob;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function startQueue(): RedirectResponse
    {
        $contacts = [
            'Zubayer',
            'Ratul',
            'Sayem',
            'Imtiaz',
            'Shahadat',
            'Hafijul'
        ];

        foreach ($contacts as $contact) {
            $message = PHP_EOL . "Hi " . $contact . '!' . PHP_EOL . PHP_EOL;
            SayHelloJob::dispatch($message);
        }

        return redirect()->back()->with('success', 'Queue has been started successfully!');
    }
}
