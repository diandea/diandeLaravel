<x-master-layout>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center"> Ajout d'un nouveau produit </h1>
            <form action="{{ route('produits.enregister') }}" method="post" enctype="multipart/form-data" >
                @method("POST")
                @csrf
                @include("partials._produit-form")

            </form>
        </div>
    </div>
</div>

</x-master-layout>
