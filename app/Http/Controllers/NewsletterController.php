<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use App\TestUser;
use App\Partner;
use App\Http\Requests\NewsletterFormRequest;
use Bogardo\Mailgun\Facades\Mailgun;
use Illuminate\Support\Facades\Storage;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $directive = Partner::whereHas('tags', function($q) {
            $q->where('partner_tag_id', 1);
        })->get();
        // $directive = Partner::all();
        return view('admin.newsletter.create', compact('directive'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterFormRequest $request)
    {
        //append image url to validated arr
        $validated = $request->validated();
        $validated['img'] = $request->file('img')->store('public/newsletters');

        //new Newsletter
        $pn = Newsletter::create($validated);

        //building groups email
        if ($validated['to'] == 1) {
            $arrRecipients = TestUser::all()->toArray();
        }
        else if ($validated['to'] == 2) {
            $arrRecipients = Partner::StgoPartnersNews()->get()->toArray();
        }else if ($validated['to'] == 3) {
            $arrRecipients = Partner::RegionsPartnersNews()->get()->toArray();
        }

        //building message
        $img = Storage::url($pn->img);
        $data = [
            'header' => asset('img/header.png'),
            'imgNews' => asset($img),
            'title' => $pn->title,
            'body' => $pn->body,
            'link' => $pn->link
        ];

        // send and pass data to email view
        Mailgun::send('emails.simple', $data, function ($message) use ($arrRecipients, $pn) {
            $message->from('informativo@mg.tusindicatoconsorcio.cl', $pn->sender_name)
                ->subject($pn->subject);

            foreach ($arrRecipients as $recipient) {
                $message->to([
                    $recipient['email'] => [
                        'name' => $recipient['name']
                    ]
                ]);
            }
        });

        return back()->with('newsletter-ok', 'Mensaje enviado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
