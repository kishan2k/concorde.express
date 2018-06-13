<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\pickup;
use Config;

class PickupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

// pickup

    public function getPickup()
    {
        return view('dashboard.pickup.index');
    }

    public function postPickup()
    {
        return view('dashboard.pickup.index');
    }
    public function getPickupCreate()
    {
        return view('dashboard.pickup.form');
    }
    public function postPickupCreate()
    {
        return view('dashboard.pickup.form');
    }

    public function getPickupCreate1()
    {
        return view('dashboard.pickup.create');
    }
    public function postPickupCreate1()
    {
        return view('dashboard.pickup.create');
    }

    public function getPickupView($id)
    {
        $pickupid = pickup::find($id);
        return view('dashboard.pickup.view')->with(compact('pickupid'));
    }

    public function getPickupCancel($id)
    {
        $pickupid = pickup::find($id);
        $coll_number = $pickupid->collection_confirmation_number;
        $name = $pickupid->name;
        $country = $pickupid->country;
        $date = $pickupid->collection_date;
        $time = $pickupid->collection_ready_time;
        $url = Config::get('carrier.dhl_xml_url');

        $data = '<?xml version="1.0" encoding="utf-8"?>
<req:CancelPURequest schemaVersion="1.0" xmlns:req="http://www.dhl.com" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com cancel-pickup-global-req.xsd">
  <Request>
    <ServiceHeader>
        <MessageTime>' . date('c') . '</MessageTime>
            <MessageReference>1234567890123456789012345678901</MessageReference>
            <SiteID>concorde</SiteID>
        <Password>LxTXGQWD1Y</Password>
    </ServiceHeader>
  </Request>
  <RegionCode>EU</RegionCode>
  <ConfirmationNumber>' . $coll_number . '</ConfirmationNumber>
  <RequestorName>' . $name . '</RequestorName>
  <CountryCode>' . $country . '</CountryCode>
  <Reason>006</Reason>
  <PickupDate>' . $date . '</PickupDate>
  <CancelTime>' . $time . '</CancelTime>
</req:CancelPURequest>
';
        $tuCurl = curl_init();
        curl_setopt($tuCurl, CURLOPT_URL, $url);
        curl_setopt($tuCurl, CURLOPT_PORT, 443);
        curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
        curl_setopt($tuCurl, CURLOPT_HEADER, 0);
        curl_setopt($tuCurl, CURLOPT_POST, 1);
        curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: text/xml", "SOAPAction: \"/soap/action/query\"", "Content-length: " . strlen($data)));
        curl_setopt($tuCurl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($tuCurl, CURLOPT_SSL_VERIFYHOST, 0);

        $tuData = curl_exec($tuCurl);

        curl_close($tuCurl);
        $xml = simplexml_load_string($tuData);
        

        if ($xml->Note->ActionNote == "Success") {
            $pickupid->delete();
            flash()->success('Pickup Canceled');
            return redirect('pickup');

        } else {
            flash()->error('Pickup not Canceled, Please contact support.');
            return redirect('pickup');
        }

    }

}
