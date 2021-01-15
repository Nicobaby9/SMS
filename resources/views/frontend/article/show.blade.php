@extends('landing-page.index')

@section('css')
<style type="text/css" media="screen">
	.card-comments img{width:4rem}
</style>
@endsection

@section('content')
<main class="mt-5 pt-5">
    <div class="container">

        <!--Section: Post-->
        <section class="mt-4">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-8 mb-4">

                	<div class="mb-4 wow fadeIn">
                        <div class="card-body text-center">
                        	<h3 class="h1 my-4">{{ $article->title }}</h3>
                    	</div>
                    </div>

                    <!--Featured Image-->
                    <div class="card mb-4 wow fadeIn">
                        <img src="{{ asset('article/'.$article->image) }}" class="img-fluid">
                    </div>
                    <!--/.Featured Image-->
                	<p class="float-right">Created : {{ \Carbon\Carbon::parse($article->created_at)->format('D, d-M-Y') }} &nbsp;</p>
                    <br><hr>
                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body text-center">

                            <div style="text-align: justify; text-justify: inter-word;">
                            	<p> {!! $article->content !!} </p>
                            </div>

                            <h5 class="my-4 float-right">
                                <strong>Created by : {{ $article->user->fullname }}</strong>
                            </h5>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header font-weight-bold">
                            <span>About author</span>
                            <span class="pull-right">
                                <a href="">
                                    <i class="fab fa-facebook-f mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-twitter mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-instagram mr-2"></i>
                                </a>
                                <a href="">
                                    <i class="fab fa-linkedin-in mr-2"></i>
                                </a>
                            </span>
                        </div>

                        <!--Card content-->
                        <div class="card-body">

                            <div class="media d-block d-md-flex mt-3">
                                <img class="d-flex mb-3 mx-auto z-depth-1 rounded-circle" src="{{ asset('profile_images/'.$article->user->photo) }}" alt="Generic placeholder image"
                                    style="width: 100px;">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <a class="mt-0 font-weight-bold h4" href="{{ route('user_profile', $article->user->username) }}"> {{ \Illuminate\Support\Str::title($article->user->fullname) }} </a>
                                    <table>
                                        <tr>
                                            <th>Email </th>
                                            <th>&nbsp; : &nbsp;</th>
                                            <td> {{ $article->user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <th>&nbsp; : &nbsp;</th>
                                            <td> {{ '@'.$article->user->username }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body text-center">


                            <a class="btn btn-outline-success btn-primary" href="/galery" role="button" target="_blank" style="width: 100%;">Gallery</a>

                            <hr>

                            <!-- Logo carousel -->
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="1800">
                                <div class="carousel-inner">
                                    <!-- First slide -->
                                    <div class="carousel-item">
                                        <!--Grid row-->
                                        <div class="row">

                                            @foreach($galleries as $gallery)
                                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('gallery/'.$gallery->photo) }}" class="img-fluid px-6" style="height:100px; width: 120px;">
                                            </div>
                                            @endforeach

                                        </div>
                                        <!--/Grid row-->
                                    </div>
                                    <!-- First slide -->

                                    <!-- Third slide -->
                                    <div class="carousel-item carousel-item-next carousel-item-left">
                                        <!--Grid row-->
                                        <div class="row">

                                            @foreach($galleries as $gallery)
                                            <div class="col-lg-3 col-md-6 d-flex align-items-center justify-content-center">
                                                <img src="{{ asset('gallery/'.$gallery->photo) }}" class="img-fluid px-6" style="height:100px; width: 120px;">
                                            </div>
                                            @endforeach

                                        </div>
                                        <!--/Grid row-->
                                    </div>
                                    <!-- Third slide -->
                                </div>
                            </div>
                            <!-- Logo carousel -->

                            <hr>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body">
                            
                            <p class="mb-0">Latest Article</p>
                            <lead class="float-right">{{ \Carbon\Carbon::parse($article->created_at)->format('D, d-M-Y') }} &nbsp;</lead>
                            <p class="h3 my-4">{{ \Illuminate\Support\Str::title($latest_article->title) }}</p>

                                <img src="{{ asset('article/'.$latest_article->image) }}" class="card-img-top" height="320" style="border-radius: 4px;">

                            <p class="h5 my-4">
                                @foreach($latest_article->categories as $category)
                                    <a href="{{ route('categories.article.index', ['categories' => $category->name]) }}" class="btn btn-xs btn-info" style="width: 10%;">  {{ \Illuminate\Support\Str::title($category->name) }} &nbsp; </a>
                                @endforeach
                                <a href="" class="btn btn-xs btn-primary float-right">Read More...</a>
                            </p>

                            <p>{!! Illuminate\Support\Str::words($article->content, 70) !!}</p>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Comments-->
                    <div class="card card-comments mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">3 comments</div>
                        <div class="card-body">

                            <div class="media d-block d-md-flex mt-4">
                                <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h5 class="mt-0 font-weight-bold">Miley Steward
                                        <a href="" class="pull-right">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                    </h5>
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

                                    <div class="media d-block d-md-flex mt-3">
                                        <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (27).jpg" alt="Generic placeholder image">
                                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                            <h5 class="mt-0 font-weight-bold">Tommy Smith
                                                <a href="" class="pull-right">
                                                    <i class="fas fa-reply"></i>
                                                </a>
                                            </h5>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                            ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                                            sunt explicabo.
                                        </div>
                                    </div>

                                    <!-- Quick Reply -->
                                    <div class="form-group mt-4">
                                        <label for="quickReplyFormComment">Your comment</label>
                                        <textarea class="form-control" id="quickReplyFormComment" rows="5"></textarea>

                                        <div class="text-center">
                                            <button class="btn btn-info btn-sm" type="submit">Post</button>
                                        </div>
                                    </div>


                                    <div class="media d-block d-md-flex mt-3">
                                        <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (21).jpg" alt="Generic placeholder image">
                                        <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                            <h5 class="mt-0 font-weight-bold">Sylvester the Cat
                                                <a href="" class="pull-right">
                                                    <i class="fas fa-reply"></i>
                                                </a>
                                            </h5>
                                            Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                                            tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media d-block d-md-flex mt-3">
                                <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (30).jpg" alt="Generic placeholder image">
                                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                    <h5 class="mt-0 font-weight-bold">Caroline Horwitz
                                        <a href="" class="pull-right">
                                            <i class="fas fa-reply"></i>
                                        </a>
                                    </h5>
                                    At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                                    quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,
                                    similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum
                                    fuga.
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--/.Comments-->

                    <!--Reply-->
                    <div class="card mb-3 wow fadeIn">
                        <div class="card-header font-weight-bold">Leave a reply</div>
                        <div class="card-body">

                            <!-- Default form reply -->
                            <form>

                                <!-- Comment -->
                                <div class="form-group">
                                    <label for="replyFormComment">Your comment</label>
                                    <textarea class="form-control" id="replyFormComment" rows="5"></textarea>
                                </div>

                                <!-- Name -->
                                <label for="replyFormName">Your name</label>
                                <input type="email" id="replyFormName" class="form-control">

                                <br>

                                <!-- Email -->
                                <label for="replyFormEmail">Your e-mail</label>
                                <input type="email" id="replyFormEmail" class="form-control">


                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md" type="submit">Post</button>
                                </div>
                            </form>
                            <!-- Default form reply -->

                        </div>
                    </div>
                    <!--/.Reply-->

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-4 mb-4">

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">Related articles</div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled">
                            	@foreach($articles as $article)
                                <li class="media">
                                    <img class="d-flex mr-3" src="{{ asset('article/'.$article->image) }}" alt="Generic placeholder image" height="85" width="85">
                                    <div class="media-body">
                                        <a href="{{ route('front.article.show', $article->slug) }}">
                                            <h5 class="mt-0 mb-1 font-weight-bold">{{ $article->title }}</h5>
                                        </a>
                                        {!! Illuminate\Support\Str::limit($article->content, 45) !!}
                                    </div>
                                </li>
                            	@endforeach
                            </ul>

                        </div>

                    </div>
                    <!--/.Card-->

                    <!--Card-->
                    <div class="card mb-4 wow fadeIn">

                        <div class="card-header">Categories</div>

                        <!--Card content-->
                        <div class="card-body">

                            <ul class="list-unstyled">
                            	@foreach($article->categories as $category)
                                    <a href="{{ route('categories.article.index', ['categories' => $category->name]) }}" class="btn btn-xs btn-info" style="width: 100%;">  {{ \Illuminate\Support\Str::title($category->name) }} &nbsp; </a><br><br>
                                @endforeach
                            </ul>

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Post-->

    </div>
</main>
@endsection

@section('js')
<script>
	new WOW().init();
</script>
@endsection