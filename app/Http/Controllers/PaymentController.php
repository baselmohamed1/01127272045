<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Exception;
use Omnipay\Omnipay;
use App\Models\Payment;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{

    public $client_id;
    public $client_secret;
    public function __construct()
    {
        $this->client_id = env('PAYPAL_CLIENT_ID');
        $this->client_secret = env('PAYPAL_CLIENT_SECRET');
    }

    public function index()
    {
        return view('payment');
    }

    public function subscriptionResult(Request $request)
    {
        // Get an access token from PayPal API for the sandbox environment
        $response = Http::withBasicAuth($this->client_id, $this->client_secret)
            ->asForm()
            ->post(env('PAYPAL_BASE_URL').'/v1/oauth2/token', [
                'grant_type' => 'client_credentials',
            ]);

        $accessToken = $response['access_token'];

        // Retrieve subscription details from PayPal API for the sandbox environment
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $accessToken,
        ])->get(env('PAYPAL_BASE_URL')."/v1/billing/subscriptions/" . $request->subscription_id);

        $subscription = $response->json();
        // dd($subscription);
          

        if ($subscription['status'] == 'ACTIVE') {
            $package = Package::where('paypal_plan_id', $subscription['plan_id'])->first();
            if (!$package) {
                return response()->json(['success' => false, 'message' => 'Package not found.']);
            }
            Payment::create([
                'user_id' => auth()->user()->id,
                'package_id' => $package->id,
                'status' => $subscription['status'],
                'subscription_id' => $subscription['id'],
                // 'plan_id' => $subscription['plan_id'],
                'payer_id' => $subscription['subscriber']['payer_id'],
                'next_billing_time' => $subscription['billing_info']['next_billing_time'],
            ]);
            return response()->json(['success' => true, 'message' => 'Subscription was successful.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Package not found.']);
        }

    }


    public function subscriptionSuccessful(Request $request)
    {
        return response()->json(['success' => true, 'message' => 'Subscription was successful.']);

    }

    public function error()
    {
        return 'User cancelled the Payment.';
    }
}