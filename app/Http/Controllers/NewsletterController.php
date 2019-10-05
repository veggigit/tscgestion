<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use App\TestUser;
use App\Http\Requests\NewsletterFormRequest;
use Bogardo\Mailgun\Facades\Mailgun;
use Bogardo\Mailgun\Mail\Message;

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
        return view('admin.newsletter.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsletterFormRequest $request)
    {
        // append image url to validated arr
        $validated = $request->validated();
        $validated['img'] = $request->file('img')->store('public/newsletters');

        // new Newsletter
        $pn = Newsletter::create($validated);

        //building groups email
        if ($validated['to'] == 1) {
            $arrRecipients = TestUser::all()->toArray();
        }
        // else if ($validated['to'] == 2) {
        //     $recipients = Partner::StgoPartnersNews()->get()->toArray();
        // }else if ($validated['to'] == 3) {
        //     $recipients = Partner::RegionsPartnersNews()->get()->toArray();
        // }

        //building message
        $msgData = [
            'header' => asset('img/header.png'),
            'img' => $pn->img,
            'title' => $pn->title,
            'body' => $pn->body,
            'link' => $pn->link
        ];

        Mailgun::send('newsletter.simple', $msgData, function (Message $message) use ($arrRecipients, $pn) {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
