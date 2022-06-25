<?php

namespace App\Http\Controllers;
use App\Events\VideoViwer;
use App\Models\Videos;
use App\Traits\Offer_trait;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    use Offer_trait;
    public function index()
    {
        $offers=Offer::select('id',
            'name_'.LaravelLocalization::getCurrentLocale().' as name',
            'price','details_'.LaravelLocalization::getCurrentLocale().' as details'
        )->get();
        return view('offers.index',compact('offers'));
    }
    public function create()
    {
        return view('offers.create');
    }
    public function save(OfferRequest  $request)
    {

        $file_name=$this->img_upload($request->img,'upload/offers');


        Offer::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price'=>$request->price,
            'details_ar'=>$request->details_ar,
            'details_en'=>$request->details_en,
            'img'=>$file_name,
        ]);
       return back()->with(['sucsses'=>'saved']);

    }
    public function edit($offer_id)
    {
       $offer= Offer::find($offer_id);
       if (!$offer){
           return back();
       }
        return view('offers.edit',compact('offer'));

    }
    public function update(OfferRequest  $request){
        $offer= Offer::find($request->id);
        if (!$offer){
            return back();
        }
        $offer->update($request->all());
        return back()->with(['sucsses'=>'saved']);
    }
    public function video(){
        $views=Videos::first();
        event(new VideoViwer($views));
        return view('offers.video',compact('views'));
    }

}
