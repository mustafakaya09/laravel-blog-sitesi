@if(count($articles)>0)
@foreach ($articles as $article)
           <div class="post-preview">
               <a href="{{route('single', [$article->getCategory->slug, $article->slug])}}">
                   <h4 class=""><!-- post-title -->
                     {{$article->title}}
                   </h4>
                   <img src="{{$article->image}}" width="100%"/>

   <!-- 8.Dersten yorum:  Responsivliği düzeltmek için img taglarına img-fluid
   class'ını eklerseniz sorun çözülür arkadaşlar hoca da atlamış orada eklenti de
    yanlış göstermiş aslında responsive olmaması gerek o fotoğrafların max-width 100% yok :D -->

                   <h4 class="post-subtitle">
                     {!!Str::limit($article->content, 100)!!}
                   </h4>
               </a>
               <p class="post-meta"> Kategori:
                   <a href="#!">{{$article->getCategory->name}}</a>
                   <span style="float:right">{{$article->created_at->diffForHumans()}}</span>
               </p>
           </div>
           @if(!$loop->last)
           <!-- Divider -->    <!--sonuncu kayıttaysa çizgi koymasın-->
           <hr class="my-4" />
           @endif
 @endforeach
    {{$articles->links()}} <!--Anasayfadaki sayfalama linklerini(numaralarını) göstermek için -->
@else
        <div class="alert alert-danger">
            <h1>Bu kategoriye ait yazı bulunamadı</h1>
        </div>
@endif
