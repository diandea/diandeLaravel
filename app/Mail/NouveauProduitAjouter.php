<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouveauProduitAjouter extends Mailable
{
    use Queueable, SerializesModels;
    public $produit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   
    public function __construct($produit)
    {
        $this->produit=$produit;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this-> subject("un nouveau produit vient d'etre ajouté")->markdown('emails.produits.nouveau-produit-ajouter');
    }
}
