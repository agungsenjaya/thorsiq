<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;


class ClientController extends Controller
{
    public $supply,$holders,$balance,$bnb;

    public function __construct()
    {
        $this->supply;
        $this->holders;
        $this->balance;
        $this->bnb;
    }
    public function index()
    {
        $client = new Client();
        // $crawler = $client->request('GET', 'https://bscscan.com/token/0x7b9c3df47f3326fbc0674d51dc3eb0f2df29f37f');
        // $crawler->filter('#ContentPlaceHolder1_tr_tokenHolders .mr-3')->each(function ($node) {
        //     $this->holders =  $node->text()."\n";
        // });
        
        // $crawler = $client->request('GET', 'https://bscscan.com/token/0x7b9c3df47f3326fbc0674d51dc3eb0f2df29f37f?a=0x81a2c3833b89797c7f5c7fce682df2f5e30738af');
        // $crawler->filter('#ContentPlaceHolder1_divFilteredHolderBalance')->each(function ($node) {
        //     $this->supply =  $node->text()."\n";
        // });
        
        // $crawler = $client->request('GET', 'https://bscscan.com/token/0x7b9c3df47f3326fbc0674d51dc3eb0f2df29f37f?a=0x81a2c3833b89797c7f5c7fce682df2f5e30738af');
        // $crawler->filter('#ContentPlaceHolder1_divSummary .card-header')->each(function ($node) {
        //     $this->bnb =  $node->text()."\n";
        // });
        // dd($this->bnb);
        
        // if ($crawler) {
        //     $sabu = $this->supply;
        //     $saba = $this->holders;
        //     return view('client.home',compact('sabu','saba'));
        // }

        return view('client.home');
    }
}
