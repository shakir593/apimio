<?php

namespace App\Listeners;

use App\Events\ProductExistsEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
class SendProductExistsNotification
{
    private $existingProductSKU;
    /**
     * Create the event listener.
     */
    public function __construct($existingProduct)
    {
        //
        $this->existingProductSKU = $existingProduct->sku;
      
    }

    /**
     * Handle the event.
     */
    public function handle(ProductExistsEvent $event): void
    {
        $data['sku'] = $this->existingProductSKU;
        $data['email'] = 'faisalktk593@gmail.com';

        Mail::send('emails.send-mail', $data, function($message)use($data) {
            $message->from('shakirfaisalktk873@gmail.com','Shakir Faisal')
            ->to($data['email'], $data['email'])
            ->subject("Email Test");                
        });    }
}
