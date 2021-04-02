<x-master-layout>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Liste des produits</h3>
            {{-- @if (session('statut'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{session('statut')}}
            </div>
            @endif --}}
            <div class="row">
                <div class="d-flex">
                     <a href="{{ route('produit.ajout') }}" class="btn btn-success mr-2">
                     Ajouter un nouveau Produit
                    </a>
                    <a href="{{ route('excel.export') }}" class="btn btn-primary mr-2">
                     Exporter en excel
                    </a>
                </div>
            </div>
            @if ($lesproduits->count() > 0)

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Désignation</td>
                            <td>Prix</td>
                            <td>Pays d'origine</td>
                            <td>Photo</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lesproduits as $produit)
                            <tr>
                               
                                
                                <td>  
                                    {{ $produit->designation }} 
                               </td>
                                <td> {{ $produit->prix }} XOF</td>
                                <td> {{ $produit->pays_source }} </td>
                                <td>  <img class="" src="{{asset('storage/produits-images/'.$produit->image_produit)}}" width="100%" alt="">
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="#" onClick="deleteConfirm('{{'produitItem'.$produit->id}}')" class="btn btn-danger  mr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style='width:25px'>
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"  />
                                            </svg>
                                        </a>
                                        <form id="{{'produitItem'.$produit->id}}"
                                            action="{{route('delete',$produit->id)}}"
                                            method="GET" style="display: none;">
                                            @csrf
                                        </form>
                                        {{-- <a href="{{route('delete',$produit->id)}}"  class="btn btn-danger  mr-2">
                                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style='width:25px'>
                                               <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"  />
                                             </svg>
                                       </a> --}}
                                        <a href="{{route('ajoutercommande',$produit->id)}}"  class="btn btn-primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"  style='width:25px'>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                              </svg>
                                       </a>

                                       <a href="{{route('produits.modifier',$produit->id)}}"  class="btn btn-success ml-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:25px'>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{$lesproduits->links()}}

            @else
                <p>
                    Aucun produit n'a été retrouvé !
                </p>
            @endif

        </div>
        <div class="col-md-6">
            <h3>Liste des commandes</h3>
            @if (session('statut'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                {{session('statut')}}
            </div>
            @endif
            @if ($lescommande->count() > 0)

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Désignation</td>
                            <td>Prix</td>
                            <td>Pays d'origine</td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lescommande as $commande)
                            <tr>
                                <td> {{ $commande->produit->designation }} </td>
                                <td> {{ $commande->produit->prix }} XOF</td>
                                <td> {{ $commande->produit->pays_source }} </td>
                                <td>
                                     <a href="{{route('deletecommande',$commande->id)}}"  class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style='width:25px'>
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"  />
                                          </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                {{$lescommande->links()}}

            @else
                <p>
                    Aucune commande n'a été retrouvé !
                </p>
            @endif
        </div>
    </div>
</div>

</x-master-layout>
