<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProvidersModel;
use App\Helpers\ApiHelper;

class ProvidersController extends Controller
{
    public function get_providers()
    {
        $providers = ProvidersModel::get_providers();

        return $providers;
    }

    public function get_provider(Request $request) {
        $data = $request->all();
        
        $provider = ProvidersModel::get_provider_by_id($data['id']);

        return $provider;
    }

    public function add_provider(Request $request) {
        $data = $request->all();

        $provider = ProvidersModel::create(
            [
                'name' => $data['name'],
                'url' => $data['url']
            ]
        );

        if($provider) {
            return json_encode(array('status' => 'success', 'message' => 'success'));
        } else {
            return json_encode(array('status' => 'failed', 'message' => 'Something is wrong with the data provided'));
        }
    }

    public function edit_provider(Request $request) {
        $data = $request->all();

        $provider = ProvidersModel::where('id', $data['id'])->update(
            [
                'name' => $data['name'],
                'url' => $data['url']
            ]
        );

        if($provider) {
            return json_encode(array('status' => 'success', 'message' => 'success'));
        } else {
            return json_encode(array('status' => 'failed', 'message' => 'Something is wrong with the data provided'));
        }
    }

    public function delete_provider(Request $request) {
        $data = $request->all();

        $provider = ProvidersModel::where('id', $data['id'])->update(
            [
                'status' => 'inactive'
            ]
        );

        if($provider) {
            return json_encode(array('status' => 'success', 'message' => 'success'));
        } else {
            return json_encode(array('status' => 'failed', 'message' => 'Something is wrong with the data provided'));
        }
    }

    public function activate_provider(Request $request) {
        $data = $request->all();

        $provider = ProvidersModel::get_provider_by_id($data['id']);
        $call_url = ApiHelper::curl_to_url($provider->url, array());
        $result = json_decode($call_url);

        if($result !== null) {
            return json_encode(array('status' => 'success', 'message' => $result->message));
        } else {
            return json_encode(array('status' => 'failed', 'message' => 'Something is wrong with the url provided'));
        }
    }
}
