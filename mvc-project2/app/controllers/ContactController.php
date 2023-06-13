<?php

namespace App\Controllers;
class ContactController
{


    public function index()
    {
//        $users=[];
//        echo 'index methodu ishledi';

        view('contact');

    }

    public function contact()
    {
        echo 'contact methodu ishledi';
    }

    public function form()
    {
        echo 'form methodu ishledi';
    }


    public function about()
    {

        $title='About Page';
        $desc='Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deserunt doloremque nobis perspiciatis quas sed sunt
    voluptatem voluptatum. Culpa iste repudiandae similique. Dolorum excepturi in iure molestias repellendus.
    Aperiam autem commodi dolore, ducimus excepturi ipsum laborum libero maiores natus odit, pariatur quaerat quam
    rem suscipit ut vel veritatis voluptates voluptatibus.';

        $desc2='    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet deserunt doloremque nobis perspiciatis quas sed sunt
    voluptatem voluptatum. Culpa iste repudiandae similique. Dolorum excepturi in iure molestias repellendus.
    Aperiam autem commodi dolore, ducimus excepturi ipsum laborum libero maiores natus odit, pariatur quaerat quam
    rem suscipit ut vel veritatis voluptates voluptatibus.';

        return view('about',[
            'title'=>$title,
            'desc'=>$desc,
            'desc2'=>$desc2,
        ]);
    }

}