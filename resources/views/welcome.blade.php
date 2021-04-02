<x-master-layout titrePage='Faso'>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                 <br>
                  <div class="jumbotron">
                      <h1 class="display-5"> {{ $nomSite }} </h1>
                      <p class="lead"> {{ $nomMinistere }} </p>
                      <hr class="my-2">
                      <p>Pour souscrire à la procédure en ligne, veuillez vous connecter à votre compte et de cliquer sur <b>Nouvelle Procédure</b> </p>
                      <p class="lead">
                          <a class="btn btn-success" href="Jumbo action link" role="button">Connexion
                            <svg style="height: 20px "  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                              </svg>
                          </a>
                      </p>
                  </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                 <div class="card">
                     <img class="card-img-top" src="https://picsum.photos/300/200" alt="">
                     <div class="card-body">
                         <h4 class="card-title">Faites votre demande</h4>
                         <p class="card-text">Votre demande en ligne en renseignant le formulaire de soumission</p>
                     </div>
                 </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Payez les frais et taxes</h4>
                        <p class="card-text">Payez directement les frais liés a votre demande directement en ligne</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="https://picsum.photos/300/200" alt="">
                    <div class="card-body">
                        <h4 class="card-title">Retirez votre dossier</h4>
                        <p class="card-text">Vous serez notifiés pour aller récupérer votre dossier déjà signé</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
